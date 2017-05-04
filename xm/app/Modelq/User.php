<?php

namespace App\Modelq;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    // protected $primaryKey = 'uid';
    // public $timestamps = false;
    public function checkUser($request)
    {
    	// 获取用户登录的用户名
    	$name = $request->input('uname');
        // dd($name);
    	//通过用户名查询数据库有没有这个用户
    	$ob = $this->where('uname',$name)->first();
        // dd($request);
    	// 如果查出有用户，则验证密码
    	if($ob){
    		if($request->input('password') == md5($ob->password)){
    			return $ob;
               
    		}else{
    			return null;
    		}
    	}else{
    		return null;
    	}
    }
}
