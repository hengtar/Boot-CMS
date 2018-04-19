<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"C:\Users\Administrator\Desktop\blog\public/../application/index\view\page\index.html";i:1523932996;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $MenuInfo['name']; ?> -<?php echo $MenuInfo['keywords']; ?> - <?php echo $MenuInfo['description']; ?></title>
</head>
<body>
<?php echo $MenuInfo['content']; ?>
<?php echo $MenuInfo['create_time']; ?>
</body>
</html>