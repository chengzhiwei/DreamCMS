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

namespace Org\Util;

class CForm
{

    static $_fieldrow = array();

    public static function create($fieldrow = array())
    {
        self::$_fieldrow = $fieldrow;

        //调用插件
        if (self::$_fieldrow['plugin'])
        {
            //导入插件
        } else
        {
            $methor = self::$_fieldrow['type'];
            $element = method_exists(self, $methor) === true ? self::$methor() : '';
        }


        self::$_fieldrow = array();
        return $element;
    }

    /**
     * 文本框
     * @return string
     */
    public static function text()
    {
        $fieldname = self::$_fieldrow['fieldname'];
        return '<input type="hidden" name="' . $fieldname . '" id="' . $fieldname . '" ' . self::$_fieldrow['tackattr'] . '  />';
    }

    /**
     * 文本域
     * @return string
     */
    public static function textarea()
    {
        $fieldname = self::$_fieldrow['fieldname'];
        return '<textarea name="' . $fieldname . '" id="' . $fieldname . '" ' . self::$_fieldrow['tackattr'] . '></textarea>';
    }

    /**
     * 推荐位
     */
    public static function position()
    {
        
    }

}
