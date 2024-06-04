<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fonts links -->
</head>

<body>
    <style>
        body {
            font-family: "Great Vibes", cursive;
        }

        /* Thêm các quy tắc CSS khác ở đây nếu cần */
    </style>
    <header>
        <div class="fixed-top">
            <ul class="nav nav1 justify-content-end align-items-center">
                @if (auth('cus')->check())
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                                Hi, {{ auth('cus')->user()->name }}
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('order.history') }}">Đơn hàng</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('account.logout') }}">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('account.login') }}">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('account.register') }}">Đăng kí</a>
                    </li>
                @endif
                @if (auth('cus')->check())
                    <li class="nav-item">
                        <button class="btn" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                                class="fa-solid fa-cart-shopping"></i></button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel">Giỏ hàng</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="container">
                                    <div class="recent_product">
                                        <div class="scroll-cart">
                                            <div>
                                                @foreach ($carts as $item)
                                                    <div class="row text-center align-items-center mb-3 border-bottom">
                                                        <!-- Thêm lớp 'flex-md-row' để đảm bảo cả hai cột vẫn nằm ngang trên màn hình lớn và thu nhỏ -->
                                                        <div class="col-5">
                                                            <a href="{{ route('home.product', $item->product->id) }}">
                                                                <img src="{{ asset($item->product->image) }}"
                                                                    height="90" width="80" alt="...">
                                                            </a>
                                                        </div>
                                                        <div class="col-5 text-start">
                                                            <div class="mb-3">
                                                                <a href=""
                                                                    class="text-decoration-none text-dark">
                                                                    <h6>{{ $item->product->name }}</h6>
                                                                </a>
                                                            </div>
                                                            <div class="mt-3 d-flex align-items-center">
                                                                <h6><span>{{ $item->quantity }}</span>
                                                                    <strong>x</strong></h6>
                                                                <a href=""
                                                                    class="text-decoration-none text-dark">
                                                                    <h6 class="text-warning">{{ $item->product->price }}
                                                                    </h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-2">
                                                            <form action="{{ route('cart.delete', $item->product_id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn-close" aria-label="Close" onclick="return confirm('Are you sure want to delete product?')">
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="row">
                                        <a class="btn btn-success" href="{{ route('cart.index') }}">ViewCart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <a title="Thêm vòa giỏ hàng" href="{{ route('account.login') }}"
                        onclick="alert('vui lòng đăng nhập để xem giỏ hàng')"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                @endif

            </ul>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand me-auto" href="#">Logo</a>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Trang
                                        chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle"
                                        href="{{ route('products.byType', ['type' => '0']) }}" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Cây
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($cats_home as $cath)
                                            @if ($cath->type == '0')
                                                <a class="dropdown-item"
                                                    href="{{ route('home.category', $cath->id) }}">{{ $cath->name }}</a>
                                            @endif
                                        @endforeach

                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle"
                                        href="{{ route('products.byType', ['type' => '1']) }}" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Hoa
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($cats_home as $cath)
                                            @if ($cath->type == '1')
                                                <a class="dropdown-item"
                                                    href="{{ route('home.category', $cath->id) }}">{{ $cath->name }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('products.all') }}">Sản Phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" required placeholder="Tìm kiếm" aria-label="Search"
                        oninvalid="this.setCustomValidity('Vui lòng nhập từ khóa tìm kiếm!')"
                        oninput="setCustomValidity('')">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>                    
                </div>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
</html>
