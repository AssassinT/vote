@extends('layouts.admin') 
@section('title') 友情链接添加 @endsection 
@section('title','友情链接添加') 

@section('content')
<hr>
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span> 友情链接添加
        </div>
    </div>
    <div class="tpl-block">
        <div class="am-g">
            <div class="tpl-form-body tpl-form-line">
                <form class="am-form tpl-form-line-form" method="post" action="/link" enctype="multipart/form-data">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">名称<span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" name="link_name" class="tpl-form-input" id="user-name" placeholder="">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">权重<span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" name="weight" class="tpl-form-input" id="user-name" placeholder="">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">链接LOGO</label>
                        <div class="am-u-sm-9">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                </div>
                                <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i> 添加logo图片</button>
                                <input id="doc-form-file" type="file" name="link_pic">
                            </div>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">链接地址<span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" name="link_url" class="tpl-form-input" id="user-name" placeholder="">
                        </div>
                    </div>
                    
                    {{csrf_field()}}
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection