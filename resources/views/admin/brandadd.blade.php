<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题添加-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;话题添加
			</div>
		</div>
		<div class="page ">
			<form id="form" action="{{route('brandadd_do')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="banneradd bor">
				<div class="baTopNo">
					<span>品牌添加</span>
				</div>
				<div class="baBody">
					
					<div class="bbD">
						品牌标题：<input type="text" name="name" class="input3"  />
					</div>
					<div class="bbD">
						品牌网址：<input type="text" name="url" class="input3" value="https://"/>
					</div>
					
					<div class="bbD">
						品牌logo：
						<input type="file" name="logo">
					</div>
					<div class="bbD">
						品牌描述：
						<div class="btext">
							<textarea class="text2" name="content"></textarea>
						</div>
					</div>
					
					
					<div class="bbD">
						<p class="bbDP">
							<input type="submit" class="btn_ok btn_yes" id="btn" value="提交">
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>
			</form>
			<!-- 上传广告页面样式 -->
			

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>

<!-- <script type="text/javascript">
	$('#btn').click(function(){
		// var form = $('#form').serialize();//不能处理文件上传
		var form = new FormData($('#form')[0]);	
		// alert(form);
		$.ajax({
			url:"{{route('brandadd_do')}}",
			data:form,
			type:"post",
			dataType:"json",
			processData: false, //需设置为false。因为data值是FormData对象，不需要对数据做处理
        	contentType: false, //需设置为false。因为是FormData对象，且已经声明了属性enctype="multipart/form-data"
			success:function(res){
				alert(res.msg);
				location.href="{{route('brand')}}";
			}
		})
	})
</script> -->