<?php

include_once 'Config/functions.php';
$system_config = require("Config/system.php");
$lang_config = require("Config/langset.php");
$sys_lang_config = array_merge($system_config, $lang_config);
/* 全局配置 */
$config = array(
    'AUTOLOAD_NAMESPACE' => array(
        'Model' => getcwd() . '\Model',
    ),
);
return array_merge($config, $sys_lang_config);
?>