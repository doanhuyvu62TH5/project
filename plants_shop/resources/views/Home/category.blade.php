@extends('Home.master.main')
@section('content')
    <div class="homecart">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="align-items-center">
                        @if (isset($headerTitle))
                            <h1>{{ $headerTitle }}</h1>
                        @endif
                        @if (isset($cat))
                            <h6>{{ $cat->name }}</h6>
                        @endif
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="btn" type="button" href="{{ route('home.index') }}">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products" style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1 border">
                    <div class="row mb-3 mt-3 border-bottom text-center">
                        <h5>DANH MỤC SẢN PHẨM</h5>
                    </div>
                    <div class="row mb-3 mt-3 border-bottom text-center">
                        <a href="{{ route('products.all') }}" class="text-decoration-none text-dark {{ request()->is('products/all') ? 'selected' : '' }}">
                            <h5>Tất cả sản phẩm</h5>
                        </a>
                    </div>
                    <div class="category_tree">
                        <div class="row mb-3 mt-3 border-bottom">
                            <a href="{{ route('products.byType', ['type' => 0]) }}" 
                               class="text-decoration-none text-dark {{ request()->is('products/type/0') ? 'selected' : '' }}">
                                <h5>Cây cảnh</h5>
                            </a>
                        </div>
                        <div class="scroll">
                            <ul class="list-group list-group-flush">
                                @foreach ($cats_home as $cat)
                                    @if ($cat->type == '0')
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a href="{{ route('home.category', $cat->id) }}"
                                                class="text-decoration-none text-dark {{ request()->is('products/category/' . $cat->id) ? 'selected' : '' }}"><h5>{{ $cat->name }}</h5></a>
                                            <span class="badge text-dark rounded-pill">{{ $cat->products->count() }}</span>
                                        </li>
                                    @endif
                                @endforeach

                                <!-- Thêm nhiều mục hơn nếu cần -->
                            </ul>
                        </div>
                    </div>
                    <div class="category_flower">
                        <div class="row mb-3 mt-3 border-bottom">
                            <a href="{{ route('products.byType', ['type' => 1]) }}" 
                                class="text-decoration-none text-dark {{ request()->is('products/type/1') ? 'selected' : '' }}">
                                 <h5>Hoa</h5>
                             </a>
                        </div>
                        <div class="scroll">
                            <ul class="list-group list-group-flush">
                                @foreach ($cats_home as $cat)
                                    @if ($cat->type == '1')
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a href="{{ route('home.category', $cat->id) }}"
                                                class="text-decoration-none text-dark">{{ $cat->name }}</a>
                                            <span class="badge text-dark rounded-pill">{{ $cat->products->count() }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="recent_product">
                        <div class="row mb-3 mt-3 border-bottom">
                            <h5>Recent product</h5>
                        </div>
                        @foreach ($new_products as $newp)
                            <div class="row text-center align-items-center mb-3">
                                <!-- Thêm lớp 'flex-md-row' để đảm bảo cả hai cột vẫn nằm ngang trên màn hình lớn và thu nhỏ -->
                                <div class="col-5">
                                    <a href="{{ route('home.product', $newp->id) }}">
                                        <img src="{{ asset($newp->image) }}" height="130px" width="120px" class=""
                                            alt="...">
                                    </a>
                                </div>
                                <div class="col-7 text-start">
                                    <div class="card-body">
                                        <a href="{{ route('home.product', $newp->id) }}"
                                            class="text-decoration-none text-dark">
                                            <h6 class="card-title">{{ $newp->name }}</h6>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $newp->price }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2 border">
                    <div class="container">
                        <div class="row justify-content-center mt-3 text-center">
                            <div class="col-md-4 mb-3">
                                <!-- Thêm dropdown menu -->
                                <form action="{{ request()->fullUrl() }}" method="GET">
                                    <select name="sort_by" onchange="this.form.submit()">
                                        <option value="" selected disabled hidden>Sắp xếp theo</option>
                                        <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                        <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                                        <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Tên A-Z</option>
                                        <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Tên Z-A</option>
                                        <option value="created_asc" {{ request('sort_by') == 'created_asc' ? 'selected' : '' }}>Ngày tạo cũ nhất</option>
                                        <option value="created_desc" {{ request('sort_by') == 'created_desc' ? 'selected' : '' }}>Ngày tạo mới nhất</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                            @if ($products->count())
                                @foreach ($products as $pro)
                                    <div class="col">
                                        <div class="p-0 text-center">
                                            <div class="card">
                                                <a href="{{ route('home.product', $pro->id) }}"><img
                                                        src="{{ asset($pro->image) }}" height="200px" class="card-img-top"
                                                        alt="..."></a>
                                                <div class="card-body">
                                                    <a
                                                        href="{{ route('home.product', $pro->id) }}"class="text-decoration-none text-dark">
                                                        <h5 class="card-title mt-3">{{ $pro->price }}</h5>
                                                        <h5 class="card-title mt-3">{{ $pro->name }}</h5>
                                                    </a>
                                                    @if (auth('cus')->check())
                                                        <form action="{{ route('cart.add',$pro->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="quantity" value="1">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-shopping-cart"></i> ADD TO CART
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('account.login') }}" method="GET">
                                                            <button type="submit" class="btn btn-primary" onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng')">
                                                                <i class="fa fa-shopping-cart"></i> ADD TO CART
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Không có sản phẩm nào!</p>
                            @endif
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 d-flex justify-content-center">
                                {!! $products->onEachSide(1)->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
