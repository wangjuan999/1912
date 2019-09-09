<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index()
    {
        $goodsdata=DB::table('goods')->get();
		$catedata=DB::table('cate')->get();
        // dd($catedata);
		
    	return view('index/index',['goodsdata'=>$goodsdata],['catedata'=>$catedata]);
    }
    //  
    

    //商品也
    public function goods()
    {
    	$goodsdatas=DB::table('goods')->get();
    	return view('index/goods',['goodsdatas'=>$goodsdatas]);
    }


    //详情页
    public function detail($id)
    {
        $goodsdatas=DB::table('goods')->where('goods_id',$id)->get();
        // dd($goodsdatas);
    	return view('index/detail',['goodsdatas'=>$goodsdatas]);
    }


    public function detail_do(Request $request,$goods_id = 0)
    {
        // dd($goods_id);
        $register_id=1;
        // dd($register_id);``1`
        if($goods_id!=0){
            $goods=DB::table('goods')->where(['goods_id'=>$goods_id])->first();
            // dd($goods);
            DB::table('car')->insert([
                'register_id'=>$register_id,
                'goods_id'=>$goods_id,
                'buy_number'=>1,
                'goods_price'=>$goods->goods_price,
                'add_time'=>time(),
            ]); 
        }
        
        
        // dd($res);
        return redirect('index/car');
    }
    


    //my、
    public function my()
    {
        return view('index/my');
    }
}
