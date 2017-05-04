@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改用户</h3>
        
        <p>填空修改用户</p>
        
        <div class="row">
            <form action="{{ url('admin/demo4')."/".$ob->id }}" method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='name' value="{{ $ob->name }}">
                </div>
                <!-- <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入权限" name='pw' value="{{ $ob->pw }}">
                </div> -->
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='pw'>
                        <option value='1' @if($ob->pw == 1)selected @endif>管理员</option>
                        <option value='2' @if($ob->pw == 2)selected @endif>超级管理员</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection