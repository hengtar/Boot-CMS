<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:92:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\index\home.html";i:1503281042;s:98:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\introduce.html";i:1500454346;s:93:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\head.html";i:1500454346;s:92:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\css.html";i:1500454344;s:91:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin\view\public\js.html";i:1500454344;}*/ ?>
<!DOCTYPE html>
<html>
<!--// +-->
<!--// | 作者：Boot.Z  老张-->
<!--// +-->
<!--// | Copyright (c) 2017-2020 http://jh12.cn All rights reserved.-->
<!--// +-->
<!--// | 这个博客以及后台程序都是开源程序-->
<!--// +-->
<!--// | 没有任何后门添加,请放心使用-->
<!--// +-->
<!--// | 如果您高兴，请打赏老张一点点新意（毕竟熬夜加班写出来的）-->
<!--// +-->
<!--// | 作者支付宝 852952656@qq.com   QQ:852952656   wechat：852952656-->
<!--// +-->
<!--// | 如果您查出程序出BUG,请随时联系老张-->
<!--// +-->
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
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">总</span>
                    <h5>文章数</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">40 886,200</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i>
                    </div>
                    <small>总收入</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">日</span>
                    <h5>今日发布</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">275,800</h1>
                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i>
                    </div>
                    <small>新订单</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">总</span>
                    <h5>留言数</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">106,120</h1>
                    <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i>
                    </div>
                    <small>新访客</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">日</span>
                    <h5>今日留言</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">80,600</h1>
                    <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i>
                    </div>
                    <small>12月</small>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-sm-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>最新留言</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="feed-activity-list">
                        <?php if(is_array($NewMessage) || $NewMessage instanceof \think\Collection || $NewMessage instanceof \think\Paginator): if( count($NewMessage)==0 ) : echo "" ;else: foreach($NewMessage as $key=>$NewMessage): ?>
                        <div class="feed-element">
                            <div>
                                <small class="pull-right"><?php echo $NewMessage['address']; ?></small>
                                <strong><?php echo $NewMessage['nick_name']; ?></strong>
                                <div><?php echo $NewMessage['content']; ?></div>
                                <small class="text-muted"><?php echo $NewMessage['update_time']; ?></small>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>功能清单</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    <th>功能</th>
                                    <th>更新日期</th>
                                    <th>作者</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><small>系统管理</small>
                                    </td>
                                    <td><i class="fa fa-clock-o"></i> 暂无</td>
                                    <td>老张-Boot.Z</td>

                                </tr>
                                <tr>
                                    <td><small>权限管理</small>
                                    </td>
                                    <td><i class="fa fa-clock-o"></i> 暂无</td>
                                    <td>老张-Boot.Z</td>

                                </tr>
                                <tr>
                                    <td><small>会员管理</small>
                                    </td>
                                    <td><i class="fa fa-clock-o"></i> 暂无</td>
                                    <td>老张-Boot.Z</td>

                                </tr>
                                <tr>
                                    <td><small>文章管理</small>
                                    </td>
                                    <td><i class="fa fa-clock-o"></i> 暂无</td>
                                    <td>老张-Boot.Z</td>

                                </tr><tr>
                                    <td><small>广告管理</small>
                                    </td>
                                    <td><i class="fa fa-clock-o"></i> 暂无</td>
                                    <td>老张-Boot.Z</td>

                                </tr><tr>
                                    <td><small>菜单管理</small>
                                    </td>
                                    <td><i class="fa fa-clock-o"></i> 暂无</td>
                                    <td>老张-Boot.Z</td>

                                </tr><tr>
                                    <td><small>留言管理</small>
                                    </td>
                                    <td><i class="fa fa-clock-o"></i> 暂无</td>
                                    <td>老张-Boot.Z</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>技术支持</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    <th>作者</th>
                                    <th>邮箱</th>
                                    <!--<th>支付宝</th>-->
                                    <th>微信</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><small>老张-Boot.Z</small>
                                    </td>
                                    <td>852952656@qq.com</td>
                                    <!--<td>暂无</td>-->
                                    <td>852952656</td>
                                </tr>
                                </tbody>
                            </table>
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

</body>

</html>