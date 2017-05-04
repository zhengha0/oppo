<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Super Admin Responsive Template</title>
            
        <!-- CSS -->
        <link href="{{ asset('Admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/calendar.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/icons.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/generics.css') }}" rel="stylesheet"> 
    </head>
    <body id="skin-blur-violate">

        <header id="header" class="media">
            <a href="" id="menu-toggle"></a> 
            <a class="logo pull-left" href="index.html">系统管理员</a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    <div class="pull-left tm-icon">
                        <a data-drawer="messages" class="drawer-toggle" href="">
                            <i class="sa-top-message"></i>
                            <i class="n-count animated">5</i>
                            <span>Messages</span>
                        </a>
                    </div>
                    <div class="pull-left tm-icon">
                        <a data-drawer="notifications" class="drawer-toggle" href="">
                            <i class="sa-top-updates"></i>
                            <i class="n-count animated">9</i>
                            <span>Updates</span>
                        </a>
                    </div>

                    

                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
                    </div>
                    
                    <div class="media-body">
                        <input type="text" class="main-search">
                    </div>
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
            <aside id="sidebar">
                
                <!-- Sidbar Widgets -->
                <div class="side-widgets overflow">
                    <!-- Profile Menu -->
                    <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                        <a href="" data-toggle="dropdown">
                            <img class="profile-pic animated" src="{{ asset('Admin/img/profile-pic.jpg') }}" alt="">
                        </a>
                        <ul class="dropdown-menu profile-menu">
                            <li><a href="">My Profile</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Settings</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="{{ url('admin/over') }}">Sign Out</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                        </ul>
                        <h4 class="m-0">{{ session("admin")->name }}</h4><br>
                        <h4 class="m-0">{{ (session("admin")->pw == 1)?'管理员':'超级管理员' }}</h4>
                        
                    </div>
                    
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Feeds -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                           News Feeds
                        </h2>
                        
                        <div class="s-widget-body">
                            <div id="news-feed"></div>
                        </div>
                    </div>
                    
                    <!-- Projects -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                            Projects on going
                        </h2>
                        
                        <div class="s-widget-body">
                            <div class="side-border">
                                <small>Joomla Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="progress-bar tooltips progress-bar-danger" style="width: 60%;" data-original-title="60%">
                                          <span class="sr-only">60% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Opencart E-Commerce Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-info" style="width: 43%;" data-original-title="43%">
                                          <span class="sr-only">43% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Social Media API</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-warning" style="width: 81%;" data-original-title="81%">
                                          <span class="sr-only">81% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>VB.Net Software Package</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 10%;" data-original-title="10%">
                                          <span class="sr-only">10% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Chrome Extension</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 95%;" data-original-title="95%">
                                          <span class="sr-only">95% Complete</span>
                                     </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
                    <li class="active">
                        <a class="sa-side-home" href="{{ url('/admin/demo3') }}">
                            <span class="menu-item">首页</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-home" href="">
                            <span class="menu-item">管理员</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="{{ url('/admin/demo4') }}">显示管理员</a></li>
                            <li><a href="{{ url('/admin/demo4/create') }}">添加管理员</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">用户评价管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="{{ url('admin/comment') }}">显示评价信息</a></li>
                            <li><a href="{{ url('admin/comment/create') }}">添加评价</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-chart" href="">
                            <span class="menu-item">订单地址管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="{{ url('admin/address') }}">显示地址信息</a></li>
                            <li><a href="{{ url('admin/ajaxdemo') }}">添加地址</a></li>
                       
                        </ul>
                    </li>
                     <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">网站配置管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/conf">显示网站配置</a></li>
                            <li><a href="/admin/conf/create">添加配置</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">商品分类</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/category">显示商品分类</a></li>
                            <li><a href="/admin/category/create">添加分类</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">商品详情</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/goods">显示商品列表</a></li>
                            <li><a href="/admin/goods/create">添加商品</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-ui" href="">
                            <span class="menu-item">用户管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/user">显示用户信息</a></li>
                            <li><a href="/admin/user/create">添加用户</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a class="sa-side-ui" href="">
                            <span class="menu-item">友情链接</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/flink">显示友情链接</a></li>
                            <li><a href="/admin/flink/create">添加友情链接</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="sa-side-ui" href="">
                            <span class="menu-item">公告管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/notice">显示公告</a></li>
                            <li><a href="/admin/notice/create">添加公告</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-ui" href="">
                            <span class="menu-item">订单管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/order">显示订单信息</a></li>
                           
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-ui" href="">
                            <span class="menu-item">轮播图管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/pic">显示轮播图信息</a></li>
                            <li><a href="/admin/pic/create">添加轮播图</a></li>
                        </ul>
                    </li>
                </ul>

            </aside>
        
            <!-- Content -->
            <section id="content" class="container">
                @yield('content')
            </section>

            <!-- Older IE Message -->
            <!--[if lt IE 9]>
                <div class="ie-block">
                    <h1 class="Ops">Ooops!</h1>
                    <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                    <ul class="browsers">
                        <li>
                            <a href="https://www.google.com/intl/en/chrome/browser/">
                                <img src="{{ asset('Admin/img/browsers/chrome.png') }}" alt="">
                                <div>Google Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.mozilla.org/en-US/firefox/new/">
                                <img src="{{ asset('Admin/img/browsers/firefox.png') }}" alt="">
                                <div>Mozilla Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com/computer/windows">
                                <img src="{{ asset('Admin/img/browsers/opera.png') }}" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://safari.en.softonic.com/">
                                <img src="{{ asset('Admin/img/browsers/safari.png') }}" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                                <img src="{{ asset('Admin/img/browsers/ie.png') }}" alt="">
                                <div>Internet Explorer(New)</div>
                            </a>
                        </li>
                    </ul>
                    <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
                </div>   
            <![endif]-->
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="{{ asset('Admin/js/jquery.min.js') }}"></script> <!-- jQuery Library -->
        <script src="{{ asset('Admin/js/jquery-ui.min.js') }}"></script> <!-- jQuery UI -->
        <script src="{{ asset('Admin/js/jquery.easing.1.3.js') }}"></script> <!-- jQuery Easing - Requirred for Lightbox + Pie Charts-->

        <!-- Bootstrap -->
        <script src="{{ asset('Admin/js/bootstrap.min.js') }}"></script>

        <!-- Charts -->
        <script src="{{ asset('Admin/js/charts/jquery.flot.js') }}"></script> <!-- Flot Main -->
        <script src="{{ asset('Admin/js/charts/jquery.flot.time.js') }}"></script> <!-- Flot sub -->
        <script src="{{ asset('Admin/js/charts/jquery.flot.animator.min.js') }}"></script> <!-- Flot sub -->
        <script src="{{ asset('Admin/js/charts/jquery.flot.resize.min.js') }}"></script> <!-- Flot sub - for repaint when resizing the screen -->

        <script src="{{ asset('Admin/js/sparkline.min.js') }}"></script> <!-- Sparkline - Tiny charts -->
        <script src="{{ asset('Admin/js/easypiechart.js') }}"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="{{ asset('Admin/js/charts.js') }}"></script> <!-- All the above chart related functions -->

        <!-- Map -->
        <script src="{{ asset('Admin/js/maps/jvectormap.min.js') }}"></script> <!-- jVectorMap main library -->
        <script src="{{ asset('Admin/js/maps/usa.js') }}"></script> <!-- USA Map for jVectorMap -->

        <!--  Form Related -->
        <script src="{{ asset('Admin/js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->

        <!-- UX -->
        <script src="{{ asset('Admin/js/scroll.min.js') }}"></script> <!-- Custom Scrollbar -->

        <!-- Other -->
        <script src="{{ asset('Admin/js/calendar.min.js') }}"></script> <!-- Calendar -->
        <script src="{{ asset('Admin/js/feeds.min.js') }}"></script> <!-- News Feeds -->
        

        <!-- All JS functions -->
        <script src="{{ asset('Admin/js/functions.js') }}"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                /* Tag Select */
                (function(){
                    /* Limited */
                    $(".tag-select-limited").chosen({
                        max_selected_options: 5
                    });
                    
                    /* Overflow */
                    $('.overflow').niceScroll();
                })();
                
                /* Input Masking - you can include your own way */
                (function(){
                    $('.mask-date').mask('00/00/0000');
                    $('.mask-time').mask('00:00:00');
                    $('.mask-date_time').mask('00/00/0000 00:00:00');
                    $('.mask-cep').mask('00000-000');
                    $('.mask-phone').mask('0000-0000');
                    $('.mask-phone_with_ddd').mask('(00) 0000-0000');
                    $('.mask-phone_us').mask('(000) 000-0000');
                    $('.mask-mixed').mask('AAA 000-S0S');
                    $('.mask-cpf').mask('000.000.000-00', {reverse: true});
                    $('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
                    $('.mask-money2').mask("#.##0,00", {reverse: true, maxlength: false});
                    $('.mask-ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation: {'Z': {pattern: /[0-9]/, optional: true}}});
                    $('.mask-ip_address').mask('099.099.099.099');
                    $('.mask-percent').mask('##0,00%', {reverse: true});
                    $('.mask-credit_card').mask('0000 0000 0000 0000');
                })();
                
                /* Spinners */
                (function(){
                    //Basic
                    $('.spinner-1').spinedit();
                    
                    //Set Value
                    $('.spinner-2').spinedit('setValue', 100);
                    
                    //Set Minimum                    
                    $('.spinner-3').spinedit('setMinimum', -10);
                    
                    //Set Maximum                    
                    $('.spinner-4').spinedit('setMaxmum', 100);
                    
                    //Set Step
                    $('.spinner-5').spinedit('setStep', 10);
                    
                    //Set Number Of Decimals
                    $('.spinner-6').spinedit('setNumberOfDecimals', 2);
                })();
            });
        </script>
    </body>
</html>
