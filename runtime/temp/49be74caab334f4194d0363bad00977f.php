<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:92:"C:\Users\Administrator\Desktop\blog\public/../application/admin\view\advert\list_advert.html";i:1505965836;s:85:"C:\Users\Administrator\Desktop\blog\public/../application/admin\view\public\head.html";i:1505897340;s:84:"C:\Users\Administrator\Desktop\blog\public/../application/admin\view\public\css.html";i:1506062714;s:83:"C:\Users\Administrator\Desktop\blog\public/../application/admin\view\public\js.html";i:1506062772;}*/ ?>
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

</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>广告列表</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-2" style="width: 100px">
                        <div class="input-group">
                            <a href="<?php echo url('Advert/insert_advert'); ?>">
                                <button class="btn btn-outline btn-success" type="button">添加广告</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hr-line-dashed"></div>

            <div class="example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="lzCenter-th">
                            <th>ID</th>
                            <th>标题</th>
                            <th>所属广告组</th>
                            <th>广告封面</th>
                            <th width="15%">添加时间</th>
                            <th width="15%">更新时间</th>
                            <th>状态</th>
                            <th>编辑</th>
                            <th>删除</th>
                        </tr>
                        </thead>
                        <tbody id="Advert_list">
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                        <tr class="lzCenter-td">
                            <td><?php echo $list['id']; ?></td>
                            <td><?php echo $list['title']; ?></td>
                            <td><?php echo $list['name']; ?></td>
                            <td>
                                <img src="/uploads/images/<?php echo $list['photo']; ?>" height="30" width="80">

                            </td>
                            <td><?php echo $list['create_time']; ?></td>
                            <td><?php echo $list['update_time']; ?></td>
                            <td>
                                <?php if(($list['status'] == 1)): ?>
                                <a class="btn  btn-success btn-outline btn-xs statusArtciel" id="status-<?php echo $list['id']; ?>">
                                    <i class="fa fa-hand-o-up"></i> 已开启
                                </a>
                                <?php else: ?>
                                <a class="btn btn-danger btn-outline btn-xs statusArtciel" id="status-<?php echo $list['id']; ?>">
                                    <i class="fa fa-hand-o-down"></i> 已关闭
                                </a>
                                <?php endif; ?>

                            </td>
                            <td>
                                <a class="btn btn-primary btn-outline btn-xs"
                                   href="<?php echo url('advert/update_advert',array('id' => $list['id'])); ?>">
                                    <i class="fa fa-paste"></i> 编辑
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-outline btn-xs delArtciel" id="del-<?php echo $list['id']; ?>">
                                    <i class="fa fa-trash-o"></i> 删除
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div style="text-align: right">
                    <?php echo $page; ?>
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

<script type="text/javascript">
    $(function () {

        //删除js
        $('.delArtciel').click(function () {
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认删除此广告?',
                {icon: 3, title: '提示'},
                function (index) {
                    $.getJSON("<?php echo url('Advert/delete_advert'); ?>",
                        {'id': $this.attr("id").replace('del-', '')},
                        function (data) {
                            if (data.pass == 1) {
                                layer.msg(data.msg, {icon: 1, time: 1500, shade: 0.1}, function (index) {
                                        layer.close(index);
                                        history.go(0);
                                    }
                                );
                            } else {
                                layer.msg(res.msg, {icon: 0, time: 1500, shade: 0.1});
                            }
                        });
                    layer.close(index);
                });
            //阻止浏览器默认事件
        });

        //修改状态js
        $('.statusArtciel').click(function () {
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认更改此广告?',
                {icon: 3, title: '提示'},
                function (index) {
                    $.getJSON("<?php echo url('Advert/status_advert'); ?>",
                        {'id': $this.attr("id").replace('status-', '')},
                        function (data) {
                            if (data.pass == 1) {
                                layer.msg(data.msg, {icon: 1, time: 1000, shade: 0.1}, function (index) {
                                        layer.close(index);
                                        history.go(0);
                                    }
                                );
                            } else {
                                layer.msg(res.msg, {icon: 0, time: 1500, shade: 0.1});
                            }
                        });
                    layer.close(index);
                });
            //阻止浏览器默认事件
        });

        //修改推荐js
        $('.isTuiArtciel').click(function () {
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认更改此广告?',
                {icon: 3, title: '提示'},
                function (index) {
                    $.getJSON("<?php echo url('Advert/isTui_advert'); ?>",
                        {'id': $this.attr("id").replace('isTui-', '')},
                        function (data) {
                            if (data.pass == 1) {
                                layer.msg(data.msg, {icon: 1, time: 1000, shade: 0.1}, function (index) {
                                        layer.close(index);
                                        history.go(0);
                                    }
                                );
                            } else {
                                layer.msg(res.msg, {icon: 0, time: 1500, shade: 0.1});
                            }
                        });
                    layer.close(index);
                });
            //阻止浏览器默认事件
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(".i-checks").iCheck({checkboxClass: "icheckbox_square-green", radioClass: "iradio_square-green",})
    });
</script>
</body>
</html>