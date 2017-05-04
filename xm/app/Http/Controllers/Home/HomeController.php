<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    { 
		 //实例化操作表 获取轮播图
        $list = DB::table('pic')->get();
        //查询友情链接表
        $ob = DB::table('link')->get();
        //查询公告表
        $gg = DB::table('notice')->get();
        $conf = DB::table('config')->get();
        if( $conf[0]->state == 1){
        return view('Home.index',['list'=>$list,'ob'=>$ob,'conf'=>$conf,'gg'=>$gg]);
        }else{
        return view('Home.404.1');
        }

     }

}
