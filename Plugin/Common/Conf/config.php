<?php

include_once 'Config/functions.php';
$mysql_config = require("Config/system.php");
$site_config = array(
    'LAYOUT_ON' => true,
    'LAYOUT_NAME' => '../../Admin/Default/Layout/layout',
    'TMPL_TEMPLATE_SUFFIX' => '.php',
    'TMPL_ENGINE_TYPE' => 'php',
    'LANG_SWITCH_ON' => true,
);
return array_merge($site_config, $mysql_config);
