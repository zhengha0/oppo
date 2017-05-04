<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    //
    public function index()
    {
    	$ob = DB::table('category');
    	return view('Home.Index.index',['list'=>$ob]);
    }
}
