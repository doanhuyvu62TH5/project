<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                   
                   <header>Login</header>
                        @if(Session::has('success'))
                            <div id="successMessage" class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="input-field">
                                    <label for="email">Email</label> 
                                    <input name="email" type="text" class="input" id="email" required="" autocomplete="off">
                                </div> 
                            <div class="input-field">
                                    <label for="pass">Password</label>
                                    <input name = "password" type="password" class="input" id="pass" required=""> 
                                </div> 
                            <div class="input-field">   
                                <button type="submit" class="submit">Đăng nhập</button>
                            </div> 
                            <div class="signin">
                                <span>Already have an account? <a href="{{ route('admin.register') }}">Log in here</a></span>
                            </div>
                        </form>
                </div>  
            </div>
        </div>
    </div>
    <script>
        // Tìm thông báo thành công
        var successMessage = document.getElementById('successMessage');
        // Kiểm tra xem thông báo tồn tại
        if(successMessage) {
            // Ẩn thông báo sau 5 giây
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000); // 5000 milliseconds = 5 seconds
        }
    </script>
    
</div>
</body>
</html>