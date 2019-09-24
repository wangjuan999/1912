<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tools\Tools;

class LianoneController extends Controller
{

	public $tools;
    public function __construct(Tools $tools)
    {   
        $this->tools=$tools;
    }

	///第三方登录
	// public function login()
	// {
	// 	return view('exam/login');
	// } 


	//添加
	public function one_add()
	{
		return view('lianone/one_add');
	}


	public function one_add_do(Request $request)
	{
		$post = $request->all();
		// dd($post);
		$data = [
			'tag'=>[
				'name'=>$post['tag_name']
			]
		];
		// dd($data);
		$url = 'https://api.weixin.qq.com/cgi-bin/tags/create?access_token='.$this->tools->get_wechat_access_token();
		// dd($url);
		$re = $this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
		// dd($re);
		$result = json_decode($re,1);
		// dd($result);
		return redirect('lianone/one_list');
	}


	//列表
	public function one_list()
	{
		// echo 1234;
		$url = 'https://api.weixin.qq.com/cgi-bin/tags/get?access_token='.$this->tools->get_wechat_access_token();
		// dd($url);
		$re = \file_get_contents($url);
		// dd($re);
		$result = json_decode($re,1);
		// dd($result); 
		return view('lianone/one_list',['result'=>$result]);
	}


	//给粉丝打标签
	public function one_biao()
	{
		// echo 234;
		$url = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->tools->get_wechat_access_token().'&next_openid=';
		// dd($url);
		$re = \file_get_contents($url);
		// dd($re);
		$result = json_decode($re,true);
		// dd($result);
		$arr = [];
		foreach ($result['data']['openid'] as $key => $value) {
			$url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->tools->get_wechat_access_token().'&openid='.$value;
			// dump($value);
			$re = \file_get_contents($url);
			// dd($re);
			$arr[] = json_decode($re,1);
			// dd($result);

		}
		// dd($arr);
		return view('lianone/one_biao',['arr'=>$arr]);
	}
}