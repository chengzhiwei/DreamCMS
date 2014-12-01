<?php

namespace Element;

class EmtShow
{

    static $elt_obj = array();

    public static function show($fielddata, $vars = array())
    {
        if ($fielddata['element'] == '')
        {
            $method = '_' . $fielddata['type'];
            return self::$method($fielddata);
        } else
        {
            $cls = "\\Element\\" . ucfirst($fielddata['type']) . '\\' . ucfirst($fielddata['element']);
            if (!self::$elt_obj[$cls])
            {
                $class = new $cls();
                self::$elt_obj[$cls] = $class;
            }
            $data = $fielddata;
            if (!$vars)
            {
                $data = array_merge($fielddata, $vars);
            }
            return call_user_func_array(array(&self::$elt_obj[$cls], 'show'), $data);
        }
    }

    private static function _text($fielddata)
    {
        echo '<input type="text" ' . $fielddata['tackattr'] . ' '
                . 'name="' . $fielddata['fieldname'] . '" id="' . $fielddata['fieldname'] . '" value="" />';
    }

    private static function _textarea($fielddata)
    {
        echo '<textarea  ' . $fielddata['tackattr'] . ' name="' . $fielddata['fieldname'] . '" id="' . $fielddata['fieldname'] . '"></textarea>';
    }

}
