@extends('Home.master.main')
@section('content')
    <div class="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner">
                @foreach($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}" height="450">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="banner">
        <div class="container text-center">
            <div class="row align-items-center flex-md-row flex-column">
                <div class="col mb-3">
                    <div class="card">
                        <img src="{{ asset('assets') }}/images/home/img/banner/banner2.jpg" class="card-img"
                            alt="...">
                        <div class="card-img-overlay overflow-hidden">
                            <h5 class="card-title">
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card">
                        <img src="{{ asset('assets') }}/images/home/img/banner/banner1.jpg" class="card-img"
                            alt="...">
                        <div class="card-img-overlay overflow-hidden">
                            <h5 class="card-title"></h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card">
                        <img src="{{ asset('assets') }}/images/home/img/banner/banner3.jpg" class="card-img"
                            alt="...">
                        <div class="card-img-overlay overflow-hidden">
                            <h5 class="card-title"></h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="banner1 ">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('assets') }}/images/home/img/icon/free_shipping.png"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8 ">
                                <div>
                                    <p><strong>MIỄN PHÍ VẬN CHUYỂN</strong></p>
                                    <p>Tất cả đơn hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('assets') }}/images/home/img/icon/support247.png"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p><strong>HỖ TRỢ 24/7</strong></p>
                                    <p>Hỗ trợ 24 giờ trong ngày</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('assets') }}/images/home/img/icon/money_back.png"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p><strong>HOÀN TIỀN</strong></p>
                                    <p>30 ngày đổi trả miễn phí</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('assets') }}/images/home/img/icon/promotions.png"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p><strong>KHUYẾN MÃI</strong></p>
                                    <p>Nhiều sản phẩm khuyển mãi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- new product -->
    <div class="newproduct">
        <div class="container">
            <div class="title text-center">
                <h2 class="text-success">SẢN PHẨM MỚI</h2>
            </div>
            <div class="product">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel"
                    data-bs-interval="5000">
                    <div class="carousel-inner">
                        @foreach ($new_products->chunk(4) as $chunk)
                            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                <div class="row row-cols-2 row-cols-lg-4 g-3 g-lg-3">
                                    @foreach ($chunk as $newp)
                                        <div class="col">
                                            <div class="p-3 text-center">
                                                <a href="{{ route('home.product', $newp->id) }}">
                                                    <img src="{{ asset($newp->image) }}" height="230"
                                                        class="card-img-top zoom-image">
                                                </a>
                                                <div class="card-body">
                                                       <!-- Button trigger modal -->
                                                    <a href="{{ route('home.product', $newp->id) }}"
                                                        class="text-decoration-none text-dark">
                                                        <h5 class="card-title mt-3">{{ $newp->name }}</h5>
                                                        @if ($newp->sale_price != null)
                                                            <div class="row" style="height: 20px;">
                                                                <h6 class="card-title my-3 text-decoration-line-through text-dark text-outline-danger">{{ number_format($newp->price)}} đ</h6>
                                                            </div>
                                                                <h6 class="card-title my-3 text-danger text-outline-danger">{{ number_format($newp->sale_price)}} đ</h6>
                                                        @else
                                                            <div class="row" style="height: 20px;">
                                                            </div>
                                                            <h6 class="card-title my-3 text-danger text-outline-danger">{{ number_format($newp->price)}} đ</h6>
                                                        @endif    
                                                    </a>
                                                    @if (auth('cus')->check())
                                                        <form action="{{ route('cart.add',$newp->id) }}" method="POST">
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
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" style="width: 30px;" type="button"
                        data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" staria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="width: 30px;" type="button"
                        data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div><!-- This closing div is added -->
        </div>
        <div class="viewallproduct text-center">
            <a class="btn btn-sm btn-danger" href="{{ route('products.all') }}" role="button">Tất cả sản phẩm</a>
        </div>
    </div>

    {{-- Tree --}}
    <div class="newproduct">
        <div class="container">
            <div class="title text-center">
                <h2 class="text-success">BỘ SƯU TẬP VỀ CÂY</h2>
            </div>
            <div class="product">
                <div id="carouselExampleDark2" class="carousel carousel-dark slide" data-bs-ride="carousel"
                    data-bs-interval="5000">
                    <div class="carousel-inner">
                        @foreach ($tree->chunk(4) as $chunk)
                            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                        @foreach ($chunk as $tr)
                                            <div class="col">
                                            <div class="p-3 text-center">
                                                <a href="{{ route('home.product', $tr->id) }}">
                                                    <img src="{{ asset($tr->image) }}" height="230"
                                                        class="card-img-top zoom-image">
                                                </a>
                                                <div class="card-body">
                                                       <!-- Button trigger modal -->
                                                    <a href="{{ route('home.product', $tr->id) }}"
                                                        class="text-decoration-none text-dark">
                                                        <h5 class="card-title mt-3">{{ $tr->name }}</h5>
                                                        @if ($tr->sale_price != null)
                                                            <div class="row" style="height: 30px;">
                                                                <h6 class="card-title my-3 text-decoration-line-through text-dark text-outline-danger">{{ number_format($tr->price)}} đ</h6>
                                                            </div>
                                                                <h6 class="card-title my-3 text-danger text-outline-danger">{{ number_format($tr->sale_price)}} đ</h6>
                                                        @else
                                                            <div class="row" style="height: 30px;">
                                                            </div>
                                                            <h6 class="card-title my-3 text-danger text-outline-danger">{{ number_format($tr->price)}} đ</h6>
                                                        @endif                         
                                                    </a>
                                                    @if (auth('cus')->check())
                                                        <form action="{{ route('cart.add',$tr->id) }}" method="POST">
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
                                        @endforeach
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" style="width: 30px;" type="button"
                        data-bs-target="#carouselExampleDark2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" staria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="width: 30px;" type="button"
                        data-bs-target="#carouselExampleDark2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div><!-- This closing div is added -->
        </div>
        <div class="viewallproduct text-center">
            <a class="btn btn-sm btn-danger" href="{{ route('products.byType', ['type' => '0']) }}" role="button">Xem thêm...</a>
        </div>
    </div>

    {{-- flower --}}
    <div class="newproduct">
        <div class="container">
            <div class="title text-center">
                <h2 class="text-success">BỘ SƯU TẬP VỀ HOA</h2>
            </div>
            <div class="product">
                <div id="carouselExampleDark3" class="carousel carousel-dark slide" data-bs-ride="carousel"
                    data-bs-interval="5000">
                    <div class="carousel-inner">
                        @foreach ($flower->chunk(4) as $chunk)
                            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                <div class="container">
                                    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                        @foreach ($chunk as $fl)
                                        <div class="col">
                                            <div class="p-3 text-center">
                                                <a href="{{ route('home.product', $fl->id) }}">
                                                    <img src="{{ asset($fl->image) }}" height="230"
                                                        class="card-img-top zoom-image">
                                                </a>
                                                <div class="card-body">
                                                       <!-- Button trigger modal -->
                                                    <a href="{{ route('home.product', $fl->id) }}"
                                                        class="text-decoration-none text-dark">
                                                        <h5 class="card-title mt-3">{{ $fl->name }}</h5>
                                                        @if ($fl->sale_price != null)
                                                            <div class="row" style="height: 20px;">
                                                                <h6 class="card-title my-3 text-decoration-line-through text-dark text-outline-danger">{{ number_format($fl->price)}} đ</h6>
                                                            </div>
                                                                <h6 class="card-title my-3 text-danger text-outline-danger">{{ number_format($fl->sale_price)}} đ</h6>
                                                        @else
                                                            <div class="row" style="height: 20px;">
                                                            </div>
                                                            <h6 class="card-title my-3 text-danger text-outline-danger">{{ number_format($fl->price)}} đ</h6>
                                                        @endif    
                                                    </a>
                                                    @if (auth('cus')->check())
                                                        <form action="{{ route('cart.add',$fl->id) }}" method="POST">
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
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" style="width: 30px;" type="button"
                        data-bs-target="#carouselExampleDark3" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" staria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="width: 30px;" type="button"
                        data-bs-target="#carouselExampleDark3" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div><!-- This closing div is added -->
        </div>
        <div class="viewallproduct text-center">
            <a class="btn btn-sm btn-danger" href="{{ route('products.byType', ['type' => '1']) }}" role="button">Xem thêm...</a>
        </div>
    </div>

    <div class="banner2">
        <div class="container">
            <div class="row mbn-30">
                <div class="col-md-3 col-sm-6 order-sm-1 order-md-1">
                    <figure class="figure1 position-relative">
                        <a href=""><img src="{{ asset('assets') }}/images/home/img/banner/banner-3.jpg"
                                class="figure-img img-fluid rounded" alt="..."></a>

                        <figcaption class="figure-caption position-absolute top-50 start-50 translate-middle">
                            <h2></h2>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-6 order-sm-3 order-md-2">
                    <figure class="figure1 position-relative">
                        <a href=""><img src="{{ asset('assets') }}/images/home/img/banner/banner-2.jpg"
                                class="figure-img img-fluid rounded" alt="..."></a>

                        <figcaption class="figure-caption position-absolute top-50 start-50 translate-middle">
                            <h2></h2>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-3 col-sm-6 order-sm-2 order-md-3">
                    <figure class="figure1 position-relative">
                        <a href=""><img src="{{ asset('assets') }}/images/home/img/banner/banner-1.jpg"
                                class="figure-img img-fluid rounded" alt="..."></a>

                        <figcaption class="figure-caption position-absolute top-50 start-50 translate-middle">
                            <h2></h2>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="top-seller">
        <div class="container">
            <div class="title text-center">
                <h2 class="text-success">SẢN PHẨM GIẢM GIÁ</h2>
            </div>
            <div class="product">
                <div id="carouselExampleDark4" class="carousel carousel-dark slide" data-bs-ride="carousel"
                    data-bs-interval="5000">
                    <div class="carousel-inner">
                        @foreach ($discounted_products->chunk(4) as $chunk)
                            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                <div class="container">
                                    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                        @foreach ($chunk as $product)
                                        <div class="col">
                                            <div class="p-3 text-center">
                                                <a href="{{ route('home.product', $product->id) }}">
                                                    <img src="{{ asset($product->image) }}" height="230"
                                                        class="card-img-top zoom-image">
                                                </a>
                                                <div class="card-body">
                                                       <!-- Button trigger modal -->
                                                    <a href="{{ route('home.product', $product->id) }}"
                                                        class="text-decoration-none text-dark">
                                                        <h5 class="card-title mt-3">{{ $product->name }}</h5>
                                                        <div class="row" style="height: 20px;">
                                                            <h6 class="card-title my-3 text-decoration-line-through text-dark text-outline-danger">{{ number_format($product->price)}} đ</h6>
                                                        </div>
                                                        <h6 class="card-title my-3 text-danger text-outline-danger">{{ number_format($product->sale_price)}} đ</h6>
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
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" style="width: 30px;" type="button"
                        data-bs-target="#carouselExampleDark4" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" staria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="width: 30px;" type="button"
                        data-bs-target="#carouselExampleDark4" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div><!-- This closing div is added -->
        </div>
    </div>

    <!-- good maxim -->
    <div class="goodmaxim">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="goodmaximcontent">
                        <h3 class="text-danger">Tươi Đẹp & Sắc Màu: Hoa và Cây Cảnh Cho Mọi Góc Nhìn</h3>
                    </div>
                    <div class="goodmaximcontent">
                        <p>Chào mừng đến với thế giới của những màu sắc và hương thơm tuyệt vời! Tại đây, chúng tôi mang đến cho bạn những loại hoa tươi đẹp nhất từ các vườn hoa chăm sóc kỹ lưỡng. Từ những bông hoa đơn giản nhưng thanh lịch cho đến những bó hoa thảo mộc phong phú, mỗi sản phẩm đều mang đến sự tươi mới và sắc màu cho không gian của bạn.</p>
                    </div>
                    <div class="goodmaximcontent">
                        <p>Khám phá bộ sưu tập đa dạng của chúng tôi về cây cảnh, từ những cây nội thất nhỏ gọn đến những cây kiểng lớn mang lại sự sang trọng và xanh mát cho không gian sống của bạn. Chúng tôi cam kết cung cấp các loại cây cảnh chất lượng cao, được chăm sóc kỹ lưỡng để đảm bảo sức khỏe và sự thịnh vượng của cây trong mọi điều kiện thời tiết.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- blog -->
    <div class="blog">
        <div class="container">
            <div class="title text-center">
                <h2 class="text-success">Blog</h2>
            </div>
            <div class="content-blog mt-5">
                <div class="">
                    <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
                        @foreach ($blogs as $blog)
                            <div class="col">
                                <div class="p-2">
                                    <div class="card" style="width: 100%">
                                        <img src="{{ asset($blog->image) }}"
                                            class="card-img-top" height="250" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $blog->title }}</h5>
                                            <p class="card-text">{!! Str::limit($blog->content, 100, '...') !!}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('home.blog',$blog->id) }}" class="card-link text-danger text-decoration-none">Xem thêm...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach    
                    </div>
                </div>
            </div>
            <div class="viewallproduct text-center">
                <a class="btn btn-sm btn-danger" href="{{ route('home.blogs') }}" role="button">Xem thêm...</a>
            </div>
        </div>
    </div>


    <!-- image instagram -->
    <div class="image-instagram">
        <div class="container">
            <div class="title text-center">
                <h2 class="text-success">INSTAGRAM</h2>
            </div>
            <div class="content-blog">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class=" text-center">
                                <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="p-3">
                                            <img src="{{ asset('assets') }}/images/home/img/instagram/instagram-7.jpg"
                                                width="100%" alt="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-6.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-5.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-3.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-4.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-5.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class=" text-center">
                                <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="p-3">
                                            <img src="{{ asset('assets') }}/images/home/img/instagram/instagram-7.jpg"
                                                width="100%" alt="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-6.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-5.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-3.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-4.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-5.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class=" text-center">
                                <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="p-3">
                                            <img src="{{ asset('assets') }}/images/home/img/instagram/instagram-7.jpg"
                                                width="100%" alt="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-6.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-5.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-3.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-4.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3"><img
                                                src="{{ asset('assets') }}/images/home/img/instagram/instagram-5.jpg"
                                                width="100%" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
