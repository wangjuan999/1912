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
        echo $_GET['echostr'];
    }
}