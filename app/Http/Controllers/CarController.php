<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CarController extends Controller
{
    //购物车
    public function car()
    {
    	$register_id=1;
    	$res=DB::table('car')->join('goods','goods.goods_id','=','car.goods_id')->where(['register_id'=>$register_id])->get()->toArray();
    	// dd($res);
    	$count=DB::table('car')->count();
        // dd($count);
    	return view('index/car',['res'=>$res,'count'=>$count]);
    }	



    //订单
    public function pay()
    {
    	return view('index/pay');
    }
}
