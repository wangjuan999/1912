<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class Usercontroller extends Controller
{
    public function index($id)
    {
    	echo "小红来了".$id;
    }



    public function add()	
    {
        $user = ['uid'=>1,'name'=>'xiaoming'];
        //存session  
        // session(['user'=>$user]);
        request()->session()->put('user',$user);
        //取session
        // $user = session('user');
        $user = request()->session()->get('user');
        //删除session
        // session(['user'=>null]);
        // $user = session('user');
        // 
        // request()->session()->pull('user');
        // request()->session()->forget('user');
        request()->session()->flush();
        $user = request()->session()->get('user');
        // dd($user);
    	return view("add");
    }



    public function add_do(Request $request)
    {
    	//过滤隐藏域里的字段  过滤字段  过滤其字段接收其他值
    	$post = $request->except(['_token']);
    	// dd($post);
        //第一种验证 
        // $request->validate([
        //     'name' => 'required|unique:student|max:25',
        //     'age' => 'required',
        // ],[
        //     'name.required'=>'姓名不能为空',
        //     'age.required'=>'年龄不能为空',
        // ]);
        

        //第二种验证
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:posts|max:255',
            'age' => 'required',
        ],[
            'name.required'=>'姓名不能为空',
            'age.required'=>'年龄不能为空',
        ]);
            if ($validator->fails()) {
                return redirect('student/add')
                    ->withErrors($validator)
                    ->withInput();
        }


        //第三种验证
        // $post=request()->post();
        // $post=request()->input();
        // unset($post['_token']);
        // $post=request()->all();
        // //只接受name/age的值
        // $post = $request->only(['name,age']);

        //文件上传
        if(request()->hasFile('headimg')){
            $post['headimg']=$this->upload('headimg');
            // dd($headimg);
        }

    	//入库
    	$res = DB::table('student')->insertGetId($post);

    	if($res){
    		return redirect('student/lists');
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



    public function lists()
    {
        //搜索
        $query=request()->input();
        // dd($query);
        $name=$query['name']??'';
        $where=[];
        if($name){
            $where[]=['name','like',$name.'%'];
        }

        $age=$query['age']??'';
        if($age){
            $where[]=['age','=',$age];
        }
        //分页
        $pageSize=config('app.pageSize');
        // dd($pageSize);
    	$data = DB::table('student')->where($where)->paginate($pageSize);
    	return view('lists',compact('data','query','name','age'));
    }

    public function delete($id)
    {
        $res=DB::table('student')->delete($id);
        if($res){
            return redirect('student/lists');
        }
    }

    //修改
    public function edit($id)
    {
        $data = DB::table('student')->where(['id'=>$id])->first();
        // dd($data);
        return view('edit',['data'=>$data]);
    }

    public function update($id)
    {
        //过滤隐藏域里的字段  过滤字段  过滤其字段接收其他值
        $post = request()->except(['_token']);
        dd($post);
        //文件上传
        if(request()->hasFile('headimg')){
            $post['headimg']=$this->upload('headimg');

            $filename=storage_path('app/public').'/'.$post['oldimg'];
            if(file_exists($filename)){
                unlink($filename);
            }
        }
        unset($post['oldimg']);
        $res=DB::table('student')->where('id',$id)->update($post);
        // dd($res);
        if($res){
            return redirect('student/lists');
        }
    }

}
