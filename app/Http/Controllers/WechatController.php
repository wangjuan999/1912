<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Tools\Tools;

class WechatController extends Controller
{
    public function get_access_token()
    {
        // echo 111;die;
        return $this->tools->get_wechat_access_token();
    }
    

    public function get_user_list()
    {
        $result = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->get_wechat_access_token().'&next_openid=');
        $re = json_decode($result,1);
        $last_info = [];
        foreach($re['data']['openid'] as $k=>$v){
            $user_info = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->get_wechat_access_token().'&openid='.$v.'&lang=zh_CN');
            $user = json_decode($user_info,1);
            $last_info[$k]['nickname'] = $user['nickname'];
            $last_info[$k]['openid'] = $v;
        }
//        dd($last_info);
        //dd($re['data']['openid']);
        return view('aa.Wechat.get_user_list',['info'=>$last_info]);
    }
//    获取用户基本信息
    public function get_user_info(request $request)
    {
        //获取access_token
        $openid = request()->id;
//        dd($openid);
        $access_token=$this->get_wechat_access_token();
        $result = file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN");
        $re=json_decode($result);
//        dd($re);
        return view('aa.Wechat.get_user_info',['re'=>$re]);
    }




      //上传文件
      public function upload()
      {
          
          return view('loginwechat/upload');
      }


      public function upload_do(Request $request)
      {
            $name='file_name';
            if(!empty($request->hasFile($name)) && request()->file($name)->isValid()){
                // $size=$request->file($name)->getClientSize();//文件大小
                $ext = $request->file($name)->getClientOriginalExtension();//文件类型 jpg  png 等
                $file_name=time().rand(1000,9999).".".$ext;
                // dd($file_name);
                $path=request()->file($name)->storeAs('wechat\voice',$file_name);
                // dd($path);die;
                $path=realpath('./storage/'.$path);
                // dd($path);


            }
      }


      

}