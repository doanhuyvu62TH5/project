@extends('Home.master.main')
@section('content')
    <div class="homecart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>Đơn hàng</h1>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="custom-link" href="{{ route('home.index') }}"><i class="fas fa-home"></i> Trang chủ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-wrap" style="margin-top: 80px;">
        <div class="container">
            <div class="row mb-5 border-bottom">
                <div class="col-12">
                    <ul class="nav justify-content-center">
                        <li class="nav-item mx-3">
                            <a class=" custom-link me-5" href="{{ route('order.history') }}">Tất cả</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class=" custom-link me-5" aria-current="page" href="{{ route('order.history') }}?status[]=1&status[]=2&status[]=3">Chờ vận chuyển</a>
                        </li>
                        <li class="nav-item mx-3 me-5">
                            <a class="custom-link" href="{{ route('order.history') }}?status[]=0">Chờ xác nhận đơn hàng</a>
                        </li>
                        <li class="nav-item mx-3 me-5">
                            <a class=" custom-link" aria-current="page" href="{{ route('order.history') }}?status[]=4">Đã giao</a>
                        </li>
                        <li class="nav-item mx-3 me-5">
                            <a class=" custom-link" href="{{ route('order.history') }}?status[]=5">Đã hủy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            @if ($orders->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Tổng tiền</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <span>Chờ cửa hàng xác nhận</span>
                                    @elseif ($item->status == 1)
                                        <span>Người bán đang chuẩn bị hàng</span>
                                    @elseif ($item->status == 2)
                                        <span>Đơn hàng của bạn đã được đóng gói và đang bàn giao bên phía vận
                                            chuyển</span>
                                    @elseif ($item->status == 3)
                                        <span>Đang giao hàng</span>
                                    @elseif ($item->status == 4)
                                        <span>Đã giao hàng</span>
                                    @else
                                        <span>
                                            Đã hủy
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->payment->method_payment == 0)
                                        <span>Thanh toán khi nhận hàng.</span>
                                    @elseif ($item->payment->method_payment == 1)
                                        <span>Thanh toán Online</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->payment->status_payment == 0)
                                        <span>Chưa thanh toán.</span>
                                    @elseif ($item->payment->status_payment == 1)
                                        <span>Đã thanh toán.</span>
                                    @endif
                                </td>
                                <td>{{ number_format($item->totalPrice) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('order.detail', $item->id) }}"
                                            class="btn btn-success p-1 me-3 btn-sm">Chi tiết</a>
                                        <div>
                                            @if ($item->status == 0)
                                                <!-- Check if the order is not already cancelled or processed -->
                                                <form action="{{ route('order.cancel', $item) }}" method="get">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-success p-1 me-3 btn-sm" type="submit"
                                                        onclick="return confirm('Bạn có muốn chắc hủy đơn hàng này không?')">Hủy đặt hàng
                                                        </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <h6 class="text-center">Không có sản phẩm nào!</h6>
            @endif
        </div>
    </div>
@endsection
