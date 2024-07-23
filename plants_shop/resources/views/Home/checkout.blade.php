@extends('Home.master.main')

@section('content')
    <!-- main-area -->
    <!-- breadcrumb-area -->
    <div class="homecart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>Thanh toán</h1>
                        <ul class="nav justify-content-center">
                            <li class="nav-item me-2">
                                <a class="custom-link" href="{{ route('home.index') }}"><i class="fas fa-home"></i> Trang chủ</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="custom-link" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> Giỏ Hàng</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <div class="contact-wrap mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="height: 950px;">
                    <div class="text-center mb-5">
                        <h4>THÔNG TIN VẬN CHUYỂN</h4>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input name="name" value="{{ $auth->name }}" type="text" class="form-control"
                                placeholder="Your Name *" required>
                            @error('name')
                                <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" value="{{ $auth->email }}" type="email" class="form-control"
                                placeholder="Your Email *" required>
                            @error('email')
                                <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input name="phone" type="text" value="{{ $auth->phone }}" class="form-control"
                                placeholder="Your phone *" required>
                            @error('phone')
                                <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input name="address" type="text" value="{{ $auth->address }}" class="form-control"
                                placeholder="Your address *" required>
                            @error('address')
                                <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Ghi chú</label>
                            <textarea class="form-control" name="note"></textarea>
                        </div>
                        <div class="text-center mt-5 mb-5">
                            <h4>HÌNH THỨC THANH TOÁN</h4>
                        </div>
                        @if ($errors->has('method_payment'))
                            <div class="text-danger">
                                {{ $errors->first('method_payment') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method_payment" value="0"
                                    id="cashOnDelivery">
                                <label class="form-check-label" for="cashOnDelivery">
                                    Thanh toán khi nhận hàng
                                </label>
                                <div class="payment-content">
                                    <p>Bạn sẽ thanh toán khi nhận được hàng.</p>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method_payment" value="1"
                                    id="onlinePayment" {{ old('method_payment') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="onlinePayment">
                                    Thanh toán online
                                </label>
                                <div class="payment-content">
                                    <div class="row align-items-center">
                                        <div class="col col-md-6 ">
                                            <h4>Ngân hàng: Vietinbank.</h4>
                                            <h4>STK: 105872836955</h4>
                                            <h4>TÊN: DOAN HUY VU</h4>
                                            <p class="text-danger">* Lưu ý: Khách hàng vui lòng chuyển khoản xong nhập thông tin bên dưới rồi đặt hàng!</p>
                                        </div>
                                        <div class="col col-md-6">
                                            <img src="{{ asset('assets/images/home/img_qr_vnp.jpg') }}" height="150"
                                                width="150" alt="">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <label for="account_number">Số tài khoản người chuyển:</label>

                                        <input
                                            class="form-control form-control-sm @error('account_number')is-invalid @enderror"
                                            type="text" value="{{ old('account_number') }}" name="account_number">
                                        @error('account_number')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror

                                        <label for="account_name">Tên chủ tài khoản:</label>
                                        <input
                                            class="form-control form-control-sm @error('account_name')is-invalid @enderror"
                                            type="text" value="{{ old('account_name') }}" name="account_name">
                                        @error('account_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <label for="transaction_content">Nội dung chuyển khoản:</label>
                                        <input
                                            class="form-control form-control-sm @error('transaction_content')is-invalid @enderror"
                                            type="text" value="{{ old('transaction_content') }}" name="transaction_content">
                                        @error('transaction_content')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-danger">Đặt hàng</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="text-center mb-5">
                        <h4>ĐƠN HÀNG</h4>
                    </div>
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th class="h4">Sản phẩm</th>
                                <th class="h4 text-center">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($carts as $item)
                                <tr>
                                    <td>
                                        <div class="row align-items-center ">
                                            <div class="col-md-4">
                                                <img src="{{ asset($item->product->image) }}" width="80"
                                                    height="100">
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $item->product->name }} x <Strong>Số lượng:</Strong>
                                                    {{ $item->quantity }}</p>
                                                <p><strong>Giá: </strong>{{ number_format($item->price) }} đ</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ number_format($item->quantity * $item->price) }}
                                        <strong>đ</strong>
                                    </td>
                                </tr>
                                @php
                                    $total += $item->quantity * $item->price;
                                @endphp
                            @endforeach
                            <tr>
                                <td class="h6">Tổng</td>
                                <td class="text-center"><strong>{{ number_format($total) }} đ</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- contact-area-end -->

        <!-- main-area-end -->
    @endsection
