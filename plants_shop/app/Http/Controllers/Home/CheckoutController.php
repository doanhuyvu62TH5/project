<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
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

        if ($status !== null) {
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
        return view('home.detail', compact('auth', 'order'));
    }


    public function post_checkout(Request $req)
    {
        $auth = auth('cus')->user();

        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $data = $req->only('name', 'email', 'phone', 'address');
        $data['customer_id'] = $auth->id;

        $order = Order::create($data);
        if ($order) {
            $token = Str::random(40);
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
            $order->token = $token;
            $order->save();
            Mail::to($auth->email)->send(new OrderMail($order, $token));


            return redirect()->route('home.index')->with('ok', 'Order checkout successfully');
        }

        return redirect()->route('home.index')->with('no', 'Something orror, please try again');

    }

    public function verify($token)
    {
        $order = Order::where('token', $token)->first();
        if ($order) {
            $order->token = null;
            $order->status = 1;
            $order->save();
            return redirect()->route('home.index')->with('ok', 'Order verify successfully');
        }
        return abort(404);

    }
    public function cancel(Order $order)
    {
        $orderCreatedAt = Carbon::parse($order->created_at);
        $currentTime = Carbon::now();
        $hoursDifference = $orderCreatedAt->diffInHours($currentTime);

        if ($hoursDifference < 3) {
            $order->status = 6;
            $order->save();
            $orderDetails = $order->details;
            foreach ($orderDetails as $detail) {
                // Trả lại số lượng sản phẩm vào bảng sản phẩm hoặc chi tiết sản phẩm
                $product = Product::find($detail->product_id);
                $product->quantity += $detail->quantity;
                $product->save();
            }
            return redirect()->route('order.history')->with('yes', 'Hủy đơn hàng thành công!');
        }

        // Gửi email thông báo hủy đơn hàng (nếu cần)
        // Mail::to($auth->email)->send(new OrderCancelledMail($order));
        return redirect()->back()->with('no', 'Đơn hàng của bạn không thể hủy vì thời gian bạn đặt quá hạn!');
    }
}
