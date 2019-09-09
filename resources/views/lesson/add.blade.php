<form action="{{url('lesson/add_do')}}" method="post">
	@csrf
	<p>姓名：
		<input type="text" name="name">
	</p>
	<p>性别：
		<input type="radio" name="sex" checked value="0">男
		<input type="radio" name="sex" value="1">女
	</p>
	<p>
		<input type="submit" value="添加">
	</p>
</form>