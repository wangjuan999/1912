<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CargologinController extends Controller
{
    public function register()
    {
        return view('cargo/register');
    }

    public function register_do(Request $request)
    {
        $post = $request->except('_token');
        // dd($post);
        $res=DB::table('cargologin')->insert($post);
        // dd($res);
        if($res){
            return redirect('cargo/login');
        }
    }



    public function login()
    {
        return view('cargo/login');
    }


    public function login_do(Request $request)
    {
        $post = $request->except('_token');
        // dd($post);
        $res=DB::table('cargologin')->where('c_name', '=', $post['c_name'])->first();
        // dd($res);4
        // if($res->c_person==1){
        //     return redirect('cargo/index');
        // }else{
        //     return redirect('cargo/indexs');
        // }
        if(!$res){
            return redirect('cargo/login');
        }else{
            if($post['c_pwd']==$res->c_pwd){
                request()->session()->put('username',$res);
                return redirect('cargo/index');
            }else{
                return redirect('cargo/login');     
            }
        }
    }
}
