@extends('layouts.admin') 

@section('content')
<hr>
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span> 友情链接添加
        </div>
    </div>
    <div class="tpl-block ">
        <div class="am-g tpl-amazeui-form">
            <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal" method="post" action="/link" enctype="multipart/form-data" onSubmit="return check(this);">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">名称</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="link_name" id="user-name" placeholder="">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">权重</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="weight" id="user-email" placeholder=" ">
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
                        <label for="user-email" class="am-u-sm-3 am-form-label">链接地址</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="link_url" id="user-email" placeholder=" ">
                        </div>
                    </div>
                    
                    {{csrf_field()}}
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button  class="am-btn am-btn-primary">提交</button>
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
            $('#doc-form-file').after("<img width='60' src='"+reader.result+"'>");
        };
    }; 

    function check(form){
        //检查姓名是否填写
        var link_name = form.link_name.value;
        if(link_name.length==0){
        alert("请填写链接名称！");
        form.link_name.focus();
        return false;
        }
        //检查权重是否填写
        var weight = form.weight.value;
        if(weight.length==0){
        alert("请填写权重！");
        form.weight.focus();
        return false;
        }
        //检查图片是否填写
        var link_pic = form.link_pic.value;
        if(link_pic.length==0){
        alert("请填写图片！");
        form.link_pic.focus();
        return false;
        }
        //检查地址是否填写
        var link_url = form.link_url.value;
        if(link_url.length==0){
        alert("请填写地址！");
        form.link_url.focus();
        return false;
        }
    }
</script>
@endsection