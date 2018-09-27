@extends('layouts.home.index')
@section('content')
<div id="full-width-template">
            <div class="content-margin content-background">
                <header >
                <div style="padding-left:20px;font-size:30px!important">
                    <b style=" color:#666;" >{{$options[0]->vote->vote_title}}</b>
                </div>
                </header>
                <hr>
                @foreach($options as $v)
                <div class="col-md-8">
                    <ul >
                        <b>
                         <p style=" padding-top:1px;font-size:19px; color:#666">{{$v->option_title}}<b style="font-size:13px; ">（  {{$v->vote_num}}票 &nbsp,&nbsp{{floor($v->vote_num / $arrys  * 100)}}%）</b></p>
                         
                            <div style="height:12px;!important;border-radius:10px ;background:#31b0d5;width:{{round($v->vote_num / $arrys  * 100)}}%">
                            </div>
                        </b>
                    </ul>
                </div>
             @endforeach
             <div class="col-md-6 col-md-offset-1">
                <p style="text-align: center;">
                    <b style="font-size:16px;color:#666">总票数：<strong >{{floor($arrys)}}票</strong></b> &nbsp; &nbsp; 

                    @if(session('id')==$options[0]->vote->user_id)
                    <b style="font-size:16px;color:red">礼物金额累计：{{$giftnums}}<strong >元</strong></b><span style="font-size:10px">本人登陆时才会显示</span>
                    @endif

                    <br />
                </p>
             </div>
                
            </div>
        </div>
@endsection