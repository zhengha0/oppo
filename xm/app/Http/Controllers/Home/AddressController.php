<?php

namespace App\Http\Controllers\Home;

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
        $where = '';
        // dd($request);
        //实例化操作表
        $list = DB::table('address')
                ->join('user','user.id','=','address.uid')
                ->select('address.*','user.name')
                ->get();
        $ob = DB::table('link')->get(); 
        $conf = DB::table('config')->get();    
        return view('Home.Address.index',['list'=>$list,'ob'=>$ob,'conf'=>$conf]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Home.Address.add');
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
        // dd($request);
         $this->validate($request, [
            'consignee' => 'required|max:15',
            'phone'=>'regex:/^1[34578][0-9]{9}$/',
            ],$this->messages());
        $data = $request->except('_token');
        $id = DB::table('address')->insertGetId($data);
        if($id>0){
            return redirect('home/address')->with('msg','添加成功');
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
        //
        //查询友情链接
        $ob = DB::table('link')->get();
        //查询网站配置
        $conf = DB::table('config')->get();

        $data = DB::table('address')->where('id',$id)->first();
        // dd($data);
        return view('Home.Address.edit',['ob'=>$ob,'conf'=>$conf,'oob'=>$data]);
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
         $data = $request->only('consignee','phone','detail');
         // dd($id);
         $row = DB::table('address')->where('id',$id)->update($data);
        if($row>0){
            return redirect('home/address')->with('msg','修改成功');
        }else{
            return redirect('home/address')->with('error','修改失败');
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
        // dd($id);
        $row = DB::table('address')->where('id',$id)->delete();
        if($row>0){
            return redirect('home/address')->with('msg','删除成功');
        }else{
            return redirect('home/address')->with('error','删除失败');
        }
    }

    // public function sess($id)
    // {
    //     dd($id);
    //     $list = DB::table('address')
    //             ->join('user','user.id','=','address.uid')
    //             ->select('address.*','user.name')
    //             ->get();
        
    //     return view('Home.Address.index',['list'=>$list]);
    // }
    
}
