@extends('Home.base.parent')
@section('content');
      <main class="main-content user">
    <div class="wrapper">
      <ul class="breadcrumb">
  <li>
    <a href="http://www.oppo.com/cn/">
      首页
      <span>/</span>
    </a>
  </li>
            <li>
                  配送地址
              </li>
      </ul>


      @if(session('msg'))
       <script>

        alert("{{ session('msg') }}");
       </script>
      

        @endif
        @if(session('error'))
          <div class="alert alert-warning alert-icon">
      {{ session('error') }}
      <i class="icon"></i>
      </div>
       @endif
      <div class="myOppo-menu">
  <h1 class="h-gamma">账户信息</h1>
  <ul class="navigation">
    <li class="">
      <a href="#####">我的订单</a>
    </li>
    <li>
      <a href="{{ url('home/address') }}">配送地址</a>
    </li>
    <!-- .'/'.session("adminuser")->id  -->
    <li  class="is-active">
      <a href="{{ url('home/myy') }}">账户信息</a>
    </li>
  </ul>
</div>
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
      <form class="g" action="" method='post'>
       {{ csrf_field() }}
        <div class="gi one-whole">
          <div class="brick-shadow">
             <div class="js-content address-form-new" style="display: block;">
              <div id="address-create" class="g">

              <div style="width:1050;height:50px;line-height:50px;color:#009B72">
                <span style="font-size:25px;font-weight:bold">*OPPO账号: </span><span style="font-size:20px">{{ $list->uname }}</span>
              </div>
              <div style="width:1050;height:50px;line-height:50px;color:#009B72">
                <span style="font-size:25px;font-weight:bold">*真实姓名:  </span><span style="font-size:20px">{{ $list->name }}</span>
              </div>
              <div style="width:1050;height:50px;line-height:50px;color:#009B72">
                <span style="font-size:25px;font-weight:bold">*手机号码: </span><span style="font-size:20px">{{ $list->phone }}</span>
              </div>
              <div style="width:1050;height:50px;line-height:50px;color:#009B72">
                <span style="font-size:25px;font-weight:bold">*QQ: </span><span style="font-size:20px">{{ $list->qq }}</span>
              </div>
              <div style="width:1050;height:50px;line-height:50px;color:#009B72">
                <span style="font-size:25px;font-weight:bold">*Email: </span><span style="font-size:20px">{{ $list->email }}</span>
              </div>



             <!--  <div class="gi field lap-one-whole desk-one-quarter" style="float:left;margin-right:100px;border:1px solid #009B72;height:50px;line-height:50px;color:#009B72">
                <label>*OPPO账号: {{ session("adminuser")->uname }}</label>
               
              </div>
              
              <div class="g">
                <div class="gi field lap-one-whole desk-one-quarter"style="float:left;margin-right:100px;border:1px solid #009B72;height:50px;line-height:50px;color:#009B72">
                  <label>*手机号码: {{ session("adminuser")->phone }}</label>
                </div>
              </div>
               <div class="g">
                <div class="gi field lap-one-whole desk-one-quarter" style="float:left;margin-right:100px;border:1px solid #009B72;height:50px;line-height:50px;color:#009B72">
                  <label>*QQ: {{ session("adminuser")->qq }}</label>
                </div>
              </div>

               <div class="g">
                <div class="gi field lap-one-whole desk-one-quarter" style="float:left;margin-right:100px;border:1px solid #009B72;height:50px;line-height:50px;color:#009B72">
                  <label>*Email: {{ session("adminuser")->email }}</label>
                </div>
              </div> -->
              
              <!-- <div class="form-actions" style="clear:both">
                <div class="pull-left">
                  <a class="button-light pull-left address-store" href="######">保存</a>
                  
                  <a class="button-light pull-left address-new-cancel" href="#######">取消</a>
                  <input type="submit" class="button-light pull-left address-store" value='修改信息'>
                </div>
              </div> -->
            </div>
            </div>
          </div>
        </div>
      </form>
  <ul class="navigation">
    <li>
      <a href="{{ url('home/myy').'/'.session("adminuser")->id }}/edit" style="margin-left:12px;color:#009B72;font-size:28px">修改信息</a>
    </li>
  </ul>
    </div>
  </main>
@endsection  