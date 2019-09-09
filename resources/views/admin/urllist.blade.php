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
							<td width="435px" class="tdColor">网站名称</td>
							<td width="400px" class="tdColor">图片logo</td>
							<td width="630px" class="tdColor">链接类型</td>
							<td width="630px" class="tdColor">状态</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach($res as $v)
						<tr height="40px">
							<td class="ids">{{$v->url_id}}</td>
							<td>{{$v->url_name}}</td>
							<td><img src="{{env('INC')}}{{$v->url_picture}}" height="60"></td>
							<td>@if($v->url_type==0)LOGO链接 @else 文字链接 @endif</td>
							<td>@if($v->url_show==0)显示 @else 不显示 @endif</td>
							<td><a href="{{url('admin/edits/'.$v->url_id)}}"><img class="operation"
									src="img/update.png"></a> <img class="operation delban"
								src="img/delete.png"></td>
						</tr>	
						@endforeach
					</table>
					{{ $res->appends($query)->links() }}
				</div>
				<!-- user 表格 显示 end-->
			</div>
			<!-- user页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<input type="hidden" name="url_id" value="" id="ids">
				<a href="javascript:deletes()" class="ok yes" id="y">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
  var ids = $(this).parent().siblings('.ids').text();
  $('#ids').val(ids);
});

$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});


function deletes(){
	var ids = $('#ids').val();
	$.ajax({
		url:"{{url('admin/deletes')}}",
		data:{ids:ids},
		dataType:'json',
		success:function(res){
			if(res.ret==1){
				location.href="{{route ('urllist')}}";	
			}else{
				location.href="{{route ('urllist')}}";	
			}
			
		}

	})
}

// $('#y').click(function(){
// 	// alert(1313);
// 	//禁止跳转
// 	event.preventDefault();
// 	var _this=$(this);
// 	// alert(_this);
// 	var url = _this.attr('href');
// 	// alert(url);
// 	$.ajax({
// 		url:url,
// 		success:function(res){
// 			if(res==1){
// 				alert('删除成功');
// 			}else{
// 				alert('删除失败');
// 			}
// 		}
// 	})
// })





// 广告弹出框 end
</script>
</html>