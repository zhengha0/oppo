<!-- {{ date_default_timezone_set('PRC') }} -->
@extends('Home.base.parent')
@section('content');

@if(session('msg'))
        <script type="text/javascript">
            alert("{{ session('msg') }}");
        </script>
    @endif
    <form name='myform' method='post'>
            {{ csrf_field() }}

        </form> 
<link rel="stylesheet" href="{{ asset('Home/css/go.css')}}">
<main class="main-content user">
    <div class="wrapper">
      <ul class="breadcrumb">
        <li>
          <a href="">
            首页
            <span>/</span>
          </a>
        </li>
        <li>
          我的订单
        </li>
      </ul>
      <div class="myOppo-menu">
  <h1 class="h-gamma">我的订单</h1>
  <ul class="navigation">
    <li class="is-active">
      <a href="">我的订单</a>
    </li>
    <li class="">
      <a href="{{ url('home/address') }}">配送地址</a>
    </li>
    <li class="">
      <a href="">优惠券</a>
    </li>
    <li>
      <a href="{{ url('home/myy') }}">账户信息</a>
    </li>
  </ul>
</div>
@foreach($ordd as $v)
      <div class="g">
        <div class="gi one-whole my-oppo-content slab-white-border order">
        <div class="g brick-shadow order-list-top">
  <div class="gi one-whole desk-one-half">
    订单编号：<strong><a class="clickable order-id" href="">{{$v->id}}</a></strong>
  </div>
  <div class="gi one-whole desk-one-half desk-text-align-right">
    下单时间：{{ date('Y-m-d',$v->ptime) }}
  </div>
</div>
<ul class="order-list-header">
  <li class="order-product">商品</li>
  <li class="order-quantity">数量</li>
  <li class="order-amount">订单金额</li>
  <li class="order-detail">收货信息</li>
  <li class="order-primary">状态操作</li>
</ul>



<div class="order-list">
  <div class="order-item order-product desk-text-align-center">
      <a href="" target="_blank">
          <img class="order-product-thumbnail" alt="" src="/admin/upload/{{$v->logo}}" style="height:100px;width:100px">
      </a> 
<div class="row">
      <a href="" target="_blank">{{$v->sname}}</a>
  </div>
      </div>
  <div class="order-item order-quantity desk-text-align-center">
   <span class="order-desk-hide">商品数量：</span>{{$v->num}}
  </div>
  <div class="order-item order-amount desk-text-align-center">
    <span class="order-desk-hide">订单金额：</span>¥{{$v->money}}
  </div>
  <div class="order-item order-detail">
    <div class="row order-username">{{$v->utname}}</div>
    <div class="row">{{$v->uphone}}</div>
        
    <div class="row">{{$v->uaddress}}</div>
  </div>
  <div class="order-item order-primary desk-text-align-center">
    <div class="row">订单状态：@if( $v->state == 0 )
                                    待付款
                                @elseif( $v->state == 1 )
                                    待发货  
                                @elseif( $v->state == 2 )
                                    已发货
                                @endif</div>
        @if($v->state == 0)
        <div class="row"><a class="button button-s" href="{{url('home/fk').'/'.$v->id}}">立即支付</a></div>
         @endif
        @if($v->state != 2)
        <div class="row"><a class="box-link" href="javascript:doDel({{ $v->id }})">取消订单</a></div>
        @endif
      
  </div>
</div>
<script type="text/javascript">
        function doDel(id)
        {
            if(confirm('确认取消订单?')){
                var form = document.myform;
                form.action = '/home/order/'+id;
                form.submit();
            }
        }
    </script>
@endforeach
        </div>
        
  </main>
  <div id="dialog-confirm" class="hidden">
			<div class="mask-common"></div>
			<div class="dialog-common dialog-box-common">
				<div class="dialog-container">
					<a class="dialog-close-common">×</a>
					<div class="dialog-content-common">
					<div class="field">
							<h4 class="dialog-title-common">您确定取消订单吗？</h4>
						</div>
					<div class="dialog-common-content">
					</div>
						<div class="field dialog-btn">
							<div class="g g-wrapper-s">
							<div class="gi lap-one-half">
									<a class="button button-one">确定</a>
							</div>
							<div class="gi lap-one-half">
									<a class="button-light button-two">取消</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection  