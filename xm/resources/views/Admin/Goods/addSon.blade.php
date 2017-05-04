@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加子类别</h3>
        <div class="row">
            <form action="{{ url('admin/goodsSon') }}" method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" disabled="" value="{{ $list->sname }}">
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入子类别名" name='sname'>
                </div>
                <div class="col-lg-4">
                    <input type="hidden" class="form-control m-b-10" name='pid' value="{{ $list->id }}">
                </div>
                <div class="col-lg-12">
                    <textarea class="form-control m-b-10" name='content' rows='10' cols='30'></textarea>
                </div>
                <div class="col-lg-4">
                    文件：<input type='file' name='logo'>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品价格" name='money'>
                </div>
                 <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品货号" name='mark'>
                </div>
                 <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品尺寸" name='weight'>
                </div>
                 <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品状态" name='state'>
                </div>
                <div class="col-lg-4">
                    <input type="hidden" class="form-control m-b-10" name='time' value='{{ time() }}'>
                </div>
                 <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品库存" name='num'>
                </div>
                 <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入销售量" name='sales'>
                </div>
                 <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入收藏数" name='collectnum'>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入评价数" name='number'>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection