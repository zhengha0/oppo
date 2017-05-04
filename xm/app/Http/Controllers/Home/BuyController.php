<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $list[] = session('buy');
        // dd(session('buy'));
        $ob = DB::table('link')->get();  

        $conf = DB::table('config')->get();     
        return view('Home.buy.buy',['list'=>$list,'ob'=>$ob,'conf'=>$conf]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function del($k)
    {
      $ob = DB::table('link')->get();  
      $conf = DB::table('config')->get();  
      // dd(session('buy'));
     
      // dd(session("buy")[$k]);
      // session()->forget(session("buy")[$k]);
      // session()->flush('session("buy")[$k]');
      // session()->pull($k,'session("buy")[$k]');
       // dd(session("buy")[$k]);
      // dd($k);
      

      
      // var_dump(session("buy"));die;
     // dd(session("buy"));
      $list = session('buy');
      // dd($list);
      session()->forget(session("buy")[$k]);
      unset($list[$k]);
      session(['buy'=>$list]);
      // dd(session(['buy'=>$list]));
      // dd($list);
      // dd(session("buy"));
      return redirect('/home/buy');
      // return view('Home.buy.buy',['list'=>$list,'ob'=>$ob,'conf'=>$conf]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    **/
}
