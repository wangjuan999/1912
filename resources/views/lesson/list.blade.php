<a href="{{url('lesson/add')}}">添加</a>
<table border=1>
	<tr>
		<td>ID</td>
		<td>姓名</td>
		<td>性别</td>
		<td>编辑</td>
	</tr>
	@foreach($data as $k=>$v)
	<tr>
		<td>{{$v->id}}</td>
		<td>{{$v->name}}</td>
		<td>@if($v->sex==0)男 @else 女 @endif</td>
		<td><a href="{{url('lesson/delete/'.$v->id)}}">删除</a>||
			<a href="{{url('lesson/edit/'.$v->id)}}">修改</a>
		</td>
	</tr>
	@endforeach
</table>
