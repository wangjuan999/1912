<a href="{{url('lian/add')}}">学生添加</a>
<table border=1>
	<tr>
		<td>ID</td>
		<td>学生姓名</td>
		<td>学生年龄</td>
		<td>家庭住址</td>
		<td>编辑</td>
	</tr>
	@foreach($data as $k=>$v)
	<tr>
		<td>{{$v->id}}</td>
		<td>{{$v->name}}</td>
		<td>{{$v->age}}</td>
		<td>{{$v->sheng}}&nbsp&nbsp{{$v->shi}}&nbsp&nbsp{{$v->qu}}</td>
		<td><a href="{{url('lian/delete/'.$v->id)}}">删除</a>||<a href="{{url('lian/edit/'.$v->id)}}">修改</a></td>
	</tr>
	@endforeach
	
</table>
