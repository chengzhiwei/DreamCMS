<?php

namespace Common\Controller;

class SiteController extends \Think\Controller
{
    public $site_tmpl='';
    public function __construct()
    {
        parent::__construct();
        if(!defined('ADMIN_OR_SITE'))
        {
            define('ADMIN_OR_SITE', 'SITE');
        }
        $this->settplpath();
        $this->SEO();
        $menu = \getmenu();
        $this->assign('menu', $menu);
        $lang = \langlist();
        $this->assign('lang', $lang);
    }

    public function SEO()
    {
        $langinfo = \nowlang();
        $seo = array(
            'title' => $langinfo['seotitle'],
            'keyword' => $langinfo['seokeyword'],
            'desc' => $langinfo['seodesc'],
        );
        $this->assign('seo', $seo);
    }

    private function settplpath()
    {
        $nowlang = \nowlang();
        $tmpl_path = 'Template/Site/' . $nowlang['tmpl'] . '/';
        if (!is_dir($tmpl_path))
        {
            $tmpl_path = 'Template/Site/Default/';
        }
        $this->site_tmpl=$tmpl_path;
        define('TMPL_PATH', $tmpl_path);
        define('CSS_PATH', __ROOT__ . '/' . $tmpl_path . 'Layout/Css/');
        define('JS_PATH', __ROOT__ . '/' . $tmpl_path . 'Layout/Js/');
        define('IMG_PATH', __ROOT__ . '/' . $tmpl_path . 'Layout/Image/');
        $this->assign('CSS_PATH', CSS_PATH);
        $this->assign('JS_PATH', JS_PATH);
        $this->assign('IMG_PATH', IMG_PATH);
        C('TMPL_ACTION_ERROR', 'template/' . APP_NAME . '/' . $nowlang['tmpl'] . '/Layout/error.html');
        C('TMPL_ACTION_SUCCESS', 'template/' . APP_NAME . '/' . $nowlang['tmpl'] . '/Layout/success.html');
    }

}
