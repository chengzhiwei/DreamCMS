<?php

if (version_compare(PHP_VERSION, '5.3.0', '<'))
    die('require PHP > 5.3.0 !');
//全局配置文件
$global = include 'Config/global.php';

// 开启调试模式
define('APP_DEBUG', TRUE);

define('APP_NAME', $global['SITE_APP_NAME']);

//缓存目录
define('RUNTIME_PATH', 'Runtime/' . $global['SITE_APP_NAME'] . '/');
// 定义应用目录
define('APP_PATH', $global['SITE_APP_NAME'] . '/');

define('DS', DIRECTORY_SEPARATOR);

require './Core/Core.php';
