<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">

                    <!-------------      image     ------------->

                    <img src="img/hinh-nen-hoa-hong-1.jpg" alt="">
                    <div class="text">
                        <p>Join the community of developers <i>- ludiflex</i></p>
                    </div>

                </div>

                <div class="col-md-6 right">

                    <div class="input-box">

                        <header>Đăng ký</header>
                        <form method="POST" action="{{ route('registerSave') }}">
                            @csrf
                            <div class="input-field">
                                <label for="name">Tên</label>
                                <input name="name" type="text" class="input @error('name')is-invalid @enderror"
                                    id="email">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field">
                                <label for="email">Email</label>
                                <input name="email" type="text" class="input @error('email')is-invalid @enderror"
                                    id="email">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field">
                                <label for="pass">Mật khẩu</label>
                                <input name="password" type="password"
                                    class="input @error('password')is-invalid @enderror" id="pass">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field">
                                <button type="submit" class="submit">Đăng ký</button>
                            </div>
                            <div class="signin">
                                <span>Bạn đã có tài khoản ? <a href="{{ route('admin.login') }}">Đăng nhập</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
