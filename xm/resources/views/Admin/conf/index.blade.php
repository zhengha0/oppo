@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">网站配置信息列表</h3>
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
        	<form action='{{ url("admin/conf") }}' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>

 <!--        	<form action='{{ url("admin/conf") }}' method='get'>
        		<div class='medio-body'>
    				商店名<input type='text' class='form-control input-sm m-b-10' name='shopname'>
    			</div>
        		<div>
                    网站标题<input type='text' class='form-control input-sm m-b-10' name='title'>
        		</div>
                 <div>
                    关键字<input type='text' class='form-control input-sm m-b-10' name='keys'>
                </div>
                 <div>
                    网站描述<textarea name='content' rows='10' cols='30'></textarea>
                </div>
                <div>
                    运营状态<select name='state' class='form-control input-sm m-b-10'>
                    <option value=''>--请选择--</option>
                    <option value='1'>--开--</option>
                    <option value='2'>--关--</option>
                    </select>
                </div>
        		<input type='submit' class='btn' value='搜索'>
        	</form> -->
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商店名</th>
                        <th>网站标题</th>
                        <th>网站关键字</th>
                        <th>网站描述</th>
                        <th>运营状态</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td>{{ $v->shopname }}</td>
	                        <td>{{ $v->title }}</td>
                            <td>{{ $v->keys }}</td>
                            <td>{{ $v->content }}</td>
	                        <td>{{ ($v->state == 1)?'开':'关' }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="{{ url('admin/conf').'/'.$v->id }}/edit">修改</a>
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
        		form.action = '/admin/conf/'+id;
        		form.submit();
        	}
        }
    </script>
@endsection