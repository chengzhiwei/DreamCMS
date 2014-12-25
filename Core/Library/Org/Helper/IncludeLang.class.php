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
    public static function QuickInc($path)
    {
        if (is_array($path))
        {
            foreach ($path as $p)
            {
                $realPath = self::parsePath($path);
                self::IncFile($realPath);
            }
        }
        if (is_string($path))
        {
            $realPath = self::parsePath($path);
            self::IncFile($realPath);
        }
    }

    /**
     * 解析语言包地址
     * @param string $path 格式：模块/控制器
     * @return string
     */
    public static function parsePath($path)
    {

        return 'Lang' . DS . APP_NAME . DS . \getlang() . DS . $path.'.php';
    }

    
    /**
     * 导入文件 [完整的路径]
     * @param type $path 完整的路径
     */
    public static function IncFile($path)
    {
        if (file_exists($path))
        {
            include (L($path));
        }
    }

}
