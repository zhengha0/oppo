<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class ZfController extends Controller
{
    public function index()
    {
        
        //查询友情链接
        $ob = DB::table('link')->get();
        //查询网站配置
        $conf = DB::table('config')->get();
        //查询订单表
       	 $ord = DB::table('order')->where()->get();
         
        return view('Home.zf.index',['ob'=>$ob,'conf'=>$conf,'ord'=>$ord]);
    }

    public function tian(Request $request, $id)
    {
    	// dd($request);
    	//查询友情链接
        $ob = DB::table('link')->get();
        //查询网站配置
    	$conf = DB::table('config')->get();

    	$data = $request->only('utname','uphone','uaddress','money','ptime');
         // dd($id);
    	//订单id
        
        DB::table('order')->where('id',$id)->update($data);
        $list = DB::table('order')->where('id',$id)->get();
        // dd($list);
        return view('Home.zf.index',['ob'=>$ob,'conf'=>$conf,'list'=>$list]);
    }
}
