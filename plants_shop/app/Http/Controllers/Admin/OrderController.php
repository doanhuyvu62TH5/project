<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $status = request('status', 1);
        $orders = Order::orderBy('id','DESC')->where('status', $status)->paginate();
        return view('admin.order.index', compact('orders'));
    }
    
    public function show(Order $order) {
        $auth = $order->customer;
        return view('Admin.order.detail', compact('auth','order'));
    }
    
    public function confirm(Order $order) {
        $order->status = 2;
        $order->save();
        return redirect()->route('admin.orders.index')->with('ok', 'Order confirmed successfully.');
    }
    public function markAsPacked(Order $order) {
        if ($order->status != 2) {
            return redirect()->route('admin.orders.index')->with('no', 'Order cannot be marked as packed.');
        }
        $order->status = 3;
        $order->save();
        return redirect()->route('admin.orders.index')->with('ok', 'Order confirmed successfully.');
    }
    public function markAsShipping(Order $order) {
        if ($order->status != 3) {
            return redirect()->route('admin.orders.index')->with('no', 'Order cannot be marked as shipping.');
        }
        $order->status = 4;
        $order->save();
        return redirect()->route('admin.orders.index')->with('ok', 'Order marked as shipping successfully.');
    }
    
    public function markAsDelivered(Order $order) {
        if ($order->status != 4) {
            return redirect()->route('admin.orders.index')->with('no', 'Order cannot be marked as delivered.');
        }
        $order->status = 5;
        $order->save();
        return redirect()->route('admin.orders.index')->with('ok', 'Order marked as delivered successfully.');
    }
    
    public function cancel(Order $order) {
        if ($order->status == 0 || $order->status == 1) {
            $order->status = 6;
            $order->save();
            return redirect()->route('admin.orders.index')->with('ok', 'Order canceled successfully.');
        }
        return redirect()->route('admin.orders.index')->with('no', 'Order cannot be canceled.');
    }
    
}
