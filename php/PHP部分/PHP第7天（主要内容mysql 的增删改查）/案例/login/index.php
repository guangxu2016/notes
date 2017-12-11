<?php

require_once( "./function.php" );

$storedUserInfo = null;
// 验证用户是不是登录了
// 判断是否带有 PHPSESSID 的 cookie
if ( isset( $_COOKIE[ "PHPSESSID" ] ) ) {
    // 开启 session 获得 用户 id, 再 比对用户是否登录, 如果不是, 表示是冒仿的
    // 如果是显示用户信息, 如果不是跳转到登录页面
    session_start();

    $id = $_SESSION[ "id" ];

    // 判断该用户是否存在, 查询数据库是否含有该数据

    $storedUserInfo = sql_item( "select * from user where id=$id" );

    if ( $storedUserInfo[ 0 ] != $id ) {
        // 不成功
        header( "location: ./login.php" );
        exit;
    } 

    //  到这里表示登录成功了
     
} else {
    header( "location: ./login.php" );
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>欢迎 <?php echo $storedUserInfo[ 1 ] ?> 登录</h1>
    <p>您的用户名为: <?php echo $storedUserInfo[ 1 ] ?></p>
    <p>您的密码为: <?php echo $storedUserInfo[ 2 ] ?></p>
</body>
</html>