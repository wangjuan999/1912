<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2 align="center">标签管理</h2>
    <table border=1 align="center">
    <h3 align="center"><a href="{{url('tag/tag_add')}}">添加标签</a></h3>
        <tr>
            <td>ID</td>
            <td>tag_name</td>
            <td>标签下粉丝数</td>
            <td>操作</td>
        </tr>
        @foreach($info as $k=>$v)
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['name']}}</td>
            <td>{{$v['count']}}</td>
            <td><a href="{{url('tag/tag_del/'.$v['id'])}}">删除</a>||
            <a href="{{url('tag/tag_update/'.$v['id'])}}">修改</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>