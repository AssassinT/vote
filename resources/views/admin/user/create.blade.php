@extends('layouts.admin') @section('title') 用户添加 @endsection @section('title','用户添加') @section('content')
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span> 用户添加
        </div>
        
    </div>
    <div class="tpl-block ">
        <div class="am-g tpl-amazeui-form">
            <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal" action="/user" method="post" enctype="multipart/form-data" onSubmit="return check(this);">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">用户名 / username</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="user_name" id="user-name" placeholder="">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">密码 / password</label>
                        <div class="am-u-sm-9">
                            <input type="password" name="password" id="user-email" placeholder=" ">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">手机号 / Telephone</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="user_phone" id="user-phone" placeholder="">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-QQ" class="am-u-sm-3 am-form-label">积分 / integral</label>
                        <div class="am-u-sm-9">
                            <input type="text"  value="0" name="integral" pattern="[0-9]*" id="user-QQ" placeholder="">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 / pic</label>
                        <div class="am-u-sm-9">
                            <input type="file" name="head_pic" id="user-weibo" >
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">会员 / vip</label>
                        <div class="am-u-sm-9">
                           <input type="radio" name="has_vip" value="1"><small>是</small>
                           <input type="radio" name="has_vip" value="0" checked><small>否</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">管理员 / has_admin</label>
                        <div class="am-u-sm-9">
                           <input type="radio" name="has_admin" value="1"><small>是</small>
                           <input type="radio" name="has_admin" value="0" checked><small>否</small>
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
        $("#user-weibo").change(function () {
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
            $('#user-weibo').after("<img width='60' src='"+reader.result+"'>");
        };
    };

    function check(form){
        //检查用户名是否填写
        var user_name = form.user_name.value;
        if(user_name.length==0){
        alert("请填写用户名！");
        form.user_name.focus();
        return false;
        }
        //检查密码是否填写
        var password = form.password.value;
        if(password.length==0){
        alert("请填写密码！");
        form.password.focus();
        return false;
        }
        //检查手机号是否填写
        var user_phone = form.user_phone.value;
        if(user_phone.length==0){
        alert("请填写手机号！");
        form.user_phone.focus();
        return false;
        }
        //检查积分是否填写
        var integral = form.integral.value;
        if(integral.length==0){
        alert("请填写手机号！");
        form.integral.focus();
        return false;
        }
        //检查是否选择头像
        var head_pic = form.head_pic.value;
        if(head_pic.length==0){
        alert("请选择头像！");
        form.head_pic.focus();
        return false;
        }
        //检查会员是否填写
        var has_vip = form.has_vip.value;
        if(has_vip.length==0){
        alert("请填写是否是会员！");
        form.has_vip.focus();
        return false;
        }
        //检查管理员是否填写
        var has_admin = form.has_admin.value;
        if(has_admin.length==0){
        alert("请填写管理员！");
        form.has_admin.focus();
        return false;
        }
    }

</script>
@endsection