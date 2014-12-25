<?php

if (version_compare(PHP_VERSION, '5.3.0', '<'))
    die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', True);

define('APP_NAME', 'Admin');
// 定义应用目录
define('APP_PATH', './Admin/');

define('RUNTIME_PATH', 'Runtime/Admin/');
define('DS', DIRECTORY_SEPARATOR);
require './Core/Core.php';
