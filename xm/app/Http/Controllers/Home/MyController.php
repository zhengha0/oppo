<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $list = DB::table('user');
        // dd($list);
        $ob = DB::table('link')->get();
        //存入session值
        $list = session("adminuser");
        $uid = session("adminuser")->id;
        // dd($list);
        $list = DB::table('user')->where('id',$uid)->first();
        // dd($list);
        $conf = DB::table('config')->get(); 
        return view('Home.My.index',['list'=>$list,'ob'=>$ob,'conf'=>$conf]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // dd($id);
        $conf = DB::table('config')->get();
        $ob = DB::table('link')->get();
        $data = DB::table('user')->where('id',$id)->first();
        return view('Home.My.edit',['oob'=>$data,'conf'=>$conf,'ob'=>$ob]);
    
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
        $data = $request->only('name','phone','qq','email');
        $this->validate($request, [
            'phone'=>'regex:/^1[34578][0-9]{9}$/',
            ],$this->messages());
         $row = DB::table('user')->where('id',$id)->update($data);
        if($row>0){
            return redirect('home/myy')->with('msg','修改成功');
        }else{
            return redirect('home/myy')->with('error','');
        }
    }

    public function messages()
    {
        return [
            'phone.regex' => '手机号输入错误',
        ];
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
    }
}
