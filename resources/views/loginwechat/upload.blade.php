<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('upload_do')}}" method="post" enctype="multipart/form-data">
@csrf
    <!-- <select name="type" id="">
        <option value="1">图片</option>
        <option value="2">音频</option>
        <option value="3">视频</option>
        <option value="4">缩略图</option>
    </select> -->
        <input type="file" name="file_name">
        <input type="submit" value="提交">
    </form>
</body>
</html>