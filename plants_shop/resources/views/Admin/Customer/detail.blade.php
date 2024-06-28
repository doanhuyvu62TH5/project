@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Thông tin khách hàng chi tiết</h4>
    </div>
    <hr />
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="text-center mb-5 mt-5">
                        <h5>Thông tin tài khoản</h5>
                    </div>
                    <div class="col-4">
                        <p><i class="fas fa-user"></i> Họ và tên: </p>
                        <p><i class="fas fa-envelope"></i> Email: </p>
                        <p><i class="fas fa-phone"></i> Số điện thoại: </p>
                        <p><i class="fas fa-address-card"></i> Địa chỉ: </p>
                    </div>
                    <div class="col-8">
                        <p>{{ $customer->name }}</p>
                        <p>{{ $customer->email }}</p>
                        <p>{{ $customer->phone }}</p>
                        <p>{{ $customer->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="text-center mb-5 mt-5">
                    <h5>Lịch sử đặt hàng
                    </h5>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if ($orders->count() > 0)
                            @foreach ($orders as $order)
                                <h3>Đơn hàng #{{ $order->id }}</h3>
                                <p><i class="fas fa-calendar-alt me-2"></i>Ngày đặt: {{ $order->created_at }}</p>
                                <p><Strong>Trạng thái: </Strong>
                                    @if ($order->status == 0)
                                        <span>Chờ cửa hàng xác nhận</span>
                                    @elseif ($order->status == 1)
                                        <span>Người bán đang chuẩn bị hàng</span>
                                    @elseif ($order->status == 2)
                                        <span>Đơn hàng của bạn đã được đóng gói và đang bàn giao bên phía vận
                                            chuyển</span>
                                    @elseif ($order->status == 3)
                                        <span>Đang giao hàng</span>
                                    @elseif ($order->status == 4)
                                        <span>Đã giao hàng</span>
                                    @else
                                        <span>
                                            Đã hủy
                                        </span>
                                    @endif
                                </p>
                                <p><Strong>Phương thức thanh toán: </Strong>
                                    @if ($order->payment->method_payment == 0)
                                        <span>Thanh toán khi nhận hàng.</span>
                                    @elseif ($order->payment->method_payment == 1)
                                        <span>Thanh toán Chuyển Khoản</span>
                                    @endif
                                </p>
                                <p><Strong>Trạng thái thanh toán: </Strong>
                                    @if ($order->payment->status_payment == 0)
                                        <span>Chưa thanh toán.</span>
                                    @elseif ($order->payment->status_payment == 1)
                                        <span>Đã thanh toán.</span>
                                    @endif
                                </p>
                                <p><strong>Tổng tiền: </strong>{{ number_format($order->totalPrice) }}</p>
                                <h4>Sản phẩm:</h4>
                                <table class="table  text-center">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <!-- Thêm các cột khác nếu cần -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->Details as $detail)
                                            <tr>
                                                <td class="align-middle" scope="row">{{ $loop->index + 1 }}</td>
                                                <td class="align-middle"><img src="{{ asset($detail->product->image) }}"
                                                        width="70" height="80"></td>
                                                <td class="align-middle">{{ $detail->product->name }}</td>
                                                <td class="align-middle">{{ $detail->quantity }}</td>
                                                <td class="align-middle">{{ $detail->price }}</td>
                                                <!-- Hiển thị các thông tin khác của sản phẩm nếu cần -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr />
                            @endforeach
                        @else
                        <p>Không có đơn hàng nào!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
