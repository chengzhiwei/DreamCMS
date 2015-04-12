<?php

namespace Common\Controller;

class SiteController extends \Think\Controller
{

    public $site_tmpl = '';

    public function __construct()
    {
        parent::__construct();
        if (!defined('ADMIN_OR_SITE'))
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
        $langinfo = \SiteNowLang();
        $seo = array(
            'title' => $langinfo['seotitle'],
            'keyword' => $langinfo['seokeyword'],
            'desc' => $langinfo['seodesc'],
        );
        $this->assign('seo', $seo);
    }

    private function settplpath()
    {
        $nowlang = \SiteNowLang();
        $tmpl_path = C('TMPL_PATH') . '/' . C('SITE_APP_NAME') . '/' . $nowlang['tmpl'] . '/';
        if (!is_dir($tmpl_path))
        {
            $tmpl_path = C('TMPL_PATH') . '/' . C('SITE_APP_NAME') . '/Default/';
        }

        $this->site_tmpl = $tmpl_path;
        define('TMPL_PATH', $tmpl_path);
        $site_css_path = __ROOT__ . '/' . $tmpl_path . 'Layout/Css/';
        $site_js_path = __ROOT__ . '/' . $tmpl_path . 'Layout/Js/';
        $site_img_path = __ROOT__ . '/' . $tmpl_path . 'Layout/Image/';
        define('SITE_CSS_PATH', $site_css_path);
        define('SITE_JS_PATH', $site_css_path);
        define('SITE_IMG_PATH', $site_img_path);

        C('TMPL_ACTION_ERROR', 'template/' . C('SITE_APP_NAME') . '/' . $nowlang['tmpl'] . '/Layout/error.html');
        C('TMPL_ACTION_SUCCESS', 'template/' . C('SITE_APP_NAME') . '/' . $nowlang['tmpl'] . '/Layout/success.html');
    }

}
