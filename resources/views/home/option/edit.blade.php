@extends('layouts.home.index')
@section('content')
            <div >
                <header>
                        <div style="padding-left:40px;font-size:30px!important">
                            <b style="color:#666666">会员特权</b></div>
                </header><hr>
                <div style="margin-left:40px;!important;width:85%;">
                    <b style="background: #ffffff;font-size:20px;color:#666666">联系电话：<font id="OrderId">137906053356</font></b><br><br>
                    <b style="background: #ffffff;font-size:20px;color:#666666">微信关注：请填写您的<a style="color:red">(用户名)</a>，方便与管理员联系。</b><br><br>
                    <p ><img src="/vo/微信.jpg" width="20%" /></p>
                </div>
            </div>
        <div class="col-md-offset-2 ">
           <button  onclick="window.history.go(-1)" class="btn btn-info "style="margin-left:35%;height:38px">返回</button>
        </div>
@endsection