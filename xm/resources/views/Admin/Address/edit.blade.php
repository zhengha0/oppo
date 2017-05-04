@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改地址</h3>
        
        <p>修改用户收货地址</p>
        
        <div class="row">
            <form action="{{ url('admin/address').'/'.$ob->id }}" method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                 <div class="col-lg-4">
                    收货人姓名:<input type="text" class="form-control m-b-10" placeholder="收货人姓名" name='consignee' value="{{ $ob->consignee }}">
                </div>      
                 <div class="col-lg-4">
                    请输入收货人手机号:<input type="text" class="form-control m-b-10" placeholder="请输入收货人手机号" name='phone' value="{{ $ob->phone }}">
                </div>    
                 
                 <div class="col-lg-4">
                    请输入详细地址:<input type="text" class="form-control m-b-10" placeholder="请输入详细地址" name='detail' value="{{ $ob->detail }}">
                </div> 

                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>     
    </div>
@endsection