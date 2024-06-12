@extends('Home.master.main')

@section('content')
    <!-- main-area -->
    <!-- breadcrumb-area -->
    <div class="homecart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>Check out</h1>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
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
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <div class="contact-wrap mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="height: 900px;">
                    <div class="text-center mb-5">
                        <h4>THÔNG TIN VẬN CHUYỂN</h4>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
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
                            <label for="">Phone</label>
                            <input name="phone" type="text" value="{{ $auth->phone }}" class="form-control"
                                placeholder="Your phone *" required>
                            @error('phone')
                                <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input name="address" type="text" value="{{ $auth->address }}" class="form-control"
                                placeholder="Your address *" required>
                            @error('address')
                                <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="text-center mt-5 mb-5">
                            <h4>HÌNH THỨC THANH TOÁN</h4>
                        </div>
                        @if ($errors->has('method_payment'))
                            <div class="text-danger">
                                {{ $errors->first('method_payment') }}
                            </div>
                        @endif
                        <?php
                        // Khởi tạo biến để lưu trạng thái các ô nhập liệu và nút radio
                        $selectedPaymentMethod = isset($_POST['method_payment']) ? $_POST['method_payment'] : '';
                        $accountNumber = isset($_POST['account_number']) ? $_POST['account_number'] : '';
                        $accountName = isset($_POST['account_name']) ? $_POST['account_name'] : '';
                        $transactionContent = isset($_POST['transaction_content']) ? $_POST['transaction_content'] : '';
                        ?>
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
                                    id="onlinePayment">
                                <label class="form-check-label" for="onlinePayment">
                                    Thanh toán online
                                </label>
                                <div class="payment-content">
                                    <div class="row align-items-center">
                                        <div class="col col-md-6 ">
                                            <h6>Ngân hàng: Vietinbank.</h6>
                                            <h6>STK: 105872836955</h6>
                                            <h6>TÊN: DOAN HUY VU</h6>
                                        </div>
                                        <div class="col col-md-6">
                                            <img src="{{ asset('assets/images/home/img_qr_vnp.jpg') }}" height="150"
                                                width="150" alt="">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <label for="account_number">Số tài khoản người chuyển:</label>
                                        <input class="form-control form-control-sm" type="text"
                                            name="account_number" id="account_number">

                                        <label for="account_name">Tên chủ tài khoản:</label>
                                        <input class="form-control form-control-sm" type="text" name="account_name"
                                            id="account_name">

                                        <label for="transaction_content">Nội dung chuyển khoản:</label>
                                        <input class="form-control form-control-sm" type="text"
                                            name="transaction_content" id="transaction_content">
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
                                                <p><strong>Giá: </strong>{{ number_format($item->price) }}</p>
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
