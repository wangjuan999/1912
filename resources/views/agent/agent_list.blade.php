<!DOCTYPE html>
<html>
<head>
	<title>二维码操作</title>
</head>
<body>
	<center>
		<table border=1>
			<tr>
				<td>ID</td>
				<td>昵称</td>
				<td>分享码</td>
				<td>操作</td>
			</tr>
			@foreach($info as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td><img src="{{env('INC')}}{{$v->qrcode_url}}" alt="" height="100" ></td>
				<td><a href="{{url('agent/create_qrcode')}}?id={{$v->id}}">生成唯一维码</a></td>
			</tr>
			@endforeach
		</table>
	</center>
</body>	
</html>