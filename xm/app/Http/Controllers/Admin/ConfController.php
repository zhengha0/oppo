<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ConfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('config');
        //判断是否有搜索条件
        if($request->has('shopname')){
            //获取搜索的条件
            $name = $request->input('shopname');
            //添加到将要携带到分页中的数组中
            $where['shopname'] = $shopname;
            //给查询添加where条件
            $ob->where('shopname','like',"%{$shopname}%");
        }
        //执行分页查询
        $list = $ob->paginate(1);
        return view('Admin.Conf.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Conf.add');
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
         $message = [
            'shopname.required' => '类别名必须填写',
        ];
        $this->validate($request, [
            'shopname' => 'required|max:10',
        ],$message);
        $data = $request->except('_token');
        $id = DB::table('config')->insertGetId($data);
        if($id>0){
            return redirect('admin/conf')->with('msg','添加成功');
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
        $data = DB::table('config')->where('id',$id)->first();
        return view('Admin.Conf.edit',['ob'=>$data]);
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
        $data = $request->only('shopname','title','keys','content','state');
        $row = DB::table('config')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/conf')->with('msg','修改成功');
        }else{
            return redirect('admin/conf')->with('error','修改失败');
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
        $row = DB::table('config')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/conf')->with('msg','删除成功');
        }else{
            return redirect('admin/conf')->with('error','删除失败');
        }
    }
}
