<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{url('lianone/one_tui_do')}}" method="post">
		@csrf
		<input type="hidden" name="biao_id" value="{{$biao_id}}">
		<center>
			消息：
			<textarea name="message"></textarea></br>
			<input type="submit" value="提交">


		</center>
	</form>
</body>
</html>