<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/dashboard.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark sidebar" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Codersbite</div>
            <div class="list-group list-group-flush my-3"><i class="fas fa-users"></i>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{ route('customer.index') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i>Khách hàng</a>
                <a href="{{ route('category.index') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-list me-2"></i>Danh mục</a>
                <a href="{{ route('product.index') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Sản phẩm</a>
                <a href="{{ route('blog.index') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-blog me-2"></i>Blog</a>
                <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold"data-bs-toggle="collapse"
                    href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i
                        class="fas fa-shopping-cart me-2"></i>Đơn hàng</a>
                <div class="collapse" id="collapseExample">
                    <div class="bg-dark text-dark">
                        <ul>
                            <li>
                                <a class="list-group-item text-deration-none list-group-item-action bg-transparent second-text fw-bold"
                                    aria-current="page" href="{{ route('admin.orders.index') }}">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders.index') }}?status=1"
                                    class="list-group-item text-deration-none list-group-item-action bg-transparent second-text fw-bold">Đang
                                    chuẩn bị hàng</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders.index') }}?status=2"
                                    class="list-group-item text-deration-none list-group-item-action bg-transparent second-text fw-bold">Đã
                                    đóng gói</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders.index') }}?status=3"
                                    class="list-group-item text-deration-none list-group-item-action bg-transparent second-text fw-bold">Đang
                                    giao hàng</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders.index') }}?status=4"
                                    class="list-group-item text-deration-none list-group-item-action bg-transparent second-text fw-bold">Đã
                                    giao hàng</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders.index') }}?status=5"
                                    class="list-group-item text-deration-none list-group-item-action bg-transparent second-text fw-bold">Đã
                                    hủy</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <a href="{{ route('admin.contributes.index') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Đóng góp Phản hồi</a>
                <a href="{{ route('comment.index') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comments me-2"></i>Quản lý bình luận</a>
                <a href="{{ route('admin.logout') }}"
                    class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Đăng xuất</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" style="">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>{{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div>@yield('contents')</div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @if (session('success'))
        <script>
            // Gọi SweetAlert2 để hiển thị thông báo
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        </script>
    @endif
</body>

</html>
