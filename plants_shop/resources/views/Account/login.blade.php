@extends('Home.master.main')
@section('content')
    <div class="register" style="margin-top: 100px;">
        <div class="container">
            <div class="row justify-content-center align-items-center" >
                <div class="col-lg-7">
                    <div class="card" style="border-radius: 2rem;">
                        <div class="row">
                            <div class="col col-lg-5 d-none d-md-block">
                                <img src="{{ asset('assets/images/login/bg_login2.jpg') }}" alt="login form" height="100%"
                                    width="100%" style="border-radius: 2rem 0 0 2rem;" />
                            </div>
                            <div class="col col-lg-7 d-flex align-items-center">
                                <div class="card-body">
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="align-items-center mb-3 text-center">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h6 fw-bold mb-0">Logo</span>
                                        </div>
                                        <h6 class="text-center" style="letter-spacing: 1px;">Đăng nhập</h6>
                                        <div class="mb-3 form-floating">
                                            <input type="email" name="email"
                                                class="form-control @error('email')is-invalid @enderror"
                                                value="{{ old('email') }}" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput">Email</label>
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 form-floating">
                                            <input type="password" name="password"
                                                class="form-control @error('password')is-invalid @enderror"
                                                id="floatingPassword" placeholder="Password">
                                            <label for="floatingPassword">Password</label>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4 d-grid gap-2 col-6 mx-auto">
                                            <button class="btn btn-success btn-block" type="submit">Đăng
                                                nhập</button>
                                        </div>
                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5" style="color: #393f81;">Bạn chưa có tài khoản?
                                            <a href="{{ route('account.register') }}" style="color: #393f81;">Đăng ký
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


