<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CargoController extends Controller
{
    public function index()
    {
        $res=DB::table('cargo')->get();
        // dd($res);

        return view('cargo/index',['res'=>$res]);
    }

    public function indexs()
    {
        // $where=[];
        $res=DB::table('cargo')->where(['c_person','=',2])->get();
        dd($res);
    }


    public function add()
    {
        return view('cargo/add');
    }

    public function add_do(Request $request)
    {
        $post=$request->except(['_token']);
        // dd($post);

        $post['time']=time();

        if(request()->hasFile('cargo_img')){
            $post['cargo_img']=$this->upload('cargo_img');
        }

        $res=DB::table('cargo')->insert($post);
        // dd($res);
        if($res){
            return redirect('cargo/index');
        }
    }


    public function upload($name)
    {
        if (request()->file($name)->isValid()) {
        $photo = request()->file($name);
        //$store_result = $photo->store('photo');
        $store_result = $photo->store('', 'public');
        return $store_result;
        }
            exit('未获取到上传文件或上传过程出错');
    }



    public function edit($cargo_id)
    {
        $res=DB::table('cargo')->where(['cargo_id'=>$cargo_id])->first();
        // dd($res);
        return view('cargo/edit',['res'=>$res]);
    }


    public function update($cargo_id,Request $request)
    {
        $post=$request->except(['_token']);
        $res=DB::table('cargo')->where(['cargo_id'=>$cargo_id])->decrement('cargo_num',$post['cargo_num']);
        // dd($res);
        if($res){
            return redirect('cargo/index');
        }
    }

    public function xiang($cargo_id)
    {
        $res=DB::table('cargo')->where(['cargo_id'=>$cargo_id])->first();
        // dd($res);
        return view('cargo/xiang',['res'=>$res]);
    }
}
