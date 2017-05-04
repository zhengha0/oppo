@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加配置</h3>
        
        <p>填空添加配置</p>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form action="{{ url('admin/conf') }}" method='post'>
                {{ csrf_field() }}
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
                    网站描述<textarea  class='form-control input-sm m-b-10' name='content' rows='10' cols='30'></textarea>
                </div>
                <div>
                    运营状态<select name='state' class='form-control input-sm m-b-10'>
                    <option value=''>--请选择--</option>
                    <option value='1'>--开--</option>
                    <option value='2'>--关--</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection