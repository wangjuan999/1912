<table border=1>
<a href="{{url('news/add')}}">添加</a>
@foreach($data as $k=>$v)
    <tr>
        <td><a href="{{url('news/address/'.$v['id'])}}">{{$v['title']}}</a></td>
        <td><a href="javascript:void(0)" class="dian" nid={{$v['id']}}>{{$v['flag']}}</a></td>
        <td class="num{{$v['id']}}">{{$v['number']}}</td>
    </tr>
    @endforeach
</table>

<script src="/js/jq.js"></script>
<script>
    $('.dian').click(function(){
        // alert(345);
        var obj = $(this);
        var id = $(this).attr('nid');
        var flag = $(this).html();
        // alert(flag);
        // alert(id);
        $.ajax({
            url:'/news/dian',
            data:{'id':id,'flag':flag},
            success:function(msg){

                $('.num' + id).html(msg)
                
                if(flag=='点赞'){
                    obj.html('取消点赞');
                }else{
                    obj.html('点赞');
                }
            }
        })
    })
</script>