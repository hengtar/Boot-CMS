<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\login.html";i:1503900190;}*/ ?>
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
            <form method="post" action="<?php echo url('admin/Login/login'); ?>" id="doLogin">
                <h4 class="no-margins">登录</h4>
                <p class="m-t-md">登录到老张后台</p>
                <input type="text" id="username" name="user" class="form-control uname" placeholder="用户名" />
                <input type="password" id="password" name="pass" class="form-control pword m-b" placeholder="密码" />
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
                $('#logincss').html("<button class='btn btn-danger btn-block'>请输入用户名</button>")

                return false;
            }
            if ($('#password').val() == ''){
                $('#logincss').html("<button class='btn btn-danger btn-block'>请输入密码</button>")
                return false;
            }
        }

        //提交后的执行方法
        function LoginOk(data) {
            if (data.pass == 1){
                $('#logincss').html("<button class='btn btn-primary btn-block'>登录成功</button>")
                setTimeout(function(){window.location=data.url;},2000);
            }else if(data.pass == 0){
                $('#logincss').html("<button class='btn btn-danger btn-block'>账号或密码错误</button>")
            }else{
                layer.msg('您没有权限登录');
            }
        }
    });
</script>
</html>