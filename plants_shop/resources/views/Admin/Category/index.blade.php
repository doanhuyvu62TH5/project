@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Danh Mục</h1>
        <a href="{{ route('category.create') }}" class="btn btn-success">Add Category</a>
    </div>
    <hr />
    <div style="height: 50px; margin: 15px 0px">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i>
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    </div>
    <table class="table table-light">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Type</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($category->count() > 0)
                @foreach ($category as $cat)
                    <tr>
                        <td class="align-middle">{{ ($category->currentPage() - 1) * $category->perPage() + $loop->index + 1 }}</td>
                        <td class="align-middle">{{ $cat->name }}</td>
                        <td class="align-middle">{{ $cat->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td>
                        <td class="align-middle">{{ $cat->type == 0 ? 'Cây' : 'Hoa' }}</td>
                        <td class="align-middle text-end">
                            <div class="">
                                <a href="{{ route('category.edit', $cat->id) }}" type="button" class="btn btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('category.destroy', $cat->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0" onsubmit="return confirm('Ban co muon xoa khong?')">
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
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
        <div>
            {!! $category->onEachSide(1)->links('pagination::bootstrap-4') !!}
        </div>
    </table>
   
@endsection
