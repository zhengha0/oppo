<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modelq\User;

use Gregwar\Captcha\CaptchaBuilder;

class DlController extends Controller
{
    //
    public function index()
    {
    	return view('Home.denglu.dl');
    }
    public function dodl(Request $request)
    {
        //获取session中的验证码内容
        $mycode = session('mycode');
        // 判断用户输入的验证码和session中的内容是否一致
        if($mycode != $request->input('mycode')){
            return back()->with('msg','登录失败：验证码不正确');
        }
    	//实例化模型
    	$user = new User();
    	// 调用模型中的验证用户的方法
    	$ob = $user->checkUser($request);
        // dd($ob);
    	if($ob){
    		session(['adminuser'=>$ob]);
    		return redirect('/home/index');
    	}else{
    		return back()->with('msg','登录失败：用户名或密码不正确');
    	}
    }

    public function captch($tmp)
    {
        //生成验证码图片的builder对象，
        $builder = new CaptchaBuilder;
        // 设置验证码的宽高字体
        $builder->build(200,44,null);
        //获取验证码中的内容
        $data = $builder->getPhrase();
        //把验证码的内容闪存到session里面
        session()->flash('mycode',$data);

        //告诉浏览器，这是一张图片
        // header('content-type:image/jpeg');
        //生成图片
        // $builder->output();die;

        return response($builder->output())->header('Content-type','image/jpeg');
    }

    public function over()
    {
        session()->forget('adminuser');
        session()->forget('buy');
        return redirect('home/index');
    }
}
