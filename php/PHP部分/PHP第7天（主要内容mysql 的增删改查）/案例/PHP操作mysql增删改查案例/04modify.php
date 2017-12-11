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
	echo "<form action='06update.php' method='POST'>";
	echo "<input type='hidden' name ='id' value='$row[id]'/>";
	$strTab = "<table border='1'>";
	$strTab .= "<tr><td>姓名</td><td><input type='text' name='name' value='$row[name]'/></td></tr>";
	$strTab .= "<tr><td>真名</td><td><input type='text' name='truename' value='$row[truename]'/></td></tr>";
	$strTab .= "<tr><td>部门</td><td><input type='text' name='department' value='$row[department]'/></td></tr>";
	$strTab .= "<tr><td>权限</td><td><input type='text' name='rights' value='$row[rights]'/></td></tr>";
	$strTab .= "<tr><td colspan='2'><input type='submit' value='修改'/></td></tr>";
	$strTab .= "</table>";
	echo $strTab;
	echo "</form>";

	//再让用户填写新数据，后提交更新