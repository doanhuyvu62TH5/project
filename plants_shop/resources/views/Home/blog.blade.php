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
                                <a class="nav-link" href="#">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="recent_product">
                    <div class="row mb-3 mt-3 border-bottom">
                        <h5>Sản phẩm mới</h5>
                    </div>
                    @foreach ($new_products as $newp)
                        <div class="row text-center align-items-center mb-3">
                            <!-- Thêm lớp 'flex-md-row' để đảm bảo cả hai cột vẫn nằm ngang trên màn hình lớn và thu nhỏ -->
                            <div class="col-5">
                                <a href="{{ route('home.product', $newp->id) }}">
                                    <img src="{{ asset($newp->image) }}" height=125 width=105 class="zoom-image" alt="...">
                                </a>
                            </div>
                            <div class="col-7 text-start">
                                <div class="card-body">
                                    <a href="{{ route('home.product', $newp->id) }}" class="text-decoration-none text-dark">
                                        <h6 class="card-title">{{ $newp->name }}</h6>
                                    </a>
                                </div>
                                <h6 class="card-title">{{ $newp->price }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @php
                use Illuminate\Support\Str;
            @endphp
            <div class="col-lg-9 ">
                <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-3">
                    @foreach ($blogs as $blog)
                        <div class="col">
                            <div class="p-2">
                                <div class="card" style="width: 100%">
                                    <img src="{{ asset($blog->image) }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $blog->title }}</h5>
                                        <p class="card-text">{{ Str::limit($blog->content, 100, '...') }}</p>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('home.blog',$blog->id) }}" class="card-link">Xem thêm...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach     
                </div>
            </div>
        </div>
    </div>
@endsection
