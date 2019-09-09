<table>
    <p>标题：
    {{$data->title}}
    </p>
    <p>作者：{{$data->name}}</p>
    <p>内容：{{$data->content}}</p>
    <p><input type="button" class="yes" data-id="{{$data->id}}" value="点赞"></p>
</table>
<script src="/js/jq.js"></script>
<script>
    $('.yes').click(function(){
        // alert(34);
        var obj = $(this);
        // alert(obj);
        
    })
</script>