@extends('layouts.admin')
@section('content')
<hr>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span>友情链接修改
        </div>
    </div>
    <div class="tpl-block">
        <div class="am-g">
            <div class="tpl-form-body tpl-form-line">
                <form class="am-form tpl-form-line-form" method="post" action="/link/{{$link['id']}}" enctype="multipart/form-data">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">名称<span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" value="{{$link['link_name']}}" name="link_name" class="tpl-form-input" id="user-name" placeholder="">
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">权重<span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" value="{{$link['weight']}}" name="weight" class="tpl-form-input" id="user-name" placeholder="">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">链接LOGO</label>
                        <div class="am-u-sm-9">
                            <img src="{{$link['link_pic']}}" alt="" width="50" height="50">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                </div>
                                <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i>修改LOGO</button>
                                <input id="doc-form-file" type="file" name="link_pic">
                            </div>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">链接地址<span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" value="{{$link['link_url']}}" name="link_url" class="tpl-form-input" id="user-name" placeholder="">
                        </div>
                    </div>
                    
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                        </div>
                    </div>
                </form>

                <script>
                    var ue = UE.getEditor('editor');
                </script>
            </div>
        </div>
    </div>
</div>
@endsection