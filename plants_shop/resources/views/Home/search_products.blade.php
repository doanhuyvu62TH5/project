@extends('Home.master.main')
@section('content')
<div class="homecart">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h5>Kết quả tìm kiếm cho: "{{ $query }}"</h5>
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-search" style="margin-top: 100px;">
    <div class="container">
        @if ($products->isEmpty())
            <div class="row justify-content-between">
                <div class="col-4 text-center">
                <h5>Không tìm thấy sản phẩm nào!</h5>
                </div>
            </div>
        @else
            <div class="row justify-content-between">
                <div class="col-4 text-center">
                <h5>Kết quả tìm kiếm tìm thấy: {{ count($products) }} sản phẩm</h5>
                </div>
                <div class="col-4 text-center">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="hidden" name="query" value="{{ $query }}">
                        <select name="sort_by" onchange="this.form.submit()">
                            <option value="" selected disabled hidden>Sắp xếp theo</option>
                            <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                            <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                            <option value="created_asc" {{ request('sort_by') == 'created_asc' ? 'selected' : '' }}>Ngày tạo cũ nhất</option>
                            <option value="created_desc" {{ request('sort_by') == 'created_desc' ? 'selected' : '' }}>Ngày tạo mới nhất</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                @foreach ($products as $product )
                <div class="col">
                    <div class="p-4 text-center">
                        <div class="card">
                            <img src="{{ asset($product->image) }}" height=230 class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach   
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-center">
                {!! $products->onEachSide(1)->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>
@endsection