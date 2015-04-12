<?php

if (version_compare(PHP_VERSION, '5.3.0', '<'))
    die('require PHP > 5.3.0 !');
//全局配置文件
$global = include 'Config/global.php';

// 开启调试模式 
define('APP_DEBUG', True);

define('APP_NAME', $global['ADMIN_APP_NAME']);
// 定义应用目录
define('APP_PATH', $global['ADMIN_APP_NAME'] . '/');
//缓存等存放路径
define('RUNTIME_PATH', 'Runtime/' . $global['ADMIN_APP_NAME'] . '/');
define('DS', DIRECTORY_SEPARATOR);
//载入框架
require './Core/Core.php';
