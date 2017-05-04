<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use App\Http\Controllers\Upload\UploadController;

class PicController extends Controller
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
        $ob = DB::table('pic');
        if($request->has('picname')){
            // 获取搜索的条件
            $picname = $request->input('picname');
            $where['picname'] = $picname;
            $ob->where('picname','like',"%{$picname}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.Pic.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Pic.add');
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
        $pic = new UploadController();
        $pn = $pic->doupload($request);
        $data['picname'] = $pn;
        $id = DB::table('pic')->insertGetId($data);
        if($id>0){
            return redirect('admin/pic')->with('msg','添加成功');
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
        $data = DB::table('pic')->where('id',$id)->first();
        // dd($data);
        return view('Admin.Pic.edit',['ob'=>$data]);
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
        $oldpic= $request->input('oldpic');
         // dd($oldpic);
        $data = $request->except('_token','_method','oldpic');
        // dd($data);
        if(isset($data['picname'])){ 
                $logo = new UploadController();
                $pic = $logo->doupload($request);             
                $data['picname'] = $pic;
            }else{
                $data['picname'] = $oldpic;
            } 
        $row = DB::table('pic')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/pic')->with('msg','修改成功');
        }else{
            return redirect('admin/pic')->with('error','修改失败');
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
        $row = DB::table('pic')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/pic')->with('msg','删除成功');
        }else{
            return redirect('admin/pic')->with('error','删除失败');
        }
    }
}
