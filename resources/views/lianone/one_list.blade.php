<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<table border=1>
			<h3>列表</h3>
			<a href="{{url('lianone/one_add')}}">添加标签</a>
			<tr>
				<td>ID</td>
				<td>tag_name</td>
				<td>粉丝数</td>
				<td>操作</td>
			</tr>
			@foreach($result['tags'] as $v)
			<tr>
				<td>{{$v['id']}}</td>
				<td>{{$v['name']}}</td>
				<td>{{$v['count']}}</td>
				<td><a href="{{url('lianone/one_del'}}?biao_id={{$v['id']}}">删除</a> ||
					<a href="">粉丝列表</a> ||
					<a href="{{url('lianone/one_biao')}}?biao_id={{$v['id']}}">粉丝打标签</a>||
					<a href="{{url('lianone/one_tui')}}?biao_id={{$v['id']}}">推送标签</a>
				</td>
			</tr>
			@endforeach
		</table>
	</center>
</body>
</html>