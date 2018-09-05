@extends('layouts.admin') @section('title') 网站设置 @endsection @section('title','网页设置') @section('content')
<hr>
<div class="tpl-portlet-components">

    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span> 网站设置
        </div>
        <div class="tpl-block ">
            <div class="am-g tpl-amazeui-form">
                <div class="am-u-sm-12 am-u-md-9">
                    <form class="am-form am-form-horizontal" action="/webset" enctype="multipart/form-data" method="post">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">网站开关</label>
                            <div class="am-u-sm-9">

                                <input type="radio" id="user-name" name="has_off" {{$websets['has_off']==0 ? 'checked' : ''}} value="0" >
                                <small>开</small>&nbsp;&nbsp;
                                <input type="radio"  name="has_off" value="1" {{$websets['has_off']==1 ? 'checked' : ''}}>
                                <small>关</small>                                
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-" class="am-u-sm-3 am-form-label">网站标题</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="web_title" value="{{$websets ? $websets -> web_title: '' }}">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-" class="am-u-sm-3 am-form-label">备案号</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="record" value="{{$websets ? $websets -> record: '' }}">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-" class="am-u-sm-3 am-form-label">网站地址</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="web_url" value="{{$websets ? $websets -> web_url: '' }}">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-" class="am-u-sm-3 am-form-label">网站关键字</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="web_keyword" value="{{$websets ? $websets -> web_keyword: '' }}">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-" class="am-u-sm-3 am-form-label">微博</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="blog" value="{{$websets ? $websets -> blog: '' }}">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-" class="am-u-sm-3 am-form-label">联系邮箱</label>
                            <div class="am-u-sm-9">
                                <input type="email" name="web_email" value="{{$websets ? $websets -> web_email: '' }}" >
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-" class="am-u-sm-3 am-form-label">联系QQ</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="web_qq" value="{{$websets ? $websets -> web_qq: '' }}">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-" class="am-u-sm-3 am-form-label">联系电话</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="web_phone" value="{{$websets ? $websets -> web_phone: '' }}">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-weibo" class="am-u-sm-3 am-form-label">网站Logo </label>
                            <div class="am-u-sm-9">
                                <div class="am-form-group am-form-file">
                                    <div class="tpl-form-file-img">
                                    </div>
                                    <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                        <i class="am-icon-cloud-upload"></i> 添加网站Logo</button>
                                    <input id="doc-form-file" type="file" name="web_pic">
                                    <img src="{{$websets ? $websets -> web_pic: '' }}" alt="" width="60" >
                                    
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-weibo" class="am-u-sm-3 am-form-label">微信二维码 </label>
                            <div class="am-u-sm-9">
                                <div class="am-form-group am-form-file">
                                    <div class="tpl-form-file-img">
                                    </div>
                                    <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                        <i class="am-icon-cloud-upload"></i> 添加微信二维码</button>
                                    <input id="doc-form-file" type="file" name="wechat_qrcode">
                                    <img src="{{$websets ? $websets -> wechat_qrcode: '' }}" alt="" width="60" >

                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}                        
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button class="am-btn am-btn-primary">保存修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection