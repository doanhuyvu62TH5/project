@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Sản phẩm</h1>
        <a href="{{ route('product.create') }}" class="btn btn-success">Add Product</a>
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
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Status</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($product->count() > 0)
                @foreach ($product as $pro)
                    <tr>
                        <td class="align-middle">{{ ($product->currentPage() - 1) * $product->perPage() + $loop->index + 1 }}</td>
                        <td class="align-middle">{{ $pro->name}}</td>
                        <td class="align-middle">{{ $pro->price}}</td>
                        <td class="align-middle">{{ $pro->category->name }}</td>
                        <td class="align-middle">
                            <img src="{{ asset($pro->image)}}" width="100" height="100" alt="">
                        </td>
                        <td class="align-middle">{{ $pro->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td>
                        {{-- <td class="align-middle">{{ $rro->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td> --}}
                        <td class="align-middle text-end">
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
            @else
                <tr>
                    <td class="text-center" colspan="7">Product not found</td>
                </tr>
            @endif
        </tbody>
        <div>
            {!! $product->onEachSide(1)->links('pagination::bootstrap-4') !!}
        </div>
    </table>
   
@endsection
