<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"/data/wwwroot/www.boot-z.com/public/../application/index/view/article/index.html";i:1524044128;s:78:"/data/wwwroot/www.boot-z.com/public/../application/index/view/public/head.html";i:1524038134;s:78:"/data/wwwroot/www.boot-z.com/public/../application/index/view/public/menu.html";i:1524030308;s:80:"/data/wwwroot/www.boot-z.com/public/../application/index/view/public/footer.html";i:1524038489;s:78:"/data/wwwroot/www.boot-z.com/public/../application/index/view/public/foot.html";i:1524030307;}*/ ?>
<!DOCTYPE html>
<html>
<title><?php echo $config['web_title']; ?>-<?php echo $article['title']; ?></title>
<meta name="description" content="<?php echo $article['description']; ?>"/>
<meta name="keywords" content="<?php echo $article['keywords']; ?>"/>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Erudition Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="/static/index/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/static/index/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/static/index/images/ico.ico" type="image/x-icon" rel="icon"/>
    <!-- js -->
    <script src="/static/index/js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,900,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/static/index/css/flexslider.css" type="text/css" media="screen" />
</head>
<body>
<div class="header-logo">
    <div class="container">
        <div class="header-nav">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <a class="navbar-brand" href="index.html">Boot-CMS <span>Come ThinkPHP 5.0</span></a>
                    </div>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php if(is_array($Menu) || $Menu instanceof \think\Collection || $Menu instanceof \think\Paginator): if( count($Menu)==0 ) : echo "" ;else: foreach($Menu as $key=>$nav): ?>
                        <li class="hvr-bounce-to-bottom">
                            <a href="<?php echo $nav['template_link']; ?>"><?php echo $nav['name']; ?></a>    <!--一级菜单-->
                        </li>
                        <?php if(($nav['son'] !== '')): ?>
                        <ul>
                            <?php if(is_array($nav['son']) || $nav['son'] instanceof \think\Collection || $nav['son'] instanceof \think\Paginator): if( count($nav['son'])==0 ) : echo "" ;else: foreach($nav['son'] as $key=>$son): ?>
                            <li class="hvr-bounce-to-bottom"><a href="<?php echo $son['template_link']; ?>"><?php echo $son['name']; ?></a></li>    <!--二级菜单-->
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <!--<li class="hvr-bounce-to-bottom active"><a href="index.html">首页</a></li>-->
                        <!--<li class="hvr-bounce-to-bottom"><a href="services.html">服务内容</a></li>-->
                        <!--<li class="hvr-bounce-to-bottom"><a href="gallery.html">关于我们</a></li>-->
                        <!--<li class="hvr-bounce-to-bottom"><a href="blog.html">生活随笔</a></li>-->
                        <!--<li class="hvr-bounce-to-bottom"><a href="blog.html">程序笔记</a></li>-->
                        <!--<li class="hvr-bounce-to-bottom"><a href="contact.html">联系我们</a></li>-->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
</div>
<style>
    .laozhang span{
        font-family: "微软雅黑" !important;
    }
    .laozhang img{
        width: 100%;
        height: auto;
    }
</style>
<!-- single -->
<div class="single">
    <div class="container">
        <h3><?php echo $article['title']; ?></h3>
        <div class="clearfix"></div>
        <div class="laozhang">
            <hr>
            <p><?php echo $article['content']; ?></p>
        </div>
    </div>
</div>
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-3 footer-grid">
            <h6>Boot-CMS</h6>
            <p>Boot-CMS是一款基于ThinkPHP5+MySQL开发的后台内容管理框架, 开发者可以根据自身的需求以应用的形式进行扩展、改编、修改源文件等完成自己的项目需求.</p>
        </div>
        <div class="col-md-3 footer-grid">
            <h6>Friendship Link</h6>
            <ul>
                <li><a href="http://www.jh12.cn">老张博客</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grid">
            <h6>Support</h6>
            <ul>
                <li><a href="<?php echo url('index/index'); ?>">首页</a></li>
                <li><a href="<?php echo url('article/lists',array('page' => 35)); ?>">技术笔记</a></li>
                <li><a href="<?php echo url('article/lists',array('page' => 34)); ?>">版本更替</a></li>
                <li><a href="<?php echo url('page/us'); ?>">联系我们</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grid">
            <h6>Extras</h6>
            <ul>
                <li><a href="https://www.kancloud.cn/zjh852952656/test/583448">手册</a></li>
                <li><a href="JavaScript:alert('暂未开放下载,请持续关注Boot')">下载</a></li>
                <li><a href="JavaScript:alert('暂未开放')">读者须知</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="footer-copy">
    <p>Copyright &copy; 2018 - 2018. 版权所有:<?php echo $config['web_title']; ?> ICP:<?php echo $config['web_icp']; ?></p>
</div>

<!-- //footer -->
<script src="/static/index/js/bootstrap.js"> </script>
<script src="/static/index/js/classie.js"></script>
<script src="/static/index/js/uisearch.js"></script>

<script defer src="/static/index/js/jquery.flexslider.js"></script>
<script src="/static/index/js/jquery.wmuSlider.js"></script>
</body>
</html>