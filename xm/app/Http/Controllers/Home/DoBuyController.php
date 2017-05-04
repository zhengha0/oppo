<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DoBuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd(session('buy'));
        //实例化操作表
        $list = DB::table('goods')->where('id',$id)->first();
        // dd($ob);
        $ob = DB::table('link')->get();
        
        $conf = DB::table('config')->get(); 
        // dd($conf);

        // session()->push('buy',$list);
        if(session()->has('buy')){
            $list1 = session('buy');
        }
        $list1[] = $list;
        // dd($list1);
        session(['buy'=>$list1]);

        // dd(session('buy'));

        return view('Home.Goodsdetails.index',['list'=>$list,'ob'=>$ob,'conf'=>$conf]);
        // return redirect('/home/buy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
