<?php

Route::any('event','EventController@event');

//菜单
Route::any('create_menu','MenuController@create_menu');
Route::any('menu','MenuController@menu');
Route::any('create_menu_do','MenuController@create_menu_do');
//////////////////////////////////////////////////////////////////////////////////
Route::any('addWechatCate','WechatCateController@addWechatCate');   // 个性化生成微信菜单
Route::any('doaddcate','WechatCateController@doaddcate');   // 个性化生成微信菜单
Route::any('listWechatCate','WechatCateController@listWechatCate');   // 个性化生成微信菜单
Route::any('createwechatcate','WechatCateController@createwechatcate');   // 个性化生成微信菜单


//////////////////////////////////////////////////////////////////////////////////


//微信周考
// route::prefix('exam')->middleware('checklogin')->group(function(){
	
// });
route::get('exam/login','ExamController@login');
// // Route::get('exam/login','LoginWechatController@login');
Route::get('exam/wechat_login','ExamController@wechat_login');
Route::get('exam/code','ExamController@code');
Route::get('exam/index','ExamController@index');
Route::get('exam/funs','ExamController@funs');



///////////////////////////////////////////////////////////////////////////////////


///生成唯一二维码
route::any('agent/agent_list','AgentController@agent_list');
route::any('agent/create_qrcode','AgentController@create_qrcode');







//月考试货物
Route::prefix('cargo')->middleware('checklogin')->group(function(){
	Route::get('register','CargologinController@register');
	Route::post('register_do','CargologinController@register_do');
	


	Route::get('index','CargoController@index');
	Route::get('indexs','CargoController@indexs');
	Route::get('xiang/{cargo_id}','CargoController@xiang');
	Route::get('add','CargoController@add');
	Route::post('add_do','CargoController@add_do');
	Route::any('edit/{cargo_id}','CargoController@edit');
	Route::any('update/{cargo_id}','CargoController@update');
});

Route::get('cargo/login','CargologinController@login');
Route::post('cargo/login_do','CargologinController@login_do');




//周考练习
Route::get('lian/index','LianController@index');
Route::get('lian/add','LianController@add');
Route::post('lian/add_do','LianController@add_do');
Route::get('lian/delete/{id}','LianController@delete');
Route::get('lian/edit/{id}','LianController@edit');
Route::post('lian/update/{id}','LianController@update');

//lesson
Route::get('lesson/add','LessonController@add');
Route::post('lesson/add_do','LessonController@add_do');
Route::get('lesson/list','LessonController@list');
Route::any('lesson/delete/{id}','LessonController@delete');
Route::any('lesson/edit/{id}','LessonController@edit');
Route::any('lesson/update/{id}','LessonController@update');
Route::any('lesson/memcache','LessonController@memcache');

//student添加z
Route::prefix('student')->group(function(){
	Route::get('add','Usercontroller@add');
	Route::post('add_do','Usercontroller@add_do')->name('do');
	Route::get('lists',"Usercontroller@lists");
	Route::get('delete/{id}','Usercontroller@delete');
	Route::get('edit/{id}','Usercontroller@edit');
	Route::post('update/{id}','Usercontroller@update');
});



//邮件
// Route::prefix('')->group(function(){
Route::get('mail','MailController@index');
// });

 

//admin
Route::prefix('admin')->middleware('checklogin')->group(function(){
	Route::get('index','AdminController@index');
	Route::get('head','AdminController@head')->name('head');
	Route::get('foot','AdminController@foot')->name('foot');
	Route::get('left','AdminController@left')->name('left');

	//退出
	Route::any('login_del','AdminController@login_del')->name('login_del');


	

	// //管理员
	Route::get('user','AdminController@user')->name('user');
	Route::get('useradd','AdminController@useradd')->name('useradd');
	Route::post('save','AdminController@save')->name('save');


	// //品牌
	Route::get('brandadd','AdminController@brandadd')->name('brandadd');
	Route::post('brandadd_do','AdminController@brandadd_do')->name('brandadd_do');
	Route::get('brand','AdminController@brand')->name('brand');
	Route::get('brandlist','AdminController@brandlist')->name('brandlist');


	//分类
	Route::get('cateadd','AdminController@cateadd')->name('cateadd');
	Route::post('cateadd_do','AdminController@cateadd_do')->name('cateadd_do');
	Route::get('catelist','AdminController@catelist')->name('catelist');


	//友情链接
	Route::get('urladd','AdminController@urladd')->name('urladd');
	Route::post('urladd_do','AdminController@urladd_do')->name('urladd_do');
	Route::get('urllist','AdminController@urllist')->name('urllist');
	Route::get('deletes','AdminController@deletes');
	Route::get('edits/{id}','AdminController@edits');
	Route::any('update/{id}','AdminController@update');
                          


	//商品
	Route::get('goodsadd','Admincontroller@goodsadd')->name('goodsadd');
	Route::post('goodsadd_do','Admincontroller@goodsadd_do')->name('goodsadd_do');
	Route::get('goodslist','Admincontroller@goodslist')->name('goodslist');
});

// //login
	Route::get('admin/login','AdminController@login')->name('login');
	Route::post('admin/login_do','AdminController@login_do')->name('login_do');

//index
	Route::get('/','IndexController@index');
	//商品也
	// Route::prefix('index')->middleware('checklogin')->group(function(){
		Route::get('index/goods','IndexController@goods');
		//详情
		Route::get('index/detail/{id}','IndexController@detail');
		Route::get('index/detail_do/{goods_id}','IndexController@detail_do');
		//购物车
		Route::get('index/car','CarController@car');
		//订单
		Route::get('index/pay','CarController@pay');
		//我的
		Route::get('index/my','IndexController@my');
	// });
		

//index  Login
	Route::get('login/logins','LoginController@logins');
	Route::post('login/logins_do','LoginController@logins_do')->name('logins_do');
	Route::get('login/register','LoginController@register')->name('register');
	Route::post('login/register_do','LoginController@register_do')->name('register_do');




	route::get('get_access_token','WechatController@get_access_token');//获取access_token
	route::get('get_user_list','WechatController@get_user_list');//用户列表
	route::get('get_user_info/{id?}','WechatController@get_user_info');//用户基本信息


	Route::get('login','LoginWechatController@login');
	Route::get('wechat_login','LoginWechatController@wechat_login');
	Route::get('code','LoginWechatController@code');

	Route::get('upload','WechatController@upload');
	Route::post('upload_do','WechatController@upload_do');



//标签
route::get('tag/tag_list','TagController@tag_list');
route::get('tag/tag_add','TagController@tag_add');	
route::post('tag/tag_add_do','TagController@tag_add_do');
route::get('tag/tag_del/{id}','TagController@tag_del');
route::get('tag/tag_update/{id}','TagController@tag_update');
route::get('tag/tag_lists','TagController@tag_lists');


//模板接口测试号
route::get('send_template_message','TagController@send_template_message');



//考试练习1
route::get('lianone/one_list','LianoneController@one_list');
route::get('lianone/one_del','LianoneController@one_del');
Route::get('lianone/logins','LianoneController@logins');
Route::get('lianone/logins_do','LianoneController@logins_do');
route::get('lianone/one_add','LianoneController@one_add');
route::post('lianone/one_add_do','LianoneController@one_add_do');
route::get('lianone/one_biao','LianoneController@one_biao');
route::post('lianone/one_biao_do','LianoneController@one_biao_do');
route::get('lianone/one_tui','LianoneController@one_tui');
route::post('lianone/one_tui_do','LianoneController@one_tui_do');


//模拟考试菜单
route::get('menustest','EventController@menustest');
