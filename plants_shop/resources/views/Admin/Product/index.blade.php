@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Sản phẩm</h4>
        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm">Thêm sản phẩm</a>
    </div>
    <hr />
    <div class="row justify-content-between">
        <div class="col-4">
            <form action="{{ route('product.index') }}" method="GET">
                <div class="input-group mb-3">
                    <select name="sort_by" class="form-select">
                        <option value="" selected disabled hidden>Sắp xếp theo</option>
                        <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần
                        </option>
                        <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Giá giảm
                            dần</option>
                        <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Tên A-Z
                        </option>
                        <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Tên Z-A
                        </option>
                        <option value="quantity_asc" {{ request('sort_by') == 'quantity_asc' ? 'selected' : '' }}>Số
                            lượng thấp đến cao</option>
                        <option value="quantity_desc" {{ request('sort_by') == 'quantity_desc' ? 'selected' : '' }}>Số
                            lượng cao đến thấp</option>
                        <option value="created_asc" {{ request('sort_by') == 'created_asc' ? 'selected' : '' }}>Ngày tạo
                            cũ nhất</option>
                        <option value="created_desc" {{ request('sort_by') == 'created_desc' ? 'selected' : '' }}>Ngày
                            tạo mới nhất</option>
                    </select>
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Lọc</button>
                </div>
            </form>
        </div>
        <div class="col-4">
            <form class="d-flex" method="GET" action="{{ route('product.index') }}">
                <input class="form-control me-2 " type="search" name="search" placeholder="Search"
                    value="{{ request('search') }}" aria-label="Search">
                <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <table class="table table-light">
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
            @if ($products->count() > 0)
                @foreach ($products as $pro)
                    <tr>
                        <td class="align-middle">
                            {{ ($products->currentPage() - 1) * $products->perPage() + $loop->index + 1 }}</td>
                        <td class="align-middle">{{ $pro->name }}</td>
                        <td class="align-middle">{{ $pro->price }}</td>
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
            @else
                <tr>
                    <td class="text-center" colspan="8">Không có sản phẩm nào!</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div>
        {!! $products->onEachSide(1)->links('pagination::bootstrap-4') !!}
    </div>

@endsection
