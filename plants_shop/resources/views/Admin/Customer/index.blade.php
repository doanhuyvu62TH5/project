@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Khách hàng</h4>
    </div>
    <hr />
    </div>
    <table class="table table-light">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if ($customers->count() > 0)
                @foreach ($customers as $cus)
                    <tr>
                        <td class="align-middle">
                            {{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->index + 1 }}</td>
                        <td class="align-middle">{{ $cus->name }}</td>
                        <td class="align-middle">{{ $cus->email}}</td>
                        <td class="align-middle">{{ $cus->phone}}</td>
                        <td class="align-middle">{{ $cus->address}}</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('customer.show', $cus->id) }}" type="button" class="btn btn-secondary">Chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Không có khách hàng nào!</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div>
        {!! $customers->onEachSide(1)->links('pagination::bootstrap-4') !!}
    </div>

@endsection
