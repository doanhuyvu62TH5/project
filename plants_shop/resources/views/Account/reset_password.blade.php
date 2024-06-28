@extends('Home.master.main')
@section('content')
    <div class="register" style="margin-top: 100px;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8">
                    <div class="card" style="border-radius: 2rem;">
                        <div class="row">
                            <div class="col col-lg-5  d-none d-md-block">
                                <img src="{{ asset('assets/images/login/bg_login2.jpg') }}" alt="login form" height="100%"
                                    width="100%" style="border-radius: 2rem 0 0 2rem;" />
                            </div>
                            <div class="col col-lg-7   d-flex align-items-center">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('account.check_reset_password', $customer->remember_token) }}">
                                        @csrf
                                        <div class="align-items-center mb-3 pb-1 text-center">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h5 fw-bold mb-0">Logo</span>
                                        </div>
                                        <h6 class="text-center" style="letter-spacing: 1px;">Reset Mật khẩu cho tài khoản: {{ $customer->email }}</h6>
                                        <div class="mb-3 form-floating">
                                            <input type="password" name="password"
                                                class="form-control @error('password')is-invalid @enderror"
                                                id="floatingPassword" placeholder="Password">
                                            <label for="floatingPassword">Mật khẩu Mới</label>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 form-floating">
                                            <input type="password" name="confirm_password"
                                                class="form-control @error('confirm_password')is-invalid @enderror"
                                                id="floatingPassword" placeholder="Password">
                                            <label for="floatingPassword">Nhập lại mật khẩu</label>
                                            @error('confirm_password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 d-grid gap-2 col-6 mx-auto">
                                            <button class="btn btn-success btn-block" type="submit">Hoàn tất</button>
                                        </div>
                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5" style="color: #393f81;">Bạn đã có tài khoản?
                                            <a href="{{ route('account.login') }}" style="color: #393f81;">Đăng nhập
                                                ngay.</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
