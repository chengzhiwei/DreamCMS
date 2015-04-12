<?php

if (version_compare(PHP_VERSION, '5.3.0', '<'))
    die('require PHP > 5.3.0 !');
$global = include 'Config/global.php';

define('APP_DEBUG', True);

//定义应用目录
define('APP_PATH', $global['PLG_APP_NAME'] . '/');

define('APP_NAME', $global['PLG_APP_NAME']);

define('RUNTIME_PATH', 'Runtime/' . $global['PLG_APP_NAME'] . '/');
define('DS', DIRECTORY_SEPARATOR);

require './Core/Core.php';

