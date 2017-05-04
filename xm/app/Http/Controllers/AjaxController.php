<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class AjaxController extends Controller
{
    // ajax
/*Route::get('/ajaxdemo','AjaxController@index');
Route::get('/ajaxdemo/get','AjaxController@doget');
Route::post('/ajaxdemo/post','AjaxController@dopost');
*/    
	public function index()
    {
    	return view('Admin.Address.add');
    }

    // public function doget(Request $request)
    // {
    // 	$list = DB::table('district')->where('upid',$request->input('upid'))->get();
    // 	echo json_encode($list);
    // }
    public function dopost(Request $request)
    {
    	$list = DB::table('district')->where('upid',$request->input('upid'))->get();
    	echo json_encode($list);
    }
}
