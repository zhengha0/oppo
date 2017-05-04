@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改配置</h3>
        
        <p>填空修改配置 </p>
        
        <div class="row">
            <form action='{{ url("admin/conf")."/".$ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    商店名:<input type="text" class="form-control m-b-10" placeholder="请输入商店名" name='shopname' value="{{ $ob->shopname }}">
                </div>
                <div class="col-lg-4">
                    网站标题:<input type="text" class="form-control m-b-10" placeholder="请输入标题" name='title' value="{{ $ob->title }}">
                </div>
                <div class="col-lg-4">
                    关键字:<input type="text" class="form-control m-b-10" placeholder="请输入标题" name='keys' value="{{ $ob->keys }}">
                </div>
                <div class="col-lg-12">
                  <textarea class="form-control m-b-10"  name='content' rows='10' cols='30'>{{ $ob->content }}</textarea>
                </div>
                <div class="col-lg-8">
                    <select class="form-control m-b-10" name='state'>
                        <option value='1' @if($ob->state ==1)selected @endif>开</option>
                        <option value='2' @if($ob->state ==2)selected @endif>关</option>
                    </select>
                </div>
                <div class="col-lg-8">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection