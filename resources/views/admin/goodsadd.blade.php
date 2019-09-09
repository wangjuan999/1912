<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加商品-有点</title>
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
			<form id="form" action="{{route('goodsadd_do')}}" method="post" enctype="multipart/form-data">
				@csrf
				<!-- 会员注册页面样式 -->
				<div class="banneradd bor">
					<div class="baTopNo">
						<span>商品添加</span>
					</div>
					<div class="baBody">
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;商品名称：<input type="text" name="goods_name" class="input3" />
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品货号：<input name="goods_sn" type="password"
								class="input3" />*	如果您不输入商品货号，系统将自动生成一个唯一的货号。
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;商品分类：
							<select name="cate_id">
								<option>请选择</option>
								@foreach($cateData as $k=>$v)
								<option value="{{$v->cate_id}}">{{str_repeat("----",$v->level-1).$v->c_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品品牌：
							<select name="brand_id">
								<option>请选择</option>
								@foreach($brandData as $k=>$v)
								<option value="{{$v->brand_id}}">{{$v->name}}</option>
								@endforeach
							</select>	
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;本店售价：<input type="text" name="goods_price" class="input3" />
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;原售价：<input type="text" name="goods_oldprice" class="input3" />
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品库存：<input name="goods_num" type="text"
								class="input3" />
						</div>
						<div class="bbD">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品详情：
								<textarea class="input3" name="goods_detal"></textarea>
						</div>
						<div class="bbD">
							商品logo：<input type="file" name="goods_img" class="input3" />
						</div>
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