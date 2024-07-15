@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Quản Lý Bình Luận</h4>
    </div>
    <hr />
    </div>
    <table class="table table-light" id="comments" style="width: 100%">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Khách Hàng</th>
                <th>Bình Luận</th>
                <th>Loại</th>
                <th>Liên Quan</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $com)
                <tr>
                    <td class="align-middle">
                        {{ ($comments->currentPage() - 1) * $comments->perPage() + $loop->index + 1 }}</td>
                    <td class="align-middle">{{ $com->customer->name }}</td>
                    <td class="align-middle">{{ $com->comment }}</td>
                    <td class="align-middle">{{ $com->type == '0' ? 'Sản Phẩm' : 'Blog' }}</td>
                    <td class="align-middle">
                        @if ($com->type == '0')
                            {{ $com->product->name }}
                        @elseif($com->type == '1')
                            {{ $com->blog->title }}
                        @endif
                    </td>
                    <td class="align-middle text-center">
                        <form action="{{ route('comment.destroy', $com->id) }}" method="POST" type="button"
                            class="btn btn-danger p-0" onsubmit="return confirm('Bạn có muốn xóa bình luận này không?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-0"><i class="fas fa-trash-alt"></i></button>
                        </form>
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
