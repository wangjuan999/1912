<form action="">
<a href="{{url('cargo/add')}}">添加货物</a>
    <table border=1>
        <tr>
            <td>ID</td>
            <td><a href="{{url('xiang')}}">货物名称</a></td>
            <td>货物图</td>
            <td>数量</td>
            <td>入库时间</td>
            <td>操作</td>
        </tr>
@foreach($res as $v)
        <tr>
            <td>{{$v->cargo_id}}</td>
            <td>{{$v->cargo_name}}</td>
            <td><img src="{{env('INC')}}{{$v->cargo_img}}" height="50"></td>
            <td>{{$v->cargo_num}}</td>
            <td>{{date('Y-m-d',$v->time)}}</td>
            <td><a href="{{url('cargo/edit/'.$v->cargo_id)}}">出库</a></td>
        </tr>
@endforeach
    </table>
</form>