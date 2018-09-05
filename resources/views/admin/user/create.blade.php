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
                <form class="am-form am-form-horizontal" action="/user" method="post" enctype="multipart/form-data">
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
                           <input type="radio" name="has_vip" value="0"><small>否</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">管理员 / has_admin</label>
                        <div class="am-u-sm-9">
                           <input type="radio" name="has_admin" value="1"><small>是</small>
                           <input type="radio" name="has_admin" value="0"><small>否</small>
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
@endsection