<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LianController extends Controller
{
    public function index()
    {

    	$data=DB::table('lian')->where('status','=',1)->get();
    	// dd($data);
    	return view('lian/index',['data'=>$data]);
    }

    public function add()	
    {
    	return view('lian/add');
    }

    public function add_do(Request $request)
    {
    	$post=$request->except(['_token']);
    	// dd($post);
    	$post['status']=1;
    	$res=DB::table('lian')->insert($post);
    	// dd($res);
    	if($res){
    		return redirect('lian/index');
    	}
    	
    }

    public function delete($id)
    {
    	// $data=DB::table('lian')->first($id);
    	$res=DB::table('lian')->where('id','=',$id)->update(['status'=>0]);
    	// dd($res);
    	if($res){
    		return redirect('lian/index');
    	}
    }

    public function edit($id)
    {	
    	$res=DB::table('lian')->where(['id'=>$id])->first();
    	// dd($res);
    	return view('lian/edit',['res'=>$res]);
    }

    public function update($id)
    {
    	// dd($id);
    	 $post=request()->except(['_token']);
    	 $res=DB::table('lian')->where('id',$id)->update($post);
    	 if($res){
    	 	return redirect('lian/index');
    	 }
    }


}
