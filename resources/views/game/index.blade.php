<table>
    <h2>竞赛列表</h2>
@foreach($data as $v)
    <h4>
    {{$v->place}}  VS  {{$v->places}} @if($res->time >= time()==1) <a href="{{url('game/result/'.$v->id)}}">查看结果</a> @else <a href="{{url('game/ask/'.$v->id)}}">竞猜</a> @endif
    </h4>
@endforeach
</table>