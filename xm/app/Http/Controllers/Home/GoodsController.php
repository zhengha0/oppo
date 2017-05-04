<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //实例化操作表
        $ob = DB::table('goods')->get();
        // dd($ob);
        $list = $ob;
        $ob = DB::table('link')->get();
        $conf = DB::table('config')->get(); 
        return view('Home.Goods.index',['list'=>$list,'ob'=>$ob,'conf'=>$conf]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        $id = DB::table('user')->insertGetId($data);
        if($id>0){
            return redirect('admin/user')->with('msg','添加成功');
        }
    }

    public function messages()
    {
        return [
            'name.required'=>'用户名必须填写',
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = DB::table('user')->where('id',$id)->first();
        return view('Admin.User.edit',['ob'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->except('_token','_method');
        $row = DB::table('user')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/user')->with('msg','修改成功');
        }else{
            return redirect('admin/user')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $row = DB::table('user')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/user')->with('msg','删除成功');
        }else{
            return redirect('admin/user')->with('error','删除失败');
        }
    }
}
