@extends('Home.master.main')
@section('content')
    @extends('Home.master.main')
@section('content')
    <div class="homecart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>Blog</h1>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blog Detail</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-9">
                <div>
                    <img src="{{ asset($blog->image) }}" width="90%" alt="">
                </div>
                <div class="title mt-4">
                    <h1>{{ $blog->title }}</h1>
                </div>
                <div class="date">
                    <strong>{{ $blog->created_at->format('d/m/Y') }}</strong>
                </div>
                <div class="author">
                    <strong>Người viết: Tác giả cửa hàng hoa yêu thương</strong>
                </div>
                <div class="content mt-3">
                    <p class="">
                        {!! nl2br(e($blog->content)) !!}
                    </p>
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
                                            <img src="{{ is_null($comment->customer->image) ? 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' : asset($comment->customer->image) }}"
                                                alt="avatar" class="rounded-circle img-fluid"
                                                style="height:70px ;width: 70px;">
                                            <div>
                                                <h6 class="fw-bold mb-1">{{ $comment->customer->name }}</h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
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
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    <input type="hidden" name="type" value="blog">
                                    <div class="card-body p-4" style="background-color: #868b91;">
                                        <div class="d-flex flex-start w-100">
                                            <img src="{{ is_null(auth('cus')->user()->image) ? 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' : asset(auth('cus')->user()->image) }}"
                                                alt="avatar" class="rounded-circle img-fluid"
                                                style="height:70px ;width: 70px;">
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
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                                alt="avatar" width="40" height="40" />
                                            <div data-mdb-input-init class="form-outline w-100">
                                                <textarea name="comment" class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                                <label class="form-label" for="textAreaExample">Bình
                                                    luận</label>
                                            </div>
                                        </div>
                                        <div class="float-end mt-2 pt-1">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-primary btn-sm"
                                                onclick="alert('Vui lòng đăng nhập để bình luận')">Đăng bình
                                                luận</button>
                                        </div>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @php
                use Illuminate\Support\Str;
            @endphp
            <div class="col-lg-3 ">
                <div class="recent_product">
                    <div class="row mb-3 mt-3 border-bottom">
                        <h5>Sản phẩm mới</h5>
                    </div>
                    @foreach ($new_products as $newp)
                        <div class="row text-center align-items-center mb-3">
                            <div class="col-5">
                                <a href="{{ route('home.product', $newp->id) }}">
                                    <img src="{{ asset($newp->image) }}" height=125 width=105 class="zoom-image"
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
                                <h6 class="card-title">{{ $newp->price }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection
