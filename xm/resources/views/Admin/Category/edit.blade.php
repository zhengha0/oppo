@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改类别</h3>
        
        <p>填空修改类别</p>
        
        <div class="row">
            <form action='{{ url("admin/category")."/".$ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-8">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品名" name='fname' value="{{ $ob->fname }}">
                </div>
                <div class="col-lg-8">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection