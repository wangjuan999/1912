<form action="">
<table border=1>
    <tr>
            <td>ID</td>
           <td>货物名称</td>
            <td>货物图</td>
            <td>数量</td>
            <td>入库时间</td>
    </tr>
    <tr>
        <td>{{$res->cargo_id}}</td>
        <td>{{$res->cargo_name}}</td>
        <td><img src="{{env('INC')}}{{$res->cargo_img}}" height="50"></td>
        <td>{{$res->cargo_num}}</td>
        <td>{{date('Y-m-d',$res->time)}}</td>
    </tr>   
</table>
<p>
    
</p>

</form>