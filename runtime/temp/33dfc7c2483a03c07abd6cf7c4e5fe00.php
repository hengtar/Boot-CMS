<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:94:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\config\email.html";i:1503641493;s:93:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\head.html";i:1500454346;s:92:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\css.html";i:1500454344;s:91:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\js.html";i:1500454344;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title>老张博客后台管理</title>
<!--[if lt IE 8]>
<meta http-equiv="refresh" content="0;ie.html" />
<![endif]-->
    <link href="/static/admin/css/bootstrap.min.css?laozhang=http://www.jh12.cn" rel="stylesheet">

<link href="/static/admin/css/font-awesome.min.css?laozhang=http://www.jh12.cn" rel="stylesheet">

<link href="/static/admin/css/animate.min.css?laozhang=http://www.jh12.cn" rel="stylesheet">

<link href="/static/admin/css/style.min.css?laozhang=http://www.jh12.cn" rel="stylesheet">

<style type="text/css">
    .lzCenter-th th{
        text-align: center
    }
    .lzCenter-td td{
        text-align: center
    }
</style>

    <link rel="stylesheet" type="text/css" href="/static/webupload/webuploader.css">
    <link rel="stylesheet" type="text/css" href="/static/webupload/style.css">
    <link href="/static/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <style>
        .file-item{float: left; position: relative; width: 110px;height: 110px; margin: 0 20px 20px 0; padding: 4px;}
        .file-item .info{overflow: hidden;}
        .uploader-list{width: 100%; overflow: hidden;}
    </style>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>邮箱配置</h5>
                    <div class="ibox-tools">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" id="updateConfigEmail" action="<?php echo url('Config/email'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">邮件显示：</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="输入邮件显示" name="config[web_email_name]" id="web_email_name" value="<?php echo $config['web_email_name']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">邮箱服务器地址 ：</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="输入邮箱服务器地址" name="config[web_email_server_address]" id="web_email_server_address" value="<?php echo $config['web_email_server_address']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">邮箱地址 ：</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="输入邮箱地址" name="config[web_email_address]" id="web_email_address" value="<?php echo $config['web_email_address']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">邮箱登录账号 ：</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="输入邮箱登录账号" name="config[web_email_account]" id="web_email_account" value="<?php echo $config['web_email_account']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">邮箱登录密码 ：</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="输入邮箱登录密码" name="config[web_email_password]" id="web_email_password" value="<?php echo $config['web_email_password']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> 保 存</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" type="submit"><i class="fa fa-close"></i> 返 回</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/static/admin/js/jquery.min.js?laozhang=http://www.jh12.cn"></script>

<script src="/static/admin/js/bootstrap.min.js?laozhang=http://www.jh12.cn"></script>

<script src="/static/admin/js/plugins/metisMenu/jquery.metisMenu.js?laozhang=http://www.jh12.cn"></script>

<script src="/static/admin/js/plugins/slimscroll/jquery.slimscroll.min.js?laozhang=http://www.jh12.cn"></script>

<script src="/static/admin/js/plugins/layer/layer.min.js?laozhang=http://www.jh12.cn"></script>

<script src="/static/admin/js/hplus.min.js?laozhang=http://www.jh12.cn"></script>

<script type="text/javascript" src="/static/admin/js/contabs.min.js?laozhang=http://www.jh12.cn"></script>

<script src="/static/admin/js/plugins/pace/pace.min.js?laozhang=http://www.jh12.cn"></script>

<script src="/static/admin/js/content.min.js?laozhang=http://www.jh12.cn"></script>

<script src="/static/admin/js/plugins/chosen/chosen.jquery.js?laozhang=http://www.jh12.cn"></script>

<script src="/static/admin/js/plugins/iCheck/icheck.min.js?laozhang=http://www.jh12.cn"></script>

<!--加载jq + layer + jqFrom -->

<script src="/static/layer/jquery.form.js"></script>

<script src="/static/layer/layer.js"></script>

<script>
    $(function () {
        var opt={
            beforeSubmit: insertBefor,
            success: insertOk,
            dataType: 'json',
            timeout: 5000
        };
        $('#updateConfigEmail').ajaxForm(opt);

        function insertBefor(){
            if ($('#web_email_name').val() == ''){
                layer.msg('邮件显示不能为空',{icon:5});
                return false;
            }

            if ($('#web_email_server_address').val() == ''){
                layer.msg('邮箱服务器地址不能为空',{icon:5});
                return false;
            }

            if ($('#web_email_address').val() == ''){
                layer.msg('邮箱地址不能为空',{icon:5});
                return false;
            }


            if ($('#web_email_account').val() == ''){
                layer.msg('邮箱登录账号不能为空',{icon:5});
                return false;
            }

            if ($('#web_email_password').val() == ''){
                layer.msg('邮箱登录密码不能为空',{icon:5});
                return false;
            }


        }
        function insertOk(data){
            if (data.pass == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('Config/email'); ?>";
                });
            }else{
                layer.msg(layer.msg,{icon:5});
            }
        }
    });
</script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
</body>
</html>