<!-- {{ date_default_timezone_set('PRC') }} -->
@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">用户信息列表</h3>
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
	        	<form action='{{ url("admin/user") }}' method='post' name='myform'>
	        		{{ csrf_field() }}
	        		{{ method_field('DELETE') }}
	        	</form>

	        	<form action='{{ url("admin/user") }}' method='get'>
	        		<div class='medio-body'>
	    				姓名：<input type='text' class='form-control input-sm m-b-10' name='name'>
	    			</div>
	        		<div>
	        			性别：<select name='sex' class='form-control input-sm m-b-10'>
	        				<option value=''>--请选择--</option>
	        				<option value='1'>--男--</option>
	        				<option value='2'>--女--</option>
	        			</select>
	        		</div>
	        		<input type='submit' class='btn' value='搜索'>
	        	</form>
	            <table class="table table-bordered table-hover tile">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>呢称</th>
	                        <th>姓名</th>
	                        <th>QQ</th>
	                        <th>Phone</th>
	                        <th>Email</th>
	                        <th>地址</th>
	                        <th>注册时间</th>
	                        <th>性别</th>
	                        <th>操作</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($list as $v)
	                    	<tr>
		                        <td>{{ $v->id }}</td>
		                        <td>{{ $v->uname }}</td>
		                        <td>{{ $v->name }}</td>
		                        <td>{{ $v->qq }}</td>
		                        <td>{{ $v->phone }}</td>
		                        <td>{{ $v->email }}</td>
		                        <td>{{ $v->address }}</td>
		                        <td>{{ date('Y-m-d H:i:s',$v->rtime) }}</td> 
		                        <td>{{ ($v->sex == 1)?'男':'女' }}</td>
		                        <td>
		                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
		                        	<a class="btn btn-sm btn-alt m-r-5" href="{{ url('admin/user').'/'.$v->id }}/edit">修改</a>
		                        </td>
		                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	            {{ $list->appends($where)->links() }}
	        </div>
	    </div>
	    <script type="text/javascript">
	        function doDel(id){
	        	if(confirm('确定删除吗？')){
	        		var form = document.myform;
	        		form.action = '/admin/user/'+id;
	        		form.submit();
	        	}
	        }
	    </script>
@endsection