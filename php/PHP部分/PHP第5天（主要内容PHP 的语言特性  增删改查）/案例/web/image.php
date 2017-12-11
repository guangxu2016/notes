<?php

	$path = $_GET['path'];

	// $path 是一个（UTF-8编码的）路径

	$path = iconv('utf-8', 'gbk', $path);

	readfile($path);