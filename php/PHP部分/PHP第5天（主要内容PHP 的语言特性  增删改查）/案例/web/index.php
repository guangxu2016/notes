<?php
    
    // 包含外部文件（磁盘信息）
    $diskinfo = include './disk.php';

    $dir = isset($_GET['name']) ? $_GET['name'] : DISK;

    // 测试
    // print_r($diskinfo);

	function finddir($dir) {
		// 声明静态变量，防止递归时重复调用
		static $parents = array();
		$tmp = array();

		// 获取父级目录
		$pars = dirname($dir);
		// 父级的名称
		$name = basename($pars);
		// 将获取的父级目录路径及名称添加到数组中
		$tmp['path'] = $pars;
		$tmp['name'] = $name;

		$parents[] = $tmp;

		// 如果没有到根目录则一直递归下去
		if($pars != DISK) {
			finddir($pars);
		}
		// 将递归结果返回
		return $parents;
	}

	// 面包导航（将结果反转）
	$breadcrumb = array_reverse(finddir($dir));

    // 定义函数遍历目录
    function scan_dir($dir) {

        // 将 utf-8 转成 gbk
        $dir = iconv('utf-8', 'gbk', $dir);

    	// 检测是否为目录
    	if(!is_dir($dir)) {
    		echo '不是一个目录'; 
    		return;
    	}

    	// 获得目录下所有子目录和文件
    	$rows = scandir($dir);

    	// 定义一个数组
    	// 这个数组用来存储目录和文件信息
    	// 例如文件名、文件大小、修改时间
    	$lists = array();
    	// 遍历目录
    	foreach ($rows as $key => $val) {

    		// . 和 .. 不是有意义的目录
    		if($val == '.' || $val == '..') {
    			continue;
    		}

    		// 拼凑完整路径
    		$path = $dir . '/' . $val;

    		// 临时目录
    		$tmp = array();
    		// 文件名
    		$tmp['name'] = iconv('gbk', 'utf-8', $val);
    		// 文件修改时间
			$tmp['mtime'] = date('Y-m-d h:i:s', filemtime($path));
			// 
			$tmp['realpath'] = iconv('gbk', 'utf-8', $path);
			// 是否是目录标识
			$tmp['flag'] = true;
			// 文件或目录类型
			$tmp['type'] = 'folder';

			// 如果为文件
    		if(is_file($path)) {
    			// 文件大小
    			$tmp['size'] = filesize($path);
    			// 非目录，值为 false
    			$tmp['flag'] = false;
    			// 文件扩展名
    			$tmp['type'] = pathinfo($path)['extension'];
    		}

    		// 为目录
    		if(is_dir($path)) {
    			// 目录不计算大小
    			$tmp['size'] = '-';
    		}

    		// 将处后的数据存起来
    		$lists[] = $tmp;
    	}

    	// print_r($lists);
    	return $lists;
    }

    // 目录信息
    $items = scan_dir($dir);

    // 包含外部文件（展示数据）
    include './views/index.html';
