@extends('layouts.admin') @section('title','广告修改') @section('content')
<hr>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span> 广告修改
        </div>
    </div>
    <div class="tpl-block">
        <div class="am-g">
            <div class="tpl-form-body tpl-form-line">
                <form class="am-form tpl-form-line-form" method="post" action="/a_d/{{$a_d['id']}}" enctype="multipart/form-data">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">广告名称<span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" name="a_d_name" value="{{$a_d['a_d_name']}}"class="tpl-form-input" id="user-name" placeholder="">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">广告链接<span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" name="a_d_url" class="tpl-form-input" id="user-name" value="{{$a_d['a_d_url']}}"placeholder="">                        
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">广告位置</label>
                        <div class="am-u-sm-9">
                            <select data-am-selected="{searchBox: 1}" name="position" style="display: none;">
                            
                                <option {{$a_d['position']==1 ? 'selected'  : ''}} value="1">首页右侧栏(1)</option>
                                <option {{$a_d['position']==2 ? 'selected'  : ''}} value="2">首页左侧栏(2)</option>
                                <option {{$a_d['position']==3 ? 'selected'  : ''}} value="3">投票界面右侧栏(3)</option>
                                <option {{$a_d['position']==4 ? 'selected' : ''}} value="4">添加界面右侧栏(4)</option>

                            </select>
                        </div>
                    </div>




                    
                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">广告主图</label>
                        <div class="am-u-sm-9">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                </div>
                                <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i> 添加封面图片</button>
                                <input id="doc-form-file" type="file" name="a_d_pic">
                                <img id="hsl" src="{{$a_d['a_d_pic']}}" width="40" height="40"alt="">
                            </div>
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
            </div>
        </div>
    </div>
</div>
<script>
$(function () {
        $("#doc-form-file").change(function () {
            var fil = this.files;
            for (var i = 0; i < fil.length; i++) {
                reads(fil[i]);
            }
        });
    });
    
    function reads(fil){
        var reader = new FileReader();
        reader.readAsDataURL(fil);
        reader.onload = function(){
            $('#hsl').attr("src",reader.result);
        };
    };
</script>
@endsection