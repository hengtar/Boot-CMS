<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"/data/wwwroot/default/thinkphp/public/../application/admin/view/auth/list_user.html";i:1503989205;s:80:"/data/wwwroot/default/thinkphp/public/../application/admin/view/public/head.html";i:1503989206;s:79:"/data/wwwroot/default/thinkphp/public/../application/admin/view/public/css.html";i:1503989206;s:78:"/data/wwwroot/default/thinkphp/public/../application/admin/view/public/js.html";i:1503989206;}*/ ?>
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

    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>用户管理</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <div  class="col-sm-2" style="width: 100px">
                        <div class="input-group" >

                            <button type="button" class="btn btn-success btn-outline" data-toggle="modal" data-target="#myAuth">添加用户</button>
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
                            <th width="8%">昵称</th>
                            <!--<th>头像</th>-->
                            <th>用户名</th>
                            <th>所属角色</th>
                            <th width="15%">创建时间</th>
                            <th width="15%">更新时间</th>
                            <th>上次登录时间</th>
                            <th>上次登录地点</th>
                            <th>登录次数</th>
                            <th>是否启用</th>
                            <th width="20%">操作</th>
                        </tr>
                        </thead>
                        <tbody id="article_list">
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                        <tr>
                            <td style="text-align: center"><?php echo $list['id']; ?></td>
                            <td style="text-align: center"><?php echo $list['nickname']; ?></td>
                            <td style="text-align: center"><?php echo $list['user']; ?></td>
                            <td style="text-align: center"><?php echo $list['title']; ?></td>
                            <td style="text-align: center"><?php echo $list['create_time']; ?></td>
                            <td style="text-align: center"><?php echo $list['update_time']; ?></td>
                            <td style="text-align: center"><?php echo $list['last_login_time']; ?></td>
                            <td style="text-align: center"><?php echo $list['last_login_ip']; ?></td>
                            <td style="text-align: center"><?php echo $list['login_num']; ?></td>
                            <td style="text-align: center">
                                <?php if($list['id'] == '1'): ?>

                                    不可关闭

                                <?php else: if($list['status'] == '1'): ?>
                                    <a class="btn  btn-success btn-outline btn-xs statusUser" id="status-<?php echo $list['id']; ?>">
                                        <i class="fa fa-hand-o-up"></i> 开启
                                    </a>
                                    <?php else: ?>
                                    <a class="btn btn-danger btn-outline btn-xs statusUser" id="status-<?php echo $list['id']; ?>">
                                        <i class="fa fa-hand-o-down"></i> 关闭
                                    </a>
                                    <?php endif; endif; ?>
                            </td>
                            <td style="text-align: center">

                                <?php if($list['id'] == '1'): ?>

                                不可操作

                                <?php else: ?>
                                    <a href="<?php echo url('Auth/update_user',array('id' => $list['id'])); ?>" class="btn btn-primary btn-outline btn-xs">
                                        <i class="fa fa-paste"></i> 编辑
                                    </a>
                                    &nbsp; &nbsp;
                                    <button class="btn btn-danger btn-outline btn-xs delUser" id="del-<?php echo $list['id']; ?>">
                                        <i class="fa fa-trash-o"></i> 删除
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>添加用户</h5>
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
                            <form class="form-horizontal" method="post" action="<?php echo url('Auth/insert_user'); ?>">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">管理员名称：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="username" type="text" class="form-control" name="username" placeholder="请输入管理员名称">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">管理员角色：</label>
                                    <div class="input-group col-sm-4">
                                        <select name="p_id" class="form-control">
                                            <option value="">==请选择角色==</option>
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
                                        <input id="password" type="text" class="form-control" name="password" placeholder="请输入登录密码">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">真实姓名：</label>
                                    <div class="input-group col-sm-4">
                                        <input id="real_name" type="text" class="form-control" name="real_name" placeholder="请输入真实姓名">

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">状&nbsp;态</label>
                                    <div class="col-sm-4">
                                        <div class="radio i-checks">
                                            <input type="radio" name='status' value="1" checked="checked"/>开启&nbsp;&nbsp;
                                            <input type="radio" name='status' value="0" />关闭
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
        $('.delUser').click(function(){
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认删除此管理员?',
                {icon: 3, title:'提示'},
                function(index){$.getJSON("<?php echo url('Auth/delete_user'); ?>",
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
        $('.statusUser').click(function(){
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认更改此状态?',
                {icon: 3, title:'提示'},
                function(index){$.getJSON("<?php echo url('Auth/status_user'); ?>",
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