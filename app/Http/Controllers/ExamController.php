<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tools\Tools;


class ExamController extends Controller
{
	public $tools;
	public function __construct(Tools $tools)
	{
		$this->tools=$tools;
	}
	public function login()
	{
		return view('exam/login');
	}

	/**
     * 微信登陆
     */
    public function wechat_login()
    {
        $redirect_uri = 'http://www.laravel.com/code';
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.env('WECHAT_APPID').'&redirect_uri='.urlencode($redirect_uri).'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
        
        header('Location:'.$url);
        return view('exam.login',['url'=>$url]);
    }


    /**
     * 接收code 第二部
     */
    public function code(Request $request)
    {
        $req = $request->all();
        // dd($req);
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxb420b634b262c408&secret=101c16a28aed9bd6e85a2baf33cceb1a&code='.$req['code'].'&grant_type=authorization_code';
        $result = file_get_contents($url);
        // dd($result);
        $re = json_decode($result,1);
        // dd($re);
        $user_info = file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$re['access_token'].'&openid='.$re['openid'].'&lang=zh_CN');
                
        $wechat_user_info = json_decode($user_info,1);
        $openid = $re['openid'];
        // dd($openid);
        $wechat_info=DB::table('WeChat_users')->where(['openid'=>$openid])->first();
        // dd($wechat_info);
        if(!empty($wechat_info)){
            //存在 登录
            $request->session()->put('wechat_id',$wechat_info->wechat_id);
            echo 'ok';
            return redirect('exam/index');
        }else{
            //不存在 注册
            //打开事物
            DB::connection('mysql_cart')->beginTransaction();//打开事物
            $wechat_id=DB::table('WeChat_user')->insertGetId([
                'name'=>$wechat_user_info['nickname'],  
                'password'=>'',
                'reg_time'=>time()
            ]); 
            $insert_result=DB::table('WeChat_users')->insert([
                'wechat_id' =>$wechat_id,
                'openid'=>$openid
            ]);
            //登录
            $request->session()->put('wechat_id',$wechat_info->wechat_id);
            echo 'ok';
            return redirect('exam/index');
        }
        
    }

    public function index()
    {
    	$url = 'https://api.weixin.qq.com/cgi-bin/tags/get?access_token='.$this->tools->get_wechat_access_token();
    	// dd($url);
    	$re = \file_get_contents($url);
    	// dd($re);
    	$result = json_decode($re,1);
    	// dd($result);
    	return view('exam/index',['result'=>$result['tags']]);
    }

    public function funs(Request $request)
    {
    	$req = $request->all();
    	// dd($req);
    	$url = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->tools->get_wechat_access_token().'&next_openid=';
    	// dd($url);
    	$data = file_get_contents($url);
    	// dd($data);
    	$data = json_decode($data,true);
    	dd($data);
    	return view('exam/funs',['data'=>$data['data']]);



    }

}