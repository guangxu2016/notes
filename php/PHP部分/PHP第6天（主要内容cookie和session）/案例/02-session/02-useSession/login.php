<?php

// 验证登录信息
// 只需要验证是否输入了用户名

// if ( isset( $_POST[ "name" ] ) ) {
//     // 即登录成功, 使用 session 记录
//     session_start();
//     $_SESSION[ "name" ] = $_POST[ "name" ]; // 记录下 session
//     // 重定向到列表页面
//     header( "location: ./index.php" );
//     exit();
// }

// header( "location: ./login.html" );



// 约定用户名必须是 admin
if ( isset( $_POST[ "name" ] ) ) {
    // 即登录成功, 使用 session 记录
    if ( $_POST[ "name" ] === "admin" ) { 
        session_start();
        $_SESSION[ "name" ] = $_POST[ "name" ]; // 记录下 session
        // 重定向到列表页面
        header( "location: ./index.php" );
        exit();
    } 
}

header( "location: ./login.html" );


?>