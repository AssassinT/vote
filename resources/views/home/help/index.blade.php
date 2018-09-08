@extends('layouts.home.index')
@section('content')

<header>
        <div style="padding-left:70px;font-size:30px!important">
<b style=" color:#666666;">常见问题</b></div>
</header>
<hr>

@foreach($helps as $v)
<div style="margin-left:70px; padding-top:10px;!important">
<b style="font-size:19px; color:#666666">问：{{$v->question}}</b>
</div>
<p style="margin-left:71px; color:#666666;font-size:17px">答：{{$v->answer}}</p>
<br>



@endforeach

@endsection