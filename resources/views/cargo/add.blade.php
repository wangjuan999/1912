<form action="{{url('cargo/add_do')}}" method="post" enctype="multipart/form-data">
@csrf
    <p>货物名称：
        <input type="text" name="cargo_name">
    </p>
    <p>
        货物图片：
        <input type="file" name="cargo_img">
    </p>
    <p>
        货物数量：
        <input type="text" name="cargo_num">
    </p>
    <p>
        <input type="submit" value="入库">
    </p>
</form>