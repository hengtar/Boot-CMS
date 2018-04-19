<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"/data/wwwroot/www.boot-z.com/public/../application/admin/view/auth/list_group.html";i:1524030305;s:78:"/data/wwwroot/www.boot-z.com/public/../application/admin/view/public/head.html";i:1524030307;s:77:"/data/wwwroot/www.boot-z.com/public/../application/admin/view/public/css.html";i:1524030307;s:76:"/data/wwwroot/www.boot-z.com/public/../application/admin/view/public/js.html";i:1524030307;}*/ ?>
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
    <link rel="stylesheet" href="/static/admin/tree/lay/css/layui.css" />
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
                                        <a href="<?php echo url('auth/give_auth',array('id' => $list['id'])); ?>" class="btn btn-success btn-outline btn-xs" > <i class="fa fa-paste"></i>  分配权限</a>
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
<!--权限分配-->

<div class="modal  fade" id="GiveAuth" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>分配权限</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <ul id="demo"></ul>
                            <script src="/static/admin/tree/layui.js" charset="utf-8"></script>
                            <script>
                                layui.use('tree', function() {
                                    var tree = layui.tree({
                                        elem: '#demo', //指定元素，生成的树放到哪个元素上
                                        check: 'checkbox', //勾选风格
                                        skin: 'as', //设定皮肤
                                        drag: true,//点击每一项时是否生成提示信息
                                        checkboxName: 'aa[]',//复选框的name属性值
                                        checkboxStyle: "",//设置复选框的样式，必须为字符串，css样式怎么写就怎么写
                                        click: function(item) { //点击节点回调
                                            console.log("item")
                                        },
                                        onchange: function (),
                                        nodes: [ //节点
                                            {
                                                name: '常用文件夹', //节点名称
                                                //	spread: true, //是否是展开状态，true为展开状态
                                                href: "http://www.baidu.com",//设置节点跳转的链接，如果不设置则不会跳转
                                                target: "_self",//节点链接打开方式
                                                alias: 'changyong',
                                                data: ,
                                                checkboxValue: 1,//复选框的值
                                                checked: true,//复选框默认是否选中
                                                children: [{
                                                    name: '所有未读',
                                                    alias: 'weidu',
                                                    checked: true,
                                                    checkboxValue: 2
                                                }, {
                                                    name: '置顶邮件',
                                                }, {
                                                    name: '标签邮件',
                                                    checked: false,
                                                    checkboxValue: 3
                                                }]
                                            }, {
                                                name: '我的邮箱',
                                                checked: true,
                                                spread: true,
                                                data: {
                                                    nodeName: "我的邮箱",
                                                    alias: "email"
                                                },
                                                children: [{
                                                    name: 'QQ邮箱',
                                                    checked: true,
                                                    checkboxValue: 4,
                                                    spread: true,
                                                    children: [{
                                                        name: '收件箱',
                                                        checked: false,
                                                        checkboxValue: 5,
                                                        children: [{
                                                            name: '所有未读',
                                                            checked: false,
                                                            checkboxValue: 6,
                                                            children: [{
                                                                name: '一周未读',
                                                                checked: false,
                                                                checkboxValue: 6
                                                            }]
                                                        }, {
                                                            name: '置顶邮件',
                                                            checked: false,
                                                            checkboxValue: 7
                                                        }, {
                                                            name: '标签邮件',
                                                            checked: false,
                                                            checkboxValue: 8
                                                        }]
                                                    }, {
                                                        name: '已发出的邮件',
                                                        checked: false,
                                                        checkboxValue: 9
                                                    }, {
                                                        name: '垃圾邮件',
                                                        checked: false,
                                                        checkboxValue: 10
                                                    }]
                                                }, {
                                                    name: '阿里云邮',
                                                    checked: true,
                                                    checkboxValue: 11,
                                                    children: [{
                                                        name: '收件箱',
                                                        checked: true,
                                                        checkboxValue: 12
                                                    }, {
                                                        name: '已发出的邮件',
                                                        checked: true,
                                                        checkboxValue: 13
                                                    }, {
                                                        name: '垃圾邮件',
                                                        checked: true,
                                                        checkboxValue: 14
                                                    }]
                                                }]
                                            }
                                        ]
                                    });


                                });
                            </script>
                        </div>
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

</script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
</body>
</html>