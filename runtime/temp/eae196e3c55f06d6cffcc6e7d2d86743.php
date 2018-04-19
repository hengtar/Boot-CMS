<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:98:"C:\Users\starwork\Desktop\20170818\blog\public/../application/admin\view\member\insert_member.html";i:1503279597;s:89:"C:\Users\starwork\Desktop\20170818\blog\public/../application/admin\view\public\head.html";i:1500454346;s:88:"C:\Users\starwork\Desktop\20170818\blog\public/../application/admin\view\public\css.html";i:1500454344;s:87:"C:\Users\starwork\Desktop\20170818\blog\public/../application/admin\view\public\js.html";i:1500454344;}*/ ?>

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
                    <h5>添加会员
                    </h5>
                    <div class="ibox-tools">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" id="insertMember" action="<?php echo url('Member/insert_member'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">用户名：</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="输入用户名" name="username" id="username">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">昵称：</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="输入昵称" name="nickname" id="nickname">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">密码：</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="输入密码" name="password" id="password">

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">会员类型：</label>

                            <div class="col-sm-4">
                                <select class="form-control m-b" name="cate_id" id="cate_id">
                                    <option value="0">--选择类型--</option>
                                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                                    <option value="<?php echo $list['id']; ?>"><?php echo $list['cate_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">头像：</label>
                            <div class="input-group col-sm-4">
                                <input type="hidden" id="data_photo" name="photo" >
                                <div id="fileList" class="uploader-list" style="float:right"></div>
                                <div id="imgPicker" style="float:left">选择头像</div>
                                <img id="img_data" height="100px" style="float:left;margin-left: 80px;margin-top: -10px;" src="/static/webupload/no_img.jpg"/>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">状态：</label>

                            <div class="col-sm-4">
                                <select class="form-control m-b" name="status">
                                    <option value="1">开启</option>
                                    <option value="0">关闭</option>
                                </select>
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


<script type="text/javascript" src="/static/webupload/webuploader.min.js"></script>
<script src="/static/admin/js/plugins/switchery/switchery.js"></script>
<script type="text/javascript">
    var $list = $('#fileList');
    //上传图片,初始化WebUploader
    var uploader = WebUploader.create({

        auto: true,// 选完文件后，是否自动上传。
        swf: '/static/admin/js/webupload/Uploader.swf',// swf文件路径
        server: "<?php echo url('Upload/upload'); ?>",// 文件接收服务端。
        duplicate :true,// 重复上传图片，true为可重复false为不可重复
        pick: '#imgPicker',// 选择文件的按钮。可选。

        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },

        'onUploadSuccess': function(file, data, response) {
            $("#data_photo").val(data._raw);
            $("#img_data").attr('src', '/uploads/images/' + data._raw).show();
        }
    });

    uploader.on( 'fileQueued', function( file ) {
        $list.html( '<div id="' + file.id + '" class="item">' +
            '<h4 class="info">' + file.name + '</h4>' +
            '<p class="state">正在上传...</p>' +
            '</div>' );
    });

    // 文件上传成功
    uploader.on( 'uploadSuccess', function( file ) {
        $( '#'+file.id ).find('p.state').text('上传成功！');
    });

    // 文件上传失败，显示上传出错。
    uploader.on( 'uploadError', function( file ) {
        $( '#'+file.id ).find('p.state').text('上传出错!');
    });


</script>
<script>
    $(function () {
        var opt={
            beforeSubmit: insertBefor,
            success: insertOk,
            dataType: 'json',
            timeout: 5000
        };
        $('#insertMember').ajaxForm(opt);

        function insertBefor(){
            if ($('#username').val() == ''){
                layer.msg('用户名不能为空',{icon:5});
                return false;
            }

            if ($('#nickname').val() == ''){
                layer.msg('昵称不能为空',{icon:5});
                return false;
            }

            if ($('#password').val() == ''){
                layer.msg('密码不能为空',{icon:5});
                return false;
            }

            if ($('#cate_id').val() == 0){
                layer.msg('请选择会员类型',{icon:5});
                return false;
            }

            if ($('#data_photo').val() == ''){
                layer.msg('图片不能为空',{icon:5});
                return false;
            }


        }
        function insertOk(data){
            if (data.pass == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('Member/list_member'); ?>";
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