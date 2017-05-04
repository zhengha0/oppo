<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class GoodsDetailsController extends Controller
{
    //
    public function index($id)
    {
    	//查询商品表数据
    	$list = DB::table('goods')->where('id',$id)->first();
        // dd($list);
        $ob = DB::table('link')->get(); 
        $conf = DB::table('config')->get();   
        return view('Home.Goodsdetails.index',['list'=>$list,'ob'=>$ob,'conf'=>$conf]);
    }
}
