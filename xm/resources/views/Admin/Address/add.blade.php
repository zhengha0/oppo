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
            <form action="{{ url('admin/address') }}" method='post'>
                {{ csrf_field() }}
                
                <div class="col-lg-4">
                    请输入收货人姓名:<input type="text" class="form-control m-b-10" placeholder="请输入收货人姓名" name='consignee'>
                </div>
                <div class="col-lg-4">
                    请输入收货人手机:<input type="text" class="form-control m-b-10" placeholder="请输入收货人手机" name='phone'>
                </div>
                
                <div class="col-lg-4">
                    请输入详细地址:<input type="text" class="form-control m-b-10" placeholder="请输入详细地址" name='detail'>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
    </div>
@endsection