<link rel="stylesheet" type="text/css" href="/css/page.css">
<form action="" method="">
	<input type="text" name="name" value="{{$name}}" placeholder="请输入姓名">
	<input type="text" name="age" value="{{$age}}" placeholder="请输入年龄">
	<button>搜索</button>
</form>
@foreach($data as $v)
<p>ID：{{$v->id}} &nbsp&nbsp&nbsp
	姓名：{{$v->name}}  &nbsp&nbsp
	年龄：{{$v->age}}   &nbsp&nbsp
	性别：@if ($v->sex==0)男 @else 女 @endif  &nbsp&nbsp
	头像：<img src="{{env('INC')}}{{$v->headimg}}" height="80">&nbsp&nbsp
	<a href="{{url('student/edit/'.$v->id)}}">编辑</a>||<a href="{{url('student/delete/'.$v->id)}}">删除</a></p>

@endforeach
{{ $data->appends($query)->links() }}