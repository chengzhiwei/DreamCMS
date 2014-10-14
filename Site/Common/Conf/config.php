<?php

$mysql_config = require("Config/config.php");
$site_config = array(
    'DEFAULT_MODULE' => 'Content', // 默认模块
    'DEFAULT_CONTROLLER' => 'Content', // 默认模块
    'LAYOUT_ON' => false,
    'VAR_LANGUAGE' => 'l',
    'LANG_AUTO_DETECT' => true,
    'URL_MODEL' => 2,
    'URL_ROUTER_ON' => true,
    'MODULE_ALLOW_LIST' => array('Content', 'Component','Spldem'),
    'APP_AUTOLOAD_PATH' => '@.TagLib',
    'SITE_THEME' => 'Default',
);
return array_merge($site_config, $mysql_config);
