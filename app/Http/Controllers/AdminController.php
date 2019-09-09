<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin/index');
    }

    public function head()
    {
    	return view('admin/inc/head');
    }

    public function foot()
    {
    	return view('admin/inc/foot');
    }

    public function left()
    {
    	return view('admin/inc/left');
    }


    //登录
    public function login()
    {
        return view('admin/login');
    }

    public function login_do(Request $request)
    {
        $data = $request->except('_token');
        // dd($post);
        $res = DB::table('user')->where('username','=',$data['username'])->first();
        // dd($res);
        if(!$res){
            return redirect('admin/login');
        }else{
            if($data['pwd']==$res->pwd){
                request()->session()->put('username',$res);
                return redirect('admin/index');
            }else{
                return redirect('admin/login');
            }
        }

        
    }


    //退出(消除session)
    public function login_del()
    {
        request()->session()->put('username',null);
        return redirect('admin/login');
    }


    //管理员
    public function user()
    {
        //分页
        $pageSize = config('app.pageSize');
        // dd($pageSize);
        
        $data=DB::table('user')->paginate($pageSize);
        // dd($data);
    	return view('admin/user',['data'=>$data]);
    }
    //管理员添加
    public function useradd(){
        return view('admin/useradd');
    }
    
    public function save(Request $request)
    {
    	$post = $request->except('_token');
        // dd($post);
        $post['u_time']=time();
        $res=DB::table('user')->insert($post);
        // dd($res);
        if($res){
            $return = ['ret'=>1,'msg'=>'添加成功'];
        }else{
            $return = ['ret'=>2,'msg'=>'添加失败'];
        }
        echo json_encode($return);die;
        
    }


    //品牌添加
    public function brandadd()
    {
        return view('admin/brandadd');
    }



    public function brandadd_do(Request $request)
    {
        $post = request()->except('_token');
        // dd($post);
        // 文件上传
        if (request()->hasFile('logo')) {
            $post['logo']=$this->upload('logo');
        }

        $res=DB::table('brand')->insertGetId($post);
        if($res){
            return redirect('admin/brandlist');
        }
    }


    //上传
    public function upload($name)
    {
        if (request()->file($name)->isValid()) {
            $photo = request()->file($name);
            // dd($photo);
            $store_result = $photo->store('','public');
            // dd();
            return $store_result;
        }
            exit('未获取到上传文件或上传过程出错');
        
    }


    //品牌
    public function brand()
    {
        return view('admin/brand');
    }

    public function brandlist()
    {
        $data = DB::table('brand')->get();
        // dd($data);
        return view('admin/brandlist',['data'=>$data]);
    }


    //分类
    public function cateadd()
    {
        $data=DB::table('cate')->get();
        $data=createTree($data);
        // dd($cateData);
        return view('admin/cateadd',['data'=>$data]);
    }


    public function cateadd_do(Request $request)
    {
        $post = request()->except('_token');
        //dd($post);
        $data=DB::table('cate')->insert($post);
        // dd($data);
        return redirect('admin/catelist');
        
    }

    public function catelist()
    {
        $data=DB::table('cate')->get();
        // dd($data);
        return view('admin/catelist',['data'=>$data]);
    }


    //友情链接
    public function urladd()
    {
        return view('admin/urladd');
    }


    public function checkName()
    {
        $where['url_name']=request()->name;
        $url_id=request()->url_id??'';
        if($url_id){
            $where['url_id']=$url_id;
        }
        $count=DB::table('url')->where($where)->count();
        echo $count;
    }


    public function urladd_do(Request $request)
    {
        $post = request()->except('_token');
        //验证
        $validator = Validator::make($request->all(), [
            'url_name' => 'required',
            'url_url' => 'required',
            'url_person' => 'required',
            'url_content' => 'required',
        ],[
            'url_name.required'=>'网站名称不能为空',
            'url_url.required'=>'网站网址不能为空',
            'url_person.required'=>'网站联系人不能为空',
            'url_content.required'=>'网站介绍不能为空',
        ]);
            if ($validator->fails()) {
                return redirect('admin/urladd')
                    ->withErrors($validator)
                    ->withInput();
        }
        // dd($post);
        if(request()->hasFile('url_picture')){
            $post['url_picture']=$this->uploads('url_picture');
        }
        $res = DB::table('url')->insertGetId($post);
        // dd($res);
        return redirect('admin/urllist');
        
        
        
    }

    //友情链接文件上传
    public function uploads($name)
    {
        if ( request()->file($name)->isValid()) {
            $photo = request()->file($name);
            // dd($photo);
            $store_result = $photo->store('','public');
            return $store_result;
        }
            exit('未获取到上传文件或上传过程出错');
    }


    public function urllist()
    {
        $where=[];
        //搜索
        $query=request()->input();
        // dd($query);
        $name=$query['url_name']??'';
        if($name){
            $where[]=['url_name','like','%'.$name.'%'];
        }
        //分页
        $pageSize=config('app.pageSize');
        // dd($pageSize);   
        $res = DB::table('url')->where($where)->paginate($pageSize);
        // dd($res);
        return view('admin/urllist',compact('res','query','name'));
    }


    public function deletes()
    {
        $get = request()->input('ids');
        $res=DB::table('url')->where('url_id','=',$get)->delete();
        // dd($res);
        if($res){
            return json_encode(['ret'=>1,'msg'=>'删除成功']);die;
        }else{
            return json_encode(['ret'=>0,'msg'=>'删除失败']);die;
        }
    }

    public function edits($id)
    {       
        $data = DB::table('url')->where(['url_id'=>$id])->first();
        // dd($data);
        return view('admin/edits',['data'=>$data]);
    }

    public function update($id)
    {
        $post = request()->except(['_token']);
        // dd($post);
        //文件上传
        if(request()->hasFile('url_picture')){
            $post['url_picture']=$this->upload('url_picture');
            $filename=storage_path('app/public/').'/'.$post['old_picture'];
            if(file_exists($filename)){
                unlink($filename);
            }
        }
        unset($post['old_picture']);
        $res=DB::table('url')->where('url_id',$id)->update($post);
        if($res){
            return redirect('admin/ urllist');
        }
    }



    //商品
    public function goodsadd()
    {
        //查询所有数据
        $brandData=DB::table('brand')->get();
        // dd($brandData);
        $cateData=DB::table('cate')->get();
        // dd($cateData);
        $cateData=createTree($cateData);
        // $brandData=createTree($brandData);
        // dd($cateData);
        return view('admin/goodsadd',['brandData'=>$brandData],['cateData'=>$cateData]);
    }


    public function goodsadd_do()
    {
        $post=request()->except(['_token']);
        // dd($post);
        //生成货号
        $post['goods_sn']=$this->createSn();
        if(request()->hasFile('goods_img')){
            $post['goods_img']=$this->uploaded('goods_img');
        }
        // dd($post);
        $res=DB::table('goods')->insert($post);
        // dd($res);
        return redirect('admin/goodslist');
        
    }


    public function uploaded($name)
    {
        if ( request()->file($name)->isValid()) {
            $photo = request()->file($name);
            // dd($photo);
            $store_result = $photo->store('','public');
            return $store_result;
        }
            exit('未获取到上传文件或上传过程出错');
    }

    public function goodslist()
    {
        $where=[];
        $goodsdata=DB::table('goods')->where($where)
            ->join('cate','goods.cate_id', '=', 'cate.cate_id')
            ->join('brand','goods.brand_id','=','brand.brand_id')
            ->get();
        // dd($goodsdata);
        return view('admin/goodslist',['goodsdata'=>$goodsdata]);
    }

    public function createSn()
    {
        return "666".date("YmdHis").rand(1000,9999);
    }


}