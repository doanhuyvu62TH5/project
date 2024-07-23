@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Slider</h4>
        <a href="{{ route('slider.create') }}" class="btn btn-sm btn-success">Thêm mới Slider</a>
    </div>
    <hr />
    </div>
    <table class="table table-light" id="sliders" style="width:100%">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tiêu đề</th>
                <th>Thứ tự</th>
                <th>Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>

                @foreach ($sliders as $sl)
                    <tr>
                        <td class="align-middle">
                            {{ $loop->index + 1 }}</td>
                        <td class="align-middle">
                            <img src="{{ asset($sl->image) }}" width="200" height="100" alt="">
                        </td>
                        <td class="align-middle">{{ $sl->title }}</td>
                        <td class="align-middle">{{ $sl->order }}</td>
                        <td class="align-middle">{{ $sl->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('slider.edit', $sl->id) }}" type="button" class="btn btn-warning"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('slider.destroy', $sl->id) }}" method="POST" type="button"
                                class="btn btn-danger p-0" onsubmit="return confirm('Bạn có muốn xóa không?')">
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
                new DataTable('#sliders', {
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
