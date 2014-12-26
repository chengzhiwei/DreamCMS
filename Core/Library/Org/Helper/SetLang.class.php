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
 * 设置语言包
 */
class SetLang
{

    public $LangFilePath = '';

    public function __construct()
    {
        
    }

    /**
     * 解析路径
     */
    public function parseLangFilePath()
    {
        $lang = \getlang();
        //$path='';
        if (!defined('ADMIN_OR_SITE'))
        {
            return false;
        }
        else
        {
            
        }
    }
    
    public function setOneLang()
    {
        
    }
    
    public function setListLang()
    {
        
    }

}
