<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GameController extends Controller
{
    public function add()
    {
        return view('game/add');
    }

    public function add_do(Request $request)
    {
        $post=$request->except(['_token']);
        $post['time']=time();
        // dd($post);
        $res=DB::table('game')->insert($post);
        if($res){
            return redirect('game/index');
        }
    }

    public function index()
    {
        $data=DB::table('game')->get();
        // dd($data);
        $res=DB::table('game')->first('time');
        // dd($res->time);
        // dd(time());
        if($res->time >= time()){
            echo '1';
        }else{
            echo '2';
        }
        // dd(time());

        
        return view('game/index',['data'=>$data],['res'=>$res]);
    }

    //竞猜
    public function ask($id)
    {
        $res=DB::table('game')->where('id','=',$id)->first();
        // dd($res);
        return view('game/ask',['res'=>$res]);
    }

    //竞猜结果
    public function result($id)
    {
        $res=DB::table('game')->where('id','=',$id)->first();
        // dd($res);
        return view('game/result',['res'=>$res]);
    }
 
    
}
