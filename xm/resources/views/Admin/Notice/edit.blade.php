@extends('Admin.base.parent')
@section('content')
<div class="block-area" id="text-input">
	<h3 class="block-title">修改公告</h3>
	<p>填空修改公告</p>

	<div class="row">
		<form action='{{ url("admin/notice")."/".$ob->id }}' method='post'>
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="col-lg-8">
				<label>标题：</label>
				<input type="text" class="form-control m-b-10" placeholder="请输入标题" name="title" value="{{ $ob->title }}">
			</div>
			<div class="col-lg-8">
				<label>内容：</label>
				<input type="text" class="form-control m-b-10" placeholder="请输入标题" name="content" value="{{ $ob->content }}">
			</div>
			<div class="col-lg-8">
				<label>公告状态：</label>
				<select class="form-control m-b-10" name='type'>
					<option value='0' @if($ob->type==0)selected @endif>重要</option>
					<option value='1' @if($ob->type==1)selected @endif>一般</option>
				</select>
			</div>
			<div class="col-lg-4">
                    <input type="hidden" class="form-control m-b-10" placeholder="请输入时间" name='time' value="{{ time() }}">
            </div>
            <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
		</form>
	</div>
</div>
@endsection