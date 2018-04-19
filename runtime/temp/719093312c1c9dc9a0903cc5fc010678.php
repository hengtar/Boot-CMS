<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"C:\Users\starwork\Desktop\blog\public/../application/index\view\words\index.html";i:1500454352;s:79:"C:\Users\starwork\Desktop\blog\public/../application/index\view\public\css.html";i:1500454351;s:79:"C:\Users\starwork\Desktop\blog\public/../application/index\view\public\nav.html";i:1500454351;s:80:"C:\Users\starwork\Desktop\blog\public/../application/index\view\public\foot.html";i:1500454351;s:78:"C:\Users\starwork\Desktop\blog\public/../application/index\view\public\js.html";i:1500454350;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>老张博客-留言</title>
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
    <header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(/static/index/images/img_4.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 text-left">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                            <h1 class="mb30"><a href="#">老张博客</a></h1>
                            <h2 class="mb30"><a href="#">既然来到了这里,那就说说吧！</a></h2>
                            <h5 class="mb30"><a href="#">审核通过留言之后，你将得到此博客的开源程序.no Many</a></h5>
                            <p>This Blog By<a href="#" class="text-link"> 老张</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="gtco-maine text-center">
        <div class="container text-center">
            <div class="row row-pb-md text-center">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <article class="mt-negative col-md-12 col-xs-12 col-sm-12">
                        <div class="text-left content-article">
                                <div class="col-lg-12 cp-r animate-box">
                                        <h2> 既然来了，就说点什么吧！</h2>
                                        <hr>
                                        <p>
                                    <form class="form-horizontal" id="insertWrods" method="post" action="<?php echo url('Words/index'); ?>">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nickName" placeholder="nickName" name="nick_name">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-sm-12">
                                                <textarea class="form-control" rows="12" style="height: 200px;" placeholder="Come Peng! Pa! Boom! Kell Me" id="content" name="content"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-default">提交</button>
                                            </div>
                                        </div>
                                    </form>
                                        <hr>
                                                总留言 ： <a><?php echo $Num; ?></a> 条
                                            <hr>
                                              <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                                                <div class="social-feed-box">
                                                        <h4><a href="#"><?php echo $list['nick_name']; ?></a></h4>
                                                 <small> <?php echo $list['addr']; ?></small>
                                                    <br>
                                                            <small class="text-muted"><?php echo $list['update_time']; ?></small>
                                                        <p><?php echo $list['content']; ?></p>
                                                        <hr>
                                                </div>
                                              <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </p>
                                 </div>
                        </div>
                    </article>
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
<script>
    $(function(){
        //定义opt
        var opt={
            beforeSubmit: insertBefor,
            success: insertOk,
            dataType: 'json',
            timeout: 5000
        };
        //ajax传输
        $('#insertWrods').ajaxForm(opt);

        function insertBefor(){
            var inputEmail3 =  $('#inputEmail3').val();
            if (inputEmail3 == ''){
                layer.msg('邮箱不能为空',{icon:5});
                return false;
            }

            var nickName =  $('#nickName').val();
            if (nickName == ''){
                layer.msg('昵称不能为空',{icon:5});
                return false;
            }

            var conetnt =  $('#content').val();
            if (conetnt == ''){
                layer.msg('内容不能为空',{icon:5});
                return false;
            }
        }
        function insertOk(data){
            if (data.pass == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    history.go(0);
                });
            }else{
                layer.msg(layer.msg,{icon:5});
            }
        }

    });

</script>

</body>
</html>
