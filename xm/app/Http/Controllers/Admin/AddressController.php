<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddressController extends Controller
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
        $ob = DB::table('address');
        //判断是否有搜索条件
        // if($request->has('sex')){
        //     //获取搜索的条件
        //     $sex = $request->input('sex');
        //     //添加到将要携带到分页中的数组中
        //     $where['sex'] = $sex;
        //     //给查询添加where条件
        //     $ob->where('sex',$sex);
        // }
        if($request->has('consignee')){
            //获取搜索的条件
            $consignee = $request->input('consignee');
            //添加到将要携带到分页中的数组中
            $where['consignee'] = $consignee;
            //给查询添加where条件
            $ob->where('consignee','like',"%{$consignee}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.Address.index',['list'=>$list,'where'=>$where]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Address.add');
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
        $this->validate($request, [
            'consignee' => 'required|max:15',
            'phone'=>'regex:/^1[34578][0-9]{9}$/',
            ],$this->messages());
        $data = $request->except('_token');
        //添加数据
        $id = DB::table('address')->insertGetId($data);
        if($id>0){
            return redirect('admin/address')->with('msg','添加成功');
        }
    }

    public function messages()
    {
        return [
            'consignee.required' => '用户名必须填写',
            'phone.regex' => '手机号输入错误',
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
        //修改数据
        $data = DB::table('address')->where('id',$id)->first();
        return view('Admin.Address.edit',['ob'=>$data]);
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
        $data = $request->only('province','city','county','consignee','phone','default','detail');
         $row = DB::table('address')->where('id',$id)->update($data);
        if($row>0){
            return redirect('admin/address')->with('msg','修改成功');
        }else{
            return redirect('admin/address')->with('error','修改失败');
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
        $row = DB::table('address')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/address')->with('msg','删除成功');
        }else{
            return redirect('admin/address')->with('error','删除失败');
        }
    }
}
