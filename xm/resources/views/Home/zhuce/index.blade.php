<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <title>『OPPO帐号』-注册</title>
    <meta name="keywords" content=" OPPO帐号,登录,注册,找回密码,OPPO账号,OPPO会员" /> 
    <meta name="description" content="登录OPPO帐号，可以在OPPO官网、社区、软件商店、游戏中心、主题商店等享受更多功能服务。 " />
    <link rel="stylesheet" href="{{ asset('Home/dlpic/js/common.css;JSESSIONID=c6798728-76f2-4179-a791-7b1eb3c8ddbf?r=20161011') }}" />
        <style>
            input:-webkit-autofill+label{display:none;}
            input:-moz-autofill+label{display:none;}
        </style>
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
    <link rel="stylesheet" href="css/common.css?r=20160815" />
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?dab8ebc7a6ef7a5ec81d04159d20faa6";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>
<div class="wrapper">
    <div class="header">  
        <div class="w960">    
             <ul class="menu_sec">
                <li><a href="http://www.oppo.com">OPPO官网</a></li>
                <li><a href="http://www.oppo.cn/">OPPO社区</a></li>
                <li><a href="http://www.coloros.com/">ColorOS</a></li>
                <div class="clear"></div>
            </ul>   
            <div class="clear"></div> 
        </div>
    </div>
    <div class="register_area">       
        <div class="register_title">注册OPPO帐号</div>
        <!--主体注册框-->
        <form  class="register_form" id="sms_form" action="{{ url('home/zhuce') }}" method="post" onsubmit="return checkSms()" name="myform">
             {{ csrf_field() }}
            <div class="input_area">
                请输入用户名:<input type="text" name="uname" autocomplete="off"/>
            </div>
            <div class="error_tip" id="info_mobile"></div>
            <div class="input_area">
                请输入密码:<input type="password" name="password" autocomplete="off"/>
            </div>
             <div class="error_tip" id="info_mobile1"></div>
            <div class="input_area">
                请确认密码:<input type="password" name="passwordt" autocomplete="off"/>
            </div>
             <div class="error_tip" id="info_mobile2"></div>
            <div class="col-lg-4">
                    <input type="hidden" class="form-control m-b-10" placeholder="请输入注册时间" value="{{ time() }}" name='rtime'>
            </div>

            <span id='sbb' onclick='fun()' style="display:none"></span>

            <div class="field">
                <div class="fl">
                    <label id="forCheckBox" for="isaccept" onclick="changeCheckbox1()" class="checkBoxLabel choosed"></label>
                    <label id="checkBoxLabel1">已阅读并同意<a class="agree_link" href="http://uc.oppomobile.com/usercenter/document/340/register_simple.html" target="_blank">《OPPO帐号注册协议》</a></label>
                </div>
                <div class="clear"></div>
            </div>
            <div class="error_tip" id="info_accept"></div>
            <input type="submit" class="button login_button" id="smsBtn" value="立即注册" style="margin-top:22px" />
            <div class="error_tip1" id="info_sms_form"></div>
        </form>
    </div>
    <div class="footer_info">
         <p>© 2005 - 2017 东莞市永盛通信科技有限公司 版权所有 粤ICP备08130115号-1</p>
     </div>
</div>
<input type="hidden" value="other/captcha" id="captchaUrl"/>
<script src="{{ asset('Home/zcpic/js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('Home/zcpic/js/register.js?r=20160713') }}" ></script>
 <script>
    var u=(function getData(){
        var url=window.location.href;
        if (url.indexOf("?") != -1) {
            var url_info=url.split("?")[1];
            var arr_info=url_info.split("&");
            var url_obj={};
            for(var i=0;i<arr_info.length;i++){
                url_obj[arr_info[i].split("=")[0]]=arr_info[i].split("=")[1];
            }
            return url_obj;
        }else{
            return {};
        }
    })()
    $(document).ready(function(){
        if (u.callback && $("#source").val()=='') {
            $("#source").val(u.callback);
        }
        var code = $("#errorCode").val();
        var errMsg =  $("#errorMsg").val();
        switch (code){
                case "2009":
                    showinfo("info_vercode", "验证码错误", 1);
                    break;
                case "3004":
                    showinfo("info_mobile", "手机号已注册", 1);
                    break;
                case "3016":
                    showinfo("info_vercode", "验证时间间隔太短", 1);
                    break;
                case "3017":
                    showinfo("info_vercode", "今日验证次数已达上限", 1);
                    break;
                default:
                    showinfo("info_sms_form", errMsg, 1);
                    break;
            }
    });
</script>
</body>
</html>
<script type="text/javascript" src="{{ asset('Home/js/jquery-1.8.3.min.js') }}"></script>
    <script type="text/javascript">
        $('input[name="passwordt"]').focus(function(){
            //把input后面的span提示删除
            $(this).next('span').remove();
        }).blur(function(){
            //获取用户输入的用户名
            var v = $(this).val();
            var pass = $('input[name="password"]').val();
            if(pass != v){
                alert('密码不一致');
            }
           
        });


        $('input[name="uname"]').blur(function(){

            var v = $(this).val();

            if(!v){
                alert('请输入用户名');
            }
        });

        function fun()
        {
            // document.getElementById('btn');
            //给焦点
            document.myform.uname.focus();
        }
        // 模拟点击
        document.getElementById('sbb').click();
    </script>