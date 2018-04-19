<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:105:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/admin\view\auth\give_auth.html";i:1517554415;s:102:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/admin\view\public\head.html";i:1505897340;s:101:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/admin\view\public\css.html";i:1506062714;s:100:"C:\Users\Administrator\Desktop\Project\boot-cms-test\public/../application/admin\view\public\js.html";i:1506062772;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title>Boot-cms 后台管理</title>
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

    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>分配权限</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-2" style="width: 100px">
                        <div class="input-group">
                            <button class="btn btn-outline btn-primary" type="button">为<?php echo $name['title']; ?>分配权限</button>

                        </div>
                    </div>

                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <form action="<?php echo url('auth/give_auth'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $name['id']; ?>">
                <table class=" table table-bordered table-hover">
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                    <tr class="b-group">
                        <td  style="text-align: center;width:10%">
                            <div class="click_box">
                                <label ><?php echo $list['title']; ?>&nbsp;
                                    <input  type="checkbox" class="click_son" name="rule_ids[]" value="<?php echo $list['id']; ?>"  onclick="checkAll(this)" <?php if(($list['is_yes'] == 1)): ?> checked="checked"<?php endif; ?>>
                                </label>
                            </div>
                        </td>
                        <td class="b-child">
                            <?php if(!empty($list['child'])): if(is_array($list['child']) || $list['child'] instanceof \think\Collection || $list['child'] instanceof \think\Paginator): if( count($list['child'])==0 ) : echo "" ;else: foreach($list['child'] as $key=>$child): ?>
                            <table class="table table-bordered table-hover">
                                <tr class="b-group">
                                    <td  style="text-align: center;width:10%">
                                        <div class="d_chceked">
                                            <label ><?php echo $child['title']; ?>&nbsp; <input type="checkbox" class="click_son_sn click_hy" name="rule_ids[]" value="<?php echo $child['id']; ?>"  onclick="checkAll(this)" <?php if(($child['is_yes'] == 1)): ?> checked="checked"<?php endif; ?> >
                                            </label>
                                        </div>

                                    </td>
                                            <td>
                                                <?php if(!empty($child['child'])): if(is_array($child['child']) || $child['child'] instanceof \think\Collection || $child['child'] instanceof \think\Paginator): if( count($child['child'])==0 ) : echo "" ;else: foreach($child['child'] as $key=>$son): ?>
                                                <label >&nbsp;&nbsp;&nbsp;<?php echo $son['title']; ?>&nbsp;&nbsp;<input type="checkbox" name="rule_ids[]" class="click_son_sn click_hys" value="<?php echo $son['id']; ?>" <?php if(($son['is_yes'] == 1)): ?> checked="checked"<?php endif; ?> ></label>


                                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                            </td>

                                </tr>
                            </table>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </table>

                <!--<tr>-->
                <!--<th></th>-->
                <!--<td><input class="btn btn-success" type="submit" value="提交"></td>-->
                <!--</tr>-->
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-1">
                        <input class="btn btn-success" value="&nbsp;&nbsp;&nbsp;保存&nbsp;&nbsp;&nbsp;"  type="submit" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="javascript:history.back(-1)" class="btn btn-danger" type="submit"><i class="fa fa-close"></i> 返回</a>
                    </div>
                </div>
                <br>
                <br>
            </form>
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


<script>
    $(function () {
        $(".i-checks").iCheck({checkboxClass: "icheckbox_square-green", radioClass: "iradio_square-green",});
        $(".click_son").click(function(){
            $(this).closest("td").siblings(".b-child").find(".click_son_sn").prop("checked",$(this).prop("checked"));
        });
        $(".click_hy").click(function(){
            $(this).closest("td").siblings("td").find(".click_hys").prop("checked",$(this).prop("checked"));
        });
    });
</script>
</body>
</html>