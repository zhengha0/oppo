<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FlinkController extends Controller
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
        $ob = DB::table('link');
        //判断是否有搜索条件
        
        if($request->has('name')){
            // 获取搜索的条件
            $name = $request->input('name');
            $where['name'] = $name;
            $ob->where('name','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.Flink.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Flink.add');
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
        $id = DB::table('link')->insertGetId($data);
        if($id>0){
            return redirect('admin/flink')->with('msg','添加成功');
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
        $data = DB::table('link')->where('id',$id)->first();
        return view('Admin.Flink.edit',['ob'=>$data]);
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
        $row = DB::table('link')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/flink')->with('msg','修改成功');
        }else{
            return redirect('admin/flink')->with('error','修改失败');
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
        $row = DB::table('link')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/flink')->with('msg','删除成功');
        }else{
            return redirect('admin/flink')->with('error','删除失败');
        }
    }
}
