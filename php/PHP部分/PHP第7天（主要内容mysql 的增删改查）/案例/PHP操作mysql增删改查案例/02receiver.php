<?php
	/*
	array(6) {
	  ["username"]=>
	  string(5) "admin"
	  ["truename"]=>
	  string(13) "administrator"
	  ["password1"]=>
	  string(3) "123"
	  ["password2"]=>
	  string(4) "1234"
	  ["department"]=>
	  string(2) "IT"
	  ["rights"]=>
	  string(3) "all"
	}
	*/
	//从$_POST中提取数据
	$name = $_POST['username'];
	$truename = $_POST['truename'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$department = $_POST['department'];
	$rights = $_POST['rights'];
	//引入db.php文件
	require_once('db.php');
	//如果两次密码不一致，跳转
	if($password1 != $password2){
		header('location:02insert.html');
		exit;
	}
	/**组织sql语句插入数据**/
	$password = md5($password1);
	$sql = "insert into user values(default,'$name','$truename','$password','$department','$rights')";

	//$sql = "insert into user values(default,'$name','$truename',md5('$password1'),'$department','$rights')";
	$result = mysql_query($sql);