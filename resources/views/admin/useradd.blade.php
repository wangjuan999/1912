<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
			<form id="form">
				@csrf
				<!-- 会员注册页面样式 -->
				<div class="banneradd bor">
					<div class="baTopNo">
						<span>会员注册</span>
					</div>
					<div class="baBody">
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;用户名：<input type="text" name="username" class="input3" />
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密码：<input name="pwd" type="password"
								class="input3" />
						</div>
						<div class="bbD">
							用户等级：<input type="text" name="grade" class="input3" />
						</div>
						<div class="bbD">
							<p class="bbDP">
								<button class="btn_ok btn_yes" id="userbtn" type="button">提交</button>
								<a class="btn_ok btn_no" href="#">取消</a>
							</p>
						</div>
					</div>
				</div>
			</form>
			

			<!-- 会员注册页面样式end -->
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
//添加
$('#userbtn').click(function(){
	// alert(232);
	var form = $('#form').serialize();
	// alert(form);
	$.ajax({
		url:"{{route('save')}}",
		data:form,
		dataType:'json',
		type:'POST',
		success:function(res){
			alert(res.msg);
			location.href="{{route('user')}}";
		}
	})


})
</script>