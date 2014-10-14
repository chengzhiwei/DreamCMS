<?php

namespace System\Controller;

class CacheController extends \Auth\Controller\AuthbaseController
{

    public function clearall()
    {
        //更新后台缓存
        echo '正在更新后台缓存...<br />';
        delDirAndFile('Runtime/'.APP_NAME);
        echo '更新后台缓存完成...<br />';
        //更新前台缓存
        echo '正在更新前台缓存...<br />';
        delDirAndFile('Runtime/Site');
        echo '更新前台缓存完成...<br />';
        //更新插件缓存
        echo '正在更新插件缓存...<br />';
        delDirAndFile('Runtime/plugin');
        echo '更新插件缓存完成...<br />';
    }

}
