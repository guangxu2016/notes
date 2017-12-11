<?php


// 使用的主机名
$host = "localhost";
// 使用的 用户名
$user = "root";
// 使用的 密码
$password = "123456";
// 使用的数据库名
$dbname = "itcast";


$conn = null;
function connect( $host, $user, $password, $dbname ) {
    global $conn;

    if ( $conn ) return $conn;

    $conn = mysqli_connect( $host, $user, $password, $dbname );
    if ( !$conn ) {
        die ( "<p>error: " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>" );
    }
    // 走到这里
    return $conn;
}



// 查询一行数据 函数
function sql_item( $sql ) {
    global $host;
    global $user;
    global $password;
    global $dbname;

    $conn = connect( $host, $user, $password, $dbname );
    $res = null;
    if( $reader = mysqli_query( $conn, $sql ) ) {
        $res = mysqli_fetch_row( $reader );
    }

    mysqli_free_result( $reader );

    return $res;
}



function close () {
    global $conn;
    if ( $conn ) {
        mysqli_close( $conn );
        $conn = null;
    }
}