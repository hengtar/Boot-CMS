<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:113:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/admin\view\menu_admin\update_menu.html";i:1508471825;s:102:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/admin\view\public\head.html";i:1505897340;s:101:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/admin\view\public\css.html";i:1506062714;s:100:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/admin\view\public\js.html";i:1506062772;}*/ ?>
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
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><a href="javascript:history.go(-1)">&times;</a><span class="sr-only">Close</span></button>
                        <h3 class="modal-title">修改菜单</h3>
                    </div>
                    <form class="form-horizontal" name="add_rule" id="add_rule" method="post" action="<?php echo url('MenuAdmin/update_menu'); ?>">
                        <div class="ibox-content">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">所属父级</label>
                                <div class="col-sm-8">

                                    <select name="p_id" class="form-control">
                                        <?php if(empty($menu['p_name']) || (($menu['p_name'] instanceof \think\Collection || $menu['p_name'] instanceof \think\Paginator ) && $menu['p_name']->isEmpty())): ?>
                                        <option value="0">==默认顶级==</option>
                                        <?php else: ?>
                                        <option value="<?php echo $menu['pid']; ?>"><?php echo $menu['p_name']; ?></option>
                                        <option value="0">==默认顶级==</option>
                                        <?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                                        <option value="<?php echo $list['id']; ?>" style="margin-left:55px;"><?php echo $list['lefthtml']; ?><?php echo $list['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">权限名称</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" id="title" value="<?php echo $menu['name']; ?>" placeholder="输入权限名称" class="form-control"/>
                                    <input type="hidden" name="id" value="<?php echo $menu['id']; ?>"/>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">权限节点</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" id="name" value="<?php echo $menu['url']; ?>" placeholder="模块/控制器/方法" class="form-control"/>
                                    <span class="help-block m-b-none">如：admin/index/index (Ps:节点名称要与后台菜单相同)</span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">排&nbsp;序</label>
                                <div class="col-sm-8">
                                    <input type="text" name="sort" id="sort" value="<?php echo $menu['sort']; ?>" placeholder="输入排序" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 保存</button>
                        </div>

                    </form>
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