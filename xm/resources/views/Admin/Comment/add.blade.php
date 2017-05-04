@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加用户收货地址</h3>
        
        <p>填空添加用户收货地址</p>
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
            <form action="{{ url('admin/comment') }}" method='post'>
                {{ csrf_field() }}
                <input type="hidden" class="form-control m-b-10"  name='atime' value="{{ time() }}">
                <div class="col-lg-5">
                    请输入用户ID:<input class="form-control" type="text" value="" disabled="">
                    <!-- <input type="text" class="form-control m-b-10" placeholder="请输入用户ID" name='uid'> -->
                </div>
                <div class="col-lg-5">
                    请输入用户名:<input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='uname'>
                </div>
                <div class="col-lg-5">
                    请输入产品标号:<input type="text" class="form-control m-b-10" placeholder="请输入产品标号" name='pid'>
                </div>
               <!--  <div class="col-md-3 m-b-15">
                    <label>请输入用户IP</label>
                    <input type="text" class="input-sm form-control mask-ip_address" placeholder="请输入用户IP" name='uip'>
                </div> -->
                <div class="col-lg-5">
                    请输入用户IP:<input type="text" class="form-control m-b-10" placeholder="请输入用户IP" name='uip'>
                </div>
                <br><br>
                <div class="col-lg-10">
                    请输入评价内容:<input type="text" class="form-control m-b-10" placeholder="请输入评价内容" name='content'>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection