<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class GouController extends Controller
{
    public function index($id)
    {
        
        //查询友情链接
        $ob = DB::table('link')->get();
        //查询网站配置
        $conf = DB::table('config')->get();
        //查询地址
        $aid = session('adminuser')->id;
        $add = DB::table('address')->where('uid',$aid)->get();

        $ord = DB::table('order')->where('id',$id)->get();
        $oid = $ord;
        $pid = $ord[0]->pid;
        // dd($pid);
        //查询商品详情
        $goods = DB::table('goods')->where('id',$pid)->get();


        
        return view('Home.Gou.index',['ob'=>$ob,'conf'=>$conf,'add'=>$add,'goods'=>$goods,'oid'=>$oid]);
    }

    public function tian(Request $request)
    {
        // dd($request);
       
        $data = $request->except('_token');
        // dd($data);
 

        $dd = DB::table('order')->insertGetId($data);
        // $goods = ($data['pid']);
        // $ord = ($dd['id']);
        // dd($goods);
        // dd($dd);

        return redirect("home/gou/$dd");
    
    }
}
