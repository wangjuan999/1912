  @extends('layouts.shop')
    @section('content')
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('login/register_do')}}" method="post" class="reg-login">
      @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{url('login/logins')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="register_email" placeholder="输入手机号码或者邮箱号" />

       </div>
       @php echo($errors->first('register_email'));@endphp
       <div class="lrList2"><input type="text" name="mail" placeholder="输入短信验证码" /><button id="ma">获取验证码</button></div>

       <div class="lrList"><input type="password" name="register_pwd" placeholder="设置新密码（6-18位数字或字母）" /></div>@php echo($errors->first('register_pwd'))@endphp
       <div class="lrList"><input type="password" name="pwd_confirmation" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->@php echo($errors->first('pwd_confirmation'))@endphp
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
      @include('index/public')
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/shop/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/shop/bootstrap.min.js"></script>
    <script src="/js/shop/style.js"></script>
  </body>

  @endsection
<script src="/js/jq.js"></script>
  <script type="text/javascript">
    $('#ma').click(function(){
      // alert(23456);
      
    })


  </script>