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
           <script>
           alert("{{ session('error') }}");
            </script>
          <i class="icon"></i>
          </div>
       @endif
      <div class="myOppo-menu">
  <h1 class="h-gamma">配送地址</h1>
  <ul class="navigation">
    <li class="">
      <a href="http://www.opposhop.cn/orders">我的订单</a>
    </li>
    <li class="is-active">
      <a href="http://www.opposhop.cn/user/addresses">配送地址</a>
    </li>
    <li class="">
      <a href="http://www.opposhop.cn/coupons/show">优惠券</a>
    </li>
    <li>
      <a href="{{ url('home/my') }}">账户信息</a>
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
      <form action='{{ url("home/address") }}' method='post' name='myform'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          </form>
      <form class="g" action="{{ url('home/address') }}" method='post'>
       {{ csrf_field() }}
       <!-- <input type="hidden" value="{{ session('adminuser')->id }}"> -->
        <div class="gi one-whole">
          <div class="brick-shadow">
            <div class="radio-title">
              
            </div>
                  <div class="content">
                  </div>

                <div class="g address-form-content">
                  <table style="width:1050px;height:">

                      @foreach($list as $v)
                     
                        <tr style="height:60px;border:1px solid #999;color:#999;">
                            <th>{{ $v->consignee }}</th>
                            <th>{{ $v->phone }}</th>
                            <th  style="width:200px">{{ $v->detail }}</th>
                            <th>
                              <a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
                              <a class="btn btn-sm btn-alt m-r-5" href="{{ url('admin/address').'/'.$v->id }}/edit">修改</a>
                            </th> 
                        </tr>
                        @endforeach
                  </table>
                </div>

            <a class="button-light field" id="address_new" href="javascript:;">添加新地址</a>
            <div class="js-content address-form-new" style="display: block;">
              <div id="address-create" class="g">

        <div class="gi field lap-one-whole desk-one-quarter">
          <label>*收货人姓名</label>
          <input name="consignee" type="text">
        </div>
        <div class="g">
          <div class="gi field lap-one-whole desk-one-quarter">
            <label>*手机号码</label>
            <input name="phone" type="text">
          </div>
        </div>

        <div class="g">
          <div class="gi field lap-one-whole desk-one-quarter">
            <label>*id</label>
            <input name="uid" type="text" value="{{ session('adminuser')->id }}">
          </div>
        </div>
      <div class="g field">
        <label>*收货地址</label>
      
        <div class="g">
          <div class="gi desk-two-thirds one-whole">
            <input class="address-detail" name="detail" placeholder="详细街道地址" type="text">
          </div>
        </div>
      </div>
        <div class="form-actions">
          <div class="pull-left">
           <!--  <a class="button-light pull-left address-store" href="######">保存</a>
            
            <a class="button-light pull-left address-new-cancel" href="#######">取消</a> -->
            <input type="submit" class="button-light pull-left address-store" value='提交'>
          </div>
        </div>
      </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
  <script type="text/javascript">
    function doDel(id){
      if(confirm('确定删除吗？')){
        var form = document.myform;
        form.action = '/home/address/'+id;
        form.submit();
      }
    }
  </script>
@endsection   