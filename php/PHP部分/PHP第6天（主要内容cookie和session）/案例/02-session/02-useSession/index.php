<?php


// 验证用户是否登录
// 如果登录了显示欢迎 xxx
// 如果没有登录, 给出提示, 等待 几秒钟跳转到登录页面

// 使用 session
session_start();

// 就可以从 $_SESSION 中取数据
if ( isset( $_SESSION[ "name" ] ) ) {
    // 已经登录了
    $is_login = true;
} else {
    // 没有登录
    $is_login = false;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if( !$is_login ) { ?>
    <meta http-equiv="refresh" content="5; url=./login.html" />
    <?php } ?>
    <title>Document</title>
</head>
<body>
    <?php if ( $is_login ) { ?>
    <h1>欢迎 <?php echo $_SESSION[ "name" ]; ?> 回来, 您已登录成功!</h1>
    <?php } else { ?>
    <h1>等待 5 秒后跳转到登录页面</h1>
    <?php } ?>
</body>
</html>