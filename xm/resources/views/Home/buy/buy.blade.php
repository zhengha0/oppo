@extends('Home.base.parent')
@section('content') 
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Home/buypic/styles.css') }}">
<script type="text/javascript" src="{{ asset('./js/jquery-1.8.3.min.js') }}"></script>
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
                  购物车
              </li>
      </ul>
        <div class="brick-bottom">
          <ul class="steps"><li class="one active step-completed">
    <div class="step-content">
            <h5 class="step-heading">购物车</h5>
      <div class="step-gradient"></div>
    </div>
  </li><li class="two  ">
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

          
          <form class="g" action="{{ url('home/che') }}" method="post">
          {{ csrf_field() }}  
            <div class="gi one-whole slab-white-border cart-reversion">
              <ul class="purchase-list-header">
                <li class="first">
                  <label class="check-box-label check-box-all is-checked" for="checkAll">
                    <span class="icon icon-checkbox"></span>
                    <span class="space-ml-5">全选</span>
                  </label>
                </li>               
                <li class="second">产品</li>
                <li class="third">数量</li>
                <li class="four">单价</li>
                <li class="five">操作</li>
              </ul>
             <div class="brick-shadow purchase-list">
                
            @if(session("buy"))
            @foreach($list as $v)
            @foreach($v as $k=>$z)
           
            @if(!empty($z))
            <div class="cart-product cart-product-l cart-product-31239d1e340e8366ef08477b57a118eb  ">
            <div class="cart-product-choice">
                <label class="check-box-label check-box-item is-checked" data-id="31239d1e340e8366ef08477b57a118eb">
                    <span class="icon icon-checkbox"></span>
                </label>

              
                <a class="cart-product-image" href="http://www.opposhop.cn/products/391" target="_blank">
                    <img src="/admin/upload/{{ $z->logo }}">
                </a>
            </div>
            <div class="cart-product-info">
                <div class="cart-product-description">
                    <h3 class="heading"><a href="http://www.opposhop.cn/products/391" target="_blank">{{ $z->sname }}</a></h3>

                    <p>玫瑰金|全网通|64G</p>
                </div>
                <div class="cart-counter-box">
                    <div class="counter-box">
                        <a class="btn minus" onclick="jian(this)" data-id="31239d1e340e8366ef08477b57a118eb">-</a>
                        <input  class="number cart-product-quantity-31239d1e340e8366ef08477b57a118eb" readonly="" type="text" value="1" data-quantity="1" data-price="2799.00">
                        <a onclick="jia(this)" class="btn plus" data-id="31239d1e340e8366ef08477b57a118eb">+</a>
                    </div>             
                </div>
                <div class="cart-product-price">
                    <span class="normal">{{ $z->money }}</span> 
                    <span class="zm">{{ $z->money }}</span>
                   
                </div>
               
                <div class="cart-product-delete cart-product-delete-word" data-id="31239d1e340e8366ef08477b57a118eb">
                  <a href='/home/del/{{$k}}'>删除</a>
                </div>

                 <input type="hidden" name="pid" value="{{ $z->id }}">
                
            </div>
            </div>
            @endif
            @endforeach
            @endforeach        
      <div class="form-actions brick-shadow">
      <div class="cart-fee" id="J_cartBar">
        <ul>
           <li>
            <span class="cart-fee-title">商品数量：<em class="zongshu"></em>个</span>
            <span class="cart-fee-data total-amount"></span>
          </li>
          <li>
            <span class="cart-fee-title">合计：<em class="zongji"></em>元</span>
            <span class="cart-fee-data total-fee"> </span>
          </li>
          <li class="cart-alipay-hb">
            <span class="cart-fee-title"><i class="icon-hb"></i>订单满600可使用花呗分期3/6/12期</span>
          </li>
        </ul>
      </div>

                <div class="form-actions-left">
                  <a class="link-primary" href="/home/goods" target="_blank">继续购买&gt;&gt;</a>
                </div>
                <div class="form-actions-right"></div>
                                  
              </div>
            </div>
        <div class="cart-btn-check">
          <input type="hidden" class='zs' value="" name="num">
          <input type="hidden" class='zj' value="" name="money">
          <input type="hidden" name='uid' value="{{ session('adminuser')->id }}">
         
          <input type='submit' class="button cart-button oppo-tj" id=""  data-tj="store|btn|check|sticky" value="结算"></input>
        </div>
          </form>
        </div>
        @else
            <div class="brick-shadow purchase-list"><center><h2>购物车空空的，去<a href="/home/goods" style="color:#1f8657;">逛逛</a>吧</h2></center></div>
        @endif

              </div>
    </main>
    <div id="dialog-confirm" class="hidden">
			<div class="mask-common"></div>
			<div class="dialog-common dialog-box-common">
				<div class="dialog-container">
					<a class="dialog-close-common">×</a>
					<div class="dialog-content-common">
												<div class="field">
							<h4 class="dialog-title-common">您确定要删除该商品吗？</h4>
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
	    <div id="dialog-error-msg" class="hidden">
			<div class="mask-common"></div>
			<div class="dialog-common dialog-box-common">
				<div class="dialog-container">
					<a class="dialog-close-common">×</a>
					<div class="dialog-content-common">
												<div class="field">
							<h4 class="dialog-title-common">.</h4>
						</div>
																		<div class="dialog-common-content">
												</div>
																		<div class="field dialog-btn">
							<div class="g g-wrapper-s">
								<div class="gi lap-one-whole">
									<a class="button button-one-whole">确定</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
      <script>
         // 判断商品数量点击的的多少
         function jian(obj){
      
            var val = $(obj).siblings('input').val();
            // alert(val);
            
            val = Number(val);
            val = val-1;
            if(val < 1){
                alert('商品不能在少啦');
               die();
            }
            // alert(val);
            
            $(obj).siblings('input').val(val);
            var money = $(obj).parent().parent().siblings('.cart-product-price').children('span').html();
            // alert(money);
            var zong = money*val;
            // a += zong;
            // alert(1);
            $(obj).parent().parent().siblings('.cart-product-price').children('.zm').html(zong);
          function zongji(){
          var xiaojilist = $('.zm');
          // alert(xiaojilist);
          var total = 0;
          for (var i = 0; i < xiaojilist.length; i++) {
            total += parseInt($(xiaojilist[i]).html());
          }
          $('.zongji').html(total);
          $('.zj').val(total);
         }
         zongji();
        function zongshu(){
          var xiaojilist = $('.number');
          // alert(xiaojilist);
          var total = 0;
          for (var i = 0; i < xiaojilist.length; i++) {
            total += parseInt($(xiaojilist[i]).val());
          }
          // $('.number').html(total);
          $('.zongshu').html(total);
          $('.zs').val(total);
         }
         zongshu();
            // alert(111111111111);
            // var b = 0;//将所有的zong相加
              
            //    $(this).each(function(){
            //     var a = 0;//得到的所有的总
                
            //     a = parseInt($(this).html());
            //     alert($(this).html());
               //alert(val)        
         }
          // alert(zong);
           function jia(obj){
            var val = $(obj).siblings('input').val();
            val = Number(val);
            val = val+1;
            if(val >20 ){
                alert('商品已经达到上限,最大购买量是20');
                $(obj).siblings('input').val('20');
                die();
            }
            $(obj).siblings('input').val(val);
            // var money = $(obj).parent().parent().prev().html();
            var money = $(obj).parent().parent().siblings('.cart-product-price').children('span').html();
            // alert(val);
            var zong = money*val;
            // $(obj).parent().parent().next().html(zong);
            $(obj).parent().parent().siblings('.cart-product-price').children('.zm').html(zong);
               // var productid = $(obj).parent().siblings('input').val();

          function zongji(){
          var xiaojilist = $('.zm');
          // alert(xiaojilist);
          var total = 0;
          for (var i = 0; i < xiaojilist.length; i++) {
            total += parseInt($(xiaojilist[i]).html());
          }
          $('.zongji').html(total);
          $('.zj').val(total);
         }
         zongji();
          function zongshu(){
          var xiaojilist = $('.number');
          // alert(xiaojilist);
          var total = 0;
          for (var i = 0; i < xiaojilist.length; i++) {
            total += parseInt($(xiaojilist[i]).val());
          }
           $('.zongshu').html(total);
            $('.zs').val(total);
         }
         zongshu();

         }

          function zongji(){
          var xiaojilist = $('.zm');
          // alert(xiaojilist);
          var total = 0;
          for (var i = 0; i < xiaojilist.length; i++) {
            total += parseInt($(xiaojilist[i]).html());
          }
          $('.zongji').html(total);
          $('.zj').val(total);
         }
         zongji();
          function zongshu(){
          var xiaojilist = $('.number');
          // alert(xiaojilist);
          var total = 0;
          for (var i = 0; i < xiaojilist.length; i++) {
            total += parseInt($(xiaojilist[i]).val());
          }
           $('.zongshu').html(total);
          $('.zs').val(total);
         }
         zongshu();
         // alert($('.number').val());
        </script>

@endsection	     