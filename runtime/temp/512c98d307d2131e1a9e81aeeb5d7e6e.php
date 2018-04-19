<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:88:"C:\Users\starwork\Desktop\Project\blog\public/../application/index\view\about\index.html";i:1499782628;s:87:"C:\Users\starwork\Desktop\Project\blog\public/../application/index\view\public\css.html";i:1499768983;s:87:"C:\Users\starwork\Desktop\Project\blog\public/../application/index\view\public\nav.html";i:1499782714;s:88:"C:\Users\starwork\Desktop\Project\blog\public/../application/index\view\public\foot.html";i:1499783501;s:86:"C:\Users\starwork\Desktop\Project\blog\public/../application/index\view\public\js.html";i:1499391291;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>老张博客</title>
    <meta name="description" content="老张博客" />
    <meta name="keywords" content="老张博客, 老张博客,老张博客,老张博客,老张博客,老张博客,老张博客" />
    <meta name="author" content="老张" />
    <!--This is css-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="/static/index/css/font.css" >

<link rel="stylesheet" href="/static/index/css/animate.css">

<link rel="stylesheet" href="/static/index/css/icomoon.css">

<link rel="stylesheet" href="/static/index/css/bootstrap.css">

<link rel="stylesheet" href="/static/index/css/magnific-popup.css">

<link rel="stylesheet" href="/static/index/css/style.css">

<!--<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">-->


    <!--This is css end -->
</head>
<body>

<div class="gtco-loader"></div>

<div id="page">
    <nav class="gtco-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-2 text-left">
                    <div id="gtco-logo"><a href="index.html"><img src="/static/index//static/index/images/logo.png" height="50" width="170"></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    
<ul>
    <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): if( count($nav)==0 ) : echo "" ;else: foreach($nav as $key=>$nav): ?>
        <li class="has-dropdown"><a href="<?php echo $nav['link']; ?>"><?php echo $nav['cate_name']; ?></a>
            <?php if(($nav['son'] !== '')): ?>
                <ul class="dropdown">
                    <?php if(is_array($nav['son']) || $nav['son'] instanceof \think\Collection || $nav['son'] instanceof \think\Paginator): if( count($nav['son'])==0 ) : echo "" ;else: foreach($nav['son'] as $key=>$son): ?>
                        <li><a href="<?php echo $son['link']; ?>"><?php echo $son['cate_name']; ?></a></li>
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

    <header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(/static/index/images/img_4.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 text-left">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeInUp">

                            <h1 class="mb30"><a href="#">关于老张</a></h1>
                            <h2 class="mb30"><a href="#">既然来到了这里,那你就别走了！</a></h2>
                            <h5 class="mb30"><a href="#">老张有话说 - 只说大实话</a></h5>
                            <p>by <a href="#" class="text-link">老张</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="gtco-maine">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-12">
                    <article class="mt-negative">
                        <div class="text-left content-article">
                            <div class="row">
                                <div class="col-lg-12 cp-r animate-box">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large <a href="#">language</a> ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>


    <!--This is foot-->
    
<footer id="gtco-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-12">
                <h3 class="footer-heading">风云榜</h3>
            </div>
            <?php if(is_array($HowArticle) || $HowArticle instanceof \think\Collection || $HowArticle instanceof \think\Paginator): if( count($HowArticle)==0 ) : echo "" ;else: foreach($HowArticle as $key=>$HowArticle): ?>
            <div class="col-md-4">
                <div class="post-entry">
                    <div class="post-img">
                        <a href="<?php echo url('Article/index',array('id'=> $HowArticle['id'])); ?>"><img src="/uploads/images/<?php echo $HowArticle['photo']; ?>" class="img-responsive" alt="Free HTML5 Bootstrap Template by GetTemplates.co"></a>
                    </div>
                    <div class="post-copy">
                        <h4><a href="<?php echo url('Article/index',array('id'=> $HowArticle['id'])); ?>"><?php echo msubstr($HowArticle['title'],0,20); ?></a></h4>
                        <a href="<?php echo url('Article/index',array('id'=> $HowArticle['id'])); ?>" class="post-meta"><span class="date-posted"><?php echo $HowArticle['update_time']; ?></span></a>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </div>

        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p>
                    <small class="block">Copyright © 2016 - 2020 Adobe Systems Incorporated. All rights reserved. <a href="http://www.jh12.cn/" target="_blank" title="老张博客">老张博客</a></small>
                </p>
                <p>
                <!--<ul class="gtco-social-icons">-->
                    <!--<li><a href="#"><i class="icon-twitter"></i></a></li>-->
                    <!--<li><a href="#"><i class="icon-facebook"></i></a></li>-->
                    <!--<li><a href="#"><i class="icon-linkedin"></i></a></li>-->
                    <!--<li><a href="#"><i class="icon-dribbble"></i></a></li>-->
                <!--</ul>-->
                </p>
            </div>
        </div>

    </div>
</footer>
    <!--This is foot-->
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!--This is js-->
<script src="/static/index/js/jquery.min.js"></script>

<script src="/static/index/js/jquery.easing.1.3.js"></script>

<script src="/static/index/js/bootstrap.min.js"></script>

<script src="/static/index/js/jquery.waypoints.min.js"></script>

<script src="/static/index/js/jquery.stellar.min.js"></script>

<script src="/static/index/js/main.js"></script>

<script src="/static/index/js/modernizr-2.6.2.min.js"></script>

<script src="/static/index/js/respond.min.js"></script>
<!--This is js end -->

</body>
</html>