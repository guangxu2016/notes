<?php
	header('content-type:text/html;charset=utf-8');
	//引入db.php文件
	require_once('db.php');
	//组织sql语句
	$sql = 'select * from user';
	//执行sql语句
	$result = mysql_query($sql);
	/*完全没问题
	while(true){
		$row = mysql_fetch_row($result);
		if(!$row){
			break;
		}
		var_dump($row);	
	}
	*/
	//定义一个二维数组
	$arr = array();
	while($row = mysql_fetch_row($result)){
		$arr[]=$row;
	}

	/**将数据以表格的形式遍历页面上**/
	$i=1;
	$str = "<table border='1'><tr><th>序号</th><th>用户名</th><th>真名</th><th>部门</th><th>权限</th><th>操作</th></tr>";
	foreach($arr as $v){
		$str .= "<tr><td>{$i}</td><td>$v[1]</td><td>$v[2]</td><td>$v[4]</td><td>$v[5]</td><td><a href='03delete.php?id={$v[0]}'>删除</a> | <a href='04modify.php?id={$v[0]}'>修改</a> | <a href='05profile.php?id={$v[0]}'>详情</a></td></tr>";
		$i++;
	}
	$str .= "</table>";
	echo $str;
