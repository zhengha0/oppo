@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">类别信息列表</h3>
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
        	<form action='{{ url("admin/goods") }}' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>

        	<form action='{{ url("admin/goods") }}' method='get'>
        		<div class='medio-body'>
    				类别名：<input type='text' class='form-control input-sm m-b-10' name='sname'>
    			</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>分类pid</th>
                        <th>商品名字</th>
                        <th>商品描述</th>
                        <th>商品logo</th>
                        <th>商品价</th>
                        <th>商品货号</th>
                        <th>商品尺寸</th>
                        <th>商品状态</th>
                        <th>发布时间</th>
                        <th>库存数</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
                            <td>{{ $v->fname }}</td>
	                        <td>{{ $v->sname }}</td>
	                        <td>{{ $v->content }}</td>
                            <td> <img src="{{($v->logo)?url('/Admin/upload').'/'.$v->logo:url('/Admin/upload').'/1.jpg'}} " width='100px' height='100px'> </td>
                            <td>{{ $v->money }}</td>
                            <td>{{ $v->mark }}</td>
                            <td>{{ $v->weight }}</td>
                            <td>{{ ($v->state == 1)?'上架':'下架' }}</td>
                            <td>{{ date('Y-m-d H:i:s',$v->time) }}</td>
                            <td>{{ $v->num }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="{{ url('admin/goods').'/'.$v->id }}/edit">修改</a>
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
        		form.action = '/admin/goods/'+id;
        		form.submit();
        	}
        }
    </script>
@endsection