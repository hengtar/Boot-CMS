<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"C:\Users\starwork\Desktop\blog\public/../application/index\view\index\index.html";i:1500454353;s:79:"C:\Users\starwork\Desktop\blog\public/../application/index\view\public\css.html";i:1500454351;s:79:"C:\Users\starwork\Desktop\blog\public/../application/index\view\public\nav.html";i:1500454351;s:80:"C:\Users\starwork\Desktop\blog\public/../application/index\view\public\foot.html";i:1500454351;s:78:"C:\Users\starwork\Desktop\blog\public/../application/index\view\public\js.html";i:1500454350;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>老张</title>
    <meta name="description" content="老张博客"/>
    <meta name="keywords" content="老张"/>
    <meta name="author" content="老张"/>
    <!--This is css-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="/static/index/css/font.css" >

<link rel="stylesheet" href="/static/index/css/animate.css">

<link rel="stylesheet" href="/static/index/css/icomoon.css">

<link rel="stylesheet" href="/static/index/css/bootstrap.css">

<link rel="stylesheet" href="/static/index/css/magnific-popup.css">

<link rel="stylesheet" href="/static/index/css/style.css">

<link rel="stylesheet" href="/static/index/css/pages.css">

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
    <div id="gtco-logo"><a href="<?php echo url('Index/index'); ?>"><img src="/static/index/images/logo.png"
                                                             height="50" width="170"></a></div>
</div>
<div class="col-xs-10 text-right menu-1">
<ul>
    <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): if( count($nav)==0 ) : echo "" ;else: foreach($nav as $key=>$nav): ?>
        <li class="has-dropdown"><a href="<?php echo $nav['link']; ?>"><?php echo $nav['cate_name']; ?></a>
            <?php if(($nav['son'] !== '')): ?>
                <ul class="dropdown">
                    <?php if(is_array($nav['son']) || $nav['son'] instanceof \think\Collection || $nav['son'] instanceof \think\Paginator): if( count($nav['son'])==0 ) : echo "" ;else: foreach($nav['son'] as $key=>$son): ?><li><a href="<?php echo $son['link']; ?>"><?php echo $son['cate_name']; ?></a></li>
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
    <header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(/static/index/images/img_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 text-left">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                            <span class="date-post"></span>
                            <h1 class="mb30"><a href="#">欢迎来到老张博客</a></h1>
                            <h2 class="mb30"><a href="#">这里将颠覆您的思维,误入!</a></h2>
                            <p><a href="/index/Page/index/id/28" class="text-link">Read More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="gtco-main">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-12">
                    <ul id="gtco-post-list">
                      <?php if($id == ''): ?>
                        <li class="full entry animate-box" data-animate-effect="fadeIn">
                            <a href="<?php echo url('Article/index',array('id' => $TuiList['id'])); ?>">
                                <div class="entry-img"
                                     style="background-image: url(/uploads/images/<?php echo str_replace('\\','/',$TuiList['photo']); ?>)"></div>
                                <div class="entry-desc">
                                    <h3><?php echo msubstr($TuiList['title'],0,30); ?></h3>
                                    <p><?php echo msubstr($TuiList['description'],0,350); ?></p>
                                </div>
                            </a>
                            <a href="<?php echo url('Article/index',array('id' => $TuiList['id'])); ?>" class="post-meta">阅读量
                                ：<?php echo $TuiList['views']; ?> &nbsp;&nbsp;&nbsp;| <span class="date-posted"><?php echo $TuiList['update_time']; ?></span></a>
                        </li>
                     <?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                        <li class="one-third entry animate-box" data-animate-effect="fadeIn">
                            <a href="<?php echo url('Article/index',array('id' => $list['id'])); ?>">
                                <div class="entry-img"
                                     style="background-image: url(/uploads/images/<?php echo str_replace('\\','/',$list['photo']); ?>)">
                                </div>
                                <div class="entry-desc">
                                    <h3><?php echo msubstr($list['title'],0,24); ?></h3>
                                    <p><?php echo msubstr($list['description'],0,55); ?></p>
                                </div>
                            </a>
                            <a href="<?php echo url('Article/index',array('id' => $list['id'])); ?>" class="post-meta">阅读量
                                ：<?php echo $list['views']; ?> |<span class="date-posted"><?php echo $list['update_time']; ?></span></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
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
                <div style="text-align: center">
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1262804087'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1262804087%26show%3Dpic2' type='text/javascript'%3E%3C/script%3E"));</script>
                </div>
                </p>
                <p>
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

<script src="/static/index/js/pages.js"></script>

<script src="/static/layer/jquery.form.js"></script>

<script src="/static/layer/layer.js"></script>

<!--This is js end -->
</body>
</div>
</html>

