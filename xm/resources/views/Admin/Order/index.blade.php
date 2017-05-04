
@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">订单信息列表</h3>
		@if(session('msg'))
			<div class="alert alert-success alert-icon">
				{{ session('msg') }}
				<i class="icon"></i>
			</div>
		@endif
		@if(session('error'))
			<div class="alert alert-warning alert-icon">
				{{ session('error') }}
				<i class="icon"></i>
			</div>
		@endif
		<div class="table-responsive overflow">
	        	<form action='{{ url("admin/order") }}' method='post' name='myform'>
	        		{{ csrf_field() }}
	        		{{ method_field('DELETE') }}
	        	</form>

	        	<form action='{{ url("admin/order") }}' method='get'>
	        		<div class='medio-body'>
	    				订单编号：<input type='text' class='form-control input-sm m-b-10' name='id'>
	    			</div>
	        		<input type='submit' class='btn' value='搜索'>
	        	</form>
	            <table class="table table-bordered table-hover tile">
	                <thead>
	                    <tr>
	                        <th>ID订单编号</th>
	                        <th>订单状态</th>
	                        <th>支付方式</th>
	                        <th>商品数量</th>
	                        <th>商品价格</th>
	                        <th>订单金额</th>
	                        <th>操作</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($list as $v)
	                    	<tr>
		                        <td>{{ $v->id }}</td>
		                        <td>@if($v->state == 1)待发货@elseif($v->state == 2)已发货@elseif($v->state == 0)待付款@endif</td>
		                        <td>@if($v->payway == 1)在线支付@endif</td>
		                        <td>{{ $v->num }}</td>
		                        <td>{{ $v->money }}</td>
		                        <td>{{ ($v->money)*($v->num) }}</td>
		                        @if($v->state == 1 || $v->state == 2)
		                        <td>
		                        	<a class="btn btn-sm btn-alt m-r-5" href="{{ url('admin/order').'/'.$v->id }}/edit">详情</a>
		                        </td>
		                        @endif
		                        @if($v->state == 0)
		                        <td>
		                        	<a class="btn btn-sm btn-alt m-r-5" href="">提醒买家付款</a>
		                        </td>
		                        @endif
		                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	            {{ $list->appends($where)->links() }}
	        </div>
	    </div>
@endsection