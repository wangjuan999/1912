<!DOCTYPE html>
<html>
<head>
	<title>菜单列表</title>
</head>
<body>
	<center>

		<h2>创建菜单</h2>
		<form action="{{url('create_menu_do')}}" method="post">
			@csrf
			<p>一级菜单名称：
				<input type="text" name="name1">
			</p>
			<p>二级菜单名称：
				<input type="text" name="name2">
			</p>
			<p>菜单类型[click/view]：
				<select name="type">
					<option value="1">click</option>
					<option value="2">view</option>
				</select>
			</p>
			<p>事件值：
				<input type="text" name="event_value">
			</p>
			<p>
				<input type="submit" value="提交">
			</p>
		</form>

		<h2>菜单列表</h2>

		<table border=1>
			<tr>
				<td>name1</td>
				<td>name2</td>
			</tr>
			@foreach($info as $v)
			<tr>
				<td>{{$v->name1}}</td>
				<td>{{$v->name2}}</td>
			</tr>
			@endforeach
		</table>
	</center>
</body>
</html>