<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"C:\Users\starwork\Desktop\Project\blog\public/../application/admin\view\login.html";i:1499741279;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>老张博客后台管理</title>
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css" rel="stylesheet">
    <link href="/static/admin/css/login.min.css" rel="stylesheet">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>
</head>
<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7">
            <div class="signin-info">
                <div class="logopanel m-b">
                    <h1>老张博客后台管理</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <form method="post" action="<?php echo url('admin/Login/doLogin'); ?>" id="doLogin">
                <h4 class="no-margins">登录</h4>
                <p class="m-t-md">登录到老张后台</p>
                <input type="text" id="username" name="username" class="form-control uname" placeholder="用户名" />
                <input type="password" id="password" name="password" class="form-control pword m-b" placeholder="密码" />
                <span id="logincss"><button class="btn btn-success btn-block">登录</button></span>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; 2015 All Rights Reserved. 老张博客后台管理
        </div>
    </div>
</div>
</body>
<script src="/static/layer/jquery-1.8.3.min.js"></script>
<script src="/static/layer/jquery.form.js"></script>
<script src="/static/layer/layer.js"></script>
<script>
    $(function () {
        var options = {
            beforeSubmit: LoginBefor,
            success: LoginOk,
            dataType: 'json',
            timeout: 5000

        };
        $("#doLogin").ajaxForm(options);


        //提交前的执行方法
        function LoginBefor(){
            if ($('#username').val() == ''){
                layer.msg('请输入用户名');
                $('#logincss').html("<button class='btn btn-warning btn-block'>请输入用户名</button>")

                return false;
            }
            if ($('#password').val() == ''){
                layer.msg('请输入密码');
                $('#logincss').html("<button class='btn btn-warning btn-block'>请输入密码</button>")
                return false;
            }
        }

        //提交后的执行方法
        function LoginOk(data) {
            if (data.pass == 1){
                $('#logincss').html("<button class='btn btn-danger btn-block'>正在登陆...</button>")
                setTimeout(function(){window.location=data.url;},2000);
            }
        }
    });
</script>
</html>