<?php

$router = include_once getcwd() . '/Config/Router/Site/Content.php';
$content = array(
);
return array_merge($router, $content);
