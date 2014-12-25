<?php

$auth = include 'Comm_auth.php';
$comm = array(
    'ADD' => '添加',
    'RESET' => '重置',
    'CANCEL' => '取消',
    'OP_SUCCESS' => '操作成功',
    'OP_ERROR' => '操作失败',
    'NOW_OPTER'=>'当前操作',
    'WELCOME'=>'欢迎光临',
);
return array_merge($auth, $comm);

