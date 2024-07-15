<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="register" style="margin-top: 100px;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8">
                    <div class="card" style="border-radius: 2rem;">
                        <div class="row">
                            <div class="col col-lg-5  d-none d-md-block">
                                <img src="{{ asset('assets/images/login/bg_login3.jpg') }}" alt="login form" height="100%"
                                    width="100%" style="border-radius: 2rem 0 0 2rem;" />
                            </div>
                            <div class="col col-lg-7   d-flex align-items-center">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('registerSave') }}">
                                        @csrf
                                        <div class="align-items-center mb-1  text-center">
                                            <img src="{{ asset('assets') }}/images/home/img/logo/logo-home.png" height="50" width="140"  alt="">
                                        </div>
                                        <h6 class="text-center" style="letter-spacing: 1px;">ĐĂNG KÝ</h6>
                                        <div class="mb-1 form-floating">
                                            <input  type="text" name="name"
                                                class="form-control @error('name')is-invalid @enderror"
                                                value="{{ old('name') }}" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput">Họ và tên</label>
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-1 form-floating">
                                            <input type="email" name="email"
                                                class="form-control @error('email')is-invalid @enderror"
                                                value="{{ old('email') }}" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput">Email</label>
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-1 form-floating">
                                            <input type="password" name="password"
                                                class="form-control @error('password')is-invalid @enderror"
                                                id="floatingPassword" placeholder="Password">
                                            <label for="floatingPassword">Mật khẩu</label>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                
                                        <div class="mb-1 d-grid col-6 mx-auto">
                                            <button class="btn btn-sm btn-success btn-block" type="submit">Đăng ký</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                html: '<div>' +
                    @foreach ($errors->all() as $error)
                        '<p>{{ $error }}</p>' +
                    @endforeach
                '</div>',
            })
        </script>
    @endif
    @if (session('no'))
    <script>
        // Gọi SweetAlert2 để hiển thị thông báo
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: '{{ session('no') }}',
            showConfirmButton: false,
            timer: 3000 // Thời gian tự động đóng sau 3 giây
        });
    </script>
@endif
</body>
</html>


