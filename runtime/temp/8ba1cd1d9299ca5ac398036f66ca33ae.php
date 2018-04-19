<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:69:"/data/wwwroot/www.jh12.cn/public/../application/admin/view/index.html";i:1500052198;s:80:"/data/wwwroot/www.jh12.cn/public/../application/admin/view/public/introduce.html";i:1500052233;s:75:"/data/wwwroot/www.jh12.cn/public/../application/admin/view/public/head.html";i:1500052233;s:74:"/data/wwwroot/www.jh12.cn/public/../application/admin/view/public/css.html";i:1500052232;s:74:"/data/wwwroot/www.jh12.cn/public/../application/admin/view/public/nav.html";i:1500052235;s:75:"/data/wwwroot/www.jh12.cn/public/../application/admin/view/public/foot.html";i:1500052232;s:75:"/data/wwwroot/www.jh12.cn/public/../application/admin/view/public/left.html";i:1500052235;s:73:"/data/wwwroot/www.jh12.cn/public/../application/admin/view/public/js.html";i:1500052234;}*/ ?>
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

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" class="img-circle" src="/static/admin/img/profile_small.jpg" /></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">Beaut-zihan</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="J_menuItem" href="form_avatar.html">修改头像</a>
                        </li>
                        <li><a class="J_menuItem" href="profile.html">个人资料</a>
                        </li>
                        <li><a class="J_menuItem" href="contacts.html">联系我们</a>
                        </li>
                        <li><a class="J_menuItem" href="mailbox.html">信箱</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">Boot.Z</div>
            </li>
            <li>
                <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">系统管理 </span></a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa fa-bar-chart-o"></i>
                    <span class="nav-label">文章管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="J_menuItem" href="<?php echo url('Article/listCate'); ?>">文章分类</a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo url('Article/listArticle'); ?>">文章列表</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa fa-bar-chart-o"></i>
                    <span class="nav-label">菜单管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="J_menuItem" href="<?php echo url('Nav/listNav'); ?>">菜单列表</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">留言管理 </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a class="J_menuItem" href="<?php echo url('Message/listMessage'); ?>">留言列表</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">退出 </span></a>
            </li>

        </ul>
    </div>
</nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="hidden-xs">
                        <a href="<?php echo url('Login/loginOut'); ?>" ><i class="fa fa-outdent"></i> 注销账号</a>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a class="right-sidebar-toggle" aria-expanded="false">
                            <i class="fa fa-tasks"></i> 主题
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                </button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
            <a href="login.html" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo url('Index/home'); ?>" frameborder="0" data-id="index_v1.html" seamless></iframe>
        </div>
        <div class="footer">
    <div class="pull-right">&copy; 2014-2015 <a href="http://www.zi-han.net/" target="_blank">zihan's blog</a>
    </div>
</div>
    </div>
    <!--右侧部分结束-->
    <!--右侧边栏开始-->
    <div id="right-sidebar">
    <div class="sidebar-container">

        <ul class="nav nav-tabs navs-3">

            <li class="active">
                <a data-toggle="tab" href="#tab-1">
                    <i class="fa fa-gear"></i> 主题
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="sidebar-title">
                    <h3> <i class="fa fa-comments-o"></i> 作者信息</h3>
                    <small><i class="fa fa-tim"></i> 欢迎使用老张博客，别忘了对作者进行打赏哦!支付宝:852952656@qq.com</small>
                </div>
                <div class="skin-setttings">
                    <div class="title">主题设置</div>
                    <div class="setings-item">
                        <span>收起左侧菜单</span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                <label class="onoffswitch-label" for="collapsemenu">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span>固定顶部</span>

                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                <label class="onoffswitch-label" for="fixednavbar">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                        <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                <label class="onoffswitch-label" for="boxedlayout">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="title">皮肤选择</div>
                    <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                    </div>
                    <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                    </div>
                    <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                    </div>
                </div>
            </div>
            </ul>

        </div>
    </div>

</div>
</div>
    <!--右侧边栏结束-->
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