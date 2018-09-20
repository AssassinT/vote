@extends('layouts.home.index') @section('content')
<div style="padding-left:70px">
    <h3><b>找回密码</b></h3>
    <hr>
    <style>
    .remind {
        display: none;
        font-size: 12px;
        color: #aaa;
    }

    .remind1 {
        display: none;
        font-size: 12px;
        color: #aaa;
    }

    .remind2 {
        display: none;
        font-size: 12px;
        color: #aaa;
    }

    .active {
        border: solid 1px #2bf666;
    }

    .error {
        border: solid 1px red;
    }

    #pass_none {
        display: none;
    }

    .fd {
        float: right;
    }
    </style>
    <form action="/home/pass" method="post" enctype="multipart/form-data">
        <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">用户名</span>
            <input type="text" id="n" class="form-control" placeholder="" aria-describedby="basic-addon1" value="" name="user_name">
        </div>
        <span id="aa"></span>
        <br>
        <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">手机号</span>
            <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" value="" name="user_phone">
        </div>
        <span id="bb"></span>
        <br>
        <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">验证码</span>
            <div>
                <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" value="" name="" style="float:left;width:83px;">
                <button class="form-control" style="float:left;width:104px">获取验证码</button>
            </div>
        </div>
        <br>
        <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">新密码</span>
            <input type="password" class="form-control" aria-describedby="basic-addon1" name="password">
        </div>
        <span id="cc"></span>
        <br>
        <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">再次输入</span>
            <input type="password" class="form-control" aria-describedby="basic-addon1" name="repassword">
        </div>
        <span id="dd"></span>
        <br>
</div>
    <button name="submit" style="margin-left:280px" class="btn btn-success">提交</button>

</div>
{{csrf_field()}}
</form>
<script>
$(function() {
    var CUSER = false;
    var CPHONE = false;
    var CPASS = false;
    var CREPASS = false;
    $('input[name=user_name]').focus(function() {
        $('#aa').html('<span style="color:#bbb;margin-left:100px">请输入用户名</span>');
    }).blur(function() {
        var v = $(this).val();
        CUSER = false;
        $.ajax({
            url: '/home/req',
            type: 'POST',
            data: { user_name: v },
            // dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data != '1') {
                    $('#aa').html('<span style="color:green;font-size:16px;font-weight:bold;margin-left:100px">&nbsp;&nbsp;√</span>').show();
                    CUSER = false;
                } else {
                    $('#aa').html('<span style="color:red;margin-left:100px">请输入正确的用户名</span>').show();

                    CUSER = true;
                }
            },
            async: false
        })

        //手机号
        $('input[name=user_phone]').focus(function() {
            //提示语显示
            $('#bb').show().html('<span style="color:#bbb;margin-left:100px">输入您的手机号</span>');
        }).blur(function() {
            //获取用户的输入值
            var v = $('input[name=user_phone]').val();
            CPHONE = false;
            $.ajax({
                url: '/home/reqq?user_name=' + $('#n').val(),
                type: 'POST',
                data: { user_phone: v },
                // dataType:'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data != '1') {
                        $('#bb').html('<span style="color:green;font-size:16px;font-weight:bold;margin-left:100px">&nbsp;&nbsp;√</span>').show();
                        CPHONE = false;
                    } else {
                        $('#bb').html('<span style="color:red;margin-left:100px">请输入您的手机号</span>').show();

                        CPHONE = true;
                    }
                },
                async: false
            })


        })


        //密码
        $('input[name=password]').focus(function() {
            $('#cc').show().html('<span style="color:#bbb;margin-left:100px">输入您的新密码</span>');
        }).blur(function() {
            //获取用户输入的值
            var v = $(this).val();
            //正则
            var reg = /^[0-9a-zA-Z!@#$^]{6,18}$/;
            if (!reg.test(v)) {
                //文字提醒
                $('#cc').html('<span style="color:red;margin-left:100px">格式不正确</span>').show();
                CPASS = false;
            } else {

                //文字提醒
                $('#cc').html('<span style="color:#bbb;font-size:16px;font-weight:bold;margin-left:100px">&nbsp;&nbsp;√</span>').show();
                CPASS = true;
            }
        })
    })

    // 确认密码
    $('input[name=repassword]').focus(function() {
        $('#dd').show().html('<span style="color:#bbb;margin-left:100px">请再次输入密码</span>');
    }).blur(function() {
        var v = $(this).val();
        if (v != $('input[name=password]').val()) {
            $('#dd').html('<span style="color:red;margin-left:100px">两次输入密码不一致</span>').show();
            var CREPASS = false;
        } else {
            $('#dd').html('<span style="color:#bbb;font-size:16px;font-weight:bold;margin-left:100px">&nbsp;&nbsp;√</span>').show();
            CREPASS = true;
        }
    })
})
</script>
@endsection