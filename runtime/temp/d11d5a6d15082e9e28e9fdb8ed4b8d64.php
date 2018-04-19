<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:104:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/index\view\lists\article.html";i:1510125420;s:95:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/index\view\base.html";i:1510301511;s:102:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/index\view\public\head.html";i:1510026320;s:102:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/index\view\public\menu.html";i:1510038223;s:104:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/index\view\public\header.html";i:1510034481;s:104:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/index\view\public\footer.html";i:1510026944;s:102:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/index\view\public\foot.html";i:1510121431;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
<title><?php echo $SeoConfig['name']; ?></title>
<meta name="keywords" content="<?php echo $SeoConfig['keywords']; ?>" />
<meta name="description" content="<?php echo $SeoConfig['description']; ?>" />
<style>
    .pages .pagination li{
        list-style-type:none;
        float:left;
        background:#fff;
        text-align: center;
        line-height:50px;
        cursor:pointer;
        background:transparent;
        width:50px !important;
        height:50px !important;}
    .pages .pagination li + li{
        margin-left:15px;
    }

    .pages .pagination{
        display:inline-block;
    }
    .pages .pagination li:hover{
        background:transparent;
    }
    .zjh{
        color:#000;
        display:inline-block;
        width:100%;
        height:100%;
    }
    .bty{
        color: white;
    }
    .pages .pagination li:hover{
        color:#f96982;
    }
    .pages .pagination li:hover .zjh{
        color:#f96982;
    }
    .pages .pagination .active{
        background:#f96982;
        width: 50px;
        height:50px;
        border-radius:50%;
    }
    .pages .pagination li a,.pages .pagination li span{
        font-family: "微软雅黑";
        font-size:18px;
        /*color:#80808c;*/
    }
</style>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="/static/index/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="/static/index/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="/static/index/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/static/index/css/magnific-popup.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="/static/index/css/style.css">

    <!-- Modernizr JS -->
    <script src="/static/index/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="/static/index/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="fh5co-loader"></div>
<div id="page">
    <nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-xs-2 text-left">
                <div id="fh5co-logo"><a href="index.html">Boot-Z<span>.</span>CMS</a></div>
            </div>
            <div class="col-xs-10 text-right menu-1">
                <ul>
                    <!--<li class="active"><a href="index.html">首页</a></li>-->
                    <!--<li class="has-dropdown">-->
                        <!--<a href="services.html">网站案例</a>-->
                        <!--<ul class="dropdown">-->
                            <!--<li><a href="#">中文网站</a></li>-->
                            <!--<li><a href="#">英文网站</a></li>-->
                            <!--<li><a href="#">中英文网站</a></li>-->
                            <!--<li><a href="#">多语言网站</a></li>-->
                        <!--</ul>-->
                    <!--</li>-->
                    <!--<li><a href="products.html">We Can</a></li>-->
                    <!--<li><a href="about.html">关于</a></li>-->
                    <!--<li><a href="blog.html">Blog</a></li>-->
                    <!--<li><a href="contact.html">留言</a></li>-->

                    <?php if(is_array($Menu) || $Menu instanceof \think\Collection || $Menu instanceof \think\Paginator): if( count($Menu)==0 ) : echo "" ;else: foreach($Menu as $key=>$nav): ?>
                    <li class="has-dropdown"><a href="<?php echo $nav['template_link']; ?>"><?php echo $nav['name']; ?></a>
                        <?php if(($nav['son'] !== '')): ?>
                        <ul class="dropdown">
                            <?php if(is_array($nav['son']) || $nav['son'] instanceof \think\Collection || $nav['son'] instanceof \think\Paginator): if( count($nav['son'])==0 ) : echo "" ;else: foreach($nav['son'] as $key=>$son): ?><li><a href="<?php echo $son['template_link']; ?>"><?php echo $son['name']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>



            </div>
        </div>
    </div>
</nav>
        <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(/static/index/images/img_bg_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 text-left">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                            <h1 class="mb30">来到这里，将颠覆您的思维。误入！</h1>
                            <p>
                                <a href="http://gettemplates.co/" target="_blank" class="btn btn-primary">GitHub</a>  <em class="or">or</em>
                                <a href="#/channels/staffpicks/93951774" class="link-watch popup-vimeo">查看操作视频</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    
<div id="fh5co-project">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-8 col-md-offset-2 text-left fh5co-heading  animate-box">
                <span>Boot-z.CMS</span>
                <h2><?php echo $SeoConfig['name']; ?></h2>
                <p><?php echo $SeoConfig['description']; ?>.</p>
            </div>
        </div>
        <div class="row">
           <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
            <div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                <a href="<?php echo url('lists/index',array('page'=> $list['id'])); ?>"><img src="/uploads/images/<?php echo $list['photo']; ?>" alt="Free HTML5 Website Template" class="img-responsive">
                    <div class="fh5co-copy">
                        <h3><?php echo $list['title']; ?></h3>
                        <p><?php echo $list['description']; ?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="row  " style="text-align: center">
                <div class="col-md-12">
                    <nav aria-label="Page navigation">
                        <div class="pages">
                            <?php echo $page; ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="fh5co-started">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>Let's work together</span>
                <h2>Try this template for free</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                <p><button type="submit" class="btn btn-primary">Get In Touch</button></p>
            </div>
        </div>
    </div>
</div>

<footer id="fh5co-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-4 fh5co-widget ">
                <h3>Concept.</h3>
                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                <p><a href="#">Learn More</a></p>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 ">
                <ul class="fh5co-footer-links">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Meetups</a></li>
                </ul>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 ">
                <ul class="fh5co-footer-links">
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Handbook</a></li>
                    <li><a href="#">Held Desk</a></li>
                </ul>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 ">
                <ul class="fh5co-footer-links">
                    <li><a href="#">Find Designers</a></li>
                    <li><a href="#">Find Developers</a></li>
                    <li><a href="#">Teams</a></li>
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">API</a></li>
                </ul>
            </div>
        </div>

        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p>
                    <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                    <small class="block">More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a> Demo Images: <a href="#" target="_blank">Pixeden</a> &amp; <a href="#" target="_blank">Unsplash</a></small>
                </p>
                <p>
                <ul class="fh5co-social-icons">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                </ul>
                </p>
            </div>
        </div>

    </div>
</footer>
</div>
<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
    <!-- jQuery -->
    <script src="/static/index/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="/static/index/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="/static/index/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="/static/index/js/jquery.waypoints.min.js"></script>
    <!-- countTo -->
    <script src="/static/index/js/jquery.countTo.js"></script>
    <!-- Magnific Popup -->
    <script src="/static/index/js/jquery.magnific-popup.min.js"></script>
    <script src="/static/index/js/magnific-popup-options.js"></script>
    <!-- Stellar -->
    <script src="/static/index/js/jquery.stellar.min.js"></script>
    <!-- Main -->
    <script src="/static/index/js/main.js"></script>
    <script>
        $(" .pages .pagination li a").addClass("zjh");
        $(" .pages .pagination .active span").addClass("bty");
        $(" .pages .pagination li span").addClass("zjh");
        $(".pages .pagination li:first a").text("«");
        $(".pages .pagination li:first span").text("«");
        $(".pages .pagination li:last span").text("»");
        $(".pages .pagination li:last a").text("»");
        $(".pages .pagination li:last").css("margin","0");
        $(".pages .pagination .active").hover(function () {
                $(".pages .pagination .active").css({"transition":"0.8s","background":"#e6e6e6"});
                $(".bty").css({"transition":"0.8s","color":"#fff"});
            },
            function () {
                $(".pages .pagination .active").css({"transition":"0.8s","background":"#f96982"});
                $(".bty").css({"transition":"0.8s","color":"#fff"});
            }
        );
    </script>
</body>
</html>

