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
                                <a class="custom-link" href="{{ route('home.index') }}"><i class="fas fa-home"></i> Trang
                                    chủ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 border border-danger">
                    <div class="row mb-3 mt-3 border-bottom text-center">
                        <h5>DANH MỤC SẢN PHẨM</h5>
                    </div>
                    <div class="row mb-3 mt-3 border-bottom text-center">
                        <a href="{{ route('products.all') }}"
                            class="text-decoration-none text-dark {{ request()->is('products/all') ? 'selected' : '' }}">
                            <h5>Tất cả sản phẩm</h5>
                        </a>
                    </div>
                    @if ($headerTitle == 'Cây cảnh')
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
                                                    class="text-decoration-none text-dark {{ request()->is('products/category/' . $cat->id) ? 'selected' : '' }}">
                                                    <h5>{{ $cat->name }}</h5>
                                                </a>
                                                <span
                                                    class="badge text-dark rounded-pill">{{ $cat->products->count() }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                    <!-- Thêm nhiều mục hơn nếu cần -->
                                </ul>
                            </div>
                        </div>
                    @elseif ($headerTitle == 'Hoa')
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
                                                    class="text-decoration-none text-dark {{ request()->is('products/category/' . $cat->id) ? 'selected' : '' }}">
                                                    <h5>{{ $cat->name }}</h5>
                                                </a>
                                                <span
                                                    class="badge text-dark rounded-pill">{{ $cat->products->count() }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
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
                                                    class="text-decoration-none text-dark {{ request()->is('products/category/' . $cat->id) ? 'selected' : '' }}">
                                                    <h5>{{ $cat->name }}</h5>
                                                </a>
                                                <span
                                                    class="badge text-dark rounded-pill">{{ $cat->products->count() }}</span>
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
                                                    class="text-decoration-none text-dark {{ request()->is('products/category/' . $cat->id) ? 'selected' : '' }}">
                                                    <h5>{{ $cat->name }}</h5>
                                                </a>
                                                <span
                                                    class="badge text-dark rounded-pill">{{ $cat->products->count() }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif


                    <div class="recent_product">
                        <div class="row mb-3 mt-3 border-bottom">
                            <h5>Sản phẩm mới</h5>
                        </div>
                        @foreach ($new_products as $newp)
                            <div class="row text-center align-items-center mb-3">
                                <!-- Thêm lớp 'flex-md-row' để đảm bảo cả hai cột vẫn nằm ngang trên màn hình lớn và thu nhỏ -->
                                <div class="col-5">
                                    <a href="{{ route('home.product', $newp->id) }}">
                                        <img src="{{ asset($newp->image) }}" height=125 width=110 class="zoom-image"
                                            alt="...">
                                    </a>
                                </div>
                                <div class="col-7 text-start">
                                    <div class="card-body mb-3">
                                        <a href="{{ route('home.product', $newp->id) }}"
                                            class="text-decoration-none text-dark">
                                            <h6 class="card-title">{{ $newp->name }}</h6>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        @if ($newp->sale_price != null)
                                            <p class="text-decoration-line-through text-dark">
                                                <Strong>{{ number_format($newp->price) }} đ</Strong></p>
                                            <p class="text-danger"><Strong>{{ number_format($newp->sale_price) }}
                                                    đ</Strong></p>
                                        @else
                                            <p class="text-danger"><Strong>{{ number_format($newp->price) }} đ</Strong></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-9 border border-danger">
                    <div class="container">
                        <div class="row justify-content-center mt-3 text-center">
                            <div class="row mb-5 justify-content-center">
                                <!-- Thêm dropdown menu -->
                                <form action="{{ request()->fullUrl() }}" class="row" method="GET">
                                    <div class="col-6">
                                        <select class="form-control" name="sort_by" onchange="this.form.submit()">
                                            <option value="" selected disabled hidden>Sắp xếp theo</option>
                                            <option value="price_asc"
                                                {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần
                                            </option>
                                            <option value="price_desc"
                                                {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần
                                            </option>
                                            <option value="name_asc"
                                                {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Tên A-Z</option>
                                            <option value="name_desc"
                                                {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Tên Z-A</option>
                                            <option value="created_asc"
                                                {{ request('sort_by') == 'created_asc' ? 'selected' : '' }}>Ngày tạo cũ
                                                nhất</option>
                                            <option value="created_desc"
                                                {{ request('sort_by') == 'created_desc' ? 'selected' : '' }}>Ngày tạo mới
                                                nhất</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" name="price_range" onchange="this.form.submit()">
                                            <option value="" selected disabled hidden>Chọn khoảng giá</option>
                                            <option value="">Tất cả</option>
                                            <option value="under_100000"
                                                {{ request('price_range') == 'under_100000' ? 'selected' : '' }}>Dưới
                                                100.000</option>
                                            <option value="100000_200000"
                                                {{ request('price_range') == '100000_200000' ? 'selected' : '' }}>100.000 -
                                                200.000</option>
                                            <option value="above_200000"
                                                {{ request('price_range') == 'above_200000' ? 'selected' : '' }}>Trên
                                                200.000</option>
                                            <option value="sale"
                                                {{ request('price_range') == 'sale' ? 'selected' : '' }}>Đang khuyến mãi
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                            @if ($products->count())
                                @foreach ($products as $pro)
                                    <div class="col border-no">
                                        <div class="p-0 text-center">
                                            <div class="">
                                                <a href="{{ route('home.product', $pro->id) }}"><img
                                                        src="{{ asset($pro->image) }}" height="200px"
                                                        class="card-img-top zoom-image" alt="..."></a>
                                                <div class="card-body">
                                                    <a
                                                        href="{{ route('home.product', $pro->id) }}"class="text-decoration-none text-dark">
                                                        <h5 class="card-title mt-3">{{ $pro->name }}</h5>
                                                        @if ($pro->sale_price != null)
                                                            <div class="row" style="height: 30px;">
                                                                <h6
                                                                    class="card-title my-3 text-decoration-line-through text-dark text-outline-danger">
                                                                    {{ number_format($pro->price) }} đ</h6>
                                                            </div>
                                                            <h6 class="card-title my-3 text-danger text-outline-danger">
                                                                {{ number_format($pro->sale_price) }} đ</h6>
                                                        @else
                                                            <div class="row" style="height: 30px;">
                                                            </div>
                                                            <h6 class="card-title my-3 text-danger text-outline-danger">
                                                                {{ number_format($pro->price) }} đ</h6>
                                                        @endif
                                                    </a>
                                                    @if (auth('cus')->check())
                                                        <form action="{{ route('cart.add', $pro->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="quantity" value="1">
                                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('account.login') }}" method="GET">
                                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                                onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng')">
                                                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
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
