@extends('Home.base.parent')
@section('content')

  <main class="main-content">
  <section class='full-carousel slick-dot-circle'>
      <div class='hero slick-slide'>
      <div class='hero-image center'>
        <a  href='http://hd.oppo.com/act/2017/0418/index.html' target='_blank' title=''>
          <picture>
          <!--[if IE 9]> <video style="display: none;"> <![endif]-->
          <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201704/2017041703044958f471f948388.jpg' />
          <source media='(min-width: 750px)' srcset='//static.oppo.com/archives/201704/2017041703042458f4721c62c73.jpg' />
          <source media='(min-width: 300px)' srcset='picture/2017041703045958f472037fd3d.jpg' />
          <!--[if IE 9]> </video> <![endif]-->
          <img alt='' title='' src='picture/2017041703045958f472037fd3d.jpg' srcset='//static.oppo.com/archives/201704/2017041703044958f471f948388.jpg'>
          </picture>
        </a>
      </div>
      </div>
      <div class='hero slick-slide'>
      <div class='hero-image center'>
        <a  href='http://www.opposhop.cn/products/391.html?utm_source=shouye&utm_medium=banner01' target='_blank' title=''>
          <picture>
          <!--[if IE 9]> <video style="display: none;"> <![endif]-->
          <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201704/2017040106044858df7bf44001e.jpg' />
          <source media='(min-width: 750px)' srcset='//static.oppo.com/archives/201704/2017040106045558df7bfb03983.jpg' />
          <source media='(min-width: 300px)' srcset='picture/2017040106045758df7bfd8557d.jpg' />
          <!--[if IE 9]> </video> <![endif]-->
          <img alt='' title='' src='picture/2017040106045758df7bfd8557d.jpg' srcset='//static.oppo.com/archives/201704/2017040106044858df7bf44001e.jpg'>
         </picture>
        </a>
      </div>
      </div>
      <div class='hero slick-slide'>
      <div class='hero-image center'>
        <a  href='http://www.opposhop.cn/products/397.html?utm_source=shouye&utm_medium=banner02' target='_blank' title=''>
          <picture>
          <!--[if IE 9]> <video style="display: none;"> <![endif]-->
          <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201704/2017040106043658df7b70e1104.jpg' />
          <source media='(min-width: 750px)' srcset='//static.oppo.com/archives/201704/2017040106043958df7b73d54c2.jpg' />
          <source media='(min-width: 300px)' srcset='picture/2017040106044558df7b798016c.jpg' />
          <!--[if IE 9]> </video> <![endif]-->
          <img alt='' title='' src='picture/2017040106044558df7b798016c.jpg' srcset='//static.oppo.com/archives/201704/2017040106043658df7b70e1104.jpg'>
         </picture>
        </a>
      </div>
      </div>
  </section>
  <section class="brick-feature">

      <div style="width:100%;">
      <style type="text/css">
      
      #playbox{
        position:relative;
      }
      .mid{
        display:none;
      }
      #iconbox{
        position:absolute;
        right:20px;
        bottom:10px;
      }
      
      .lid{
        width:25px;
        height:25px;
        background:#999;
        color:#fff;
        margin-right:5px;
        text-align:center;
        border-radius:50px;
        line-height:25px;
        float:left;
        cursor:pointer;
      }
    </style>
    <div id='playbox' style="">
    @foreach($list as $v)
      <img class='mid' style='display:block;height:450px' src="/admin/upload/{{ $v->picname }}" >
     @endforeach
      <div id='iconbox' style=''>
        <ul style="list-style:none;" >
          
          @foreach($list as $v)
          <li class='lid' style='background-color:orange'>{{ $v->piclink }}</li>
          @endforeach
          
        </ul>
      </div>
    </div>
  <script type="text/javascript">
    // var imgs = document.getElementsByName('mid');
    // var lib = document.getElementsByName('lid');
    var imgs = $(".mid");
    var lib = $(".lid");
    var playbox = document.getElementById("playbox");
    // 初始化需要显示的图片的索引
    var m = 1;
    var a = imgs.length-1;
    var mytime = setInterval(run,2000);
    for (var i = 0; i < lib.length; i++) {
      //相当于fun(i),自己调用自己再给自己传参
      (function(j){
        //鼠标移入小图标
        lib[j].onmouseover = function()
        {
          controImg(j);
          controIcon(j);
          m = j+1;
        }
      })(i);
    }
    //开始轮播
    function run()
    {
      if(m > a){
        m = 0;
      }

      controImg(m);
      controIcon(m);
      m++;
    }

    // 显示图片
    function controImg(n)
    {
      for (var i = 0; i < imgs.length; i++) {
        imgs[i].style.display = 'none';
      }
      imgs[n].style.display = 'block';
    }

    // 小图片
    function controIcon(n)
    {
      for (var i = 0; i < lib.length; i++) {
        lib[i].style.background = '#999';
      }
      lib[n].style.background = 'orange';
    }
    playbox.onmouseover = function()
    {
      clearInterval(mytime);
    }

    playbox.onmouseout = function()
    {
      mytime = setInterval(run,2000);
    }
  </script>
</div>
    <div style="width:100%;height:60px">
    <ul style="list-style:none;">
    <li class="fl s1" style="float:left;">
        <div id="gg_unlogin" class="i-mall-prompt clearfix">
            <div class="fl pdl-20">
                <font id='myfont' size='5'></font>
                     
            </div>
        </div>
    </li>
	</ul>
	
	<div align="center">
	公告∩：
	<table border="0" width="206" cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="60" bordercolor="" id="table1">
		<tr>
			<td valign="top"><MARQUEE onmouseover=this.stop() onmouseout=this.start() scrollAmount=1 scrollDelay=100 direction=up height="50px">
		<TABLE cellSpacing=0 cellPadding=0 width="95%" align=center border=0>
		<TBODY>
		<TR>
			<TD vAlign=top height=60>
			
			@foreach($gg as $k)
			@if($k->type == 0)
			<font color='red'>·<a title="{{ $k->title }}" href="#" >{{ $k->content }}</a></font><BR>
			@else
			<font color='66cc00'>·<a title="{{ $k->title }}" href="#" >{{ $k->content }}</a></font><BR>
			@endif
			@endforeach
			
			</TD>
		</TR></TBODY></TABLE></MARQUEE></td>
		</tr>
	</table>
	</div>
    </div>

      <div class="g g-wrapper-s">
          <div class="gi lap-one-third">
        <div class='feature-product'>
  <a href='http://www.opposhop.cn/?utm_source=shouye&utm_medium=minibanner01' target='_blank'>
    <img alt='OPPO商城' title="OPPO商城" class='feature-product-image' src='picture/2017041210044458ed9118013af.jpg'>
    <div class='feature-product-content'>
      <h2 class='feature-product-heading'></h2>
      <p class='feature-product-description'>
        <strong></strong>
      </p>
    </div>
  </a>
</div>
      </div>
          <div class="gi lap-one-third">
        <div class='feature-product'>
  <a href='http://www.oppo.com/cn/blogs/video' target='_blank'>
    <img alt='OPPO社区' title="OPPO社区" class='feature-product-image' src='picture/2017041301044058ef10fcb8c22.jpg'>
    <div class='feature-product-content'>
      <h2 class='feature-product-heading'></h2>
      <p class='feature-product-description'>
        <strong></strong>
      </p>
    </div>
  </a>
</div>
      </div>
          <div class="gi lap-one-third">
        <div class='feature-product'>
  <a href='http://www.oppo.cn/thread-75435442-1' target='_blank'>
    <img alt='高能少年团' title="高能少年团" class='feature-product-image' src='picture/2017041107040058ecc360abc6e.jpg'>
    <div class='feature-product-content'>
      <h2 class='feature-product-heading'></h2>
      <p class='feature-product-description'>
        <strong></strong>
      </p>
    </div>
  </a>
</div>
      </div>
      </div>
    </section>
              </main>

<script>
	// 找对象
	var myfont = document.getElementById('myfont');
	var msg = "欢迎来到OPPO商城，请登录注册，即可享受";

	function start(num,str){
		// 截取字符串 从0到num
		var tmp = str.substr(0,num); // 
		// alert(tmp);
		// <font red>j</font>
		tmp += '<font color="red">'+ str[num] +'</font>'; 
		tmp += str.substr(num + 1);
		// <font>j</font>avascript文字跑马灯
		return tmp;
		/*
		alert(tmp);
		document.write(tmp);
		*/
	}
	//start(2,msg);
	var i = 0;
	setInterval(function(){
		// 0 	 'javascript文字跑马灯'
		myfont.innerHTML = start(i,msg);
		i++;
		if( i >= msg.length){
			i = 0;
		}
	},100);
</script>
 @endsection
