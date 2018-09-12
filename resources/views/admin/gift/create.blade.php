@extends('layouts.admin')
@section('content')
<div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 礼物添加
                    </div>
                    


                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form action="/gift" method="post" enctype='multipart/form-data' class="am-form am-form-horizontal"onSubmit="return check(this);">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">礼物名称</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" name="gift_name" placeholder="输入礼物名称">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">礼物图片</label>
                                    <div class="am-u-sm-9" style='font-size:13px;'>
                                        <input type="file" id="file" name="gift_pic">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">礼物价格</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" name="price" placeholder="输入礼物价格">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button class="am-btn am-btn-primary">提交</button>
                                    </div>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>

            </div>

<script>
    $(function () {
        $("#file").change(function () {
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
            $('#file').after("<img width='60' src='"+reader.result+"'>");
        };
    };

    function check(form){
        //检查礼物名称是否填写
        var gift_name = form.gift_name.value;
        if(gift_name.length==0){
        alert("请填写礼物名称！");
        form.gift_name.focus();
        return false;
        }
        //检查礼物图片是否填写
        var gift_pic = form.gift_pic.value;
        if(gift_pic.length==0){
        alert("请选择礼物图片！");
        form.gift_pic.focus();
        return false;
        }
        //检查礼物价格是否填写
        var price = form.price.value;
        if(price.length==0){
        alert("请填写礼物价格！");
        form.price.focus();
        return false;
        }
        
    }
</script>
@endsection