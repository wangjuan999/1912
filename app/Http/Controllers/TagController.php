<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Tools\Tools;

class TagController extends Controller
{
    public $tools;
    public function __construct(Tools $tools)
    {   
        $this->tools=$tools;
    }

    /**
     * 公众号管理列表
     */
    public function tag_list()
    {
        $url='https://api.weixin.qq.com/cgi-bin/tags/get?access_token='.$this->tools->get_wechat_access_token();
        $re=\file_get_contents($url);
        $result=json_decode($re,1);
        return view('tag/tag_list',['info'=>$result['tags']]);
    }

    public function tag_add()
    {
        return view('tag/tag_add');
    }

    public function tag_add_do(Request $request)
    {
//        echo 11;
        $data = $request->all();
//        dd($data);
        $data = [
            'tag'=>[
                'name' => $data['tag_name']
            ]
        ];
//        dd($data);
        $url = 'https://api.weixin.qq.com/cgi-bin/tags/create?access_token='.$this->tools->get_wechat_access_token();
        $re = $this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        // dd($re);
        $res = json_decode($re,1);
        return redirect('tag/tag_list');
    }



    //接口测试号
    public function send_template_message()
    {
        $openid = 'orn9Jwzndd-g-ov9bO-ipksH_qKs';
        $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$this->tools->get_wechat_access_token();
        $data = [
            'touser'=>$openid,
            'template_id'=>'OB4kbGVZv9FGRq9WXpW2lEBTQGQEjjzau0XHp8OmU0Y',
            'url'=>'http://www.laravel.com/send_template_message',
            'data'=>[
                'first'=>[
                      'value'=>'',
                      'color'=>''
                ],
                'keyword1'=>[
                      'value'=>'远远同学',
                      'color'=>'pink',
                ],
                'keyword2'=>[
                    'value'=>'娟娟',
                    'color'=>'pink',
                ]
            ]
        ];
        $re = $this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        $result = json_decode($re,1);
        dd($result);
      }

}

    