<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:85:"C:\Users\Administrator\Desktop\blog\public/../application/index\view\index\index.html";i:1523955160;s:85:"C:\Users\Administrator\Desktop\blog\public/../application/index\view\public\head.html";i:1523951448;s:85:"C:\Users\Administrator\Desktop\blog\public/../application/index\view\public\menu.html";i:1524022065;s:87:"C:\Users\Administrator\Desktop\blog\public/../application/index\view\public\footer.html";i:1523948509;s:85:"C:\Users\Administrator\Desktop\blog\public/../application/index\view\public\foot.html";i:1523884884;}*/ ?>
<!DOCTYPE html>
<html>
<title><?php echo $config['web_title']; ?></title>
<meta name="description" content="<?php echo $config['web_description']; ?>"/>
<meta name="keywords" content="<?php echo $config['web_keywords']; ?>"/>
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
<!-- //header -->
<!-- banner -->
<div class="banner">
    <div class="container">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="banner-info">
                            <h1>Boot - CMS</h1>
                            <p>Boot-CMS是一款基于ThinkPHP5+MySQL开发的后台内容管理框架, 开发者可以根据自身的需求以应用的形式进行扩展、改编、修改源文件等完成自己的项目需求.</p>
                        </div>
                    </li>
                    <li>
                        <div class="banner-info">
                            <h1>老张</h1>
                            <p>诚接基于ThinkPHP5，ThinkPHP3功能开发，网站开发，微信开发，小程序开发，APP开发，网站系统定制开发，网站模板二次开发，商城系统，产品介绍企业型网站，企业网站等。</p>
                        </div>
                    </li>
                    <li>
                        <div class="banner-info">
                            <h1>老张</h1>
                            <p>世界，没有人生下来就是王者，也没有谁的地位不可动摇，而在于我们是否能用全部的能力和意志来做一件事情。熟悉网络营销、web前端、web后端、易语言脚本、C++，有多起网络项目运行经验。</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!--FlexSlider-->

        <script type="text/javascript">
            $(window).load(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
        <!--End-slider-script-->
    </div>
</div>
<!-- banner-bottom -->
<div class="banner-bottom">
    <div class="container">
        <h3>BOOT-CMS</h3>
        <p class="velit">The world, no one is born King, no one's status is unshakeable, but whether we can do one thing with all our abilities and will. Familiar with network marketing, web front end, web back end, easy language script, C++, many network project running experience.</p>
        <div class="banner-bottom-grids">
            <div class="col-md-4 banner-bottom-grid">
                <h4>Donload</h4>
                <p>欢迎下载Boot-CMS 开源系统.
                Boot-CMS是一款基于ThinkPHP5+MySQL开发的后台内容管理框架</p>
                <div class="more">
                    <a href="javascript:alert('暂且不支持下载,请继续关注Boot-cms')" class="hvr-bounce-to-bottom">Donload</a>
                </div>
            </div>
            <div class="col-md-4 banner-bottom-grid">
                <h4>Boot-CMS</h4>
                <p>Boot-CMS是一款基于ThinkPHP5+MySQL开发的后台内容管理框架, 开发者可以根据自身的需求以应用的形式进行扩展、改编、修改源文件等完成自己的项目需求.完善自己的项目及功能性的要求.</p>
            </div>
            <div class="col-md-4 banner-bottom-grid">
                <h4>LaoZhang</h4>
                <p>诚接基于ThinkPHP5，ThinkPHP3功能开发，网站开发，微信开发，小程序开发，APP开发，网站系统定制开发，网站模板二次开发，商城系统，产品介绍企业型网站，企业网站等</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="col-md-3 footer-grid">
            <h6>Boot-CMS</h6>
            <p>Boot-CMS是一款基于ThinkPHP5+MySQL开发的后台内容管理框架, 开发者可以根据自身的需求以应用的形式进行扩展、改编、修改源文件等完成自己的项目需求.</p>
        </div>
        <div class="col-md-3 footer-grid">
            <h6>Information</h6>
            <ul>
                <li><a href="#">首页</a></li>
                <li><a href="#">技术笔记</a></li>
                <li><a href="#">版本更替</a></li>
                <li><a href="#">联系我们</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grid">
            <h6>Support</h6>
            <ul>
                <li><a href="#">首页</a></li>
                <li><a href="#">技术笔记</a></li>
                <li><a href="#">版本更替</a></li>
                <li><a href="#">联系我们</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grid">
            <h6>Extras</h6>
            <ul>
                <li><a href="#">读者须知</a></li>
                <li><a href="#">下载</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="footer-copy">
    <p>Copyright &copy; 2018 - 2018. 版权所有:<?php echo $config['web_title']; ?> ICP:<?php echo $config['web_icp']; ?></p>
</div>

<!-- //footer -->
<!-- for bootstrap working -->
<script src="/static/index/js/bootstrap.js"> </script>
<script src="/static/index/js/classie.js"></script>
<script src="/static/index/js/uisearch.js"></script>

<script defer src="/static/index/js/jquery.flexslider.js"></script>
<script src="/static/index/js/jquery.wmuSlider.js"></script>
<!-- //for bootstrap working -->
</body>
</html>