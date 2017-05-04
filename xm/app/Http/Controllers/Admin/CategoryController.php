<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
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
        $ob = DB::table('category');
        //判断是否有搜索条件
        if($request->has('fname')){
            //获取搜索的条件
            $name = $request->input('fname');
            //添加到将要携带到分页中的数组中
            $where['fname'] = $name;
            //给查询添加where条件
            $ob->where('fname','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(10);
        return view('Admin.Category.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Category.add');
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
            'fname.required' => '商品名必须填写',
        ];
        $this->validate($request, [
            'fname' => 'required|max:10',
        ],$message);
        $data = $request->except('_token');
        $id = DB::table('category')->insertGetId($data);   

        if($id>0){
            return redirect('admin/category')->with('msg','添加成功');
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
        $data = DB::table('category')->where('id',$id)->first();
        return view('Admin.Category.edit',['ob'=>$data]);
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
        $data = $request->only('fname');
        $row = DB::table('category')->where('id',$id)->update($data);      
        if($row>0){
            return redirect('admin/category')->with('msg','修改成功');
        }else{
            return redirect('admin/category')->with('error','修改失败');
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
        $list = DB::table('category')->where('pid',$id)->get();
        if(count($list)>0){
            return redirect('admin/category')->with('error','要删除此类必须先删除此类下的子类');
        }
        $row = DB::table('category')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/category')->with('msg','删除成功');
        }else{
            return redirect('admin/category')->with('error','删除失败');
        }
    }

    public function createSon($id)
    {
        $list = DB::table('category')->where('id',$id)->first();
        return view('Admin.Category.addSon',['list'=>$list]);
    }

    public function storeSon(Request $request)
    {
        $data = $request->except('_token');
        $par = DB::table('category')->where('id',$request->input('pid'))->first();
        $data['path'] = $par->path.','.$data['pid'];
        $id = DB::table('category')->insertGetId($data);      
        if($id>0){
            return redirect('admin/category')->with('msg','添加子类成功');
        }
    }
}
