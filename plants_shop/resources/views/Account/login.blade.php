@extends('Home.master.main')
@section('content')
<div class="register" style="margin-top: 200px;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="card" style="border-radius: 2rem;">
                    <div class="row">
                        <div class="col-md-6 d-none d-md-block">
                            <img src="{{ asset('assets/images/login/bg_login2.jpg') }}" alt="login form" height="100%"
                                width="100%" style="border-radius: 2rem 0 0 2rem;" />
                        </div>
                        <div class="col-md-6  d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form method="POST" action="">
                                    @csrf
                                    <div class="align-items-center mb-3 pb-1 text-center">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Logo</span>
                                    </div>
                                    <h2 class="mb-3 pb-3 text-center" style="letter-spacing: 1px;">Đăng nhập</h2>
                                    <div class="mb-3">
                                        <label class="form-label"  for="form2Example1">Email</label>
                                        <input type="email" name="email" id="form2Example1"
                                            class="form-control form-control-lg" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="form2Example2">Mật khẩu</label>
                                        <input type="password" name="password" id="form2Example2"
                                            class="form-control form-control-lg" />
                                    </div>
                                    <div class="mb-4 d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-success btn-lg btn-block"
                                            type="submit">Đăng nhập</button>
                                    </div>
                                    <a class="small text-muted" href="#!">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản?
                                        <a href="{{ route('account.register') }}" style="color: #393f81;">Đăng ký ngay.</a>
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

