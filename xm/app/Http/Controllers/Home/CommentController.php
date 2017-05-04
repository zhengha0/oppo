<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CommentController extends Controller
{
    //
     public function index($id)
    {
    	
    	$list = DB::table('goods')->where('id',$id)->first();
        // dd($id);
        $ob = DB::table('link')->get(); 
        $conf = DB::table('config')->get();
        $comment = DB::table('comment')->where('pid',$id)->get();
         // $list = $ob->paginate(3);
        // dd($comment);
        return view('Home.Comment.index',['list'=>$list,'ob'=>$ob,'conf'=>$conf,'comment'=>$comment]);
    }

    public function tianjia(Request $request)
    {
    	// dd($request);
    	 $this->validate($request, [
            'uname' => 'required|max:15',
            ],$this->messages());
        $data = $request->except('_token');
        // dd($data);
        $id = DB::table('comment')->insertGetId($data);
        if($id>0){
            $goods = ($data['pid']);
            return redirect("home/comment/$goods")->with('msg','添加成功');
        }
    }
    public function messages()
    {
        return [
            'consignee.required' => '用户名必须填写',
            'phone.regex' => '手机号输入错误',
        ];
    }
}
