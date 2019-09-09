<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
	public function index()
	{
		$email = '2096760460@qq.com';
		$this->send($email);
	}
    


    public function send($email){
        \Mail::send('mail' , ['name'=>'李四'] ,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册滕浩有限公司");
        //设置接收方
            $message->to($email);
        });
}

}
