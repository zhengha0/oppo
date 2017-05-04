@extends('Home.base.parent')
@section('content') 
<style>
  .cart-button{width:100%;margin:10px 0}.cart .area{padding:20px 20px 0}.cart .area+.cart-product{border-top:1px solid #ccc}.cart .highlight{background:#fcfcfc}.cart-btn-check{margin:10px 0}.cart-btn-check .button{width:100%}.cart-btn-check #shipping_btn_m{display:none}@media only screen and (max-width:46.87438em){.cart-reversion .cart-button{display:none}

</style>
      <main class="main-content slab-light order-payments-revision opr">
    <div class="wrapper">
      <ul class="breadcrumb">
  <li>
    <a href="http://www.oppo.com/cn/">
      首页
      <span>/</span>
    </a>
  </li>
            <li>
                  <a href="http://www.opposhop.cn/products?is_promotion=0&amp;category=1">
            在线购物
            <span>/</span>
          </a>
              </li>
          <li>
                  <a href="http://www.opposhop.cn/trade">
            购物车结算
            <span>/</span>
          </a>
              </li>
          <li>
                  支付
              </li>
      </ul>
      <div class="brick-bottom">
        <ul class="steps"><li class="one active ">
    <div class="step-content">
            <h5 class="step-heading">购物车</h5>
      <div class="step-gradient"></div>
    </div>
  </li><li class="two  active">
    <div class="step-content palm-right-text">
            <h5 class="step-heading">填写订单</h5>
      <div class="step-gradient"></div>
    </div>
  </li><li class="three active step-completed">
    <div class="step-content">
            <h5 class="step-heading">支付</h5>
      <div class="step-gradient"></div>
    </div>
  </li></ul>
      </div>

      <div class="slab-white opr-detail">
        <div class="g">
          <div class="gi desk-two-thirds one-whole">
            <div class="opr-title" style="color:#008b56;font-size:20px;">订单提交成功！</div>
@foreach($list as $a)
            <div class="opr-text">订单号为 <i>{{$a->id}}</i>，                请您在提交订单后<span class="alert-danger">48</span>小时内付款（逾期订单将自动取消）。</div>
          </div>
          <div class="gi desk-one-third one-whole opr-prices">
            <div class="opr-price">应付金额：<span>￥{{ ($a->money)}}</span></div>
            
        </div>
        <!-- <div class="opr-order-details">
          <p><label style="color:#000;font-size:16px;">商品清单：</label></p>
              <p>R9s 黑色版 全新配色<span>x</span><span>1</span></p>
              <p>蓝牙耳机Q13<span>x</span><span>1</span></p>
              <p>R9s 液态硅胶保护壳  白色<span>x</span><span>1</span></p>
              <p><label style="color:#000;font-size:16px;">收货信息：</label></p>
              <p>北京北京市东城区东四街道55555 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;111（18234173876） </p>
        </div> -->
      </div>

      
      
          <div class="opr-btn-pay">
            <div class="g">
              <div class="gi desk-three-quarters">
                <p class="error_msg_note">
                                  </p>
              </div>
              <div class="gi desk-one-quarter">
                <a class="button cart-button oppo-tj" id="pay_action" href="{{url('home/fk').'/'.$a->id}}" data-tj="store|btn|order|lijizhifu">立即支付</a>
              </div>
            </div>
          </div>
        </div>
@endforeach
        <form action="http://www.opposhop.cn/orders/pay" method="post" id="payment_form" target="_blank">
          <input name="order_sn" value="170424142993522" type="hidden">
      <input name="payment_code" type="hidden">
      <input name="payment_bankcode" type="hidden">
      <input name="payment_method" type="hidden">
      <input name="short_pay" type="hidden">
      <input name="payment_qr_pay" type="hidden">
      <input name="huabei_qishu" type="hidden">
    </form>
      <div id="dialog" class="hidden">
    <div class="mask"></div>
      <div class="dialog dialog-payment">
        <div class="dialog-container">
          <div class="dialog-close"><a href="#">x</a></div>
          <div class="dialog-content">
            <div class="field">
              <h4 class="dialog-title">请确认您的支付情况</h4>
            </div>
            <div class="field dialog-btn">
              <div class="g g-wrapper-s">
                <div class="gi lap-one-half">
                  <a id="paymentJumpUrl" href="http://www.opposhop.cn/orders/170424142993522/show" class="button">支付成功</a>
                </div>
                <div class="gi lap-one-half">
                  <a href="javascript:;" id="failed_to_pay" class="button-light">支付失败</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  @endsection