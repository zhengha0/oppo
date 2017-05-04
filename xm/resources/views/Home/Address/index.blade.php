@extends('Home.base.parent')
@section('content');
<script src="{{ asset('Home/js/opposhop.js') }}"></script>
<main class="main-content user">
  <div class="wrapper">
    <ul class="breadcrumb">
        <li>
          <a href="http://www.oppo.com/cn/">
            首页
            <span>/</span>
          </a>
        </li>
            <li> 配送地址</li>            
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
  <h1 class="h-gamma">配送地址</h1>
  <ul class="navigation">
    <li class="">
      <a href="{{ url('home/order').'/'.session('adminuser')->id }}">我的订单</a>
    </li>
    <li class="is-active">
      <a href="{{ url('home/address') }}">配送地址</a>
    </li>
    <!-- .'/'.session("adminuser")->id  -->
    <li>
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
       <form action='{{ url("home/address") }}' method='post' name='myform'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          </form>
      <form class="g" action="{{ url('home/address') }}" method='post'>
       {{ csrf_field() }}
        <div class="gi one-whole">
          <div class="brick-shadow">
            <div class="radio-title">
              
            </div>
                  <div class="content">
                  </div>
                @if(session("adminuser"))
                <div class="g address-form-content">
                  <table style="width:1050px;height:">
						<tr style="height:60px;border:1px solid #009B72;color:#009B72;">
							<th style="width:150px">收货人:</th>
							<th style="width:200px">收货人手机:</th>
							<th style="width:450px">收货地址:</th>
							<th style="width:100px">操作:</th>
						</tr>

                      @foreach($list as $v)
                        @if($v->uid == session("adminuser")->id)
                        <tr style="height:60px;border:1px solid #999;color:#999;">
                            <th style="width:200px;algin:left">{{ $v->consignee }}</th>
                            <th style="width:300px">{{ $v->phone }}</th>
                            <th style="width:450px">{{ $v->detail }}</th>
                            <th style="width:100px">
                              <a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
                              <a class="btn btn-sm btn-alt m-r-5" href="{{ url('home/address').'/'.$v->id }}/edit">修改</a>
                            </th> 
                        </tr>
                        @endif
                        @endforeach
                  </table>
                </div>
                @endif
            <a class="button-light field" id="address_new" href="javascript:;" style="margin-top:20px">添加新地址</a>
            <a class="button-light field" href="javascript:history.go(-1);">&lt;返回订单</a>
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
        @if(session("adminuser"))
        <div class="g" style="display:none">
          <div class="gi field lap-one-whole desk-one-quarter">
            <label>*id</label>
            <input name="uid" type="text" value="{{ session('adminuser')->id }}">
          </div>
        </div>
        @endif
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