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
 * 生成表单元素
 */
class CForm
{

    static $_fieldrow = array();

    public static function create($fieldrow = array())
    {
        self::$_fieldrow = $fieldrow;

        //调用插件
        if (self::$_fieldrow['plugin'])
        {
            return Vhook(self::$_fieldrow['plugin'],self::$_fieldrow);
            
        } else
        {
            
            $methor = self::$_fieldrow['type'];
            $element = method_exists(__CLASS__, $methor) === true ? self::$methor() : '';
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
        return '<input type="text" name="' . $fieldname . '" id="' . $fieldname . '" ' . self::$_fieldrow['tackattr'] . '  />';
    }

    /**
     * 文本域
     * @return string
     */
    public static function textarea()
    {
        $fieldname = self::$_fieldrow['fieldname'];
        return '<textarea style="width:100%" name="' . $fieldname . '" id="' . $fieldname . '" ' . self::$_fieldrow['tackattr'] . '></textarea>';
    }

    /**
     * 推荐位 分不同的语言 
     */
    public static function position()
    {
        //获取当前操作网站的语言（前台）
        $PositionMod = DD('Position');
        $lang = \getlang();
        $langmod = DD('Language');
        $langinfo = $langmod->findbylang($lang);
        $plist = $PositionMod->selbylid($langinfo['id']);
        $chk = '';
        foreach ($plist as $k => $p)
        {
            $chk.='<input type="checkbox" autocomplete="off" value="' . $p['id'] . '" class="chkall ace" name="position[]"><span class="lbl">' . $p['title'] . '</span> ';
        }
        return $chk;
    }

    public static function radio()
    {
        $fieldvalue = trim(self::$_fieldrow['fieldvalue']);
        $fieldvalue_arr = explode("\r\n", $fieldvalue);
        $radios = '';
        foreach ($fieldvalue_arr as $k => $v)
        {
            $val_arr = explode(',', $v);
            $is_chk = isset($val_arr[2]) && $val_arr[2] == 1 ? 'checked="checked"' : "";
            $radios.='<label>
                            <input class="ace" autocomplete="off"  type="radio" ' . $is_chk . ' name="'.self::$_fieldrow['fieldname'].'" value="' . $val_arr[1] . '">
                            <span class="lbl"> ' . $val_arr[0] . '</span>
                      </label>';
        }
        return $radios;
    }

    public static function checkbox()
    {
        $fieldvalue = trim(self::$_fieldrow['fieldvalue']);
        $fieldvalue_arr = explode("\r\n", $fieldvalue);
        $radios = '';
        foreach ($fieldvalue_arr as $k => $v)
        {
            $val_arr = explode(',', $v);
            $is_chk = isset($val_arr[2]) && $val_arr[2] == 1 ? 'checked="checked"' : "";
            $checkboxs.='<label>
                            <input class="ace" autocomplete="off"  type="checkbox" ' . $is_chk . ' name="'.self::$_fieldrow['fieldname'].'" value="' . $val_arr[1] . '">
                            <span class="lbl"> ' . $val_arr[0] . '</span>
                      </label>';
        }
        return $checkboxs;
    }
    
    public static function cate()
    {
        if(I('get.cid'))
        {
            $category=DD('Category');
            $cateinfo=$category->findbyid(I('get.cid'));
            return $catefield='<lable>'.$cateinfo['title'].'</lable>'.
                    "<input type=hidden name='".self::$_fieldrow['fieldname']."' id='".self::$_fieldrow['fieldname']."' value='".$cateinfo['id']."' />";
        }
    }

}
