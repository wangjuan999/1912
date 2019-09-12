<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('tag/tag_add_do')}}" method="post">
    @csrf
        <table>
            <p align="center">标题：
                <input type="text" name="tag_name" id="">
                <input type="submit" value="添加">
            </p>
        </table>
    </form>
</body>
</html>