<h3>Xin chào: {{ $account->name }}</h3>
<p>
    <a href="{{ route('account.verify',$account->email) }}">Vui lòng click vào đây để xác thực Email</a>
</p>