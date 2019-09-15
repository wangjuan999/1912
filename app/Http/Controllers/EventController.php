<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * 接收微信发送的消息，，，用户互动
     *
     * @return void
     */
    public function event()
    {
        $xml_string = file_get_contents('php://input');//获取
        $wechat_log_path = storage_path('logs/wechat/'.date('Y-m-d').'.log');
        file_put_contents($wechat_log_path,"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n\n",FILE_APPEND);
        file_put_contents($wechat_log_path,$xml_string,FILE_APPEND);
        // echo $_GET['echostr'];
    }
}