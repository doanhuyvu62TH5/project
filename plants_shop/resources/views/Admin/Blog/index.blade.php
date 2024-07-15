@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Quản Lý Blog</h4>
        <a href="{{ route('blog.create') }}" class="btn btn-sm btn-success">Thêm mới blog</a>
    </div>
    <hr />
    </div>
    <table class="table table-light" id="blogs" style="width:100%">
        <thead class="table-primary">
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Hình ảnh</th>
                <th class="text-center">Tiêu đề</th>
                <th class="text-center">Nội dung</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td class="align-middle">
                        {{ $loop->index + 1}}</td>
                    <td class="align-middle">
                        <img src="{{ asset($blog->image) }}" width="200" height="120" alt="">
                    </td>
                    <td class="align-middle">{{ $blog->title }}</td>
                    <td class="align-middle">{!! Str::limit($blog->content, 100, '...') !!}</td>
                    <td class="align-middle">{{ $blog->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td>
                    <td class="align-middle">
                        <div class="d-flex">
                        <a href="{{ route('blog.edit', $blog->id) }}" type="button" class="btn btn-warning me-2"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" type="button"
                            class="btn btn-danger p-0" onsubmit="return confirm('Bạn có muốn xóa không?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-0 "><i class="fas fa-trash-alt"></i></button>
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
            new DataTable('#blogs', {
                "paging": true, // Disable DataTables pagination if you want to use Laravel pagination
                "info": true,  // Disable table information display
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


