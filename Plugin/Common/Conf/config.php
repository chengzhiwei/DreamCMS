<?php

$mysql_config = require("config.php");
$site_config = array(
    'DEFAULT_MODULE' => 'Base', // 默认模块
    'LAYOUT_ON' => true,
    'LAYOUT_NAME' => '../../Admin/Default/Layout/layout',
    'TMPL_TEMPLATE_SUFFIX' => '.php',
);
return array_merge($site_config, $mysql_config);
