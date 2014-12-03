<?php

if (version_compare(PHP_VERSION, '5.3.0', '<'))
    die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', TRUE);
define('APP_NAME', 'Site');
define('RUNTIME_PATH', 'Runtime/Site/');
// 定义应用目录
define('APP_PATH', './Site/');

define('ADMIN_OR_SITE', 'SITE');
define('DS', DIRECTORY_SEPARATOR);
require './Core/Core.php';
