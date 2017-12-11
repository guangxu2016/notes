<?php
	header('content-type:text/html;charset=utf-8');
	//连接数据库
	require_once('db.php');
	//接收数据
	$id = $_POST['id'];
	$name = $_POST['name'];
	$truename = $_POST['truename'];
	$department = $_POST['department'];
	$rights = $_POST['rights'];

	//组织sql语句
	$sql = "update user set name = '$name',truename= '$truename',department = '$department',rights= '$rights' where id = '$id'";
	//执行sql语句
	$result = mysql_query($sql);
	//根据执行结果，进行相应的显示
	if($result){
		header('location:02select.php');
	}