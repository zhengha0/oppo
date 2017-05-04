@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">轮播图</h3>
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
	        	<form action='{{ url("admin/pic") }}' method='post' name='myform'>
	        		{{ csrf_field() }}
	        		{{ method_field('DELETE') }}
	        	</form>

	        	<form action='{{ url("admin/pic") }}' method='get'>
	        		<div class='medio-body'>
	    				图片名称：<input type='text' class='form-control input-sm m-b-10' name='picname'>
	    			</div>
	        		<input type='submit' class='btn' value='搜索'>
	        	</form>
	            <table class="table table-bordered table-hover tile">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>轮播图名称</th>
	                        <th>链接地址</th>
	                        <th>操作</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($list as $v)
	                    	<tr>
		                        <td>{{ $v->id }}</td>
		                        <td><img src="{{($v->picname)?url('/Admin/upload').'/'.$v->picname:url('/Admin/upload').'/1.jpg'}} " width='100px' height='100px'></td>
		                        <td>{{ $v->piclink }}</td>
		                        <td>
		                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
		                        	<a class="btn btn-sm btn-alt m-r-5" href="{{ url('admin/pic').'/'.$v->id }}/edit">修改</a>
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
	        		form.action = '/admin/pic/'+id;
	        		form.submit();
	        	}
	        }
	    </script>
@endsection