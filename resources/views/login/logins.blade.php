    @extends('layouts.shop')
    @section('content')
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
     <form action="{{url('login/logins_do')}}" method="post" class="reg-login">
      @csrf
      <h3>还没有三级分销账号？点此<a class="orange" href="{{url('login/register')}}">注册</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="register_email" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList"><input type="password" name="register_pwd" placeholder="输入证码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即登录" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
     @include('index/public')
    </div><!--maincont-->
    @endsection