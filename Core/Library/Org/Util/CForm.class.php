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
        $methor = self::$_fieldrow['type'];
        
        $element = method_exists(self, $methor) === true ? self::$methor() : '';
        self::$_fieldrow = array();
        return $element;
    }

    public static function text()
    {
        
    }

    public static function textarea()
    {
        
    }
    
    public static function editor()
    {
        
    }

}
