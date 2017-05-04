<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //实例化操作表
        $ob = DB::table('link')->get();
        // dd($list);
        return view('Home.base.parent',['ob'=>$ob]);
    }

   
}
