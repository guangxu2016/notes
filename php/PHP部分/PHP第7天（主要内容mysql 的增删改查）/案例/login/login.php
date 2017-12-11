<?php

require_once( "./function.php" );

// 首先 看有没有提交数据
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
    //  此时不去验证数据的完整性, 目的是使得代码简单清晰一点
    $uid = $_POST[ "uid" ];
    $pwd = $_POST[ "pwd" ];
    // md5 的散列
    $pwd = md5( $pwd );

    // 从数据库中取出这个用户的数据
    // select pwd FROM user where uid='admin'
    list( $storedId, $storedPwd ) = sql_item( "SELECT id, pwd FROM user WHERE uid='$uid'" );

    // var_dump( $storedPwd );
    // var_dump( $storedId );

    // 将数据库中的 密码与 用户输入的 密码比对一下, 密码是否一致
    if ( $pwd == $storedPwd ) {
        // echo "登录成功";
        // 开启 SESSION, 记录 ID
        session_start();
        $_SESSION[ "id" ] = $storedId;
        // 跳转到 首页
        header( "location: ./index.php" );
        exit;

    } else {
        // echo "登录失败";
        $message = "用户名或密码错误";
    }

    close();
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
    <form action="" method="post">
        <?php if ( isset( $message ) ) { ?>
        <p style="color: red"><?php echo $message ?></p>
        <?php } ?>
        用户名: <input type="text" name="uid"><br>
        密码: <input type="text" name="pwd"><br>
        <input type="submit" value="登录" />
    </form>
</body>
</html>