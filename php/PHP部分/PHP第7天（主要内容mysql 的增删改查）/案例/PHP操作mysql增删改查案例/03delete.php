<?php
	header('content-type:text/html;charset=utf-8');
	//获取id
	$id = $_GET['id'];

	//连接数据库
	require_once('db.php');
	//组织sql语句
	$sql = "delete from user where id = '$id'";
	$result = mysql_query($sql);
	if($result){
		header('location:02select.php');
	}