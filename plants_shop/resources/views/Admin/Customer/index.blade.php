@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Quản Lý Khách Hàng</h4>
    </div>
    <hr />
    </div>
    <table class="table table-light" id="customers" style="width:100%">
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
            @foreach ($customers as $cus)
                <tr>
                    <td class="align-middle">
                        {{ $loop->index + 1 }}</td>
                    <td class="align-middle">{{ $cus->name }}</td>
                    <td class="align-middle">{{ $cus->email }}</td>
                    <td class="align-middle">{{ $cus->phone }}</td>
                    <td class="align-middle">{{ $cus->address }}</td>
                    <td class="align-middle text-center">
                        <a href="{{ route('customer.show', $cus->id) }}" type="button" class="btn btn-success">Chi
                            tiết</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @push('scripts')
        <script>
            $(document).ready(function() {
                new DataTable('#customers', {
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
                    "rowReorder": true, // Enable row reordering
                });
            });
        </script>
    @endpush
@endsection
