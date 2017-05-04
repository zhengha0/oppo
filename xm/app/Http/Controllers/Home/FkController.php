<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FkController extends Controller
{
    public function index($id)
    {
    	//查询友情链接
        $ob = DB::table('link')->get();
        //查询网站配置
        $conf = DB::table('config')->get();
        //查询订单表
        $data['state'] = 1;
        $ord = DB::table('order')->where('id',$id)->update($data);
       return view('Home.Fk.index',['ob'=>$ob,'conf'=>$conf,'id'=>$id]); 
    }

    
        
}
