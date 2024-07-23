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
                                <a class="custom-link" href="{{ route('home.index') }}"><i class="fas fa-home"></i> Trang chủ</a>
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
                            <img src="{{ asset($product->image) }}" width="100%" height="400px" alt="">
                        </div>
                        <div class="col-lg-7">
                            <div class="row mb-3">
                                <h1>{{ $product->name }}</h1>
                            </div>
                            <div class="row mb-3">
                                <h6>{!! $product->content !!}</h6>
                            </div>
                            <div class="row mb-3">
                                @if ($product->sale_price == null)
                                    <h4 class="text-danger">Giá: {{ number_format($product->price) }} đ</h4>
                                @else
                                    <h4 class="text-decoration-line-through text-dark">Giá cũ: {{ number_format($product->price) }} đ</h4>
                                    <h4 class="text-danger">Giá khuyến mãi: {{ number_format($product->sale_price) }} đ</h4>
                                @endif 
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
                                    </div>
                                    <div class="row mb-3">
                                        <h6>Số lượng trong kho: {{ $product->quantity }}</h6>
                                    </div>
                                    <div class="row mb-3">
                                        <button type="submit" class="btn btn-sm btn-danger" style="width: 200px;"><i class="fas fa-cart-plus me-2"></i>Thêm vào giỏ
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
                                <p>{!! $product->content !!}</p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12">
                                <div class="card text-body">
                                    <div class="card-body p-4">
                                        <h4 class="mb-0">Bình luận gần đây</h4>
                                    </div>
                                    <div class="scroll-comment">
                                        @foreach ($comments as $comment)
                                            <div class="card-body p-4 ">
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <img src="{{ is_null($comment->customer->image) ? asset('assets/images/home/avata.png') : asset($comment->customer->image) }}"
                                                        alt="avatar" class="rounded-circle img-fluid"
                                                        style="height:30px ;width: 30px;">
                                                    </div>
                                                    <div>
                                                        <h6 class="fw-bold mb-1">{{ $comment->customer->name }}</h6>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <p class="mb-0 fst-italic text-primary">
                                                                {{ $comment->created_at->format('d-m-Y H:i:s') }}
                                                            </p>
                                                            @if (auth('cus')->check() && $comment->customer_id == auth('cus')->user()->id)
                                                                <form action="{{ route('delete.comment', $comment->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        onclick="return confirm('Bạn có muốn xóa bình luận này không?')"
                                                                        class="btn btn-sm btn-light"><i
                                                                            class="text-danger fas fa-trash-alt"></i></button>
                                                                </form>
                                                            @endif
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
                                            <input type="hidden" name="type" value="0">
                                            <div class="card-body p-4" style="background-color: #868b91;">
                                                <div class="d-flex flex-start w-100">
                                                    <div class="me-2">
                                                        <img src="{{ is_null(auth('cus')->user()->image) ? asset('assets/images/home/avata.png') : asset(auth('cus')->user()->image) }}"
                                                        alt="avatar" class="rounded-circle img-fluid"
                                                        style="height:30px ;width: 30px;">
                                                    </div>
                                                    <div data-mdb-input-init class="form-outline w-100">
                                                        <textarea name="comment" class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                                        <label class="form-label" for="textAreaExample">Bình
                                                            luận</label>
                                                    </div>
                                                </div>
                                                <div class="float-end mt-2 pt-1">
                                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                        class="btn btn-primary btn-sm">Đăng bình luận</button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ route('account.login') }}" method="GET">
                                            @csrf
                                            <div class="card-body p-4" style="background-color: #868b91;">
                                                <div class="d-flex flex-start w-100">
                                                    <div class="me-2">
                                                        <img src="{{ asset('assets/images/home/avata.png') }}"
                                                        alt="avatar" class="rounded-circle img-fluid"
                                                        style="height:30px ;width: 30px;">
                                                    </div>
                                                    <div data-mdb-input-init class="form-outline w-100">
                                                        <textarea name="comment" class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                                        <label class="form-label" for="textAreaExample">Bình
                                                            luận</label>
                                                    </div>
                                                </div>
                                                <div class="float-end mt-2 pt-1">
                                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                        class="btn btn-primary btn-sm"
                                                        onclick="alert('Vui lòng đăng nhập để bình luận!')">Đăng bình
                                                        luận</button>
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
@endsection
