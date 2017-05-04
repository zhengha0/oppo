@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">订单信息</h3>
        
        <div class="row">
            <form  method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <div class="col-lg-4">
                    <label>用户名：</label>
                    <input type="text" class="form-control m-b-10" placeholder="" name='uname' value="{{ $ob->uname }}">
                </div>
                <div class="col-lg-4">
                    <label>收货人姓名：</label>
                    <input type="text" class="form-control m-b-10" placeholder="" name='utname' value="{{ $ob->utname }}">
                </div>
                <div class="col-lg-4">
                    <label>收货人手机：</label>
                    <input type="text" class="form-control m-b-10" placeholder="" name='uphone' value="{{ $ob->uphone }}">
                </div>
                <div class="col-lg-4">
                    <label>收货人地址：</label>
                    <input type="text" class="form-control m-b-10" placeholder="" name='uaddress' value="{{ $ob->uaddress }}">
                </div>
                <div class="col-lg-4">
                    <label>下单时间：</label>
                    <input type="text" class="form-control m-b-10" placeholder="" name='atime' value="{{ $ob->atime }}">
                </div>
                <div class="col-lg-4">
                    <label>付款时间：</label>
                    <input type="text" class="form-control m-b-10" placeholder="" name='ptime' value="{{ $ob->ptime }}">
                </div>
                @if($ob->state == 1)
                <div class="col-lg-12">
                    <a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $ob->id }})'>发货</a>
                </div>
                @elseif($ob->state == 2)
                <div class="col-lg-12">
                    <a class="btn btn-sm btn-alt m-r-5" href='/admin/order'>已发货</a>
                </div>
                @endif
            </form>
        </div>
        <p></p>
        <script type="text/javascript">
            function doDel(id){
                if(confirm('确定发货吗？')){
                    var form = document.myform;
                    form.action = '/admin/order/'+id;
                    form.submit();
                }
            }
        </script>
    </div>
@endsection