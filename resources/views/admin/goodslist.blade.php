<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理-有点</title>
<link rel="stylesheet" type="text/css" href="/css/page.css">
<link rel="stylesheet" type="text/css" href="/css/page.css">
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;管理员管理
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					<form id="form">
					
						<div class="cfD">
							<input class="userinput" type="text" name="url_name" placeholder="输入名称" />&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
							<button class="userbtn">搜索</button>
							
						</div>
					</form>
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="435px" class="tdColor">商品名称</td>
							<td width="400px" class="tdColor">图片logo</td>
							<td width="630px" class="tdColor">商品货号</td>
							<td width="630px" class="tdColor">商品分类</td>
							<td width="630px" class="tdColor">商品品牌</td>
							<td width="630px" class="tdColor">商品价格</td>
							<td width="630px" class="tdColor">商品原价格</td>
							<td width="630px" class="tdColor">商品库存</td>
							<td width="630px" class="tdColor">操作</td>
						</tr>
						@foreach ($goodsdata as $k=>$v)
						<tr height="40px">
							<td class="ids">{{$v->goods_id}}</td>
							<td>{{$v->goods_name}}</td>
							<td><img src="{{env('INC')}}{{$v->goods_img}}" height="60"></td>
							<td>{{$v->goods_sn}}</td>
							<td>{{$v->c_name}}</td>
							<td>{{$v->name}}</td>
							<td>{{$v->goods_price}}</td>
							<td>{{$v->goods_oldprice}}</td>
							<td>{{$v->goods_num}}</td>
							<td><a href=""><img class="operation"
									src="img/update.png"></a> <img class="operation delban"
								src="img/delete.png"></td>
						</tr>	
						@endforeach
					</table>
				</div>
				<!-- user 表格 显示 end-->
			</div>
			<!-- user页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->

	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">


// 广告弹出框 end
</script>
</html>