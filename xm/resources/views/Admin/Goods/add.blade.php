@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加类别</h3>
        
        <p>填空添加用户</p>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form action="{{ url('admin/goods') }}" method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品名" name='sname'>
                </div>
                <div class="col-lg-12">
                    <textarea class="form-control m-b-10" name='content' rows='10' cols='30'></textarea>
                </div>
                <div class="col-lg-8">
                    文件：<input type='file' name='logo'>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品价格" name='money'>
                </div>
                 <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品货号" name='mark'>
                </div>
                 <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品尺寸" name='weight'>
                </div>
                 <div class="col-lg-8">
                    <select class="form-control m-b-10" name='state'>
                    <option value='1'>上架</option>
                    <option value='2'>下架</option>
                </select>
                </div>
                <div class="col-lg-8">
                    <input type="hidden" class="form-control m-b-10" name='time' value='{{ time() }}'>
                </div>
                 <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品库存" name='num'>
                </div>
                <div class="col-lg-8">
                    <select class="form-control m-b-10" name='pid'>
                    @foreach($list as $v) 
                        <option value='{{ $v->id }}'>{{ $v->fname }}</option>
                    @endforeach
                </select> 
                </div>                
                <div class="col-lg-8">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection