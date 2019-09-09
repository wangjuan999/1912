<form action="{{url('game/add_do')}}" method="post">
@csrf
    <h3>添加竞猜球队</h3>
    <p><input type="text" name="place">VS
        <input type="text" name="places">
    </p>
    <p>结束竞赛时间
        <input type="date" name="g_time" >
    </p>
    <p><input type="submit" value="添加"></p>
</form>