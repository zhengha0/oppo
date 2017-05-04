@extends('Admin.base.parent')
@section('content') 
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加轮播图</h3>
        
        <p>填空添加轮播图</p>
        
        <div class="row">
            <form action="{{ url('admin/pic') }}" method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="col-lg-4">
                    上传图片：<input type="file" class="form-control m-b-10" placeholder="" name='picname'>
                </div>
                <div class="col-lg-4">
                    链接地址：<input type="text" class="form-control m-b-10" placeholder="请输入链接地址" name='piclink'>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p> 
    </div>
@endsection