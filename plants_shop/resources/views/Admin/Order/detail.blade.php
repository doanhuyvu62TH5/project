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
                                <th>Số điện thoại</th>
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
                                <th>Họ và tên:</th>
                                <td>{{ $order->name }}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ:</th>
                                <td>{{ $order->address }}</td>
                            </tr>
                            <tr>
                                <th>Ghi chú:</th>
                                @if ($order->note == null)
                                    <td>Không có</td>
                                @else
                                    <td>{{ $order->note }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Phương thức thanh toán:</th>
                                @if ($order->payment->method_payment == '0')
                                    <td>Thanh toán khi nhận hàng</td>
                                @else
                                    <td>Thanh toán chuyển khoản online</td>
                                @endif
                            </tr>
                            @if ($order->payment->method_payment == '1')
                            <tr>
                                <th>Số tài khoản người chuyển:</th>
                                <td>{{ $order->payment->account_number }}</td>
                            </tr>
                            <tr>
                                <th>Tên chủ tài khoản:</th>
                                <td>{{ $order->payment->account_name }}</td>
                            </tr>
                            <tr>
                                <th>Nội dung chuyển khoản:</th>
                                <td>{{ $order->payment->transaction_content }}</td>
                            </tr>
                            @endif
                        </thead>
                    </table>
                </div>
            </div>
            <h3>Thông tin sản phẩm</h3>

            <table class="table text-center">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($order->details as $item)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><img src="{{ asset($item->product->image) }}" width="40"></td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price) }} đ</td>
                            <td>{{ number_format($item->price * $item->quantity) }} đ</td>
                        </tr>
                        @php
                            $total += $item->quantity * $item->price;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="5">
                            <h6>Tổng:</h6>
                        </td>
                        <td><strong>{{ number_format($total) }} đ</strong></td>
                    </tr>
                </tbody>
            </table>
            <br>
        </div>
    </div>
@endsection
