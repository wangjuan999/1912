<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redis;

class LessonController extends Controller
{
	public function add()
	{
		return view('lesson/add');
	}


	public function add_do(Request $request)
	{
    	$post = $request->except(['_token']);
		// dd($post);
		$res = DB::table('lesson')->insert($post);
		// dd($res);
		return redirect('lesson/list');
	}

	public function list()
	{
		$data=DB::table('lesson')->get();
		// dd($data);
		return view('lesson/list',['data'=>$data]);
	}

	public function delete($id)
	{
		$res=DB::table('lesson')->delete($id);
        if($res){
            return redirect('lesson/list');
        }
	}


	public function edit($id)
	{
		$res=DB::table('lesson')->where(['id'=>$id])->first();
		// dd($res);
		return view('lesson/edit',['res'=>$res]);
	}


	public function update($id)
	{
		$post = request()->except(['_token']);
		// dd($post);
		$res=DB::table('lesson')->where('id',$id)->update($post);
		// dd($res);
		if($res){
			return redirect('lesson/list');
		}
	}

public function memcache()
{
	//redis
	Redis::set('name','xiaoming');
	echo Redis::get('name');
die;

	// memcahce练习n
	//实例化memcache
	$memcache=New \Memcache;
	//连接服务
	$memcache->connect('127.0.0.1','11211');	
	// dd($memcache);
	//使用
	$memcache->set('name','wj',0,10);
	// $memcache->set('names','wjs',0,30);
	$aa=$memcache->get('names'); 
	// echo $aa;

	//缓存中取值
	$data=$memcache->get('LessonController_memcache_lesson');
	if(empty($data)){
		$data=json_encode(DB::table('lesson')->get());
		// dd($data);
		//设置缓存
		$bb=$memcache->set('lessonController_memcache_lesson',$data,0,10);
		echo $bb;
	}

}
	


}