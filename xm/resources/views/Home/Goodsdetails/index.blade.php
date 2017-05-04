@extends('Home.base.parent')
@section('content') 
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('Home/xq/css/styles.css') }}">

        <script>
var isMobile = navigator.userAgent.search(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|Windows Phone|Tizen|Bada)/);

if( !!~isMobile ) {
    window.location.href = "http://www.opposhop.cn/m/products/410.html";
}
</script>
<script>
    var Yo = Yo || {};

    Yo.base_url = "//www.opposhop.cn/";

    Yo.config = {
                product_id  : 410,
        product_url : "//www.opposhop.cn/products/410/",
                isPreorder : false,
        account_url : "//my.oppo.com",
        login_url : "https://id.oppo.com/login"
    };

    var is_insurance_allowed = true;
</script>

    <script type="text/javascript">
        var ua = navigator.userAgent.toLowerCase(),
            opera = window.opera && window.opera.buildNumber,
            ie = !opera && 'ActiveXObject' in window,
            ieVersion = /msie\s(\d+)/.exec( ua );

        if ( ( !!ie && !!ieVersion ) && ieVersion[1] < 8 ) {
            window.location.href = "http://www.opposhop.cn/lower.html";
        }
    </script>
    <script src="{{ asset('Home/xq/js/jquery-1.9.1.min.js') }}"></script>

    <!--[if lt IE 9]>
      <link media="all" type="text/css" rel="stylesheet" href="{{ asset('Home/xq/css/styles_1.css') }}">

      <link media="all" type="text/css" rel="stylesheet" href="{{ asset('Home/xq/css/ie.css') }}">

      <script src="{{ asset('Home/xq/js/ie.min.js') }}"></script>

    <![endif]-->
  </head>

 


    
      <main class='main-content'>
    <div class='wrapper'>
            <ul class='breadcrumb'>
  <li>
    <a href='//www.oppo.com/cn/'>
      首页
      <span>/</span>
    </a>
  </li>
            <li>
                  <a href='http://www.opposhop.cn/products?is_promotion=0&category=1'>
            商品列表
            <span>/</span>
          </a>
              </li>
          <li>
                  {{ $list->sname }}
              </li>
      </ul>
          </div>
                <div class='buying-details'>
  <article class='wrapper'>
    <div class='buying-header-mov'></div>
    <div class='g'>
      <div class='gi lap-two-fifths desk-one-half'>
        <div class='product-gallery js-tabs'>
   
    <div style="width:500px;height:600px">
       
            <div style="width:500;height:500px">
              <a href='#'>
                    <img src='/admin/upload/{{ $list->logo }}' style="width:450px">
                </a>
          
            </div>         
            <div style="float:left">
                <a href='#'>
                    <img alt='' src='/admin/upload/{{ $list->logo }}' style="width:80px">
                </a>
            </div>
       
    </div>
</div>
      </div>
      <div class='gi lap-three-fifths desk-one-half'>
        <div class='buying-header-desk'>
          <h1 class='product-title' data-desktop='.buying-header-desk'
              data-mobile='.buying-header-mov'>{{ $list->sname }}</h1>
          <p class="product-name-extra" data-desktop=".buying-header-desk" data-mobile=".buying-header-mov">清新潮流新鲜色。付款后一周内发货。</p>
        </div>
        <div class='buying-price'><p>
                                      <strong class='price'>{{ $list->money }}.00</strong>
                                  </p>
        </div>
        <div class='add-cart-form'>
  
        <section class="g module product-selector" data-common-name="attribute-0" data-selector-type="box">
        <div class='gi one-quarter desk-one-fifth'>
            <div class='radio-label'>颜色</div>
        </div>
        <div class="gi three-quarters desk-four-fifths">
            <div class="g g-wrapper-s">
                                <div class="gi one-half desk-one-third ">
                    <a href="" class="swatch ">
                        <span>金色</span>
                    </a>
                </div>
                                <div class="gi one-half desk-one-third ">
                    <a href="" class="swatch ">
                        <span>玫瑰金</span>
                    </a>
                </div>
                                <div class="gi one-half desk-one-third ">
                    <a href="" class="swatch ">
                        <span>黑色</span>
                    </a>
                </div>
                                <div class="gi one-half desk-one-third hidden">
                    <a href="" class="swatch disabled">
                        <span>红色</span>
                    </a>
                </div>
                <div class="gi one-half desk-one-third">
                    <a href="javascript:;" class="swatch selected">
                          @if(($list->state) == 1)
                          <span style="color:#009B72">有货</span>
                          @else
                          <span style="color:red">没货</span>
                          @endif
                    </a>
                </div>
                            </div>
        </div>
    </section>
        <section class="g module product-selector" data-common-name="attribute-1" data-selector-type="box">
        <div class='gi one-quarter desk-one-fifth'>
            <div class='radio-label'>网络</div>
        </div>
        <div class="gi three-quarters desk-four-fifths">
            <div class="g g-wrapper-s">
                                <div class="gi one-half desk-one-third ">
                    <a href="//www.opposhop.cn/products/390.html" class="swatch selected">
                        <span>全网通</span>
                    </a>
                </div>
                            </div>
        </div>
    </section>
        <section class="g module product-selector" data-common-name="attribute-2" data-selector-type="box">
        <div class='gi one-quarter desk-one-fifth'>
            <div class='radio-label'>容量</div>
        </div>
        <div class="gi three-quarters desk-four-fifths">
            <div class="g g-wrapper-s">
                                <div class="gi one-half desk-one-third ">
                    <a href="javascript:;" class="swatch selected">
                        <span>64G</span>
                    </a>
                </div>
                            </div>
        </div>
    </section>

    
                    
        <input type="hidden" name="service-repair" value=" 0 "/>
        <input type="hidden" name="service-screen" value="0"/>
        <input type="hidden" name="service-accident" value="0"/>

        <div class="g pro-service" id="product-services"></div>
            
    <div class="g product-gifts">
      <div class="one-quarter desk-one-fifth">
        <div class="y-label">分期</div>
      </div>
      <div class="gi three-quarters desk-four-fifths">
                  <p class='alipay-hb-product alipay-hb-product-free'><i class='icon-hb icon-hb-free'></i>购机专享 3、6期分期免息</p>
                  <a href="//www.oppo.com/cn/service/help/330?name=%E8%B4%AD%E4%B9%B0%E5%B8%AE%E5%8A%A9" target="_blank" class='huabei-more'>了解详情&gt;&gt;</a>
      </div>
    </div>
  <form name="myform" action="{{ url('home/gou') }}" method="post">
    {{ csrf_field() }}  
    
    <div class="g slab-white-border buying-actions">
    @if(!empty(session('adminuser')))
    <input type="hidden" name="productmoney" value="{{ $list->money }}">
    <input type="hidden" name="uid" value="{{ session('adminuser')->id }}">
    <input type="hidden" name="pid" value="{{ $list->id }}">
    <input type="hidden" name="uname" value="{{ session('adminuser')->uname }}">
    @endif
        <span onclick="jian()">-</span>
        <div class='gi lap-one-third'>
          <input id="num" style="text-align:center" value = '1' type="text" name='num'>
        </div>  
        <span onclick="jia()">+</span>   
        @if(($list->state) == 1)        
        <input type="submit" style="width:150px;float:right;" class="button-light pull-left address-store" value='立即购买'>
        <span style="clear:both"></span> 
        <a class="button-light pull-left address-store" style="width:150px;float:right;margin-right:10px" href='/home/dobuy/{{ $list->id }}'>加入购物车</a>
        @else
         <input type="" style="width:150px;float:right;color:red" class="button-light pull-left address-store" value='缺货'>
        
        @endif
   </div>
  </form>
   <script type="text/javascript">
       function jia(){
               var obj=$("#num");
              (obj.val((obj).val()*1+(+1)));              
            }
       function jian(){
               var obj=$("#num");
               if(obj.val()<1){
                obj.val(1);
               }
              (obj.val((obj).val()*1+(-1)));              
            }

    function doGo(){

        var obj=$("#num");
        var id=(obj.val());
        // alert(id);
        var form = document.myform;
        form.action = '/home/gouwu/'+id;
        form.submit();
   
    }
   </script>
</div>
        
        <div class='g delivery-specs pro-delivery-specs'>
          <div class='gi one-half desk-one-quarter'>            <div class='badge'>
              <div class='badge-item'>
                <span class='icon icon-postage'></span>
              </div>
              <div class='badge-info'>
                <span> 顺丰包邮 </span>
              </div>
            </div>
          </div>
          <div class='gi one-half desk-one-quarter'>
            <a href="//www.oppo.com/cn/service/help?name=%E6%9C%8D%E5%8A%A1%E6%94%BF%E7%AD%96" target="_blank">
            <div class='badge'>
              <div class='badge-item'>
                <span class='icon icon-return'></span>
              </div>
              <div class='badge-info'>
                <span>7天包退30天包换</span>
              </div>
            </div>
            </a>
          </div>
          <div class='gi one-half desk-one-quarter'>
            <a href="//hd.oppo.com/act/2016/e-invoice/index.html" target="_blank">
            <div class='badge'>
              <div class='badge-item'>
                <span class='icon icon-credit'></span>
              </div>
              <div class='badge-info'>
                <span>电子发票</span>
              </div>
            </div>
            </a>
          </div>
                      <div class='gi one-half desk-one-quarter'>
              <div class='badge'>
                <div class='badge-item'>
                  <span class='icon icon-points'></span>
                </div>
                <div class='badge-info'>
                  <span>购物返积分</span>
                </div>
              </div>
            </div>
                  </div>

      </div>
    </div>
  </article>
</div>

    <div class="product-related">
        <div class="wrapper">
            <div class="related-tabs">
                <ul class="clearfix tabs" data-bind="related">
                                                        </ul>
            </div>
            <div class="related-view" data-tab="related">
                                            </div>
        </div>
    </div>

            <div class="product-view">
                <div class="product-view-tabs">
            <div class="wrapper">
              <ul class="clearfix tabs" id="product-tabs">
                                    <li class="oppo-tj  y-tab-active " data-hash="features" data-tj="store|tab|product_detail|product_features"><a href="javascript:;" >商品详情</a></li>
                                    <li class="oppo-tj " data-hash="params" data-tj="store|tab|product_detail|product_params"><a href="javascript:;" >规格参数</a></li>
                                    <li class="oppo-tj " data-hash="comments" data-tj="store|tab|product_detail|product_comments"><a href="{{ url('home/comment').'/'.$list->id }}"  onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', 'comment-tab']);">用户评价 <span id="comment-total">(0)</span> </a></li>
                                </ul>
              <div class="sticky-buy">
                <a href="javascript:;" class="go-buy oppo-tj" id="sticky-go-buy" data-tj="store|a|product_buy|sticky_buy">购买</a>
                </div>
            </div>
        </div>
                <div class="product-view-detail" id="product-detail">
                        <div class="product-detail-tab y-tab-frame  tab-item-active " id="product-detail-features">
                <section>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201704/2017041909043558f6c31fa6e9b.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017041909044758f6c32be4bc3.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017041909044758f6c32be4bc3.jpg' srcset='//static.oppo.com/archives/201704/2017041909043558f6c31fa6e9b.jpg' alt=''>
            </picture>
        </p>
               
                
               
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                
                                                                <source media='(min-width: 300px)' srcset='picture/2017032311034158d3464d251dd.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                               
               
            </picture>
        </p>
                
                
            
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032501032058d6012069179.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032311035458d3465a3b847.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032311035458d3465a3b847.jpg' srcset='//static.oppo.com/archives/201703/2017032501032058d6012069179.jpg' alt=''>
            </picture>
        </p>
            </section>

            </div>
                        <div class="product-detail-tab y-tab-frame " id="product-detail-params">
                <section>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302034758d36d3be99e3.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302033658d36cf4a9860.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302033658d36cf4a9860.jpg' srcset='//static.oppo.com/archives/201703/2017032302034758d36d3be99e3.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302035058d36d3e7775f.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302033958d36cf784d77.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302033958d36cf784d77.jpg' srcset='//static.oppo.com/archives/201703/2017032302035058d36d3e7775f.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302035358d36d413344b.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302034258d36cfa78ca6.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302034258d36cfa78ca6.jpg' srcset='//static.oppo.com/archives/201703/2017032302035358d36d413344b.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302035558d36d434ea71.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302034558d36cfd3d926.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302034558d36cfd3d926.jpg' srcset='//static.oppo.com/archives/201703/2017032302035558d36d434ea71.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302035858d36d463d719.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302030258d36d0ed81ea.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302030258d36d0ed81ea.jpg' srcset='//static.oppo.com/archives/201703/2017032302035858d36d463d719.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302030158d36d49437c9.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302030558d36d1178c85.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302030558d36d1178c85.jpg' srcset='//static.oppo.com/archives/201703/2017032302030158d36d49437c9.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302030458d36d4c11a03.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302030858d36d1449381.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302030858d36d1449381.jpg' srcset='//static.oppo.com/archives/201703/2017032302030458d36d4c11a03.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302030758d36d4f359b3.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302031458d36d1a24e18.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302031458d36d1a24e18.jpg' srcset='//static.oppo.com/archives/201703/2017032302030758d36d4f359b3.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302031058d36d5216c3e.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302031958d36d1fc5445.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302031958d36d1fc5445.jpg' srcset='//static.oppo.com/archives/201703/2017032302031058d36d5216c3e.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302031258d36d54d4a87.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302032358d36d232b0c2.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302032358d36d232b0c2.jpg' srcset='//static.oppo.com/archives/201703/2017032302031258d36d54d4a87.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302031558d36d57d7ea7.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302032558d36d25ecd53.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302032558d36d25ecd53.jpg' srcset='//static.oppo.com/archives/201703/2017032302031558d36d57d7ea7.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302031858d36d5aa1c51.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302032858d36d28579a0.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302032858d36d28579a0.jpg' srcset='//static.oppo.com/archives/201703/2017032302031858d36d5aa1c51.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302032158d36d5dc06d5.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302033158d36d2b42b52.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302033158d36d2b42b52.jpg' srcset='//static.oppo.com/archives/201703/2017032302032158d36d5dc06d5.jpg' alt=''>
            </picture>
        </p>
                <p style="text-align:center;">
            <picture>
                <!--[if IE 9]> <video style="display: none;"> <![endif]-->
                                <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201703/2017032302032458d36d6040186.jpg'>
                                                                <source media='(min-width: 300px)' srcset='picture/2017032302033458d36d2ee02bb.jpg'>
                                <!--[if IE 9]> </video> <![endif]-->
                <img src='picture/2017032302033458d36d2ee02bb.jpg' srcset='//static.oppo.com/archives/201703/2017032302032458d36d6040186.jpg' alt=''>
            </picture>
        </p>
            </section>

            </div>
                        <div class="product-detail-tab y-tab-frame " id="product-detail-comments">
                <section>
    <div class="wrapper comments-wrapper">
        <div class="y-comments-header clearfix">
            <div class="reviews-switchable" id="comments-switchable">
                <ul>
                    <li class="switchable checked">
                        <a href="javascript:;" data-type="all" onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', 'all-comments-button']);">
                            <span class="cb-radio">
                                <span class="cb-inner">
                                    <i></i>
                                </span>
                            </span>
                            <label>全部评价</label>
                        </a>
                    </li>
                                        <li class="switchable">
                        <a href="javascript:;" data-type="hasimages" onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', '晒图按钮']);">
                            <span class="cb-radio">
                                <span class="cb-inner">
                                    <i></i>
                                </span>
                            </span>
                            <label>晒图<span class="reviews-count" data-type="hasimages">（0）</span></label>
                        </a>
                    </li>
                    <li class="switchable">
                        <a href="javascript:;" data-type="hasappend" onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', 'append-comment-button']);">
                            <span class="cb-radio">
                                <span class="cb-inner">
                                    <i></i>
                                </span>
                            </span>
                            <label>追评<span class="reviews-count" data-type="hasappend">（0）</span></label>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="comments-button">
                <a class="button button-s" href="javascript:;" data-type="1" id="go-comment" onclick="_optj.push(['_trackEvent', 'store', 'btn', 'comments', 'comment-button']);">我要评论</a>
                            </div>
        </div>
    </div>

    <div class="wrapper">

        <div id="comments" class="y-comments-view"></div>

        <div class="y-comment-pagination clearfix" id="comments-pagination"></div>

        <div id="respond" class="y-comment-respond" style="display: none;">
            <div class="y-comment-form">
                <input type="hidden" id="comment-product-id" value="410">
                <input type="hidden" id="comment-type" value="1">
                <input type="hidden" id="comment-score" value="0">
                <input type="hidden" id="comment-id" value="0">
                <input type="hidden" id="comment-archive-ids" value="">
                <div class="field y-form-star" id="comment-star-box">
                    <label>评分</label>
                    <div class="group clearfix">
                        <div class="comment-star" data-bind="rating">
                            <a href="javascript:;" class="stars star-1" data-value="1">1</a>
                            <a href="javascript:;" class="stars star-2" data-value="2">2</a>
                            <a href="javascript:;" class="stars star-3" data-value="3">3</a>
                            <a href="javascript:;" class="stars star-4" data-value="4">4</a>
                            <a href="javascript:;" class="stars star-5" data-value="5">5</a>
                        </div>
                    </div>
                </div>
                <div class="field y-form-list" id="comment-list-box" style="display: none;">
                    <label>请选择已提交的评论进行追评</label>
                    <div id="comment-list">
                        正在加载中...
                                            </div>
                </div>
                <div class="field y-form-comment">
                    <label id="comment-label">内容</label>
                    <textarea id="comment" placeholder="外观好看吗，拍照怎么样，好用吗？"></textarea>
                </div>
                <div class="y-comments-uploader" id="comments-uploader-container">
                    <a class="y-upload-button" href="javascript:;" id="comments-file">
                                                <i></i>
                        <span>上传图片</span>
                    </a>
                    <div class="y-upload-list">
                        <ul id="comments-upload-list" style="display: none;">
                                                    </ul>
                    </div>
                    <div class="y-upload-note">最大可支持上传<em>2</em>M以内的JPG,PNG格式图片，最多允许上传<em>4</em>张图片</div>
                </div>
                <div class="y-form-button">
                    <a class="button button-s" href="javascript:;" id="submit-comment">提交评论</a>
                    <a class="button button-s" href="javascript:;" id="comment-loading" style="display: none;">提交评论中...</a>
                    <a class="button-light button-s" href="javascript:;" id="cancel-comment">取消评论</a>
                </div>
            </div>
        </div>
    </div>
</section>
            </div>
                    </div>
    </div>
    
                                          </main>

  

    <script src="{{ asset('Home/xq/js/global.min.js') }}"></script>

        <script src="{{ asset('Home/xq/js/opposhop.min.js') }}"></script>

    
    <script src="{{ asset('Home/xq/js/main.min.js') }}"></script>

<script src="{{ asset('Home/xq/js/product.min.js') }}"></script>

<script src="{{ asset('Home/xq/js/oppo.login.js') }}"></script>

<script>
    $(window).on('load', function() {
        var stickyBuy = new Yo.Product.stickyBuy();
    });
</script>

    <script type="text/javascript">
    var vm;
    OPPO.conf.BASE_URL = '//www.opposhop.cn';
    OPPO.conf.STORE_URL = '//www.opposhop.cn';
    OPPO.conf.ACCOUNT_URL = '//my.oppo.com';
    OPPO.conf.WWW_URL = "//www.oppo.com/cn/";
    OPPO.conf.SSO_LOGIN_URL = "https://id.oppo.com/login";
    OPPO.conf.SSO_LOGOUT_URL = "https://id.oppo.com/logout";
    OPPO.conf.SSO_REGISTER_URL = "https://id.oppo.com/register/sms?type=1";
    OPPO.conf.date = '1492691406';
    
    var url = OPPO.conf.STORE_URL + '/auth/check';
    //callback for jsonp
    var successCallback = function(data){
        $('ul.log-area .hasLogout').removeClass('show').addClass('hidden');
        $('ul.log-area .hasLogin').removeClass('hidden').addClass('show');
        $('.cart_number').text(data['cart_number']);
        $('.n-messages').text("(" + data['message_number'] + ")");
        $('.user-menu').addClass('isLogin');
        $('.user-menu-toLogin').hide();
        if (data['message_number']>0 || data['cart_number']>0) {
          $('.js-open-user').addClass('point-red');
          if (data['message_number']>0) $('.user-menu-message a').addClass('point-red');
          if (data['cart_number']>0) $('.user-menu-cart a').addClass('point-red');
        };
        if (data['append'] != '') $('body').append(data['append']);
    };
    var errorCallback = function(){
        $('ul.log-area .hasLogin').removeClass('show').addClass('hidden');
        $('ul.log-area .hasLogout').removeClass('hidden').addClass('show');
        $('.cart_number').text(0);
    };
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'jsonp',
        error: function() {
            errorCallback();
        },
        success: function(data){
            successCallback(data);
        }
    });

    (function () {
        var controllerNameWithAction = "ProductsController@show".split('@');
        var controllerName = controllerNameWithAction[0];
        var actionName = controllerNameWithAction[1];
        var controller = OPPO.controller[controllerName];
        if (controller) {
            action = controller()[actionName];
            if (action) {
                $(function () {
                    vm = action();
                });
            }
        }
        // else console.log(controllerNameWithAction);
    })();
    </script>

    <script type="text/javascript">
      $(function(){
          Yo.Product.swipe('product-swipe');
  Yo.Product.initCarousel();
  Yo.Product.initAmount();

  var Related = new Yo.Product.Related();

        var Comments = Yo.Product.Comments = new Yo.Product.Comments(410, '#comments', '#comments-pagination', '#respond');
    
  Yo.Product.Tabs();

  Yo.Product.Tab.on('tab', function(tab) {
    var $tab = tab['tab'];

    $tab.parent().find('li').removeClass( 'clicked' );

    if ( !$tab.hasClass('clicked') ) {
        $tab.addClass( 'clicked' );

        var top = $('.product-view').offset().top || 0;

        $('html, body').animate( {
            scrollTop: top
        }, 500 );
    }

    
    if ( $tab.data('hash') == 'comments' && !$tab.data('trigger') ) {
      $tab.data('trigger', true);

      Comments.render();
    }
  });
  if ( $('#product-tabs').find('li').length == 1 && $('#product-tabs').find('li').data('hash') == 'comments' ) {
      Comments.render();
  }

  //new Yo.Product.Suits();
      });
    </script>

    <!-- 百度统计代码  -->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?9cb8846b548404438c81aaa02eda4f0f";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>

<!-- 谷歌统计代码 -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66238290-1', 'auto');
  ga('send', 'pageview');
</script>

<!--oppo统计-->
<script>
var _optj = _optj || [];
//判断是否登录，有登录则输出用户ID

//加入购物车的商品ID信息

//判断是否有订单号信息 有则输出


 //判断是否有订单的商品ID信息 有则输出 多个用"|"中划线分割


(function() {
  var op = document.createElement("script");
  op.src = "//shopfs.myoppo.com/hd/static/js/optj-1.1.0.min.js?20170313";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(op, s);
})();
</script>

<!-- 华扬统计 -->
<script type="text/javascript">
var _utaq = _utaq || [];
_utaq.push(["trackPageView"]);
_utaq.push(["enableLinkTracking"]);
(function() {
var utu="https://sit.gentags.net/";
_utaq.push(["setTrackerUrl", utu+"site/unids.gif"]);
_utaq.push(["setSiteId", "1351"]);
var utd=document, ut=utd.createElement("script"), s=utd.getElementsByTagName("script")[0]; ut.type="text/javascript";
ut.defer=true; ut.async=true; ut.src=utu+"adagent/js/uta.js"; s.parentNode.insertBefore(ut,s);
})();
</script>
<noscript><img src="{{ asset('Home/xq/picture/7cc9fd246c7742ddaf275de548ea61c0.gif') }}" style="border:0" alt="" /></noscript> 

<!--听云监测-->
<script src="{{ asset('Home/xq/js/tingyun-rum.js') }}"></script>

<script type="text/javascript">
$(function(){
  $("body").on("click",".oppo-tj",function(){
    if (typeof $(this).data('tj') != 'undefined' && typeof _optj != 'undefined') {
      var tj = $(this).data('tj');
      var tjs = tj.split("|");
      _optj.push(['_trackEvent', tjs[0], tjs[1], tjs[2], tjs[3]]);
    };
  });
});
</script>
@endsection
