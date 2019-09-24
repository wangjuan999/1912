<!DOCTYPE html>
<html>
<head>
	<title>打标签</title>
</head>
<body>
	<center>
		<table border=1>
			<h3>给粉丝打标签</h3>
			<tr>
				<td>选择</td>
				<td>昵称</td>
				<td>微信号</td>
			</tr>
			@foreach($arr as $v)
			<tr openid="{{$v['openid']}}">
				<td><input type="checkbox" class="yes" name=""></td>
				<td>{{$v['nickname']}}</td>
				<td>{{$v['openid']}}</td>
			</tr>
			@endforeach
			<input type="submit" class="sub" value="打标签">
		</table>

	</center>
</body>
</html>

<script src="{{asset('js/jq.js')}}"></script>
<script type="text/javascript">
		// alert();
		var id = 
		$('.sub').click(function(){
			var openid = '';
			var biao_id = '';
			biao_id = GetQueryString('biao_id');
			alert(biao_id);
					$(":checked").each(function(k,v){
							openid += ','+$(this).parents('tr').attr('openid');
					})
					// alert(openid);
					$.ajax({

					})


		})
		function GetQueryString(name)
			{
			     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
			     var r = window.location.search.substr(1).match(reg);
			     if(r!=null)return  unescape(r[2]); return null;
			}
</script>
