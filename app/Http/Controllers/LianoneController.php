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


	//删除
	public function one_del(Request $request)
	{
		$req = $request->all();
		dd($req);
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


	public function one_biao_do(Request $request)
	{
		//去掉左边的特殊符号‘，’
		$arr = ltrim(request()->post('openid'),',');
		//通过逗号将字符串拆分成数组
		$openid = explode(',',$arr);
		$biao_id = request()->post('biao_id');
		$url = 'https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token='.$this->tools->get_wechat_access_token();
		// dd($url);
		$data = [
			'openid_list'=>$openid,
			'tagid'=>$biao_id
		];
		// $postdata = json_encode($data);
		// dump($postdata);
		$res = $this->tools->curl_post($url,json_encode($data));
		$result = json_decode($res,1);
		// dd($result);
		if($result['errmsg'] == 'ok'){
			echo 1;
		}else{
			echo 2;
		}
		// return redirect('lianone/one_list');
		// echo 1;

	} 



	public function one_tui(Request $request)
	{
		return view('lianone/one_tui',['biao_id'=>$request->all()['biao_id']]);
	}


	public function one_tui_do(Request $request)
	{
		// $req = $request->except(['_token']);
		// 
		$req = $request->all();
		// dd($req);
		$url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token='.$this->tools->get_wechat_access_token();
		// dd($url);
		$data = [
			'filter'=>[
				'is_to_all'=>false,
				'biao_id'=>$req['biao_id']
			],
			'text'=>[
				'content'=>$req['message']
			],
			'msgtype'=>'text'
		];
		// dd($data);
		$res = $this->tools->curl_post($url,json_encode($data));
		dd($res);
		$result = json_decode($res,1);
		dd($result);

	}
}