@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改类别</h3>
        
        <p>填空修改类别</p>
        
        <div class="row">
            <form action='{{ url("admin/goods")."/".$ob->id }}' method='post' enctype='multipart/form-data'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-8">
                    <input type="hidden" name='oldlogo' value="{{ $ob->logo }}">
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品名" name='sname' value="{{ $ob->sname }}">
                </div>
                <div class="col-lg-12">
                    <textarea class="form-control m-b-10" name='content' rows='10' cols='30'>{{ $ob->content }}</textarea>
                </div>
                <div class="col-lg-8">
                    文件：<input type='file' name='logo'>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品价格" name='money' value="{{ $ob->money }}">
                </div>
                 <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品货号" name='mark' value="{{ $ob->mark }}">
                </div>
                 <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品尺寸" name='weight' value="{{ $ob->weight }}">
                </div>
                 <div class="col-lg-8">
                     <div class="col-lg-8">
                    <select class="form-control m-b-10" name='state'>
                    <option value='1' {{ ($ob->state == 1)?'selected':''}}>上架</option>
                    <option value='2' {{ ($ob->state == 2)?'selected':''}}>下架</option>
                </select>
                </div>
                <div class="col-lg-8">
                    <input type="hidden" class="form-control m-b-10" name='time' value='{{ time() }}'>
                </div>
                 <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品库存" name='num' value="{{ $ob->num }}">
                </div>
                <div class="col-lg-8">
                   <select class="form-control m-b-10" name='pid'>
                     @foreach($list as $v)
                     <option value="{{ $v->id }}" {{ ($ob->pid == $v->id)?'selected':''}}>{{ $v->fname }}</option>
                     @endforeach
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