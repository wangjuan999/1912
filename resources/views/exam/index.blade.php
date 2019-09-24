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
        <tr>
            <td>ID</td>
            <td>tag_name</td>
            <td>标签下粉丝数</td>
            <td>操作</td>
        </tr>
        @foreach($result as $k=>$v)
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['name']}}</td>
            <td>{{$v['count']}}</td>
            <td><a href="{{url('exam/funs')}}?tagid={{$v['id']}}">查看粉丝列表</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>