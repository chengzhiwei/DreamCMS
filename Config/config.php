<?php

include_once 'Config/functions.php';
$system_config = require("Config/system.php");
$global_config = require("Config/global.php");
return array_merge($system_config, $global_config);
?>