@extends('Home.master.main')
@section('content')
    <div class="slide">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets') }}/images/home/img/slider/home1-slide1.jpg" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets') }}/images/home/img/slider/home1-slide3.jpg" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets') }}/images/home/img/slider/home1-slide1.jpg" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
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
                        <img src="{{ asset('assets') }}/images/home/img/banner/banner-1.jpg" class="card-img"
                            alt="...">
                        <div class="card-img-overlay overflow-hidden">
                            <h5 class="card-title">Card
                                titleaaaaaaa
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card">
                        <img src="{{ asset('assets') }}/images/home/img/banner/banner-2.jpg" class="card-img"
                            alt="...">
                        <div class="card-img-overlay overflow-hidden">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card">
                        <img src="{{ asset('assets') }}/images/home/img/banner/banner-1.jpg" class="card-img"
                            alt="...">
                        <div class="card-img-overlay overflow-hidden">
                            <h5 class="card-title">Card title</h5>
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
                                <div class="card-body">
                                    <h6 class="card-title">FREE SHIPPING</h6>
                                    <p>Free shipping all order</p>
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
                                    <h6 class="card-title">SUPPORT 24/7</h6>
                                    <p>Support 24 hours a day</p>
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
                                    <h6 class="card-title">FRMONEY RETURN</h6>
                                    <p>30 days for free return</p>
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
                                    <h6 class="card-title">ORDER DISCOUNT</h6>
                                    <p>SOn every order $15</p>
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
                <h2>New Products</h2>
                <p>.............</p>
            </div>
            <div class="product">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-inner">
                        @php $count = 0 @endphp
                        @foreach ($new_products as $index => $new)
                            @if ($count % 4 == 0)
                                <div class="carousel-item{{ $count == 0 ? ' active' : '' }}">
                                    <div class="container">
                                        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                            @endif
                                            <div class="col">
                                                <div class="p-0 text-center">
                                                    <a href="{{ route('home.product', $new->id) }}"><img src="{{ asset($new->image) }}" height="290px" class="card-img-top" alt="..."></a>      
                                                    <div class="card-body">
                                                        <a href="{{ route('home.product', $new->id) }}" class="text-decoration-none text-dark"><h5 class="card-title mt-3">{{ $new->name }}</h5></a>    
                                                        <a href="#" class="btn btn-primary mt-3">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                            @php $count++ @endphp
                            @if ($count % 4 == 0 || $index == count($new_products) - 1)
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" style="width: 30px;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" staria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="width: 30px;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                </div><!-- This closing div is added -->
                
                
            </div>
            <div class="viewallproduct text-center">
                <a class="btn btn-warning" href="{{ route("products.all") }}" role="button">View All Product</a>
            </div>
        </div>
    </div>

    {{-- Tree --}}
    <div class="newproduct">
        <div class="container">
            <div class="title text-center">
                <h2>Tree</h2>
                <p>.............</p>
            </div>
            <div class="product">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-inner">
                        @php $count = 0 @endphp
                        @foreach ($tree as $index => $tr)
                            @if ($count % 4 == 0)
                                <div class="carousel-item{{ $count == 0 ? ' active' : '' }}">
                                    <div class="container">
                                        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                            @endif
                                            <div class="col">
                                                <div class="p-0 text-center">
                                                    <a href="{{ route('home.product', $tr->id) }}"><img src="{{ asset($tr->image) }}" height="290px" class="card-img-top" alt="..."></a>      
                                                    <div class="card-body">
                                                        <a href="{{ route('home.product', $tr->id) }}" class="text-decoration-none text-dark"><h5 class="card-title mt-3">{{ $tr->name }}</h5></a>    
                                                        <a href="#" class="btn btn-primary mt-3">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                            @php $count++ @endphp
                            @if ($count % 4 == 0 || $index == count($tree) - 1)
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" style="width: 30px;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" staria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="width: 30px;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                </div><!-- This closing div is added -->
            </div>
        </div>
    </div>

    {{-- flower --}}
    <div class="newproduct">
        <div class="container">
            <div class="title text-center">
                <h2>Flower</h2>
                <p>.............</p>
            </div>
            <div class="product">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-inner">
                        @php $count = 0 @endphp
                        @foreach ($flower as $index => $fl)
                            @if ($count % 4 == 0)
                                <div class="carousel-item{{ $count == 0 ? ' active' : '' }}">
                                    <div class="container">
                                        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                            @endif
                                            <div class="col">
                                                <div class="p-0 text-center">
                                                    <a href="{{ route('home.product', $fl->id) }}"><img src="{{ asset($fl->image) }}" height="290px" class="card-img-top" alt="..."></a>      
                                                    <div class="card-body">
                                                        <a href="{{ route('home.product', $fl->id) }}" class="text-decoration-none text-dark"><h5 class="card-title mt-3">{{ $fl->name }}</h5></a>    
                                                        <a href="#" class="btn btn-primary mt-3">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                            @php $count++ @endphp
                            @if ($count % 4 == 0 || $index == count($flower) - 1)
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" style="width: 30px;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" staria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="width: 30px;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                </div><!-- This closing div is added -->
            </div>
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
                            <h2>caption</h2>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-6 order-sm-3 order-md-2">
                    <figure class="figure1 position-relative">
                        <a href=""><img src="{{ asset('assets') }}/images/home/img/banner/banner-4.jpg"
                                class="figure-img img-fluid rounded" alt="..."></a>

                        <figcaption class="figure-caption position-absolute top-50 start-50 translate-middle">
                            <h2>caption</h2>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-3 col-sm-6 order-sm-2 order-md-3">
                    <figure class="figure1 position-relative">
                        <a href=""><img src="{{ asset('assets') }}/images/home/img/banner/banner-3.jpg"
                                class="figure-img img-fluid rounded" alt="..."></a>

                        <figcaption class="figure-caption position-absolute top-50 start-50 translate-middle">
                            <h2>caption</h2>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="top-seller">
        <div class="container">
            <div class="title text-center">
                <h2>Top Seller</h2>
                <p>.............</p>
            </div>
            <div class="product">
                <div id="carouselExampleDark2" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="container">
                                <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <div class="container">
                                <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="p-3 border text-center">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 border text-center">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 border text-center">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 border text-center">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 border text-center">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 border text-center">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 border text-center">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3 border text-center">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="{{ asset('assets') }}/images/home/img/product/product-1.jpg"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            </div>
        </div>
    </div>

    <!-- good maxim -->
    <div class="goodmaxim">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="goodmaximcontent">
                        <h6>A little Story About Us</h6>
                    </div>
                    <div class="goodmaximcontent">
                        <h4>Our History</h4>
                    </div>
                    <div class="goodmaximcontent">
                        <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod
                            mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis
                            in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me
                            lius quod ii legunt saepius. Claritas est etiam processus dynamicus. Phasellus eu
                            rhoncus dolor, vitae scelerisque sapien</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- blog -->
    <div class="blog">
        <div class="container">
            <div class="title text-center">
                <h2>Blog</h2>
                <p>.............</p>
            </div>
            <div class="content-blog">
                <div class="text-center">
                    <div id="carouselExampleDark3" class="carousel carousel-dark slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="p-3">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/blog/blog-details-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/blog/blog-details-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/blog/blog-details-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="p-3">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/blog/blog-details-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/blog/blog-details-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-3">
                                            <div>
                                                <img src="{{ asset('assets') }}/images/home/img/blog/blog-details-1.jpg"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the
                                                        card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" style="width: 30px;"
                            data-bs-target="#carouselExampleDark3" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" style="width: 30px;"
                            data-bs-target="#carouselExampleDark3" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- image instagram -->
    <div class="image-instagram">
        <div class="container">
            <div class="title text-center">
                <h2>Instagram</h2>
                <p>.............</p>
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
