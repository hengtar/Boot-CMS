<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"C:\Users\Administrator\Desktop\Project\blog\public/../application/admin/view/public/error.tpl";i:1503650028;}*/ ?>
<!doctype html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>跳转提示</title><script src="/static/admin/js/jquery.min.js?laozhang=http://www.jh12.cn"></script><script src="/static/layer/layer.js"></script></head><body><script> layer.msg('<?php echo $msg?>',{icon:0,shade:0.1});</script><script type="text/javascript">
        	setTimeout(function(){
				location.href = '<?php echo($url);?>';
			},2000);    
    </script>
</body>
</html>
