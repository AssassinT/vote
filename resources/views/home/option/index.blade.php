@extends('layouts.home.index')
@section('content')
<div id="full-width-template">
            <div class="content-margin content-background">
           
                <header >
                <div style="padding-left:70px;font-size:30px!important">
                    <b style=" color:#666666;" >{{$options[0]->vote->vote_title}}</b>
                </div>
                </header>
                <hr>
                @foreach($options as $v)
                <div style='width:60%'>
                    <ul >
                        <b>
                         <p style="margin-left:30px; padding-top:1px;font-size:19px; color:#666666">{{$v->option_title}}<i style="font-size:13px; ">（  {{$v->vote_num}}票， {{round($v->vote_num / $arrys  * 100)}}%）</i></p>
                            <div style="height:16px;margin-left:30px;!important;border:1px;background:#2ecc71;width:{{round($v->vote_num / $arrys  * 100)}}%">
                            </div>
                            
                            
                        </b>
                    </ul>
                </div>
             @endforeach
                <p style="text-align: center;">
                        总票数：<strong>{{round($arrys)}}票</strong><br />
                    </p>
            </div>
        </div>

@endsection