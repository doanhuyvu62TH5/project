@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Quản Lý Đóng Góp Phản Hồi</h4>
    </div>
    <hr />
    <table class="table table-light" id="contribute" style="width: 100%">
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
            @foreach ($contributes as $con)
                <tr>
                    <td class="align-middle">
                        {{ ($contributes->currentPage() - 1) * $contributes->perPage() + $loop->index + 1 }}</td>
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
        </tbody>
    </table>
    @push('scripts')
        <script>
            $(document).ready(function() {
                new DataTable('#comments', {
                    "paging": true, // Disable DataTables pagination if you want to use Laravel pagination
                    "info": true, // Disable table information display
                    "searching": true, // Enable the search functionality
                    "language": {
                        "lengthMenu": "Hiển thị _MENU_ mục",
                        "zeroRecords": "Không tìm thấy dữ liệu",
                        "info": "Hiển thị trang _PAGE_ trong tổng số _PAGES_ trang",
                        "infoEmpty": "Không có dữ liệu",
                        "infoFiltered": "(lọc từ _MAX_ mục)",
                        "search": "Tìm kiếm:",
                        "emptyTable": "Không có dữ liệu trong bảng",
                        "paginate": {
                            "first": "Đầu tiên",
                            "last": "Cuối cùng",
                            "next": "Tiếp",
                            "previous": "Trước"
                        }
                    },
                    "rowReorder": true // Enable row reordering
                });
            });
        </script>
    @endpush
@endsection
