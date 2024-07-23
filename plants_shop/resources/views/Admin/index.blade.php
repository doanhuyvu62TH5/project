@extends('Admin.layouts.app')
@section('contents')
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Sản phẩm</strong></p>
                    <h3 class="fs-2">{{ $productCount }}</h3>
                    <a href="{{ route('product.index') }}" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fas fa-gift fs-1 primary-text p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Khách hàng</strong></p>
                    <h3 class="fs-2">{{ $customerCount }}</h3>
                    <a href="{{ route('customer.index') }}" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fas fa-users fs-1 primary-text  p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Danh mục</strong></p>
                    <h3 class="fs-2">{{ $categoryCount }}</h3>
                    <a href="{{ route('category.index') }}" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fas fa-solid fa-list fs-1 primary-text p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Blog</strong></p>
                    <h3 class="fs-2">{{ $blogCount }}</h3>
                    <a href="{{ route('blog.index') }}" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fas fa-blog fs-1 primary-text p-3"></i>
            </div>
        </div>
    </div>
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Bình luận</strong></p>
                    <h3 class="fs-2">{{ $commentCount }}</h3>
                    <a href="{{ route('comment.index') }}" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fas fa-comments fs-1 primary-text  p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Đơn hàng</strong></p>
                    <h3 class="fs-2">{{ $orderCount }}</h3>
                    <a href="{{ route('admin.orders.index') }}" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fas fa-shopping-cart fs-1 primary-text p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Đang vận chuyển</strong></p>
                    <h3 class="fs-2">{{ $orderShippingCount }}</h3>
                    <a href="{{ route('admin.orders.index') }}?status=3" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fas fa-truck fs-1 primary-text p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Đã giao</strong></p>
                    <h3 class="fs-2">{{ $orderdeliveredCount }}</h3>
                    <a href="{{ route('admin.orders.index') }}?status=4" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fas fa-hand-holding-usd fs-1 primary-text p-3"></i>
            </div>
        </div>
    </div>
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Phản hồi</strong></p>
                    <h3 class="fs-2">{{ $contributeCount }}</h3>
                    <a href="{{ route('admin.contributes.index') }}" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fas fa-comment-dots fs-1 primary-text  p-3"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-5"><strong>Slider</strong></p>
                    <h3 class="fs-2">{{ $SliderCount }}</h3>
                    <a href="{{ route('slider.index') }}" class="text-success fw-bold text-decoration-none">Chi tiết... <i class="fas fa-arrow-right"></i></a>
                </div>
                <i class="fa fa-images fs-1 primary-text  p-3"></i>
            </div>
        </div>
    </div>
@endsection
