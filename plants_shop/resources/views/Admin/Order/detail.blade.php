@extends('Admin.layouts.app')
@section('contents')
<div class="contact-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Thông tin khách hàng</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <td>{{ $auth->name }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $auth->phone }}</td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>{{ $auth->address }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-md-6">
                <h3>Thông tin giao hàng</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>{{ $order->address }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <h3>Thông tin sản phẩm</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Product quantity</th>
                    <th>Product price</th>
                    <th>Sub total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->details as $item)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><img src="{{ asset($item->product->image) }}" width="40"></td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }}</td>
                        <td>{{ number_format($item->price * $item->quantity) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div>
            @if ($order->status == 0 && $order->customer_id == auth('cus')->id())
                @php
                    $orderTime = $order->created_at;
                    $currentTime = \Carbon\Carbon::now();
                    $diffInHours = $currentTime->diffInHours($orderTime);
                @endphp

                @if ($diffInHours <= 12)
                    <form action="{{ route('order.cancel', ['order' => $order->id]) }}" method="get">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                    </form>
                @else
                    <p>Đã quá 12 giờ kể từ khi đặt hàng, không thể hủy.</p>
                @endif
            @endif

        </div>
    </div>
</div>
@endsection
