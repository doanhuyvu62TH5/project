<h3>Hi: {{ $account->name }}</h3>
<p>
    Good Morning!
</p>
<p>
    <a href="{{ route('account.verify',$account->email) }}">click here to verify your account!</a>
</p>