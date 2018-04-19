<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:97:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/index\view\index\index.html";i:1510037448;s:90:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/index\view\base.html";i:1510301511;s:97:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/index\view\public\head.html";i:1510026320;s:97:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/index\view\public\menu.html";i:1510038223;s:99:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/index\view\public\header.html";i:1510034481;s:99:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/index\view\public\footer.html";i:1510026944;s:97:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/index\view\public\foot.html";i:1510121431;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>网站标题</title>
    <meta name="description" content="网站描述" />
    <meta name="keywords" content="网站关键字" />

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
                <h2>Boot-z</h2>
                <p>Boot-z.CMS为您提供了一套完整的内容管理系统，让您在无须考虑系统性的增删改查,系统资源调配等基础问题而专注于自己的业务逻辑.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                <a href="#"><img src="/static/index/images/work-1.jpg" alt="Free HTML5 Website Template" class="img-responsive">
                    <div class="fh5co-copy">
                        <h3>Clipboard Office</h3>
                        <p>Web Design</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                <a href="#"><img src="/static/index/images/work-2.jpg" alt="Free HTML5 Website Template" class="img-responsive">
                    <div class="fh5co-copy">
                        <h3>Smart Layers</h3>
                        <p>Brand &amp; Identity</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                <a href="#"><img src="/static/index/images/work-3.jpg" alt="Free HTML5 Website Template" class="img-responsive">
                    <div class="fh5co-copy">
                        <h3>Notepad Mockup</h3>
                        <p>Illustration</p>
                    </div>
                </a>
            </div>

        </div>
    </div>

</div>
<div id="fh5co-services" class="fh5co-bg-section border-bottom">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-8 col-md-offset-2 text-left animate-box" data-animate-effect="fadeInUp">
                <div class="fh5co-heading">
                    <span>Boot-z.CMS</span>
                    <h2>We Can Do</h2>
                    <p>制作任何一个企业网站.个人博客网站.个人官方网站.产品展示网站.中英文双语网站.多语言网站.小白一键建站.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 ">
                <div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-home"></i>
						</span>
                    <h3>操作简介</h3>
                    <p>基于Bootstrap3.3.6最新版本开发的扁平化主题，它采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，以及ThinkPHP5.0.1版本的后台，强大的API功能，为您定制更高端的企业网站.</p>
                    <p><a href="#">Learn more</a></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 ">
                <div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-eye"></i>
						</span>
                    <h3>一览便知</h3>
                    <p>正因为BootCMS简单，所以才可以说一览便知，基于现在市面上的CMS难操作、客户学不会、专业给程序猿用的CMS，开发用了一天，教会客户怎么使用，用了一周！所以.BootCMS应世而生。</p>
                    <p><a href="#">Learn more</a></p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-4 col-sm-6 ">
                <div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-search"></i>
						</span>
                    <h3>版本强大</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p><a href="#">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fh5co-counter">
    <div class="container">

        <div class="row animate-box" data-animate-effect="fadeInUp">
            <div class="col-md-8 col-md-offset-2 text-left fh5co-heading">
                <span>Boot-z.CMS</span>
                <h2>Fun Facts</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="feature-center">
						<span class="icon">
							<i class="ti-download"></i>
						</span>
                    <span class="counter"><span class="js-counter" data-from="0" data-to="15" data-speed="1500" data-refresh-interval="50">1</span>M+</span>
                    <span class="counter-label">Downloads</span>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="feature-center">
							<span class="icon">
								<i class="ti-face-smile"></i>
							</span>
                    <span class="counter"><span class="js-counter" data-from="0" data-to="120" data-speed="1500" data-refresh-interval="50">1</span>+</span>
                    <span class="counter-label">Happy Clients</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="feature-center">
							<span class="icon">
								<i class="ti-briefcase"></i>
							</span>
                    <span class="counter"><span class=" js-counter" data-from="0" data-to="90" data-speed="1500" data-refresh-interval="50">1</span>+</span>
                    <span class="counter-label">Projects Done</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="feature-center">
							<span class="icon">
								<i class="ti-time"></i>
							</span>
                    <span class="counter"><span class="js-counter" data-from="0" data-to="12" data-speed="1500" data-refresh-interval="50">1</span>K+</span>
                    <span class="counter-label">Hours Spent</span>

                </div>
            </div>

        </div>
    </div>
</div>

<div id="fh5co-blog" class="fh5co-bg-section">
    <div class="container">
        <div class="row animate-box row-pb-md" data-animate-effect="fadeInUp">
            <div class="col-md-8 col-md-offset-2 text-left fh5co-heading">
                <span>Thoughts &amp; Ideas</span>
                <h2>Our Blog</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeInUp">
                <div class="fh5co-post">
                    <span class="fh5co-date">Sep. 12th</span>
                    <h3><a href="#">Web Design for the Future</a></h3>
                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                    <p class="author"><img src="/static/index/images/person1.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite> Mike Adam</cite></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeInUp">
                <div class="fh5co-post">
                    <span class="fh5co-date">Sep. 23rd</span>
                    <h3><a href="#">Web Design for the Future</a></h3>
                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                    <p class="author"><img src="/static/index/images/person1.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite> Mike Adam</cite></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeInUp">
                <div class="fh5co-post">
                    <span class="fh5co-date">Sep. 24th</span>
                    <h3><a href="#">Web Design for the Future</a></h3>
                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                    <p class="author"><img src="/static/index/images/person1.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite> Mike Adam</cite></p>
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

