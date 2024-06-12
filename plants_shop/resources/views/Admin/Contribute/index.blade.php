@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Phản hồi và đóng góp</h4>
    </div>
    <table class="table table-light">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Chủ đề</th>
                <th>Lời nhắn</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if ($contributes->count() > 0)
                @foreach ($contributes as $con)
                    <tr>
                        <td class="align-middle">{{ ($contributes->currentPage() - 1) * $contributes->perPage() + $loop->index + 1 }}</td>
                        <td class="align-middle">{{ $con->name }}</td>
                        <td class="align-middle">{{ $con->phone }}</td>
                        <td class="align-middle">{{ $con->email }}</td>
                        <td class="align-middle">{{ $con->subject }}</td>
                        <td class="align-middle">{{ $con->message }}</td>
                        <td class="align-middle text-center">
                            <div class="">
                                <form action="{{ route('admin.contributes.delete', $con->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0" onsubmit="return confirm('Bạn có muốn xóa không?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="7">Không có đóng góp hoặc phản hồi nào!</td>
                </tr>
            @endif
        </tbody>
        <div>
            {!! $contributes->onEachSide(1)->links('pagination::bootstrap-4') !!}
        </div>
    </table>
@endsection
