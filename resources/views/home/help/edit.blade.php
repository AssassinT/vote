@extends('layouts.home.index')
@section('content')

		<header>
        <div style="font-size:30px!important">
            <span style="color:#666666"> &nbsp; &nbsp; 联系方式</span>
        </div>
        </header>
        <hr>
        <div class="col-md-12">               
           
                    <div class="col-md-4" style="text-align:center"> <p ><img src="/vo/qq.png" width="58%" /></p><p  style="font-size:105%;color:#666666;margin-left:10%;margin-right:10%">关注QQ</p></div>
                    <div class="col-md-4" style="text-align:center"> <p ><img src="{{$websets->wechat_qrcode}}" width="58%" /></p><p  style="font-size:105%;color:#666666;margin-left:8.5%;margin-right:10%">关注微信</p></div>
                    <div class="col-md-4" style="text-align:center"> <p ><img src="/vo/微博.png" width="58%" /></p><p  style="font-size:105%;color:#666666;margin-left:7%;margin-right:10%">关注微博</p></div>

                
                
        </div>
            <div  style="margin-left:0px; margin-top:10px"class="col-md-7 item">
                    <h4 style="color:#666666"><b>客服电话</b></h4>
                    <a style="color:#666666"><b>{{$websets->web_phone}}</b></a>
            </div>
            <div  style="margin-left:0px; margin-top:10px"class="col-md-7 item">
                    <h4 style="color:#666666"><b>客服QQ</b></h4>
                    <a style="color:#666666"><b>{{$websets->web_qq}}</b></a>
            </div>
            <div  style="margin-left:0px; margin-top:10px"class="col-md-7 item">
                    <h4 style="color:#666666"><b>工作时间</b></h4>
                    <p style="color:#666666"><b>每日10:00——17:00时（不含法定节假日）</b></p>
            </div>
@endsection
                

