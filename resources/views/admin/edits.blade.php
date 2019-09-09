<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
			<form id="form" action="{{url('admin/update/'.$data->url_id)}}" method="post" enctype="multipart/form-data">
				@csrf
				<!-- 会员注册页面样式 -->
				<div class="banneradd bor">
					<div class="baTopNo">
						<span>友情修改链接</span>
					</div>
					<div class="baBody">
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;网站名称：<input type="text" value="{{$data->url_name}}" name="url_name" class="input3" />@php echo($errors->first('url_name'));@endphp
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站网址：<input name="url_url" type="text"
								class="input3" value="{{$data->url_url}}" />@php echo($errors->first('url_url'));@endphp
						</div>
						<div class="bbD">
							链接类型：<input type="radio" name="url_type" class="input" @if($data->url_type==0) checked="checked" @endif  value="0">LOGO链接
									 <input type="radio" name="url_type" class="input" @if($data->url_type==1) checked="checked" @endif value="1" />文字链接
						</div>
						<input type="hidden" name="old_picture" value="{{$data->url_picture}}">
						<div class="bbD">
							图片链接：<input type="file" name="url_picture" class="input3" />
						</div>
						<div class="bbD">	
							网站联系人：<input type="text" name="url_person" class="input3" value="{{$data->url_person}}"/>@php echo($errors->first('url_person'));@endphp
						</div>
						<div class="bbD">
							网站介绍：<textarea name="url_content" class="input1">{{$data->url_content}}</textarea>@php echo($errors->first('url_content'));@endphp
						</div>
						<div class="bbD">
							是否显示：<input type="radio" name="url_show" class="input" value="0" @if($data->url_show==0) checked="checked" @endif />是
									 <input type="radio" name="url_show" class="input" value="1" @if($data->url_show==1) checked="checked" @endif />否
						</div>
						<p></p>
							
						
						<div class="bbD">
							<p class="bbDP">
								<button class="btn_ok btn_yes" id="userbtn" type="submit">修改</button>
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

</script>
