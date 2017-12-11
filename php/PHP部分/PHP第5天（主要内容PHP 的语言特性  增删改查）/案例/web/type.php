<?php
    
    // 包含外部文件（磁盘信息）
    $diskinfo = include './disk.php';
    $type = $_GET['type'];

    // 前端请求时，以get方式传递了一个 type 参数
    // 其值有以下可能: 
    // a) 值为 pic 时，查询DISK下所有的图片
    // b) 值为 video 时，查询DISK下所有的视频
    // c) 值为 audio 时，查询DISK下所有的音频
    // d) 值为 bt 时，查询DISK下所有的种子
    // e) 值为 extra 时，查询DISK下所有的其它
    // f) 值为 doc 时，查询DISK下所有的文档

	function findtype($dir, $type) {
		// 记录类型
		static $types = array(
			// 图片
			'pic' => array('jpg', 'png', 'gif', 'ico'),
			// 
			'video' => array('mp4', 'rmvb', 'wmv', 'rm', 'avi', 'itcast'),
			// 
			'audio' => array('mp3', 'wav'),
			// 
			'bt' => array('torrent'),
			// 
			'extra' => array('txt', 'php', 'css', 'html'),
			// 文档
			'doc' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf')
		);

		// 定义数组将来存取结果
		static $lists = array();
		$tmp = array();

		// 转码（支持中文）
		// $dir = iconv('utf-8', 'gbk', $dir);

		// 参数检测
		if(!is_dir($dir)) {
			echo '不是一个目录';
			return;
		}
		
		// 浏览目录
		$row = scandir($dir);

		// 遍历目录所有子目录或文件
		foreach ($row as $key => $val) {
			if($val == '.' || $val == '..') continue;

			// 转码（支持中文）
			// $val = iconv('utf-8', 'gbk', $val);

			// 完整路径
			$path = $dir . '/' . $val;

			// 检测是否为文件
			if(is_file($path)) {
				// print_r(pathinfo($path));
				// 获取文件扩展名，根据扩展名判断文件类型
				$ext = '';
				if(isset(pathinfo($path)['extension'])) {
					$ext = pathinfo($path)['extension'];
				}

				// print_r($types[$type]);
				// 如果符合查找类型，则通过数组存储
				if(in_array($ext, $types[$type])) {
					// 获取文件名
					$tmp['name'] = basename(iconv('gbk', 'utf-8', $path));
					// 获取文件大小
					$tmp['size'] = filesize($path);
					// 获取文件修改时间
					$tmp['mtime'] = date('Y-m-d h:i:s', filemtime($path));
					// 文件后缀
					$tmp['type'] = $ext;
					// 
					$tmp['realpath'] = iconv('gbk', 'utf-8', $path);

					// 记录到数组中
					$lists[] = $tmp;
				}
			}

			// 如果是目录则递归查找
			if(is_dir($path)) {
				findtype($path, $type);
			}
		}

		// 将最终结果返回
		return $lists;
	}

	$list = findtype(DISK, $type);

	print_r($list);

    // 包含外部文件（展示数据）
	if($type == 'pic') {
		include './views/type.html';
	} else {
		include './views/type2.html';
	}

	$arr = [];
