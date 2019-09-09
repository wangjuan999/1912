<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class LoginController extends Controller
{
   	public function logins()
   	{
   		return view('login.logins');
   	}

   	public function logins_do(Request $request)
   	{
   		$post = request()->except('_token');
   		// dd($post);
   		$res = DB::table('register')->where('register_email','=',$post['register_email'])->first();
   		// dd($res);
   		if(!$res){
   			return redirect('login/logins');
   		}else{
   			if($post['register_pwd']==$res->register_pwd){
   				request()->session()->put('register_email',$res);
   				return redirect('/');
   			}else{
   				return redirect('login/logins');
   			}
   		}
   	}

   	public function register()
   	{
   		return view('login.register');
   	}

   	public function register_do(Request $request)
   	{
   		$post = request()->except('_token');
   		//验证
   		$validator=validator::make($request->all(),[
   			'register_email'=>'required',
   			'register_pwd'=>'required',
   			'pwd_confirmation'=>'required|same:register_pwd',//不为空，两次密码是否 相同
   		],[
   			'register_email.required'=>'手机或邮箱不能为空',
   			'register_pwd.required'=>'密码不能为空',
   			'pwd_confirmation.required'=>'确认密码不能为空',
   			'pwd_confirmation.same'=>'密码不一致',
   		]);
   		if($validator->fails()){
   			return redirect('login/register')
   				->withErrors($validator)
   				->withInput();
   		}
   		unset($post['pwd_confirmation']);

   		$res=DB::table('register')->insert($post);
   		return redirect('login/logins');
   	}




}
