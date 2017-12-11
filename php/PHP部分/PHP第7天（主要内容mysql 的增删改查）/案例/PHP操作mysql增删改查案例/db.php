<?php
	//连接数据库
	mysql_connect('127.0.0.1:3306','root','') or die('数据库连接失败');
	//设置客户端字符集
	mysql_query('set names utf8') or die('Occuren an error in setting names');
	//选择数据库
	mysql_query('use php0913') or die('');
?>