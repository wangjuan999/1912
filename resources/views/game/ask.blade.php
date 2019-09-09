<form action="{{url('game/ask_do')}}">
    <table>
        <h3>我要竞猜</h3>
        <h4>
        {{$res->place}}  VS  {{$res->places}}
        </h4> 
        <input type="radio" value=1>胜
        <input type="radio" value=2>平
        <input type="radio" value=3>负
        <p>
            <input type="submit" value="确定">
        </p>
        

    </table>
</form>
