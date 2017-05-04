@extends('Home.base.parent')
@section('content')

<meta charset='utf-8'>
<center>
<div style='border:3px solid green;width:500px;height:500px;' id='did'>
<img src="/admin/upload/fukuan.png" alt="">
  <script>
  var did = document.getElementById('did');
  did.onclick = function()
  {
    alert('Gameover');
  }
  </script> 
</div>
</center>
@endsection