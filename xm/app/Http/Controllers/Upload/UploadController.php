<?php

namespace App\Http\Controllers\Upload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;

class UploadController extends Controller
{
    //
    public function index()
    {
    	return view('Upload.upload');
    }

    public function doupload(Request $request)
    {
        /*if ($request->hasFile('mypic')) {
            $data = $request->file('mypic');
            for ($i=0; $i < count($data); $i++) { 
                $ext = $data[$i]->getClientOriginalExtension();
                $filename = time().rand('1000','9999').'.'.$ext;
                $data[$i]->move('./admin/upload',$filename);
                if($data[$i]->getError()>0){
                    echo "{$i}下标的图片上传失败";
                }else{
                    echo "<img src='./admin/upload/{$filename}' width='200' height='200'>";
                }
            }
            //
        }*/
    	

    	//判断是否有文件上传
    	if($request->hasFile('logo')){
    		// 判断上传的文件是否有效
    		if($request->file('logo')->isValid()){
    			// 获取上传的文件对象
    			$data = $request->file('logo');
    			// dd($data);
    			// 获取上传的文件的后缀
    			$ext = $data->getClientOriginalExtension();
    			// 拼装出你需要使用的文件名
    			$picname = time().rand(1000,9999).'.'.$ext;
    			// 移动临时文件，生成新文件到指定目录下
    			$data->move('./admin/upload',$picname);
    			if($data->getError()>0){
    				echo '上传失败';
    			}else{
    				echo '上传成功';
    				return $picname;
    			}
    		}
    	}
        if($request->hasFile('picname')){
            // 判断上传的文件是否有效
            if($request->file('picname')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('picname');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data->move('./admin/upload',$picname);
                if($data->getError()>0){
                    echo '上传失败';
                }else{
                    echo '上传成功';
                    return $picname;
                }
            }
        }

        // 1.使用自定义类进行图片缩放
        /* use App\Org\Image;  
        $img = new Image();
        $img->open('./admin/upload/'.$picname);
        $img->thumb(100,100)->save('./admin/upload/s_'.$picname);
        */

        // 2.使用第三方图片处理
        // $img = Image::make('./admin/upload/'.$picname);
        // $img->resize(400, 400, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // });
        // $img->save('./admin/upload/s_'.$picname);

		
    	// $dd = $data->getClientOriginalName();		//获取上传文件的源文件名
    	// $dd = $data->getClientOriginalExtension(); 		//获取上传文件的源文件的后缀名
    	// $dd = $data->getClientMimeType();		//获取上传文件的源文件的类型
    	// $dd = $data->getClientSize();		//获取上传文件的源文件的大小
    	// $dd = $data->getError();		//获取上传文件的源文件的错误号
    }
}
