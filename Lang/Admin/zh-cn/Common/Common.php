<?php

$auth = include 'Comm_auth.php';
$comm = array(
    'ADD' => '添加',
    'RESET' => '重置',
    'CANCEL' => '取消',
);
return array_merge($auth, $comm);

