<?php
	header('content-type:text/html;charset=utf-8');
	//先把用户的原数据显示在页面上
	//引入db.php文件
	require_once('db.php');
	//提出数据
	$id = $_GET['id'];
	//组织sql语句
	$sql = "select * from user where id = '$id'";
	//执行sql语句
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	//将数据显示在页面上
	$strTab = "<table border='1'>";
	$strTab .= "<tr><td>id</td><td>$row[id]</td></tr>";
	$strTab .= "<tr><td>姓名</td><td>$row[name]</td></tr>";
	$strTab .= "<tr><td>真名</td><td>$row[truename]</td></tr>";
	$strTab .= "<tr><td>部门</td><td>$row[department]</td></tr>";
	$strTab .= "<tr><td>权限</td><td>$row[rights]</td></tr>";
	$strTab .= "</table>";
	echo $strTab;