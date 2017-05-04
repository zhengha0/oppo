@extends('Home.base.parent')
@section('content') 
<main class='main-content slab-white'>
        <div class='full-carousel slick-dot-circle'>
      <div class='hero slick-slide'>
  <div class='hero-image center'>
      <a  href='http://hd.oppo.com/act/2017/0418/index.html' target='_blank' title=''>
    <picture>
      <!--[if IE 9]> <video style="display: none;"> <![endif]-->
      <source media='(min-width: 990px)' srcset='//static.oppo.com/archives/201704/2017041703044158f4722d6be3d.jpg")}}' />
      <source media='(min-width: 750px)' srcset='//static.oppo.com/archives/201704/2017041703044558f47231b0dae.jpg")}}' />
      <source media='(min-width: 300px)' srcset='picture/2017041703044958f47235a06a9.jpg")}}' />
      <!--[if IE 9]> </video> <![endif]-->
      <img alt='' title='' src='{{ asset("Home/picture/2017041703044958f47235a06a9.jpg")}}'  srcset='//static.oppo.com/archives/201704/2017041703044158f4722d6be3d.jpg")}}'>
    </picture>
    </a>
  </div>
</div>
    </div>
    

   
   <section class='brick-m'>
  
      <div class='wrapper'>
     
       <div class='grid-special equalize top-bar'>@foreach($list as $v)
<div class='box '>
  <a target='_blank' href="{{ url('home/goodsdet').'/'.$v->id }}" title="">
    <div class='box-photo'>
        <img alt='' title="R9s  限量版开售" src='/admin/upload/{{ $v->logo }}'>
    </div>
        <h2 class='box-heading'>
          <a target='_blank' href="{{ url('home/goodsdet').'/'.$v->id }}" title="R9s  限量版开售">{{ $v->sname }}</a>
        </h2>
    <div class='box-details'>
    <p class='box-price'>
          <span class='normal'>&nbsp;</span>
          <strong>￥{{ $v->money }}</strong>
    </p>
    </div>
    <i class="ribbon  ribbon-new   "></i>
    <!-- 折扣、促销标签
    <div class='box-features'></div> -->
  </a>
  </div>
  
  @endforeach
 
  
    <section class='brick-s grid-one'>
      <div class="wrapper">
        <picture>
          <!--[if IE 9]> <video style="display: none;"> <![endif]-->
          <source media='(min-width: 990px)' srcset='//shopfs.myoppo.com/shop/assets/images/content/others/services.png?20170210101314' />
          <source media='(min-width: 750px)' srcset='//shopfs.myoppo.com/shop/assets/images/content/others/sercices_1080x321.jpg")}}' />
          <source media='(min-width: 300px)' srcset='picture/sercices_1080x530.png")}}' />
          <!--[if IE 9]> </video> <![endif]-->
          <img src='{{ asset("Home/picture/sercices_1080x530.png")}}' srcset='//shopfs.myoppo.com/shop/assets/images/content/others/services.png'>
        </picture>
      </div>
    </section>
</main>
@endsection