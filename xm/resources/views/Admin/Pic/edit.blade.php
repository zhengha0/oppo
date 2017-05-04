@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改轮播图</h3>
        
        <p>填空修改轮播图</p>
        
        <div class="row">
            <form action='{{ url("admin/pic")."/".$ob->id }}' method='post'  enctype='multipart/form-data'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    <label>上传轮播图：</label>
                    <input type="hidden" name="oldpic" value="{{ $ob->picname }}">
                    <input type="file" class="form-control m-b-10" placeholder="" name='picname'>
                </div>
                <div class="col-lg-4">
                    <label>链接地址：</label>
                    <input type="text" class="form-control m-b-10" placeholder="" name='piclink' value="{{ $ob->piclink }}">
                </div>
                
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection