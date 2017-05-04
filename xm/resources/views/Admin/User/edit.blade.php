@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改用户</h3>
        
        <p>填空修改用户</p>
        
        <div class="row">
            <form action='{{ url("admin/user")."/".$ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    <label>用户名：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name' value="{{ $ob->name }}">
                </div>
                <div class="col-lg-4">
                    <label>呢称：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入呢称" name='uname' value="{{ $ob->uname }}">
                </div>
                <div class="col-lg-4">
                    <label>密码：</label>
                    <input type="password" class="form-control m-b-10" placeholder="请输入密码" name='password' value="{{ $ob->password }}">
                </div>
                <div class="col-lg-4">
                    <label>手机号：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入手机号" name='phone' value="{{ $ob->phone }}">
                </div>
                <div class="col-lg-4">
                    <label>QQ：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入QQ" name='qq' value="{{ $ob->qq }}"> 
                </div>
                <div class="col-lg-4">
                    <label>Email：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入Email" name='email' value="{{ $ob->email }}">
                </div>
                <div class="col-lg-4">
                    <label>地址：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入地址" name='address' value="{{ $ob->address }}">
                </div>
                <div class="col-lg-4">
                    <label>性别：</label>
                    <select class="form-control m-b-10" name='sex'>
                        <option value='1' @if($ob->sex ==1)selected @endif>男</option>
                        <option value='2' @if($ob->sex ==2)selected @endif>女</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <input type="hidden" class="form-control m-b-10" placeholder="请输入时间" name='rtime' value="{{ time() }}">
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection