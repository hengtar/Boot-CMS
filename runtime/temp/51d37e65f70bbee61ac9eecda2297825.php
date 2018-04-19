<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:101:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\auth\list_group.html";i:1508472320;s:97:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\public\head.html";i:1505897340;s:96:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\public\css.html";i:1506062714;s:95:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\public\js.html";i:1506062772;}*/ ?>
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
    <link rel="stylesheet" href="/static/layerTree/lay/css/layui.css" />
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>角色组</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <div  class="col-sm-2" style="width: 100px">
                        <div class="input-group" >
                            <button type="button" class="btn btn-success btn-outline" data-toggle="modal" data-target="#myGroup">添加角色</button>
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
                            <th width="5%">ID</th>
                            <th width="5%">角色数</th>
                            <th width="20%">角色组</th>
                            <th width="20%">更新时间</th>
                            <th width="10%">角色状态</th>
                            <th width="20%">操作</th>
                        </tr>
                        </thead>
                        <tbody id="article_list">
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): if($list['id'] !== 1): ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $list['id']; ?></td>
                                    <td style="text-align: center">50</td>
                                    <td style="text-align: center"><?php echo $list['title']; ?></td>

                                    <td style="text-align: center"><?php echo $list['update_time']; ?></td>
                                    <td style="text-align: center">
                                        <?php if($list['status'] == '1'): ?>
                                        <a class="btn  btn-success btn-outline btn-xs statusAuth" id="status-<?php echo $list['id']; ?>">
                                            <i class="fa fa-hand-o-up"></i> 开启
                                        </a>
                                        <?php else: ?>
                                        <a class="btn btn-danger btn-outline btn-xs statusAuth" id="status-<?php echo $list['id']; ?>">
                                            <i class="fa fa-hand-o-down"></i> 关闭
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: center">
                                        <a  href="javascript:void(0)" onclick="giveAuth(<?php echo $list['id']; ?>)" class="btn btn-info btn-outline btn-xs">
                                            <i class="fa fa-paste"></i> 权限分配</a>
                                        &nbsp; &nbsp;
                                        <a href="<?php echo url('Auth/update_group',array('id' => $list['id'])); ?>" class="btn btn-primary btn-outline btn-xs">
                                            <i class="fa fa-paste"></i> 编辑
                                        </a>
                                        &nbsp; &nbsp;
                                        <button class="btn btn-danger btn-outline btn-xs delGroup" id="del-<?php echo $list['id']; ?>">
                                            <i class="fa fa-trash-o"></i> 删除
                                        </button>
                                    </td>
                                </tr>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--添加/编辑-->
<div class="modal  fade" id="myGroup" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title">添加角色</h3>
            </div>
            <form class="form-horizontal" name="add_rule" id="add_rule" method="post" action="<?php echo url('Auth/insert_group'); ?>">
                <div class="ibox-content">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">角色组名称</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" id="title" placeholder="输入角色组名称" class="form-control"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">状&nbsp;态</label>
                        <div class="col-sm-6">
                            <div class="radio i-checks">
                                <input type="radio" name='status' value="1" checked="checked"/>启用&nbsp;&nbsp;
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


<div class="zTreeDemoBackground left" style="display: none" id="role">
    <form>
        <div class="form-group">
            <div class="col-sm-5 col-sm-offset-2" style="text-align: left">
                <link rel="StyleSheet" href="/static/dTree/dtree.css" type="text/css" />
                <script type="text/javascript" src="/static/dTree/dtree.js"></script>
                <script type="text/javascript">
                    d = new dTree('d');
                    //参数一: 树名称。参数二：单选多选 true多选  false单选  默认单选
                    d.add(0,-1,'<h2>权限分配</h2>');
                    d.add(1,0,'authority','1','日常工作');
                    d.add(2,1,'authority','2','新建工作');
                    d.add(3,2,'authority','3','人事 ');
                    d.add(4,2,'authority','4','财务');
                    d.add(5,2,'authority','5','客服');
                    d.add(6,3,'authority','6','请假申请');
                    d.add(7,3,'authority','7','出差申请');
                    d.add(8,3,'authority','8','招聘申请');
                    document.write(d);
                    d.openAll();
                </script>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-4" style="margin-top: 25px">
                <input type="button" value="确认分配" class="btn btn-primary" id="postform"/>
            </div>
        </div>
    </form>

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
    $(function(){
        //删除js
        $('.delGroup').click(function(){
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认删除此角色?',
                {icon: 3, title:'提示'},
                function(index){$.getJSON("<?php echo url('Auth/delete_group'); ?>",
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
                function(index){$.getJSON("<?php echo url('Auth/status_group'); ?>",
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

        //分配权限
    function giveAuth(id){
        $.getJSON("<?php echo url('Auth/giveAuth'); ?>", {'type' : 'get', 'id' : id}, function(res){

            alert(res);
//            if(res.code == 1){
//                //页面层
//                layer.open({
//                    type: 1,
//                    area:['400px', '80%'],
//                    title:'权限分配',
//                    skin: 'layui-layer-demo', //加上边框
//                    content: $('#role')
//                });
//
//
//            }else{
//                layer.alert(res.msg);
//            }

        });

    }


</script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
</body>
</html>