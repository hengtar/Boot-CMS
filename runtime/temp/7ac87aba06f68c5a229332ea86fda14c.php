<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:102:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\article\list_article.html";i:1502351410;s:93:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\head.html";i:1500454346;s:92:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\css.html";i:1500454344;s:91:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\js.html";i:1500454344;}*/ ?>

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

</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>文章列表</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12">
                    <div  class="col-sm-2" style="width: 100px">
                        <div class="input-group" >
                            <a href="<?php echo url('Article/insert_article'); ?>"><button class="btn btn-outline btn-success" type="button">添加文章</button></a>
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
                            <th>所属分类</th>
                            <th>文章封面</th>
                            <th width="15%">添加时间</th>
                            <th width="15%">更新时间</th>
                            <th >浏览量</th>
                            <th >状态</th>
                            <th >推荐</th>
                            <th >编辑</th>
                            <th >删除</th>
                        </tr>
                        </thead>
                        <tbody id="article_list">
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                        <tr class="lzCenter-td">
                            <td><?php echo $list['id']; ?></td>
                            <td><?php echo $list['title']; ?></td>
                            <td><?php echo $list['cate_name']; ?></td>
                            <td>
                                <img src="/uploads/images/<?php echo $list['photo']; ?>" height="30" width="80">

                            </td>
                            <td><?php echo $list['create_time']; ?></td>
                            <td><?php echo $list['update_time']; ?></td>
                            <td><?php echo $list['views']; ?></td>
                            <td>
                                <?php if(($list['status'] == 1)): ?>
                                    <a class="btn  btn-success btn-outline btn-xs statusArtciel"  id="status-<?php echo $list['id']; ?>">
                                        <i class="fa fa-hand-o-up"></i> 已开启
                                    </a>
                                <?php else: ?>
                                    <a class="btn btn-danger btn-outline btn-xs statusArtciel"  id="status-<?php echo $list['id']; ?>">
                                        <i class="fa fa-hand-o-down"></i> 已关闭
                                    </a>
                                <?php endif; ?>

                            </td>
                            <td>
                                <?php if(($list['is_tui'] == 1)): ?>
                                <a class="btn  btn-success btn-outline btn-xs isTuiArtciel"  id="isTui-<?php echo $list['id']; ?>">
                                    <i class="fa fa-hand-o-up"></i> 已开启
                                </a>
                                <?php else: ?>
                                <a class="btn btn-danger btn-outline btn-xs isTuiArtciel"  id="isTui-<?php echo $list['id']; ?>">
                                    <i class="fa fa-hand-o-down"></i> 已关闭
                                </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a  class="btn btn-primary btn-outline btn-xs">
                                    <i class="fa fa-paste"></i> 编辑
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-outline btn-xs delArtciel"  id="del-<?php echo $list['id']; ?>">
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
    $(function(){

        //删除js
        $('.delArtciel').click(function(){
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认删除此文章?',
                {icon: 3, title:'提示'},
                function(index){$.getJSON("<?php echo url('Article/delete_article'); ?>",
                    {'id' : $this.attr("id").replace('del-', '')},
                    function(data){
                        if(data.pass == 1)
                        {
                            layer.alert(data.msg,{icon:1,time:1500,shade: 0.1},function                    (index){
                                    layer.close(index);
                                    history.go(0);
                                }
                            );
                        }else{
                            layer.alert(res.msg,{icon:0,time:1500,shade: 0.1});
                        }
                    });
                    layer.close(index);
                });
            //阻止浏览器默认事件
        });

        //修改状态js
        $('.statusArtciel').click(function(){
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认更改此文章?',
                {icon: 3, title:'提示'},
                function(index){$.getJSON("<?php echo url('Article/status_article'); ?>",
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
                            layer.alert(res.msg,{icon:0,time:1500,shade: 0.1});
                        }
                    });
                    layer.close(index);
                });
            //阻止浏览器默认事件
        });

        //修改推荐js
        $('.isTuiArtciel').click(function(){
            var $p = $(this).parent().parent();
            var $this = $(this);
            layer.confirm('确认更改此文章?',
                {icon: 3, title:'提示'},
                function(index){$.getJSON("<?php echo url('Article/isTui_article'); ?>",
                    {'id' : $this.attr("id").replace('isTui-', '')},
                    function(data){
                        if(data.pass == 1)
                        {
                            layer.msg(data.msg,{icon:1,time:1000,shade: 0.1},function                    (index){
                                    layer.close(index);
                                    history.go(0);
                                }
                            );
                        }else{
                            layer.alert(res.msg,{icon:0,time:1500,shade: 0.1});
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