@extends('Home.master.main')
@section('content')
<div class="homecart">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h1>Chi tiết sản phẩm</h1>
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.index') }}">Home</a>
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

<div class="main-detail" style="padding-top: 80px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="row">
                    <div class="col-lg-5 text-center">
                        <img src="{{ asset($product->image) }}" width="100%" height="500px" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="row mb-3">
                            <h1>{{ $product->name }}</h1>
                        </div>
                        <div class="row mb-3">
                            <h6>⭐⭐⭐⭐⭐</h6>
                        </div>
                        <div class="row mb-3">
                            <h6>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea
                                dictumst.</h6>
                        </div>
                        <div class="row mb-3">
                            <h1>80000</h1>
                        </div>
                        <div class="row mb-3">
                            <div class="col-auto d-flex align-items-center">
                                <label for="quantity" class="form-label mb-0 me-2">Số lượng:</label>
                                <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="1" style="width: 100px;">
                              </div>
                        </div>
                        <div class="row mb-3">
                            <a class="btn btn-warning" href="#" role="button" style="width: 200px;">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="row border-bottom">
                            <h1>Mô tả sản phẩm</h1>
                        </div>
                        <div class="row mt-3">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec
                                est tristique auctor. Ipsum metus feugiat sem, quis fermentum turpis eros eget
                                velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus
                                eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non
                                neque.Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida
                                vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi
                                tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi,
                                rutrum at sollicitudin rhoncus</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="related-product" style="padding-top: 80px;">
    <div class="cotainer">
        <div class="container">
            <div class="title text-center">
                <h2>Related product</h2>
                <p>.............</p>
            </div>
            <div class="r">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel"
                    data-bs-interval="5000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="col">
                                            <div class="p-3 border text-center">
                                                <div>
                                                    <img src="img/product/product-1.jpg" class="card-img-top"
                                                        alt="...">
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
                                                    <img src="img/product/product-1.jpg" class="card-img-top"
                                                        alt="...">
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
                                                    <img src="img/product/product-1.jpg" class="card-img-top"
                                                        alt="...">
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
                                                    <img src="img/product/product-1.jpg" class="card-img-top"
                                                        alt="...">
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
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                    <div class="col">
                                        <div class="p-3 border text-center">
                                            <div>
                                                <img src="img/product/product-1.jpg" class="card-img-top" alt="...">
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
                                                <img src="img/product/product-1.jpg" class="card-img-top" alt="...">
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
                                                <img src="img/product/product-1.jpg" class="card-img-top" alt="...">
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
                                                <img src="img/product/product-1.jpg" class="card-img-top" alt="...">
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
            </div>

        </div>
    </div>
</div>
@endsection