<form action="{{url('cargo/register_do')}}" method="post">

@csrf
<p>姓名：
<input type="text" name="c_name">
</p>
<p>
    密码：
    <input type="password" name="c_pwd">
</p>
<p>
    用户身份：
    <input type="radio" name="c_person" value=1>主管
    <input type="radio" name="c_person" value=2 checked>库管员
</p>

<p>
    <input type="submit" value="注册">
</p>
</form>