<?php
$mysql_config = require("Config/config.php");

$install_config= array(
    'DEFAULT_MODULE' => 'Index', // 默认模块
    'INSTALL_THEME' => 'Default',
    'TMPL_TEMPLATE_SUFFIX' => '.php',
    'TMPL_ENGINE_TYPE' => 'php',
);
return array_merge($install_config, $mysql_config);