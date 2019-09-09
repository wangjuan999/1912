<form action="{{url('lesson/update/'.$res->id)}}" method="post">
	@csrf
	<p>姓名：
		<input type="text" name="name" value="{{$res->name}}">
	</p>
	<p>性别：
		<input type="radio" name="sex" value="0" @if($res->sex==0) checked="checked" @endif>男
		<input type="radio" name="sex" value="1" @if($res->sex==1) checked="checked" @endif>女
	</p>
	<p>
		<input type="submit" value="修改">
	</p>
</form>