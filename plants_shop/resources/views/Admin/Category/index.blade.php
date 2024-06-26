@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Danh mục sản phẩm</h4>
        <a href="{{ route('category.create') }}" class="btn btn-success">Thêm danh mục</a>
    </div>
    <hr />
    </div>
    <table class="table table-light">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Loại</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if ($category->count() > 0)
                @foreach ($category as $cat)
                    <tr>
                        <td class="align-middle">
                            {{ ($category->currentPage() - 1) * $category->perPage() + $loop->index + 1 }}</td>
                        <td class="align-middle">{{ $cat->name }}</td>
                        <td class="align-middle">{{ $cat->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td>
                        <td class="align-middle">{{ $cat->type == 0 ? 'Cây' : 'Hoa' }}</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('category.edit', $cat->id) }}" type="button" class="btn btn-warning"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('category.destroy', $cat->id) }}" method="POST" type="button"
                                class="btn btn-danger p-0" onsubmit="return confirm('Bạn có muốn xóa danh mục này không?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Không có danh mục nào!</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div>
        {!! $category->onEachSide(1)->links('pagination::bootstrap-4') !!}
    </div>

@endsection
