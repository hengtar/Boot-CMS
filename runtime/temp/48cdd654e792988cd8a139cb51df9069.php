<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:88:"C:\Users\Administrator\Desktop\blog\public/../application/admin\view\auth\list_menu.html";i:1505702521;s:85:"C:\Users\Administrator\Desktop\blog\public/../application/admin\view\public\head.html";i:1505897340;s:84:"C:\Users\Administrator\Desktop\blog\public/../application/admin\view\public\css.html";i:1506062714;s:83:"C:\Users\Administrator\Desktop\blog\public/../application/admin\view\public\js.html";i:1506062772;}*/ ?>
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
        <div class="ibox-title">
            <h5>权限菜单</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <div  class="col-sm-2" style="width: 100px">
                        <div class="input-group" >

                            <button type="button" class="btn btn-success btn-outline" data-toggle="modal" data-target="#myAuth">添加权限</button>
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
                            <th>排序</th>
                            <th>权限名称</th>
                            <th width="20%">权限节点</th>
                            <th width="15%">更新时间</th>
                            <th>菜单状态</th>
                            <th width="20%">操作</th>
                        </tr>
                        </thead>
                        <tbody id="article_list">
                            <?php if(is_array($listRule) || $listRule instanceof \think\Collection || $listRule instanceof \think\Paginator): if( count($listRule)==0 ) : echo "" ;else: foreach($listRule as $key=>$listRule): ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $listRule['id']; ?></td>
                                    <td style="text-align: center"><?php echo $listRule['sort']; ?></td>
                                    <td>&nbsp; &nbsp;<?php echo $listRule['lefthtml']; ?><?php echo $listRule['title']; ?></td>
                                    <td style="text-align: center"><?php echo $listRule['name']; ?></td>
                                    <td style="text-align: center"><?php echo $listRule['update_time']; ?></td>
                                    <td style="text-align: center">
                                        <?php if($listRule['status'] == '1'): ?>
                                            <a class="btn  btn-success btn-outline btn-xs statusAuth" id="status-<?php echo $listRule['id']; ?>">
                                                <i class="fa fa-hand-o-up"></i> 开启
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-danger btn-outline btn-xs statusAuth" id="status-<?php echo $listRule['id']; ?>">
                                                <i class="fa fa-hand-o-down"></i> 关闭
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="<?php echo url('Auth/update_auth',array('id' => $listRule['id'])); ?>" class="btn btn-primary btn-outline btn-xs">
                                            <i class="fa fa-paste"></i> 编辑
                                        </a>
                                        &nbsp; &nbsp;
                                        <button class="btn btn-danger btn-outline btn-xs delAuth" id="del-<?php echo $listRule['id']; ?>">
                                            <i class="fa fa-trash-o"></i> 删除
                                        </button>
                                    </td>
                                </tr>

                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="text-align: right">

            </div>
        </div>
    </div>
</div>

<div class="modal  fade" id="myAuth" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title">添加权限</h3>
            </div>
            <form class="form-horizontal" name="add_rule" id="add_rule" method="post" action="<?php echo url('insert_auth'); ?>">
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">所属父级</label>
                        <div class="col-sm-8">
                            <select name="p_id" class="form-control">
                                <option value="0">--默认顶级--</option>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                                     <option value="<?php echo $list['id']; ?>" style="margin-left:55px;"><?php echo $list['lefthtml']; ?><?php echo $list['title']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">权限名称</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" id="title" placeholder="输入权限名称" class="form-control"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">权限节点</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" placeholder="模块/控制器/方法" class="form-control"/>
                            <span class="help-block m-b-none">如：admin/index/index (Ps:节点名称要与后台菜单相同)</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">排&nbsp;序</label>
                        <div class="col-sm-8">
                            <input type="text" name="sort" id="sort" value="50" placeholder="输入排序" class="form-control"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">状&nbsp;态</label>
                        <div class="col-sm-6">
                            <div class="radio i-checks">
                                <input type="radio" name='status' value="1" checked="checked"/>开启&nbsp;&nbsp;
                                <input type="radio" name='status' value="0" />关闭
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 保存</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> 关闭</button>
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


<!--<div class="ibox-content">-->
<!--<div class="spiner-example">-->
<!--<div class="sk-spinner sk-spinner-rotating-plane"></div>-->
<!--</div>-->
<!--</div>-->
<script type="text/javascript">
    $(function(){

        //删除js
        $('.delAuth').click(function(){
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认删除此分类?',
                {icon: 3, title:'提示'},
                function(index){$.getJSON("<?php echo url('Auth/delete_auth'); ?>",
                    {'id' : $this.attr("id").replace('del-', '')},
                    function(data){
                        if(data.pass == 1)
                        {
                            layer.msg(data.msg,{icon:1,time:1500,shade: 0.1},function                    (index){
                                    layer.close(index);
                                    history.go(0);
                                }
                            );
                        }else{
                            layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                        }
                    });
                    layer.close(index);
                });
            //阻止浏览器默认事件
        });

        //修改状态js
        $('.statusAuth').click(function(){
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认更改此状态?',
                {icon: 3, title:'提示'},
                function(index){$.getJSON("<?php echo url('Auth/status_auth'); ?>",
                    {'id' : $this.attr("id").replace('status-', '')},
                    function(data){
                        if(data.pass == 1)
                        {
                            layer.msg(data.msg,{icon:1,time:1000,shade: 0.1},function                    (index){
                                    layer.close(index);
                                    history.go(0);
                                }
                            );
                        }else{
                            layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                        }
                    });
                    layer.close(index);
                });
            //阻止浏览器默认事件
        });
    });
</script>

<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
</body>
</html>