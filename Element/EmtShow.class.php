<?php

namespace Element;

class EmtShow
{

    public static function show($fielddata)
    {
        if ($fielddata['element'] == '')
        {
            $method = '_' . $fielddata['type'];
            return self::$method();
        }
    }

    private static function _text()
    {
        return '<input type="text" name="" id="" value="" />' ;
    }

    private static function _textarea()
    {
        
    }

}
