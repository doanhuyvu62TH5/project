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
                                <h1>Giá: {{ $product->price }}</h1>
                            </div>
                            @if (auth('cus')->check())
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="redirect" value="product-detail">
                                    <div class="row mb-3">
                                        <div class="col-auto d-flex align-items-center">
                                            <label for="quantity" class="form-label mb-0 me-2">Số lượng:</label>
                                            <input type="number" id="quantity" name="quantity" class="form-control"
                                                oninput="validity.valid||(value='1' );" onblur="if(!value) value='1';"
                                                min="1" value="1" style="width: 100px;">
                                        </div>
                                        @if (Session::has('no'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="fas fa-check"></i>
                                                {{ Session::get('no') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row mb-3">
                                        <h6>Số lượng trong kho: {{ $product->quantity }}</h6>
                                    </div>
                                    <div class="row mb-3">
                                        <button type="submit" class="btn btn-warning" style="width: 200px;">Thêm vào giỏ
                                            hàng</button>
                                    </div>
                                </form>
                            @else
                                <div class="row mb-3">
                                    <div class="col-auto d-flex align-items-center">
                                        <label for="quantity" class="form-label mb-0 me-2">Số lượng:</label>
                                        <input type="number" id="quantity" name="quantity" class="form-control"
                                            oninput="validity.valid||(value='1' );" onblur="if(!value) value='1';"
                                            min="1" value="1" style="width: 100px;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6>Số lượng trong kho: {{ $product->quantity }}</h6>
                                </div>
                                <div class="row mb-3">
                                    <a title="Thêm vào giỏ hàng" href="{{ route('account.login') }}"
                                        onclick="alert('vui lòng đăng nhập để thêm giỏ hàng')">
                                        <button class="btn btn-warning" style="width: 200px;">Thêm vào giỏ hàng</button>
                                    </a>
                                </div>
                            @endif

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

                        <div class="">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12">
                                    <div class="card text-body">
                                        <div class="card-body p-4">
                                            <h4 class="mb-0">Recent comments</h4>
                                            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
                                        </div>
                                        <div class="scroll-comment">
                                            @foreach ($comments as $comment)
                                                <div class="card-body p-4 ">
                                                    <div class="d-flex">
                                                        <img class="rounded-circle shadow-1-strong me-3"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp"
                                                            alt="avatar" width="60" height="60" />
                                                        <div>
                                                            <h6 class="fw-bold mb-1">{{ auth('cus')->user()->name }}</h6>
                                                            <div class="d-flex align-items-center mb-3">
                                                                <p class="mb-0">
                                                                    March 07, 2021
                                                                    <span class="badge bg-primary">Pending</span>
                                                                </p>
                                                                <a href="#!" class="link-muted"><i
                                                                        class="fas fa-pencil-alt ms-2"></i></a>
                                                                <a href="#!" class="link-muted"><i
                                                                        class="fas fa-redo-alt ms-2"></i></a>
                                                                <a href="#!" class="link-muted"><i
                                                                        class="fas fa-heart ms-2"></i></a>
                                                            </div>
                                                            <p class="mb-0">
                                                                {{ $comment->comment }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr class="my-0" />
                                            @endforeach


                                        </div>
                                        @if (auth('cus')->check())
                                            <form action="{{ route('comments.post') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="type" value="product">
                                                <div class="card-body p-4" style="background-color: #868b91;">
                                                    <div class="d-flex flex-start w-100">
                                                        <img class="rounded-circle shadow-1-strong me-3"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                                            alt="avatar" width="40" height="40" />
                                                        <div data-mdb-input-init class="form-outline w-100">
                                                            <textarea name="comment" class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                                            <label class="form-label"
                                                                for="textAreaExample">Message</label>
                                                        </div>
                                                    </div>
                                                    <div class="float-end mt-2 pt-1">
                                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                            class="btn btn-primary btn-sm">Post comment</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                        <form action="{{ route('account.login') }}" method="GET">
                                            @csrf
                                            <div class="card-body p-4" style="background-color: #868b91;">
                                                <div class="d-flex flex-start w-100">
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                                        alt="avatar" width="40" height="40" />
                                                    <div data-mdb-input-init class="form-outline w-100">
                                                        <textarea name="comment" class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                                        <label class="form-label"
                                                            for="textAreaExample">Message</label>
                                                    </div>
                                                </div>
                                                <div class="float-end mt-2 pt-1">
                                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                        class="btn btn-primary btn-sm" onclick="alert('Vui lòng đăng nhập để bình luận')">Post comment</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
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
                                                    <img src="img/product/product-1.jpg" class="card-img-top"
                                                        alt="...">
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
                                                    <img src="img/product/product-1.jpg" class="card-img-top"
                                                        alt="...">
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
                                                    <img src="img/product/product-1.jpg" class="card-img-top"
                                                        alt="...">
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
