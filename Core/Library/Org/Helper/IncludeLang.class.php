<?php

/*
 * +----------------------------------------------------------------------
 * | DreamCMS [ WE CAN  ]
 * +----------------------------------------------------------------------
 * | Copyright (c) 2006-2014 DreamCMS All rights reserved.
 * +----------------------------------------------------------------------
 * | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * +----------------------------------------------------------------------
 * | Author: 孔雀翎 <284909375@qq.com>
 * +----------------------------------------------------------------------
 */

namespace Org\Helper;

/**
 * 收到导入语言包
 */
class IncludeLang
{

    /**
     * 快速导入语言包文件
     * @param string  $path 格式：模块/控制器 或 是数组形式
     */
    public static function QuickInc($path, $app = '')
    {
        if (is_array($path))
        {
            foreach ($path as $p)
            {
                $realPath = self::parsePath($path, $app );
                self::IncFile($realPath);
            }
        }
        if (is_string($path))
        {
            $realPath = self::parsePath($path, $app);
            self::IncFile($realPath);
        }
    }

    /**
     * 解析语言包地址
     * @param string $path 格式：模块/控制器
     * @return string
     */
    public static function parsePath($path, $app = '')
    {
        $app_name = $app == '' ? APP_NAME : $app;
         file_put_contents('2.txt', $app);
        file_put_contents('1.txt', 'Lang' . DS . $app_name . DS . \getlang() . DS . $path . '.php');
        return 'Lang' . DS . $app_name . DS . \getlang() . DS . $path . '.php';
    }

    /**
     * 导入文件 [完整的路径]
     * @param type $path 完整的路径
     */
    public static function IncFile($path)
    {
        if (file_exists($path))
        {
             L(include $path);
        }
    }

}
