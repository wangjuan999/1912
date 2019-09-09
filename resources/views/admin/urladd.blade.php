<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>友情链接-有点</title>
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
			<form id="form" action="{{route('urladd_do')}}" method="post" enctype="multipart/form-data">
				@csrf
				<!-- 会员注册页面样式 -->
				<div class="banneradd bor">
					<div class="baTopNo">
						<span>友情链接</span>
					</div>
					<div class="baBody">
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;网站名称：<input type="text" name="url_name" class="input3" />@php echo($errors->first('url_name'));@endphp
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站网址：<input name="url_url" type="text"
								class="input3"/>@php echo($errors->first('url_url'));@endphp
						</div>
						<div class="bbD">
							链接类型：<input type="radio" name="url_type" class="input" value="0" checked/>LOGO链接
									 <input type="radio" name="url_type" class="input" value="1" />文字链接
						</div>
						<div class="bbD">
							图片链接：<input type="file" name="url_picture" class="input3" />
						</div>
						<div class="bbD">	
							网站联系人：<input type="text" name="url_person" class="input3" />@php echo($errors->first('url_person'));@endphp
						</div>
						<div class="bbD">
							网站介绍：<textarea name="url_content" class="input1"></textarea>@php echo($errors->first('url_content'));@endphp
						</div>
						<div class="bbD">
							是否显示：<input type="radio" name="url_show" class="input" value="0" checked/>是
									 <input type="radio" name="url_show" class="input" value="1" />否
						</div>
						<p></p>
							
						
						<div class="bbD">
							<p class="bbDP">
								<button class="btn_ok btn_yes" id="userbtn" type="submit">提交</button>
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

<script src="/js/jq.js">
</script>
<script type="text/javascript">
	$('input[name="url_name"]').blur(function(){
		var name=$(this).val();
		// alert(name);
		$(this).next().remove();
		if(!name){
			$(this).after('<span>网站名称不能为空</span>');
		}

	});

	$('input[name="url_url"]').blur(function(){
		var name=$(this).val();
		// alert(name);
		$(this).next().remove();
		if(!name){
			$(this).after('<span>网站网址不能为空</span>');
		}

	});

	//url
	$('input[name="url_url"]').blur(function(){
		// alert(234);
		var url = $(this).val();
		// alert(url);
		$(this).next().remove();
		var reg = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
		if(!reg.test(url)){
			$(this).after('<span>请输入正确的网址</span>');
			return ;
		}


		//唯一性验证
		$.post('admin/checkName',{name:url_name},function(msg){
			if(msg){
				obj.after('<span>此名称已存在</span>');
			}
		});

	});

	

</script>


