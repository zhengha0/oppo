<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Controllers\Upload\UploadController;

class GoodsController extends Controller
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
        // dd($request);
        $ob = DB::table('goods');
        //判断是否有搜索条件
        if($request->has('sname')){
            //获取搜索的条件
            $sname = $request->input('sname');
            //添加到将要携带到分页中的数组中
            $where['sname'] = $sname;

            //给查询添加where条件
            $ob->where('sname','like',"%{$sname}%");
        }
        //执行分页查询
        $list = $ob->join('category','category.id','=','goods.pid')->select('goods.*','category.fname')->paginate(5);
        return view('Admin.Goods.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $list = DB::table('category')->select('id','fname')->get();
        return view('Admin.Goods.add',['list'=>$list]);
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
            'sname.required' => '商品名必须填写',
        ];
        $this->validate($request, [
            'sname' => 'required|max:100',
        ],$message);      
        $data = $request->except('_token');
        $logo = new UploadController();
        $pic = $logo->doupload($request);
        $data['logo'] = $pic;
        $id = DB::table('goods')->insertGetId($data);      
        if($id>0){
            return redirect('admin/goods')->with('msg','添加成功');
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
        $list = DB::table('category')->select('id','fname')->get();
        $data = DB::table('goods')->where('id',$id)->first();
        return view('Admin.Goods.edit',['ob'=>$data,'list'=>$list]);
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
        // dd($request);
        $oldlogo = $request->input('oldlogo');
        // dd($oldlogo);
        $data = $request->only('sname','content','logo','money','mark','weight','state','time','num','pid');
        if(isset($data['logo'])){ 
                $logo = new UploadController();
                $pic = $logo->doupload($request);             
                $data['logo'] = $pic;
            }else{
                $data['logo'] = $oldlogo;
            } 
        $row = DB::table('goods')->where('id',$id)->update($data);        
        if($row>0){
            return redirect('admin/goods')->with('msg','修改成功');
        }else{
            return redirect('admin/goods')->with('error','没有修改');
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
        $list = DB::table('goods')->where('pid',$id)->get();
        if(count($list)>0){
            return redirect('admin/goods')->with('error','要删除此类必须先删除此类下的子类');
        }
        $row = DB::table('goods')->where('id',$id)->delete();
        if($row>0){
            return redirect('admin/goods')->with('msg','删除成功');
        }else{
            return redirect('admin/goods')->with('error','删除失败');
        }
    }

}
