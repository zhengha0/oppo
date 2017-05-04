@extends('Admin.base.parent')
@section('content')
<div class = "block-area" id="text-input">
	<h3 class="block-title">添加公告</h3>
	<p>填空添加公告</p>

	<div class="row">
		<form action="{{ url('admin/notice') }}" method='post'>
			{{ csrf_field() }}
			<div class="col-lg-8">
				<label>标题：</label>
				<input type="text" class="form-control m-b-10" name='title'>
			</div>
			<div class="col-lg-8">
				<label>内容：</label>
				<input type="text" class="form-control m-b-10" name='content'>
			</div>
			<div class="col-lg-8">
                    <label>公告状态：</label>
                    <select class="form-control m-b-10" name='type'>
                        <option>--请选择--</option>
                        <option value='0'>重要</option>
                        <option value='1'>一般</option>
                    </select>
                </div>
			<div class="col-lg-4">
				<input type="hidden" class="form-control m-b-10" name='time' value='{{ time() }}'>
			</div>
			<div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
		</form>
	</div>
</div>
@endsection