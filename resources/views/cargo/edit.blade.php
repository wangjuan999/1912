<form action="{{url('cargo/update/'.$res->cargo_id)}}" method="post">
@csrf
    <p>货物名称：
        <input type="text" name="cargo_name" value="{{$res->cargo_name}}">
    </p>
    
    <p>
        出库数量：
        <input type="text" name="cargo_num">
    </p>
    <p>
        <input type="submit" class="out" value="出库">
    </p>
</form>
<script src="/js/jq.js"></script>
<script>
    $('.out').click(function(){
        // alert(3456);
        var num=$('[name="cargo_num"]').val();
        // alert(num);
        var nums = {{$res->cargo_num}};
        if(num > nums){
            alert('库存没有那么多了');
            event.preventDefault();
        }

    })
</script>