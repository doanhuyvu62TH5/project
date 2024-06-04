@extends('Admin.layouts.app')
@section('contents')
    <table class="table">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Order date</th>
                <th>Status</th>
                <th>Total Price</th>
                <th>Cap nhat trang thai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
                <tr>
                    <td class="align-middle" scope="row">{{ $loop->index + 1 }}</td>
                    <td class="align-middle">{{ $item->created_at->format('d/m/Y') }}</td>
                    <td class="align-middle">
                        @if ($item->status == 0)
                            <span>Chưa xác nhận</span>
                        @elseif ($item->status == 1)
                            <span>Đã xác nhận</span>
                        @elseif ($item->status == 2)
                            <span>Đã thanh toán</span>
                        @else
                            <span>Đã Hủy</span>
                        @endif
                    </td>
                    <td class="align-middle">{{ number_format($item->totalPrice) }}</td>
                    <td class="align-middle text-center">
                        <div class="d-flex">
                            <form action="{{ route('admin.orders.show', $item->id) }}" method="get">
                                @csrf
                                <button class="btn btn-success p-1 me-3" type="submit">Chi tiết</button>
                            </form>
                            @if ($item->status == 1)
                                <form action="{{ route('admin.orders.confirm', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success p-1 me-3" type="submit">Đang chuẩn bị hàng</button>
                                </form>
                            @elseif($item->status == 2)
                                <form action="{{ route('admin.orders.markAsPacked', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success p-1 me-3" type="submit">Đã Đóng gói</button>
                                </form>
                            @elseif($item->status == 3)
                                <form action="{{ route('admin.orders.markAsShipping', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success p-1 me-3" type="submit">Đang vận chuyển</button>
                                </form>
                            @elseif($item->status == 4)
                                <form action="{{ route('admin.orders.markAsDelivered', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success p-1 me-3" type="submit">Đã giao hàng</button>
                                </form>
                            @endif
                            @if ($item->status == 0 || $item->status == 1)
                                <form action="{{ route('admin.orders.cancel', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-success p-1 me-3" type="submit">Hủy đơn hàng</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
