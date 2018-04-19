<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:107:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\menu_home\insert_menu.html";i:1510211001;s:97:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\public\head.html";i:1505897340;s:96:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\public\css.html";i:1506062714;s:95:"C:\Users\Administrator\Desktop\Project\boot_cms\public/../application/admin\view\public\js.html";i:1506062772;}*/ ?>

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

</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加分类
                    </h5>
                    <div class="ibox-tools">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="insertCate" method="post" class="form-horizontal" action="<?php echo url('menu_home/insert_menu'); ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">顶级菜单：</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="p_id">
                                    <option value="0">==顶级菜单==</option>
                                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
                                            <option value="<?php echo $list['id']; ?>"><?php echo $list['lefthtml']; ?><?php echo $list['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">菜单名称：</label>

                            <div class="col-sm-4">
                                <input type="text" name="name" id="name" class="form-control" placeholder="输入分类名称">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">菜单排序：</label>
                            <div class="col-sm-4">
                                <input type="text" name="order" id="order" class="form-control" placeholder="输入1-100值">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">SEO关键词：</label>
                            <div class="col-sm-4">
                                <input type="text" name="keywords" id="keywords" class="form-control" placeholder="输入此栏目的关键词信息">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">SEO描述：</label>
                            <div class="col-sm-4">
                                <input type="text" name="description" id="description" class="form-control" placeholder="输入此栏目的描述信息">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">模板类型：</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="template_cate" id="checkTheSelect">

                                    <option>模板类型</option>
                                    <?php if(is_array($listCate) || $listCate instanceof \think\Collection || $listCate instanceof \think\Paginator): if( count($listCate)==0 ) : echo "" ;else: foreach($listCate as $key=>$listCate): ?>
                                    <option value="<?php echo $listCate['id']; ?>"><?php echo $listCate['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>

                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">模板路径：</label>
                            <div class="col-sm-4">

                                <select class="form-control m-b" name="template_link" id="TemplateSelect">
                                    <option>模板链接</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">菜单状态：</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="status">
                                    <option value="1">是</option>
                                    <option value="0">否</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否列表页：</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="is_list">
                                    <option value="1">是</option>
                                    <option value="0">否</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2">
                                <button class="btn btn-success"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" type="submit"><i class="fa fa-close"></i> 返回</a>
                            </div>
                        </div>
                    </form>
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
        $('#insertCate').ajaxForm(opt);

        function insertBefor(){
            var name =  $('#name').val();
            if (name == ''){
                layer.msg('分类名称不能为空',{icon:5});
                return false;
            }

            var order =  $('#order').val();
            if (order == ''){
                layer.msg('分类排序不能为空',{icon:5});
                return false;
            }

            var link =  $('#link').val();
            if (link == ''){
                layer.msg('分类排序不能为空',{icon:5});
                return false;
            }
        }
        function insertOk(data){
            if (data.pass == 1){
                layer.msg(data.msg, {icon: 6,time:1500,shade: 0.1}, function(index){
                    window.location.href="<?php echo url('menu_home/list_menu'); ?>";
                });
            }else{
                layer.msg(layer.msg,{icon:5});
            }
        }

    });
</script>
<script>
    $(function(){
        $('#checkTheSelect').bind("change",function(){
            var id = $('#checkTheSelect').val();;
            //alert(id);
            $.ajax({
                url: "<?php echo url('MenuHome/findTemplateLink'); ?>",
                type: 'post',
                dataType: 'json',
                data: {'id': id},
                success:function (data){
                    if(data['html'] == ''){
                        $('#TemplateSelect').html(" <option>暂无</option>");
                    }else{
                        $('#TemplateSelect').html(data['html']);
                    }


                }
            });
        });
    })
</script>
<script>
    var ue = UE.getEditor('container');
</script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>

</body>
</html>