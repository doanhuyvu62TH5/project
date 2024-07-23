@extends('Admin.layouts.app')
@section('contents')
    <table class="table">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Hình thức thanh toán</th>
                <th>Trạng thái thanh toán</th>
                <th>Tổng tiền</th>
                <th>Cập nhật trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @if ($orders->count() > 0)
                @foreach ($orders as $item)
                    <tr>
                        <td class="align-middle" scope="row">{{ $loop->index + 1 }}</td>
                        <td class="align-middle">{{ $item->created_at->format('d/m/Y') }}</td>
                        <td class="align-middle">
                            @if ($item->status == 0)
                                <span>Chờ xác nhận</span>
                            @elseif ($item->status == 1)
                                <span>Đang chuẩn bị hàng</span>
                            @elseif ($item->status == 2)
                                <span>Chờ vận chuyển</span>
                            @elseif ($item->status == 3)
                                <span>Đang giao hàng</span>       
                            @elseif ($item->status == 4)
                                <span>Đã giao hàng</span>
                            @else
                                <span>Đã hủy</span>    
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($item->payment->method_payment == 0)
                                <span>Thanh toán khi nhận hàng</span>
                            @elseif ($item->payment->method_payment == 1)
                                <span>Thanh toán online</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($item->payment->status_payment == 0)
                                <span>Chưa thanh toán</span>
                            @elseif ($item->payment->status_payment == 1)
                                <span>Đã thanh toán</span>
                            @endif
                        </td>
                        <td class="align-middle">{{ number_format($item->totalPrice) }}</td>
                        <td class="align-middle text-center">
                            <div class="d-flex">
                                <form action="{{ route('admin.orders.show', $item->id) }}" method="get">
                                    @csrf
                                    <button class="btn btn-success btn-sm p-1 me-3" type="submit">Chi tiết</button>
                                </form>
                                @if ($item->status == 0)
                                    <form action="{{ route('admin.orders.confirm', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm p-1 me-3" type="submit">Đang chuẩn bị hàng</button>
                                    </form>
                                @elseif($item->status == 1)
                                    <form action="{{ route('admin.orders.markAsPacked', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm p-1 me-3" type="submit">Đã Đóng gói</button>
                                    </form>
                                @elseif($item->status == 2)
                                    <form action="{{ route('admin.orders.markAsShipping', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm p-1 me-3" type="submit">Đang vận chuyển</button>
                                    </form>
                                @elseif($item->status == 3)
                                    <form action="{{ route('admin.orders.markAsDelivered', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm p-1 me-3" type="submit">Đã giao hàng</button>
                                    </form>
                                @endif
                                @if ($item->status == 0)
                                    <form action="{{ route('admin.orders.cancel', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-success btn-sm p-1 me-3" type="submit">Hủy</button>
                                    </form>
                                @endif
                                @if ($item->status == 0 && $item->payment->status_payment == 0 && $item->payment->method_payment == 1)
                                <form action="{{ route('admin.orders.markAsPaid', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success btn-sm p-1 me-3" type="submit">Xác nhận thanh toán</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="8">Không có đơn hàng nào!</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
