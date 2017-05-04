@extends('Home.base.parent')
@section('content');
      <main class="main-content user">
    <div class="wrapper">
      <ul class="breadcrumb">
  <li>
    <a href="http://www.oppo.com/cn/">
      首页
      <span>/</span>
    </a>
  </li>
            <li>
                  配送地址
              </li>
      </ul>


      @if(session('msg'))
       <script>

        alert("{{ session('msg') }}");
       </script>
      

        @endif
        @if(session('error'))
          <div class="alert alert-warning alert-icon">
      {{ session('error') }}
      <i class="icon"></i>
      </div>
       @endif
      <div class="myOppo-menu">
  <h1 class="h-gamma">配送地址</h1>
  <ul class="navigation">
    <li class="">
      <a href="http://www.opposhop.cn/orders">我的订单</a>
    </li>
    <li class="is-active">
      <a href="{{ url('home/address') }}">配送地址</a>
    </li>
    <li class="">
      <a href="http://www.opposhop.cn/coupons/show">优惠券</a>
    </li>
    <li>
      <a href="{{ url('home/my') }}">账户信息</a>
    </li>
  </ul>
</div>
      <div class="row">
        <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <ul class="list-unstyled">
            <strong class="error_msg_note">
            </strong>
          </ul>
        </div>
        </div>
      </div>
        
      <form class="g" action="{{ url('home/address').'/'.$oob->id }}" method='post'>
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="gi one-whole">
          <div class="brick-shadow">
           
            <a class="button-light field" id="address_new" href="javascript:;">修改地址</a>
            <div class="js-content address-form-new" style="display: block;">
            <div id="address-create" class="g">
        <div class="gi field lap-one-whole desk-one-quarter">
          <label>*收货人姓名</label>
          <input name="consignee" type="text" value="{{ $oob->consignee }}">
        </div>
        <div class="g">
          <div class="gi field lap-one-whole desk-one-quarter">
            <label>*手机号码</label>
            <input name="phone" type="text" value="{{ $oob->phone }}">
          </div>
        </div>
          <div class="g field">
        <label>*收货地址</label>
      
        <div class="g">
          <div class="gi desk-two-thirds one-whole">
            <input class="address-detail" name="detail" type="text" value="{{ $oob->detail }}">
          </div>
        </div>
      </div>
        <div class="form-actions">
          <div class="pull-left">
           <!--  <a class="button-light pull-left address-store" href="######">保存</a>
            
            <a class="button-light pull-left address-new-cancel" href="#######">取消</a> -->
            <input type="submit" class="button-light pull-left address-store" value='提交'>
          </div>
        </div>
      </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
@endsection   