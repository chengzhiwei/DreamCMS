<?php

namespace Common\Controller;

class AdminbaseController extends \Think\Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!defined(TMPL_PATH))
        {
            define('TMPL_PATH', 'Template/Admin/' . C('ADMIN_THEME') . '/');
            define('CSS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/css/');
            define('JS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/js/');
            define('IMG_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/images/');
        }


        $this->nowlang();
    }

    public function nowlang()
    {
        $langmod = DD('Language');
        if (I('get.langid'))
        {
            $langinfo = $langmod->selectone(I('get.langid'));
            cookie('lang', $langinfo['lang']);
            cookie('langtitle', $langinfo['title']);
            cookie('langid', $langinfo['id']);
            cookie('langinfo', $langinfo);
        } else
        {
            if (!cookie('lang'))
            {
                //获取默认语言
                $langinfo = $langmod->findbydefault();
                cookie('lang', $langinfo['lang']);
                cookie('langtitle', $langinfo['title']);
                cookie('langid', $langinfo['id']);
                cookie('langinfo', $langinfo);
            }
        }
    }

}
