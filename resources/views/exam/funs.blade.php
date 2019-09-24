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
            <td>openid</td>
            <td>标签下粉丝数</td>
        </tr>
        @foreach($data['openid'] as $k=>$v)
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['name']}}</td>
            <td>{{$v['count']}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>