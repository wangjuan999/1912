<form action="{{url('student/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	<p>姓名：<input type="text" value="{{$data->name}}" name="name"></p>
	<p>年龄：<input type="number" value="{{$data->age}}" name="age"></p>
	<p>性别：<input type="radio" @if($data->sex==0) checked="checked" @endif name="sex" value="0">男 
			<input type="radio" name="sex" @if($data->sex==1) checked="checked" @endif value="1">女</p>
	<input type="hidden" name="oldimg" value="{{$data->headimg}}">
	<p>头像上传：
	<input type="file" name="headimg"><img src="{{env('INC')}}{{$data->headimg}}" height="60"></p>
	<p><button>修改</button></p>
</form>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif