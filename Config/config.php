<?php

include_once 'Config/functions.php';
$system_config = require("Config/system.php");
$lang_config = require("Config/langset.php");
return $sys_lang_config = array_merge($system_config, $lang_config);
?>