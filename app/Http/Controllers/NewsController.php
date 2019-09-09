<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
class NewsController extends Controller
{
    public function index()
    {
        //查询
        $data=DB::table('news')->get();
        $data=json_decode(json_encode($data),true);
        // dd($data);

        $rela=DB::table('number')->where(['register_id'=>session('username')->id])->get();
        $rela=json_decode(json_encode($rela),true);
        // dd($rela);

        $dianzan=array_column($rela,'id');
        // dd($dianzan);
        foreach($data as $k=>$v){
            $val=Redis::get('key'.$v['id']);
            $data[$k]['number']=empty($val)?0:$val;

            $data[$k]['flag'] = in_array($v['id'],$dianzan) ? '取消点赞' : '点赞';
            
        }        
        
        return view('news/index',['data'=>$data]);
   
    }

    public function add()
    {
        return view('news/add');
    }

    public function add_do(Request $request)
    {
        $post=$request->except(['_token']);
        // dd($post);
        $post['time']=time();
        $post['number']=0;
        $res=DB::table('news')->insert($post);
        // dd($res);
        if($res){
            return redirect('news/index');
        }
    }

    public function address($id)
    {
        $data=DB::table('news')->where(['id'=>$id])->first();
        // dd($data);
        return view('news/address',['data'=>$data]);
    }
    public function dian()
    {
        $id=request()->get('id');
        $flag=request()->get('flag');
        if($flag=='点赞'){
            Redis::incr('key'.$id);
            //新增点赞关系
            DB::table('number')->insert(['register_id'=>session('username')->id,'id'=>$id]);   
        }else{
            Redis::decr('key'.$id);
            //删除点赞关系
            DB::table('number')->where(['register_id'=>session('username')->id,'id'=>$id])->delete(); 
        }
        echo Redis::get('key'.$id);
    }
}
