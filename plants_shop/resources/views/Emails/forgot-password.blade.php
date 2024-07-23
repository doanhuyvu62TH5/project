<h3>Xin chào {{ $customer->name }}!</h3>
    <p>
        <a href="{{ route('account.reset_password', $customer->remember_token) }}">Vui lòng click vào đường dẫn để thiết lập lại mật khẩu mới!</a>
    </p>    
