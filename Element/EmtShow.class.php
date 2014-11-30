<?php

namespace Element;

class EmtShow
{

    static $elt_obj=array();
    public static function show($fielddata)
    {
        if ($fielddata['element'] == '')
        {
            $method = '_' . $fielddata['type'];
            return self::$method($fielddata);
        }
        else
        {
            $cls="\\Element\\".ucfirst($fielddata['type']).'\\'.  ucfirst($fielddata['element']); 
            if(!$elt_obj[$cls])
            {
                $class = new $cls;
                $elt_obj[$cls]=$class;
            }
           return $elt_obj[$cls]->show();
        }
    }

    private static function _text($fielddata)
    {
        return '<input type="text" '.$fielddata['tackattr'].' '
                . 'name="'.$fielddata['fieldname'].'" id="'.$fielddata['fieldname'].'" value="" />' ;
    }

    private static function _textarea($fielddata)
    {
        return '<textarea  '.$fielddata['tackattr'].' name="'.$fielddata['fieldname'].'" id="'.$fielddata['fieldname'].'"></textarea>';
    }

}
