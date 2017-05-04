@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加用户</h3>
        
        <p>填空添加用户</p>
        
        <div class="row">
            <form action="{{ url('admin/user') }}" method='post'>
                {{ csrf_field() }}
                <div class="col-lg-4">
                    <label>用户名：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name'>
                </div>
                <div class="col-lg-4">
                    <label>呢称：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入呢称" name='uname'>
                </div>
                <div class="col-lg-4">
                    <label>密码：</label>
                    <input type="password" class="form-control m-b-10" placeholder="请输入密码" name='password'>
                </div>
                <div class="col-lg-4">
                    <label>手机号：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入手机号" name='phone'>
                </div>
                <div class="col-lg-4">
                    <label>QQ：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入QQ" name='qq'>
                </div>
                <div class="col-lg-4">
                    <label>Email：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入Email" name='email'>
                </div>
                <div class="col-lg-4">
                    <label>地址：</label>
                    <input type="text" class="form-control m-b-10" placeholder="请输入地址" name='address'>
                </div>
                <div class="col-lg-4">
                    <label>性别：</label>
                    <select class="form-control m-b-10" name='sex'>
                        <option>--请选择--</option>
                        <option value='1'>男</option>
                        <option value='2'>女</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <input type="hidden" class="form-control m-b-10" placeholder="请输入注册时间" value="{{ time() }}" name='rtime'>
                </div>

                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection