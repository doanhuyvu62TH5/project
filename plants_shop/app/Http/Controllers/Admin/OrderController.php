<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $status = request('status', 0);
        $orders = Order::orderBy('id','DESC')->where('status', $status)->paginate();
        return view('admin.order.index', compact('orders'));
    }
    
    public function show(Order $order) {
        $auth = $order->customer;
        return view('Admin.order.detail', compact('auth','order'));
    }
    
    public function confirm(Order $order) {
        $order->status = 1;
        $order->save();
        return redirect()->route('admin.orders.index')->with('ok', 'Cập nhật trạng thái đơn hàng thành công!');
    }
    public function markAsPacked(Order $order) {
        if ($order->status != 1) {
            return redirect()->route('admin.orders.index')->with('no', 'Lỗi');
        }
        $order->status = 2;
        $order->save();
        return redirect()->route('admin.orders.index')->with('ok', 'Cập nhật trạng thái đơn hàng thành công!');
    }
    public function markAsShipping(Order $order) {
        if ($order->status != 2) {
            return redirect()->route('admin.orders.index')->with('no', 'Lỗi!');
        }
        $order->status = 3;
        $order->save();
        return redirect()->route('admin.orders.index')->with('ok', 'Cập nhật trạng thái đơn hàng thành công!');
    }
    
    public function markAsDelivered(Order $order) {
        if ($order->status != 3) {
            return redirect()->route('admin.orders.index')->with('no', 'Lỗi!');
        }
        $order->status = 4;
        $order->save();
        Payment::updateOrCreate(
            ['order_id' => $order->id],
            ['status_payment' => 1]
        );
        return redirect()->route('admin.orders.index')->with('ok', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    public function markAsPaid(Order $order) {
        Payment::updateOrCreate(
            ['order_id' => $order->id],
            ['status_payment' => 1]
        );
        return redirect()->route('admin.orders.index')->with('ok', 'Cập nhật trạng thái đơn hàng thành công!');
    }
    
    public function cancel(Order $order) {
        if ($order->status == 0) {
            $order->status = 5;
            $order->save();
            return redirect()->route('admin.orders.index')->with('ok', 'Hủy đơn hàng thành công!');
        }
        return redirect()->route('admin.orders.index')->with('no', 'Lỗi!');
    }
    
}
