<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('/home/index');
});




// 文件上传
// Route::get('/upload','upload\UploadController@index');
// Route::post('/doupload','upload\UploadController@doupload');

// 后台路由群组
Route::group(['prefix' => 'admin','middleware' => 'login'],function(){
	//后台首页
	Route::resource('/demo3','Admin\IndexController');
	// 用户退出
	Route::get('/over','Admin\LoginController@over');
	//网站配置
	Route::resource('/conf','Admin\ConfController');
	//商品列表
	Route::resource('/goods','Admin\GoodsController');
	//商品分类
	Route::resource('/category','Admin\CategoryController');
	Route::get('/categorySon/{id}','Admin\CategoryController@createSon');
	Route::post('/categorySon','Admin\CategoryController@storeSon');
	// 地址管理
	Route::resource('/address','Admin\AddressController');
	// 用户评价管理
	Route::resource('/comment','Admin\CommentController');
	// 管理员用户管理
	Route::resource('/demo4','Admin\AdminController');
	// 地址添加管理
	Route::get('/ajaxdemo','AjaxController@index');
	// Route::get('/ajaxdemo/get','AjaxController@doget');
	Route::post('/ajaxdemo/post','AjaxController@dopost');
	// 用户管理
	Route::resource('/user','Admin\UserController');
	//友情链接
	Route::resource('/flink','Admin\FlinkController');
	//公告
	Route::resource('/notice','Admin\NoticeController');
	//订单管理
	Route::resource('/order','Admin\OrderController');
	//轮播图管理
	Route::resource('/pic','Admin\PicController');
});

// 登录
Route::get('admin/login','Admin\LoginController@index');
Route::post('admin/dologin','Admin\LoginController@dologin');


// 验证码
Route::get('Admin/captch/{tmp}','Admin\LoginController@captch');

//前台
//登录页
Route::get('home/dl','Home\DlController@index');
Route::post('home/dodl','Home\DlController@dodl');
//退出
Route::get('home/over','Home\DlController@over');
//注册页
Route::get('home/zhuce','Home\ZhuceController@index');
Route::post('home/zhuce','Home\ZhuceController@create');
// 验证码
Route::get('Home/captch/{tmp}','Home\DlController@captch');

//前台首页
Route::resource('home/index','Home\HomeController');
//商品列表
Route::resource('home/goods','Home\GoodsController');
// 商品详情
Route::get('home/goodsdet/{id}','Home\GoodsdetailsController@index');
// 商品评价
Route::get('home/comment/{id}','Home\CommentController@index');
// 添加评价
Route::post('home/comment/','Home\CommentController@tianjia');
Route::group(['prefix' => 'home','middleware' => 'dl'],function(){
	
	// 个人信息
	Route::resource('/myy','Home\MyController');
	// 地址管理
	Route::resource('/address','Home\AddressController');
	// 订单管理
	Route::get('/order/{id}','Home\OrderController@index');
	Route::post('/order/{id}','Home\OrderController@destroy');
	//订单详情
	Route::get('/orderxq','Home\OrderxqController@index');
	//立即购买
	Route::get('/gou/{id}','Home\GouController@index');
	Route::post('/gou','Home\GouController@tian');
	//立即购买支付
	Route::get('/zf','Home\ZfController@index');
	Route::post('/zf/{id}','Home\ZfController@tian');
	//加入购物车结算
	Route::post('/che','Home\CheController@tian');
	Route::get('/che/{id}','Home\CheController@index');
	//加入购物车结算支付
	Route::get('/zfc','Home\ZfcController@index');
	Route::post('/zfc/{id}','Home\ZfcController@tian');
	//付款
	Route::get('/fk/{id}','Home\FkController@index');
	//购物车
	Route::resource('buy','Home\BuyController');
	//删除购物车
	Route::get('del/{k}','Home\BuyController@del');
	//添加购物车
	Route::get('dobuy/{id}','Home\DoBuyController@index');
});




