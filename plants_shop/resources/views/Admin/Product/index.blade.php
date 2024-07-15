@extends('Admin.layouts.app')
@push('style')
@endpush
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Quản Lý Sản Phẩm</h4>
        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm">Thêm mới sản phẩm</a>
    </div>
    <hr />
    <table class="table table-light" id="products" style="width:100%">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $pro)
                <tr>
                    <td class="align-middle">
                        {{ $loop->index + 1 }}</td>
                    <td class="align-middle">{{ $pro->name }}</td>
                    <td class="align-middle">{{ number_format($pro->price) }}</td>
                    <td class="align-middle">{{ $pro->quantity }}</td>
                    <td class="align-middle">{{ $pro->category->name }}</td>
                    <td class="align-middle">
                        <img src="{{ asset($pro->image) }}" width="100" height="100" alt="">
                    </td>
                    <td class="align-middle">{{ $pro->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td>
                    {{-- <td class="align-middle">{{ $rro->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td> --}}
                    <td class="align-middle text-center">
                        <div class="">
                            <a href="{{ route('product.edit', $pro->id) }}" type="button" class="btn btn-warning"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('product.destroy', $pro->id) }}" method="POST" type="button"
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
                new DataTable('#products', {
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
