<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NoticeController extends Controller
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
        $ob = DB::table('notice');
        //判断是否有搜索条件
        if($request->has('title')){
            //获取搜索的条件
            $title = $request->input('title');
            //添加到将要携带到分页中的数据中
            $where['title'] = $title;
            //给查询添加where条件
            $ob->where('title','like',"%{$title}%");
        }

        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.Notice.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Notice.add');
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
        $id = DB::table('notice')->insertGetId($data);
        if($id>0){
            return redirect('admin/notice')->with('msg','添加成功');
        }
    }

    public function messages()
    {
        return [
            'title.required'=>'标题必须填写',
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
        $data = DB::table('notice')->where('id',$id)->first();
        return view('Admin.Notice.edit',['ob'=>$data]);
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
        $row = DB::table('notice')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/notice')->with('msg','修改成功');
        }else{
            return redirect('admin/notice')->with('error','修改失败');
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
        $row = DB::table('notice')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/notice')->with('msg','删除成功');
        }else{
            return redirect('admin/notice')->with('error','删除失败');
        }
    }
}
