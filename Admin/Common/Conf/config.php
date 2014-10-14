<?php

$mysql_config = require("Config/config.php");
$site_config = array(
    'DEFAULT_MODULE' => 'Index', // 默认模块
    'TMPL_TEMPLATE_SUFFIX' => '.php',
    'TMPL_ENGINE_TYPE' => 'php',
    'LANG_SWITCH_ON' => true,
    'DEFAULT_LANG' => 'zh-cn',
    'LANG_LIST' => 'zh-cn',
    'ADMIN_THEME' => 'Default',
);
return array_merge($site_config, $mysql_config);
