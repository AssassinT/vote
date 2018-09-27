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
        <div>
        <div class=" input-group col-md-6">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">手机号</span>
            <input id="phone" type="text" style="width:170px;border-radius:4px;" class="form-control" placeholder="" aria-describedby="basic-addon1" value="" name="user_phone">
            <button id="verify" style="float:right;" disabled type="button" class="btn btn-success">获取验证码</button>
        </div>
        <span id="bb"></span>
        
        </div>
        
        <br>
        <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">验证码</span>
            <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" value="" name="verify">
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
    <button name="submit" style="margin-left:180px" class="btn btn-success">提交</button>

</div>
{{csrf_field()}}
</form>

<script>
$(function() {
    var CPHONE = false;
    var CPASS = false;
    var CREPASS = false;
    

        //手机号
        $('input[name=user_phone]').focus(function() {
            //提示语显示
            $('#bb').show().html('<span style="color:#bbb;margin-left:100px">输入您的手机号</span>');
        }).blur(function() {
            //获取用户的输入值
            var v = $('input[name=user_phone]').val();
            CPHONE = false;
            $.ajax({
                url: '/home/reqq',
                type: 'POST',
                data: { user_phone: v },
                // dataType:'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data != '1') {
                        $('#bb').html('<span style="color:green;font-size:16px;font-weight:bold;margin-left:100px">&nbsp;&nbsp;√</span>').show();
                        CPHONE = true;
                        $('#verify').removeAttr('disabled');
                    } else {
                        $('#bb').html('<span style="color:red;margin-left:100px">请输入您的手机号</span>').show();

                        CPHONE = false;
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


    // 确认密码
    $('input[name=repassword]').focus(function() {
        $('#dd').show().html('<span style="color:#bbb;margin-left:100px">请再次输入密码</span>');
    }).blur(function() {
        var v = $(this).val();
        if (v != $('input[name=password]').val()) {
            $('#dd').html('<span style="color:red;margin-left:100px">两次输入密码不一致</span>').show();
            CREPASS = false;
        } else {
            $('#dd').html('<span style="color:#bbb;font-size:16px;font-weight:bold;margin-left:100px">&nbsp;&nbsp;√</span>').show();
            CREPASS = true;
        }
    })
    var num=5;
    $('#verify').click(function(){
            var timer = setInterval(function(){
                num--;
                $('#verify').html(num+'秒');
                if(num<1){
                    $('#verify').removeAttr('disabled');
                    $('#verify').html('获取验证码');
                    clearInterval(timer);
                    num = 5;
                }
            },1000);
            $('#verify').attr('disabled','true');

        $.get('/home/verify?phone='+$('#phone').val(),{},function(data){
            if(data){
                alert('获取验证码成功,请注意查收短信,20分钟内输入有效');
            }
        });
    });

    $('form').submit(function(){
        if(CPHONE && CPASS && CREPASS){
            return true;
        }else{
            return false;
        }
    });
});
</script>
@endsection