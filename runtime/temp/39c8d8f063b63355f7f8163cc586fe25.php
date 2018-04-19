<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:87:"/data/wwwroot/www.boot-z.com/public/../application/admin/view/config/administrator.html";i:1524030305;s:78:"/data/wwwroot/www.boot-z.com/public/../application/admin/view/public/head.html";i:1524030307;s:77:"/data/wwwroot/www.boot-z.com/public/../application/admin/view/public/css.html";i:1524030307;s:76:"/data/wwwroot/www.boot-z.com/public/../application/admin/view/public/js.html";i:1524030307;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title>Boot-cms 后台管理</title>
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
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>个人中心
                    </h5>
                    <div class="ibox-tools">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" id="updateOneUser" action="<?php echo url('Config/administrator'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">用户名：</label>

                            <div class="col-sm-4">
                                <input type="text" disabled class="form-control" placeholder="输入用户名" name="user" id="user" value="<?php echo $user['user']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">昵称：</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="输入真实姓名/昵称" name="nickname" id="nickname" value="<?php echo $user['nickname']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">密码：</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="请输入密码" name="password">

                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> 保 存</button>
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
        $('#updateOneUser').ajaxForm(opt);

        function insertBefor(){
            if ($('#user').val() == ''){
                layer.msg('用户名不能为空',{icon:5});
                return false;
            }
        }
        function insertOk(data){
            if (data.pass == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('Config/administrator'); ?>";
                });
            }else{
                layer.msg(data.msg,{icon:5});
                return false;
            }
        }
    });
</script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
</body>
</html>