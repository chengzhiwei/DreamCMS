<?php

if (version_compare(PHP_VERSION, '5.3.0', '<'))
    die('require PHP > 5.3.0 !');

define('APP_DEBUG', True);

//定义应用目录
define('APP_PATH', './Plugin/');

define('APP_NAME', 'Plugin');

define("PLUGIN_TMPL_PATH", "Template/Plugin/");

define('RUNTIME_PATH', 'Runtime/Plugin/');


require './Core/Core.php';

