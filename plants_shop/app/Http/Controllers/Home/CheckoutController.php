<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\OrderDetail;
use App\Mail\OrderMail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $auth = auth('cus')->user();
        return view('home.checkout', compact('auth'));
    }
    public function history()
    {
        $status = request('status', null);
        $auth = auth('cus')->user();

        if($status !== null) {
            $orders = Order::where('customer_id', $auth->id)
                ->whereIn('status', $status)
                ->orderBy('id', 'DESC')
                ->paginate();
        } else {
            $orders = Order::where('customer_id', $auth->id)
                ->orderBy('id', 'DESC')
                ->paginate();
        }
        return view('home.history', compact('auth', 'orders'));
    }
    public function detail(Order $order)
    {
        $auth = auth('cus')->user();
        return view('home.order_detail', compact('auth', 'order'));
    }


    public function post_checkout(Request $req)
    {
        $auth = auth('cus')->user();

        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'method_payment' => 'required|in:0,1',
        ],
        [
            'method_payment.required' => 'Vui lòng chọn phương thức thanh toán!',
        ]);
        if ($req->method_payment == 1) { // Nếu thanh toán online
            $req->validate([
                'account_number' => 'required|string|max:100',
                'account_name' => 'required|string|max:100',
                'transaction_content' => 'required|string|max:255',
            ]);
        }
        $data = $req->only('name', 'email', 'phone', 'address');
        $data['customer_id'] = $auth->id;
        
        $order = Order::create($data);
        if ($order) {
            foreach ($auth->carts as $cart) {
                $product = Product::find($cart->product_id);
                $product->quantity = $product->quantity - $cart->quantity;
                $product->save();
                $orderDetailData = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity
                ];
                OrderDetail::create($orderDetailData);
            }
            Cart::where('customer_id', $auth->id)->delete();
            $order->save();
            $paymentData = [
                'order_id' => $order->id,
                'method_payment' => $req->method_payment,
                'status_payment' => 0, // Chưa thanh toán
            ];
    
            if ($req->method_payment == 1) { // Nếu thanh toán online
                $paymentData['account_number'] = $req->account_number;
                $paymentData['account_name'] = $req->account_name;
                $paymentData['transaction_content'] = $req->transaction_content;
            }
            Payment::create($paymentData);
            return redirect()->route('home.index')->with('ok', 'Đặt hàng thành công!');
        }
        return redirect()->route('home.index')->with('no', 'Lỗi, vui lòng thử lại sau!');
    }
    
    public function cancel(Order $order)
    {
        $orderCreatedAt = Carbon::parse($order->created_at);
        $currentTime = Carbon::now();
        $hoursDifference = $orderCreatedAt->diffInHours($currentTime);

        if ($hoursDifference < 3) {
            $order->status = 5;
            $order->save();
            $orderDetails = $order->details;
            foreach ($orderDetails as $detail) {
                // Trả lại số lượng sản phẩm vào bảng sản phẩm hoặc chi tiết sản phẩm
                $product = Product::find($detail->product_id);
                $product->quantity += $detail->quantity;
                $product->save();
            }
            return redirect()->route('order.history')->with('ok', 'Hủy đơn hàng thành công!');
        }

        // Gửi email thông báo hủy đơn hàng (nếu cần)
        // Mail::to($auth->email)->send(new OrderCancelledMail($order));
        return redirect()->back()->with('no', 'Đơn hàng của bạn không thể hủy vì thời gian bạn đặt quá hạn!');
    }

    
}
