<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('order');
        //判断是否有搜索条件
        if($request->has('id')){
            // 获取搜索的条件
            $id = $request->input('id');
            $where['id'] = $id;
            $ob->where('id','like',"%{$id}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.Order.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Order.add');
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
        $id = DB::table('order')->insertGetId($data);
        if($id>0){
            return redirect('admin/order')->with('msg','添加成功');
        }
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
        $data = DB::table('order')->where('id',$id)->first();
        return view('Admin.Order.edit',['ob'=>$data]);
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
        $data['state'] = 2;
        $row = DB::table('order')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/order')->with('msg','发货成功');
        }else{
            return redirect('admin/order')->with('error','发货失败');
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
        $row = DB::table('order')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/order')->with('msg','删除成功');
        }else{
            return redirect('admin/order')->with('error','删除失败');
        }
    }
}
