@extends('layouts.admin') @section('title','帮助添加') @section('content')

<hr>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span> 帮助添加
        </div>
    </div>
    <div class="tpl-block">
        <div class="am-g">
            <div class="tpl-form-body tpl-form-line">
                <form class="am-form tpl-form-line-form" method="post" action="/help" enctype="multipart/form-data" onSubmit="return check(this);">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">问题<span class="tpl-form-line-small-title"></span></label>
                        <div class="am-u-sm-9">
                            <input type="text" name="question" class="tpl-form-input" id="user-name" placeholder="">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-u-sm-3 am-form-label">简介</label>
                        <div class="am-u-sm-9">
                            <textarea class="" name="answer" rows="5"></textarea>
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
<script type="text/javascript">

    function check(form){
        //检查问题是否填写
        var question = form.question.value;
        if(question.length==0){
        alert("请填写问题！");
        form.question.focus();
        return false;
        }
        //检查答案是否填写
        var answer = form.answer.value;
        if(answer.length==0){
        alert("请填写答案！");
        form.answer.focus();
        return false;
        }
    }
    

</script>
@endsection
