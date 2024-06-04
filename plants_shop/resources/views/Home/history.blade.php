@extends('Home.master.main')
@section('content')
    <div class="homecart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>History</h1>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cart</a>
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
                            <a class="nav-link" href="{{ route('order.history') }}">Tất cả</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('order.history') }}?status[]=2&status[]=3&status[]=4">Chờ vận chuyển</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="{{ route('order.history') }}?status[]=0">Chờ xác nhận đơn hàng đặt</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('order.history') }}?status[]=5">Đã giao</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="{{ route('order.history') }}?status[]=6">Đã hủy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @if (Session::has('yes'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check"></i>
                {{ Session::get('yes') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('no'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check"></i>
                {{ Session::get('no') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container">
            @if ($orders->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Order date</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <span>Bạn chưa xác nhận đơn hàng</span>
                                    @elseif ($item->status == 1)
                                        <span>Bạn đã xác nhận đơn hàng</span>
                                    @elseif ($item->status == 2)
                                        <span>Người bán đang chuẩn bị hàng</span>
                                    @elseif ($item->status == 3)
                                        <span>Đơn hàng của bạn đã được đóng gói và đang bàn giao bên phía vận
                                            chuyển</span>
                                    @elseif ($item->status == 4)
                                        <span>Đang giao hàng</span>
                                    @elseif ($item->status == 5)
                                        <span>Đã giao hàng</span>
                                    @else
                                        <span>
                                            Đã hủy
                                        </span>
                                    @endif
                                </td>
                                <td>{{ number_format($item->totalPrice) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('order.detail', $item->id) }}"
                                            class="btn btn-success p-1 me-3">Chi tiết</a>
                                        <div>
                                            @if ($item->status == 0 || $item->status == 1)
                                                <!-- Check if the order is not already cancelled or processed -->
                                                <form action="{{ route('order.cancel', $item) }}" method="get">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-success p-1 me-3" type="submit"
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
            @else
                <h1>Khoong co san pham nao</h1>
            @endif
        </div>
    </div>
@endsection
