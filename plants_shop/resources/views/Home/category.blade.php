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
                        <a href="{{ route('products.all') }}" class="text-decoration-none text-dark">
                            <h4>Tất cả sản phẩm</h4>
                        </a>
                    </div>
                    <div class="category_tree">
                        <div class="row mb-3 mt-3 border-bottom">
                            <a href="{{ route('products.byType', ['type' => 0]) }}" class="text-decoration-none text-dark">
                                <h5>Cây cảnh</h5>
                            </a>
                        </div>
                        <div class="scroll">
                            <ul class="list-group list-group-flush">
                                @foreach ($cats_home as $cat)
                                    @if ($cat->type == '0')
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a href="{{ route('home.category', $cat->id) }}"
                                                class="text-decoration-none text-dark">{{ $cat->name }}</a>
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
                            <a href="{{ route('products.byType', ['type' => 1]) }}" class="text-decoration-none text-dark">
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
                            <div class="col-md-4">
                                <form action="" class="">
                                    <select class="form-select-lg mb-3" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
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
                                                        <h5 class="card-title mt-3">{{ $pro->name }}</h5>
                                                    </a>
                                                    <a href="#" class="btn btn-primary mt-3">Go somewhere</a>
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
