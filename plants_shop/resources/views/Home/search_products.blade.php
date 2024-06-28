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
                            <a class="custom-link" href="{{ route('home.index') }}"><i class="fas fa-home"></i> Trang chủ</a>
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
                    <form  action="{{ route('search') }}" method="GET">
                        <input type="hidden" name="query" value="{{ $query }}">
                        <select class="form-control" name="sort_by" onchange="this.form.submit()">
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
                        <div class="">
                            <img src="{{ asset($product->image) }}" height=230 class="card-img-top zoom-image" alt="...">
                            <div class="card-body">
                                <a href="{{ route('home.product', $product->id) }}"
                                    class="text-decoration-none text-dark">
                                    <h5 class="card-title mt-3">{{ $product->name }}</h5>
                                    @if ($product->sale_price != null)
                                        <div class="row" style="height: 30px;">
                                            <h6 class="card-title my-3 text-decoration-line-through text-dark text-outline-danger">{{ number_format($product->price)}} đ</h6>
                                        </div>
                                        <h6 class="card-title my-3 text-danger text-outline-danger">{{ number_format($product->sale_price)}} đ</h6>
                                     @else
                                        <div class="row" style="height: 30px;">
                                        </div>
                                        <h6 class="card-title my-3 text-danger text-outline-danger">{{ number_format($product->price)}} đ</h6>
                                    @endif 
                                </a>
                                @if (auth('cus')->check())
                                    <form action="{{ route('cart.add',$product->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('account.login') }}" method="GET">
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng')">
                                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                        </button>
                                    </form>
                                @endif
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