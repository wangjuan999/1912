<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tools;
use DB;


class MenuController extends Controller
{

	public $tools;
	public function __construct(Tools $tools)
	{
		$this->tools = $tools;
	}


    public function create_menu()
    {
        $info = DB::connection('mysql_cart')->table('menu')->get();
        // dd($info);
        return view('menu/create_menu',['info'=>$info]);   
    }


    public function create_menu_do(Request $request)
    {
        $req = $request->except(['_token']);
        // dd($req);
        $res = DB::connection('mysql_cart')->table('menu')->insert($req); 
        // dd($res);
        if(!$res){
            dd('添加失败');
        }else{

            // return redirect('');
        }

        //根据数据表翻译成菜单结构
        $this->menu();
    }

    public function menu_list()
    {
        return view('menu/create_menu');
    }



	public function menu()
	{
        $data = [];
        $event_arr =[1=>'click',2=>'view'];
        $menu_info = DB::connection('mysql_cart')->table('menu')->get()->toArray();
        // dd($menu_info);
        $menu = [];
        foreach ($menu_info as $v) {
            $menu[] = (array)$v;

         foreach ($menu as $v) {
             if ($v['type'] == 1) {//click
                $arr = [
                    'type'=>'click',
                    'name'=>$v['name1'],
                    'key'=>$v['event_value']
                ];
             }elseif($v['type']==2){//view
                $arr = [
                    'type'=>'view',
                    'name'=>$v['name1'],
                    'url'=>$v['event_value']
                ];
             }
            $data['button'][] = $arr;

           }
        } 
// dd($data);
		$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->tools->get_wechat_access_token();
		// // dd($url);
		// 	$data = [
  //           "button"=>[
  //               [
  //                   "type"=>"click",
  //                   "name"=>"今日歌曲",
  //                   "key"=>"V1001_TODAY_MUSIC"
  //               ],
  //               [
  //                   "name"=>"菜单",
  //                   "sub_button"=>[
  //                       [
  //                           "type"=>"view",
  //                           "name"=>"搜索",
  //                           "url"=>"http://www.soso.com/"
  //                       ],
  //                       [
  //                           "type"=>"miniprogram",
  //                           "name"=>"wxa",
  //                           "url"=>"http://mp.weixin.qq.com",
  //                           "appid"=>"wx286b93c14bbf93aa",
  //                           "pagepath"=>"pages/lunar/index"
  //                       ],
  //                       [
  //                           "type"=>"click",
  //                           "name"=>"赞一下我们",
  //                           "key"=>"V1001_GOOD"
  //                       ]
  //                   ]
  //               ]
  //           ]
  //       ];
		 //dd($data);

		$re = $this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
		 // dd($re);
		$result = json_decode($re,1);
		dd($result);


	}
}

