<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:102:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\auth\update_user.html";i:1505702521;s:97:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\public\head.html";i:1505897340;s:96:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\public\css.html";i:1506062714;s:95:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\public\js.html";i:1506062772;}*/ ?>
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

    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>修改用户</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <form class="form-horizontal" method="post" action="<?php echo url('Auth/update_user'); ?>">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">管理员名称：</label>
                                            <div class="input-group col-sm-4">
                                                <input id="username" type="text" class="form-control" name="username" placeholder="请输入管理员名称" value="<?php echo $user['user']; ?>">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">管理员角色：</label>
                                            <div class="input-group col-sm-4">
                                                <select name="p_id" class="form-control">
                                                    <option value="<?php echo $user['group_id']; ?>"><?php echo $user['title']; ?></option>
                                                    <option value="">==选择角色==</option>
                                                    <?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): if( count($group)==0 ) : echo "" ;else: foreach($group as $key=>$group): ?>
                                                        <option value="<?php echo $group['id']; ?>"><?php echo $group['title']; ?></option>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">登录密码：</label>
                                            <div class="input-group col-sm-4">
                                                <input id="password" type="text" class="form-control" name="pass" placeholder="ps:如果不改密码请勿动" >
                                                <input  type="hidden" class="form-control" name="password" value="<?php echo $user['pass']; ?>" >
                                                <input  type="hidden" class="form-control" name="id" value="<?php echo $user['id']; ?>" >
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">真实姓名：</label>
                                            <div class="input-group col-sm-4">
                                                <input id="real_name" type="text" class="form-control" name="real_name" placeholder="请输入真实姓名" value="<?php echo $user['nickname']; ?>">

                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">状&nbsp;态</label>
                                            <div class="col-sm-4">
                                                <div class="radio i-checks">
                                                    <?php if($user['status'] == '1'): ?>
                                                    <input type="radio" name='status' value="1" checked="checked"/>开启&nbsp;&nbsp;
                                                    <input type="radio" name='status' value="0" />关闭
                                                    <?php else: ?>
                                                    <input type="radio" name='status' value="1" />开启&nbsp;&nbsp;
                                                    <input type="radio" name='status' value="0" checked="checked" />关闭
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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

</div>

<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
</body>
</html>