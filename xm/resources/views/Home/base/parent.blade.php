<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<html class='no-js'>
  <head>
    <script src="{{asset('Home/js/jquery-1.8.3.min.js')}}"></script>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=EDGE" />
    <meta content='width=device-width,initial-scale=1, user-scalable=no' name='viewport'>

    @foreach($conf as $v)
    <title>{{ $v->title }}</title>
    @if($v->state !== 1)
    {{ exit("<script>alert('网站维护');window.location.href='index';</script>") }}
    @endif
    <meta name="keywords" content="{{ $v->keys }}" />
    @endforeach
    <meta name="description" content="" />
    <link media="all" type="text/css" rel="stylesheet" href=" {{ asset('Home/css/styles.css')}}"  >

    <script type="text/javascript">
		function checkBrowser(){
			var browser = {};
			var div = document.createElement( "div" );
			div.innerHTML = "<link/><table></table><a href='/a'>a</a><input type='checkbox'/>";
            var a = div.getElementsByTagName( "a" )[0];
			style = a && a.style;
			if (!style) {
				return;
			}
			style.cssText = "float:left;opacity:.5";
			// Support: IE<9
			// Make sure that element opacity exists (as opposed to filter)
			browser.opacity = style.opacity === "0.5";
			// Verify style float existence
			// (IE uses styleFloat instead of cssFloat)
			browser.cssFloat = !!style.cssFloat;
			if(browser.opacity && browser.cssFloat){
				return true;
			}else{
                //IE 8测试
                var userAgent = navigator.userAgent.toLocaleUpperCase();
                var msie = /MSIE [\d\.]+/;
                var version = msie.exec(userAgent);
                if (version<"MSIE 8") return false;
                else return true;
			}
		}
        var v = checkBrowser();
		if (!v) {
			window.location.href = "http://www.opposhop.cn/lower.html";
		}
    </script>
    <!--[if lt IE 9]>
      <link media="all" type="text/css" rel="stylesheet" href="css/styles_1.css">

      <script src="{{ asset('Home/js/html5shiv.js')}}"></script>

      <script src="{{ asset('Home/js/respond.min.js')}}"></script>

      <script src="{{ asset('Home/js/selectivizr-min.js')}}"></script>

      <link media="all" type="text/css" rel="stylesheet" href="css/ie.css">

    <![endif]-->
    <script src="{{ asset('Home/js/modernizr.custom.js')}}"></script>

          </head>
  <body>
  <header class='main-header'>
  <div class='upper-area'>
    <div class='wrapper g'>
    
    <ul class='gi log-area'>
    @if(session("adminuser"))
        <li style="float:left"><a href="/home/order/{{session('adminuser')->id}}">我的OPPO{{ session("adminuser")->uname }}</a>
    </li>
    <li style="float:right">
      <a class='logout sso-logout' href="{{ url('home/over') }}">退出</a>
    </li>
     @else
    <li style="float:left"> <a class="sso-login" href='/home/dl'>登录</a></li>
    <li style="float:right"> <a class="sso-register" href='/home/zhuce'>注册</a></li>
    @endif
    </ul>  
     
    <ul class='gi menu-lang'>
  <li class='gi gi-language' data-desktop='.menu-lang' data-mobile='.main-menu nav .nav-ul-view > ul'>
    <a class='lang-link js-toggle-close' href='/admin/login'>Global</a>
    <div class='languages js-content' data-desktop='.gi-language' data-mobile='.languages-panel'>
      <div class='wrapper'>
        <h3 class='h-epsilon'>Select your country or region</h3>
        <ul>
          <li>
          <a  href='http://www.oppo.com/dz/'>Algérie</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/au/'>Australia</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/bd/'>Bangladesh</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/eg/'>Egypt</a>
          </li>
          <li>
          <a href='http://www.oppo.com/en/'>Global</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/in/'>India</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/id/'>Indonesia</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/ke/'>Kenya</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/my/'>Malaysia</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/ma/'>Maroc</a>
          </li>
          <!-- <li>
          <a  href='http://www.oppo.com/mx/'>México</a>
          </li> -->
          <!-- <li>
          <a  href='http://www.oppo.com/ng/'>Nigeria</a>
          </li> -->
          <li>
          <a  href='http://www.oppo.com/pk/'>Pakistan</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/ph/'>Philippines</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/sg/'>Singapore</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/lk/'>Sri Lanka</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/tw/'>台灣</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/ae/'>UAE</a>
          </li>
          <li>
          <a  href='http://www.oppomobile.vn/'>Việt Nam</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/th/'>ประเทศไทย</a>
          </li>
          <li>
          <a  href='http://www.oppo.com/mm/'>Myanmar</a>
          </li>
          <li>
          <a  class='current'  href='http://www.oppo.com/cn/'>中国</a>
          </li>
        </ul>
      </div>
    </div>
  </li>
</ul>    </div>
  </div>
  <div class='bottom-area'>
    <div class='wrapper'>
      <a class='js-open-menu' href='#'>
        <i class='js-open-menu-bar'></i>
      </a>
      <div class='shop-cart'>
  <a href='/home/buy'>
        <span class='icon icon-cart'></span>
    <span class='n-item-cart cart_number' id="shopping-count">0</span>
  </a>
</div>      <div class='logo logo-extend'>
        <a href='//www.oppo.com/cn/'>
          <img src="{{ asset('Home/picture/logo.svg')}}" alt="">
        </a>
        <!-- <a class="logo-special oppo-tj"  data-tj="www|img|revision|special-logo">
          <img src="{{ asset('Home/picture/qixi-logo.gif')}}" />
        </a> -->
        <!-- <a class="logo-special oppo-tj"  data-tj="www|img|revision|special-logo">
          <img src="{{ asset('Home/picture/monkey-logo.gif')}}" />
        </a> -->
      </div>
      <a class='js-open-user' href='#'>
        <img src="{{ asset('Home/picture/icon-menu-user.png')}}" alt="">
      </a>
      <div class='main-menu'>
        <!-- <div class='mobile-tools'>
          <a class='js-close-menu' href='#'>
            <img alt='' src='{{ asset("Home/picture/icon-menu-close.png")}}' />
          </a>
          <ul class='g log-area'></ul>
        </div> -->
        <div class='search'></div>
        <nav>
  <div class='nav-ul-view'>
  <ul class='menu g'>
    <li class='gi
    '>
      <a class='m-item' href='/home/index'>
        <span>首页</span>
      </a>
    </li>
    <li class='gi'>
      <a class='m-item' href=''>
        <span>产品</span>
      </a>
    </li>
    
    <li class='giis-active'>
		
		<div class="content" style="float:left;display:block;width:100px;">
		<p class="flip" style="margin:0px;padding:0px;text-align:center;border:solid 0px #fff;"><a href="/home/goods">商城</a></p>
		
    </li>

    <li class='gi'>
      <a class='m-item' href=''>
        体验店
      </a>
    </li>
    <li class='gi'>
      <a class='m-item' href=''>
        服务
              </a>
    </li>
          <li class='gi'>
      <a class='m-item' href='' target="_blank">
        ColorOS
      </a>
    </li>
    <li class='gi'>
      <a class='m-item' href='' target="_blank">
        社区
      </a>
    </li>
  </ul>
  </div>

</nav>
      </div>
      <div class='user-menu'>
<div class='relative'>
  <ul>
    <li class='user-menu-login'>
      <a href="//www.opposhop.cn/orders">我的订单</a>
    </li>
    <li class='user-menu-login'>
      <a href="https://id.oppo.com/account/profile">账户信息</a>
    </li>
    <li class='user-menu-login'>
      <a href="//www.opposhop.cn/user/addresses">配送地址</a>
    </li>
    <li class='user-menu-login user-menu-cart'>
      <a href="//www.opposhop.cn/cart">购物车</a>
    </li>
    <li class='user-menu-login user-menu-toLogin'>
      <a class="sso-login" href='javascript:void(0)'>
        登录
      </a>
    </li>
    <li class='user-menu-logout'>
      <a class="sso-logout" href='javascript:void(0)'>退出</a>
    </li>
  </ul>
</div>
</div>    </div>
  </div>
  <div class='nav-sub-menu'>
  <div class='relative'></div>
</div>
<div class='nav-search-mask'></div>
<div class='nav-search'>
  <div class='nav-search-container'>
    <div class='nav-search-content'>
      <div class='nav-search-input'>
        <form action='//www.opposhop.cn/products' class='main-form'>
          <input placeholder='搜索OPPO商品' type='text' name="q">
          <button class='button' type='submit'>搜索</button>
          <a href='#' class='nav-search-close'>取消</a>
        </form>
      </div>
    </div>
  </div>
</div>  <div class="languages-panel"></div>
</header>
      
@yield('content');
      
        <footer class='main-footer'>
    <div class='footer-sitemap'>
    <nav class='wrapper'>
  <div class="g">
    <div class="gi lap-three-quarters">
    
  <ul class='g'>
      <li class='gi lap-one-quarter'>
        <a class='m-item' href='//www.oppo.com/cn/products' target="_blank">推荐机型</a>
      <span class="toggle js-toggle-sitemap"></span>
      @foreach($ob as $v)
      <ul>
        <li>
          <a href="{{ $v->url }}" target='_blank'>{{ $v->name }}</a>
        </li>
      </ul>
      @endforeach        
      
    </li>
      <li class='gi lap-one-quarter'>
        <a class='m-item' href='//www.opposhop.cn/' target="_blank">在线购买</a>
      <span class="toggle js-toggle-sitemap"></span>
  <ul>
        <li>
          <a href='//www.opposhop.cn/' target='_blank'>官方商城</a>
        </li>
                <li>
          <a href='//www.oppo.com/cn/service/help?name=购买帮助' target='_blank'>购物指南</a>
        </li>
                <li>
          <a href='//www.oppo.com/cn/service/help/614?name=打假维权' target='_blank'>官方授权网店</a>
        </li>
              </ul>
    </li>
            <li class='gi lap-one-quarter'>
        <a class='m-item' href='//www.oppo.com/cn/service' target="_blank">服务</a>
      <span class="toggle js-toggle-sitemap"></span>
      <ul>
                <li>
          <a href='//www.oppo.com/cn/service/map' target='_blank'>服务网点查询</a>
        </li>
                <li>
          <a href='//www.oppo.com/cn/service/part' target='_blank'>零配件价格查询</a>
        </li>
                <li>
          <a href='http://yun.oppo.com/' target='_blank'>云服务</a>
        </li>
              </ul>
    </li>
            <li class='gi lap-one-quarter'>
        <a class='m-item' href='//www.oppo.com/cn/blogs' target="_blank">关于我们</a>
      <span class="toggle js-toggle-sitemap"></span>
      <ul>
                <li>
          <a href='//www.oppo.com/cn/blogs/about' target='_blank'>关于OPPO</a>
        </li>
                <li>
          <a href='http://career.oppo.com' target='_blank'>加入我们</a>
        </li>
                <li>
          <a href='//www.oppo.com/cn/service/help/605?name=sourcing' target='_blank'>采购相关</a>
        </li>
                <li>
          <a href='//hd.oppo.com/2016/r9s/conference/index.html' target='_blank'>发布会回顾</a>
        </li>
              </ul>
    </li>
          </ul>
    </div>
    <div class="gi lap-one-quarter align-right">
      <div class="one-half lap-one-whole contact-online">
        <a href="http://oim.oppo.com/oim/chatClient/chatbox.jsp?companyID=8092&configID=890&enterurl=http%3A%2F%2Foim%2Emyoppo%2Ecom%2Foim%2Fpreview%2Ejsp&pagereferrer=http%3A%2F%2Foim%2Emyoppo%2Ecom%2Foim%2FembedScript%2Ejsp%3Ft%3D1517&k=1" target="_blank"><img src="{{ asset('Home/picture/icon-online.png')}}" alt=""></a>
      </div>
      <div class="one-half lap-one-whole contact-tel">
        <p class="contact-number">4001-666-888</p>
        <p class="contact-tips">（24小时全国服务热线）</p>
      </div>
    </div>
  </div>
</nav>  </div>

  <div class="g wrapper">
    <div class="footer-linear"></div>
  </div>

                              <!-- <div class='g'>
          <div class='gi lap-one-whole one-whole'>
            <a href='#' id="btn-kf"><img src='{{ asset("Home/picture/zxkf.png")}}' /></a>
          </div>
          <div class='gi footer-lap-hide one-third'><img alt='' src='{{ asset("Home/picture/m.jpg")}}' /></div>
        </div> -->
              <!-- <div class='footer-subscribe lap-one-half desk-lap-one-third'>
        <form action='#' class='main-form'>
          <div class='input-button-item'><input placeholder='输入Email订阅我们的最新动态' type='text'>
          <button class='button button-primary' type='submit'>订 阅</button>
          </div>
        </form>
      </div> -->
    <div class='footer-info'>
    <div class='wrapper'>
            <div class="footer-focus">
        <span class='text'>关注我们：</span>
        <a href='http://weibo.com/oppo' target='_blank' class="footer-focus-weibo">
          <span class='icon icon-weibo'></span>
        </a>
        <a href='#' class='footer-focus-icon footer-focus-wechat relative'>
          <span class='icon icon-wechat'></span>
          <img src="{{ asset('Home/picture/qrcode-wx.jpg')}}" class="wx-float" alt="">
        </a>
        <a href='#' class='footer-focus-icon footer-focus-fuwuchuang relative'>
          <span class='icon icon-fuwuchuang'></span>
          <img src="{{ asset('Home/picture/qrcode-fwc.jpg')}}" class="wx-float" alt="">
        </a>
      </div>
      @foreach($conf as $v)
      <p class='copy'>{{ $v->content }}</p>
      @endforeach
      <a href="http://wljg.gdgs.gov.cn/corpsrch.aspx?key=441900001042573" target="_blank" title="企业名称：东莞市永盛通信科技有限公司
法定代表人：吴强
标识状态：已激活 粤工商备P191703000418" class="footer-identification"></a>
  </div>
</footer>
    
    <div class='navi-scroll'>
  <div class="navi-scroll-content">
    <a href="javascript:;" class="scroll-top-btn"><span>回到顶部</span><i></i></a>
    <a href="https://www.wenjuan.com/s/2AzYrm/" target="_blank" class="survey-btn survey-btn-normal"><span>意见反馈</span><i></i></a>
    <a href="https://www.wenjuan.com/s/2AzYrm/" class="survey-btn survey-btn-mobile"><span>意见反馈m</span><i></i></a>
  </div>
</div>

    
    <div class="purchase-advisory">
        <a href="http://oim.oppo.com/oim/chatClient/chatbox.jsp?companyID=8092&configID=890&enterurl=http%3A%2F%2Foim%2Emyoppo%2Ecom%2Foim%2Fpreview%2Ejsp&pagereferrer=http%3A%2F%2Foim%2Emyoppo%2Ecom%2Foim%2FembedScript%2Ejsp%3Ft%3D1517&k=1" target="_blank" id="advisory">购机咨询</a>
    </div>

    <script src="{{ asset('Home/js/jquery-1.9.1.min.js')}}"></script>

    <script src="{{ asset('Home/js/jquery.lazyload.min.js')}}"></script>

    <script src="{{ asset('Home/js/underscore-min.js')}}"></script>

    <script src="{{ asset('Home/js/es5-shim.min.js')}}"></script>

    <script src="{{ asset('Home/js/base64.min.js')}}"></script>

    <script src="{{ asset('Home/js/custom_form.js')}}"></script>

    <script src="{{ asset('Home/js/jquery.countdown.min.js')}}"></script>

    <script src="{{ asset('Home/js/slick.min.js')}}"></script>

    <script src="{{ asset('Home/js/responsive.js')}}"></script>

    <script src="{{ asset('Home/js/picturefill.min.js')}}"></script>

    <script src="{{ asset('Home/js/scripts.js')}}"></script>

        <script src="{{ asset('Home/js/opposhop.min.js')}}"></script>


            <script type="text/javascript">
    var vm;
    OPPO.conf.BASE_URL = '//www.opposhop.cn';
    OPPO.conf.STORE_URL = '//www.opposhop.cn';
    OPPO.conf.ACCOUNT_URL = '//my.oppo.com';
    OPPO.conf.WWW_URL = "//www.oppo.com/cn/";
    OPPO.conf.SSO_LOGIN_URL = "https://id.oppo.com/login";
    OPPO.conf.SSO_LOGOUT_URL = "https://id.oppo.com/logout";
    OPPO.conf.SSO_REGISTER_URL = "https://id.oppo.com/register/sms?type=1";
    OPPO.conf.date = '1492477223';
    
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
        var controllerNameWithAction = "HomeController@index".split('@');
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
    _optj.push(['_uid', '12439122']);

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
_utaq.push(["setTrackerUrl", utu+"site/unids.gif')}}"]);
_utaq.push(["setSiteId", "1351"]);
var utd=document, ut=utd.createElement("script"), s=utd.getElementsByTagName("script")[0]; ut.type="text/javascript";
ut.defer=true; ut.async=true; ut.src=utu+"adagent/js/uta.js"; s.parentNode.insertBefore(ut,s);
})();
</script>
<noscript><img src="{{ asset('Home/picture/fc8a6b618b1a45e7a61cead41c97d448.gif')}}" style="border:0" alt="" /></noscript> 

<!--听云监测-->
<script src="{{ asset('Home/js/tingyun-rum.js')}}"></script>

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
  </body>
</html>
<!-- cached at 2017-04-18 09:00:23 -->