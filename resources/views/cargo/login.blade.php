<form action="{{url('cargo/login_do')}}" method="post">
@csrf
    <p>
        admin:
        <input type="text" name="c_name">
    </p>
    <p>
        密码：
        <input type="password" name="c_pwd">
    </p>
    <p>
        <input type="submit" value="登录">
        <a href="{{url('cargo/register')}}">注册</a>
    </p>
</form>