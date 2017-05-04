@extends('Home.base.parent')
@section('content')
<style>
  
  .fee-list-title{width:50%}@media only screen and (min-width:61.875em){.fee-list .fee-list-title{width:90%;text-align:right}}.fee-list .fee-list-data{width:50%;text-align:right}.fee-list .fee-list-amount{color:#f30;font-size:20px;font-size:1.25rem}
 .brick-shadow{padding:40px 70px}@media only screen and (max-width:61.87438em){.order-payments-revision .opr-platform .brick-shadow{padding:.75rem}}@media only screen and (max-width:46.87438em){.order-payments-revision .opr-platform .brick-shadow{padding-bottom:100px}}
 .icon-next{right:54px}}.goods-list-info:after,.goods-list:after{display:table;clear:both;content:''}.goods-list{padding:20px 0}.goods-list+.goods-list{border-top:1px #ccc dashed}.goods-list-show{float:left;width:10%}@media only screen and (max-width:46.87438em){.goods-list-show{width:15%}}.goods-list-detail{float:left;width:90%;padding-left:20px}@media only screen and (max-width:46.87438em){.goods-list-detail{width:85%;padding-left:5px}}.goods-list-info{position:relative;width:100%}.goods-list-info+.goods-list-info{margin-top:10px}.goods-list-info.goods-list-gift+.goods-list-gift,.goods-list-info.goods-list-service+.goods-list-service{margin-top:5px}.goods-list-main{font-size:15px;font-size:.9375rem}@media only screen and (max-width:46.87438em){.goods-list-main{font-size:14px;font-size:.875rem}}.goods-list-attach{font-size:14px;font-size:.875rem}.goods-list-attach i{margin-right:10px;border-radius:1px;font-style:normal;color:#fff;background-color:#409f73;display:inline-block}.goods-list-attach a{color:#393939}.goods-list-description{float:left;width:65%}@media only screen and (max-width:46.87438em){.goods-list-attach{font-size:13px;font-size:.8125rem}.goods-list-attach i{margin-right:5px}.goods-list-description{width:57%}}.goods-list-quantity{float:left;width:13%;text-align:center;padding-top:3px}.goods-list-price{float:left;width:22%;text-align:center}.goods-list-flag-gift,.goods-list-flag-service{padding:0 5px}
 .fee-list ul{width:100%}.dual-banner-home{position:relative}.faq li{font-size:18px;font-size:1.125rem;padding:25px 0}.faq li a{color:#1f8657}.faq .bottom{padding:35px 0;text-align:center}.faq .is-hidden{display:none}@media only screen and (min-width:46.875em){.faq{font-size:16px;font-size:1rem}}.fee-list{font-size:16px;font-size:1rem}.fee-list li{width:100%;margin:1px 0;display:inline-block}.fee-list li.fee-list-payment{display:none}.fee-list i{font-style:normal}.fee-list span{display:inline-block}.fee-list .fee-list-title{width:50%}@media only screen and (min-width:61.875em){.fee-list .fee-list-title{width:90%;text-align:right}}.fee-list .fee-list-data{width:50%;text-align:right}.fee-list .fee-list-amount{color:#f30;font-size:20px;font-size:1.25rem}.main-footer{background:#f6f6f6;padding:14px 0}@media only screen and (min-width:61.875em){.fee-list .fee-list-data{width:10%}
 .fee-list-data{color:#f30}.cart-alipay-hb .huabei-free{color:#fff;background-color:#f30;padding:2px}
 .fee-list span{float:left}.community-stories .story-info{font-size:16px;font-size:1rem;margin-bottom:6px}.coupon-p,.coupons-p{display:none}
 .cart-button{width:100%;margin:10px 0}.cart .area{padding:20px 20px 0}.cart .area+.cart-product{border-top:1px solid #ccc}.cart .highlight{background:#fcfcfc}.cart-btn-check{margin:10px 0}.cart-btn-check .button{width:100%}.cart-btn-check #shipping_btn_m{display:none}@media only screen and (max-width:46.87438em){.cart-reversion .cart-button{display:none}
</style>
      <main class="main-content slab-light">
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
                  <a href="http://www.opposhop.cn/cart">
            购物车结算
            <span>/</span>
          </a>
              </li>
          <li>
                  填写订单
              </li>
      </ul>
      <div class="brick-bottom">
        <ul class="steps"><li class="one active ">
    <div class="step-content">
            <h5 class="step-heading">购物车</h5>
      <div class="step-gradient"></div>
    </div>
  </li><li class="two step-completed active ">
    <div class="step-content palm-right-text">
            <h5 class="step-heading">填写订单</h5>
      <div class="step-gradient"></div>
    </div>
  </li><li class="three ">
    <div class="step-content">
            <h5 class="step-heading">支付</h5>
      <div class="step-gradient"></div>
    </div>
  </li></ul>

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

               
          <div class="gi one-whole slab-white-border">
            <div class="delivery-header">
              <h1 class="h-epsilon">选择配送方式:</h1>
                                                        </div>
            <div class="brick-shadow">
                            <div class="address-form-item">
                <div class="address-form" style="display:none" data-address-id="1380769">
                  <div id="address-edit-1380769" class="g">
  <div class="gi field lap-one-whole desk-one-quarter">
    <label>*收货人姓名</label>
    <input name="id" value="1380769" type="hidden">
    <input name="receiver" value="111" type="text">
  </div>
  <div class="g">
    <div class="gi field lap-one-whole desk-one-quarter">
      <label>*手机号码</label>
      <input name="mobile" value="18234173876" type="text">
    </div>
  </div>
    <div class="g field">
    <label>*收货地址</label>
    <div class="g">
      <div class="gi basic-input one-whole desk-one-fifth">
        <span class="icon icon-grey-arrow-down"></span>
        <select id="select13807691" name="province_id" data-region-default="2">
        </select><a class="select mozilla mozilla52 not_msie custom-form_select13807691 responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span></span></span></span></a>
      </div>
      <div class="gi basic-input one-whole desk-one-fifth">
        <span class="icon icon-grey-arrow-down"></span>
        <select id="select13807692" name="city_id" data-region-default="3">
        </select><a class="select mozilla mozilla52 not_msie custom-form_select13807692 responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span></span></span></span></a>
      </div>
      <div class="gi basic-input one-whole desk-one-fifth">
        <span class="icon icon-grey-arrow-down"></span>
        <select id="select13807693" name="district_id" data-region-default="4">
        </select><a class="select mozilla mozilla52 not_msie custom-form_select13807693 responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span></span></span></span></a>
      </div>
      <div class="gi basic-input one-whole desk-one-fifth">
        <span class="icon icon-grey-arrow-down"></span>
        <select id="select13807694" name="town_id" data-region-default="16596">
        </select><a class="select mozilla mozilla52 not_msie custom-form_select13807694 responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span></span></span></span></a>
      </div>
    </div>
    <div class="g">
      <div class="gi desk-two-thirds one-whole">
        <input class="address-detail" name="address-detail" value="55555" type="text">
      </div>
    </div>
  </div>
  <div class="g">
    <div class="gi field lap-one-whole desk-one-quarter">
      <label>联系邮箱</label>
      <input name="email" value="623670195@qq.com" type="text">
    </div>
  </div>
  <div class="form-actions">
    <div class="pull-left">
      <a class="button-light pull-left address-update" href="javascript:;" data-id="1380769">保存</a>
      <a class="button-light pull-left address-cancel" href="javascript:;" data-id="1380769">取消</a>
    </div>
  </div>
  <div class="dividing-line"></div>
</div>
                </div>

               
               
          

          

                
        
         
             @foreach($add as $a)                       
                <table  style="width:1050px">      
                   <tr style="height:60px;border:1px solid #009B72;;color:#009B72;;" class="xuan"> 
                        <th style="width:50px"><input type="radio" name="ze" value="{{ $a->id }}"></th>
                        <th style="width:200px" class="c1">{{ $a->consignee }}</th>
                        <th style="width:300px" class="c2">{{ $a->phone }}</th>
                        <th style="width:450px" class="c3">{{ $a->detail }}</th>   
                    </tr>     
                 </table>  
             @endforeach



              <form action="" method="post" name='myform'>
                {{ csrf_field() }}
                  <input type="hidden" value="{{time()}}" name="ptime">
                  <input style="300px" value="" type="hidden" name='utname' id="d1">
                  <input style="300px" value="" type="hidden" name='uphone' id="d2">
                  <input style="300px" value="" type="hidden" name='uaddress' id="d3">
                </form>
 

<script>
 $('.xuan').click(function(){
 $('#d1').val($(this).children('.c1').html());
 $('#d2').val($(this).children('.c2').html());
 $('#d3').val($(this).children('.c3').html());
 });

</script>         




                  
                
              </div>
                                          <p class="field">
                <a href="/home/address" id="address_new" class="button-light">添加新地址</a>
                </p><div class="js-content address-form-new" style="display:none;">
                  <div id="address-create" class="g">
  <div class="gi field lap-one-whole desk-one-quarter">
    <label>*收货人姓名</label>
    <input name="receiver" type="text">
  </div>
  <div class="g">
    <div class="gi field lap-one-whole desk-one-quarter">
      <label>*手机号码</label>
      <input name="mobile" type="text">
    </div>
  </div>
    <div class="g field">
  <label>*收货地址</label>
  <div class="g">
    <div class="gi basic-input one-whole desk-one-fifth">
      <span class="icon icon-grey-arrow-down"></span>
      <select id="select1" name="province_id"></select><a class="select mozilla mozilla52 not_msie custom-form_select1 responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span></span></span></span></a>
    </div>
    <div class="gi basic-input one-whole desk-one-fifth">
      <span class="icon icon-grey-arrow-down"></span>
      <select id="select2" name="city_id"></select><a class="select mozilla mozilla52 not_msie custom-form_select2 responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span></span></span></span></a>
    </div>
    <div class="gi basic-input one-whole desk-one-fifth">
      <span class="icon icon-grey-arrow-down"></span>
      <select id="select3" name="district_id"></select><a class="select mozilla mozilla52 not_msie custom-form_select3 responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span></span></span></span></a>
    </div>
    <div class="gi basic-input one-whole desk-one-fifth">
      <span class="icon icon-grey-arrow-down"></span>
      <select id="select4" name="town_id"></select><a class="select mozilla mozilla52 not_msie custom-form_select4 responsive_select"><span class="select_content"><span class="select_button"><span class="select_button_icon"></span></span><span class="select_label"><span></span></span></span></a>
    </div>
  </div>
  <div class="g">
    <div class="gi desk-two-thirds one-whole">
      <input class="address-detail" name="address-detail" placeholder="详细街道地址" type="text">
    </div>
  </div>
</div>
  <div class="g">
    <div class="gi field lap-one-whole desk-one-quarter">
      <label>联系邮箱</label>
      <input name="email" type="text">
    </div>
  </div>
  <div class="form-actions">
    <div class="pull-left">
      <a class="button-light pull-left address-store" href="javascript:;">保存</a>
      <a class="button-light pull-left address-new-cancel" href="javascript:;">取消</a>
    </div>
  </div>
</div>
                </div>
              <p></p>
            </div>

                       
                  
            
                        <div class="brick-shadow">
              <div class="invoice-head js-collapse">
                <a class="js-collapse-open" style="display:inline-block">
                  <h3 class="h-epsilon">电子发票:<span class="icon icon-arrow-light-down"></span></h3>
                </a>
                <p class="invoice-head-tip">
                  电子发票法律效力、基本用途及使用规定同纸质发票，可在订单详情中查看和下载，打印后可用于报销且不易丢失。<br>
                  <a class="color-primary" href="http://hd.oppo.com/act/2016/e-invoice/index.html" target="_blank">什么是电子发票？</a>
                </p>
              </div>
              <div class="lap-one-whole field">
                  *发票抬头：<span id="invoice-title">{{ session('adminuser')->uname }}</span>
                  <input name="invoice_title" value="" type="hidden">
              </div>
              <div class="invoice" id="invoice-new" style="display:none">
                <div class="g field lap-one-whole desk-two-thirds">
                  <input class="edit-invoice-title" name="invoicetitle" type="text">
                </div>
                <div class="form-actions">
                  <div class="form-actions-left">
                    <a class="button-light" href="javascript:;" id="save-invoice-title">保存</a>
                  </div>
                </div>
              </div>
              <div>
                <a href="javascript:;" id="update-invoice-btn" class="button button-light">重新编辑</a>
              </div>
            </div>

            @foreach($goods as $g)
            @if(!empty($g))
                        <div class="brick-shadow" style="height:300px;">
                          <h4>商品清单：</h4>
                            <div class="goods-list">
                <div class="goods-list-show">
                  <a class="goods-list-image" href="http://www.opposhop.cn/products/409" target="_blank">
                    <img src="/admin/upload/{{$g->logo}}">
                  </a>
                </div>
                <div class="goods-list-detail">
                  <div class="goods-list-info goods-list-main">
                    <div class="goods-list-description">
                      <h4 class="heading">
                        <a href="http://www.opposhop.cn/products/409" target="_blank">{{ $g->sname }}</a>
                      </h4>
                      <p>全球|100TB</p>
                    </div>
                    <div class="goods-list-quantity"><strong>×1</strong></div>
                    <div class="goods-list-price"><strong>￥
                                        {{ $g->money }}
                                        </strong></div>
                  </div>
                                    <div class="goods-list-info goods-list-attach goods-list-gift">
                    <div class="goods-list-description">
                      <i class="goods-list-flag-gift"></i>
                      <a href="http://www.opposhop.cn/products/384" target="_blank"></a>
                    </div>
                    <div class="goods-list-quantity"></div>
                  </div>
                  
        		         		                                                                                           </div>
              </div>
                </div>
@endif
@endforeach
<input name="voucher" value="" type="hidden">
<div class="brick-shadow coupon-p">
  <div class="g">
    <div class="radio-item simple">
      
      <label for="coupon-type-2">
        <span class="main">使用优惠码</span>
      </label>
    </div>
    <div class="coupon-code" style="display: block;">
      <div class="g g-wrapper-s coupon-code-field">
        <div class="gi one-half desk-one-quarter">
          <input name="coupon-code" placeholder="请输入优惠码" type="text">
        </div>
        <div class="gi one-half desk-three-quarters">
          <a class="button button-light coupon-code-use">立即使用</a>
          <a class="coupon-code-clear">清空</a>
        </div>
      </div>
      <p class="coupon-code-result" style="display: none;">优惠码已成功使用。现已为你减免<span></span>元。</p>
      <p class="alert-danger"></p>
      <p class="clickable">（优惠码一旦使用，不可取消）</p>
    </div>
  </div>
  
    </div>
@foreach($oid as $o)
     <div class="brick-shadow fee-list">
              <input name="goods_fee" value="1599.00" type="hidden">
              <input name="shipping_fee" value="0.00" type="hidden">
              <input name="shipping_id" value="7" type="hidden">
              <input name="discount_fee" value="0.00" type="hidden">
              <input name="payment_fee" value="0.00" type="hidden">
              <input name="payment_id" value="0" type="hidden">
              <input name="amount_fee" value="1599" type="hidden">
              <input name="quickbuy" value="1" type="hidden">
              <ul>
                <li>
                  <span class="fee-list-title">商品数量：</span>
                  <span class="fee-list-data">{{ $o->num }}</span>
                </li>
                <li>
                  <span class="fee-list-title">合计：</span>
                  <span class="fee-list-data" id="trade_total_fee">￥<font>{{ $o->money }}</font></span>
                </li>
                <li>
                  <span class="fee-list-title">优惠券/码：</span>
                  <span class="fee-list-data" id="discount_fee_price">- ￥0.00</span>
                </li>
                                <li>
                    <span class="fee-list-title">邮费（<font color="color_red">全场包邮</font>）：</span>
                  <span class="fee-list-data" id="shipping_fee_price">+ ￥0.00</span>
                </li>
                <li class="fee-list-payment">
                  <span class="fee-list-title">手续费（货到付款手续费）：</span>
                  <span class="fee-list-data" id="payment_fee_price">+ ￥0.00</span>
                </li>
                <li>
                  <span class="fee-list-title">应付金额：</span>
                                      <span class="fee-list-data fee-list-amount" id="amount_fee_price">￥{{ $o->money }}</span>
                                  </li>
                                <li class="cart-alipay-hb" data-checkfree="0">
                  
                </li>
                              </ul>
            </div>


            @if(isset($add[0]))
            <div class="form-actions brick-shadow right-text">
                <a class="button cart-button" href='javascript:doGo({{$o->id }})' >提交订单</a>
            </div>
            @else
            <div class="form-actions brick-shadow right-text">
                <a class="button cart-button" href="/home/address">请先添加地址</a>
            </div>
            @endif
          </div>
@endforeach
     
      </div>
    </div>
  </main>
  <script>
   function doGo(id)
   {
      
      var myform = document.myform;
      myform.action = '/home/zfc/'+id;
      myform.submit();
   }
  </script>
@endsection