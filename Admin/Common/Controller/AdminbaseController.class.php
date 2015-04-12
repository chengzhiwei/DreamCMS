<?php

namespace Common\Controller;

class AdminbaseController extends \Think\Controller
{

    public $OpSiteLangInfo = array();
    public $AdminLang = '';

    public function __construct()
    {
        parent::__construct();
        if (!defined(TMPL_PATH))
        {
            define('TMPL_PATH', C('TMPL_PATH') . '/' . C('ADMIN_APP_NAME') . '/' . C('ADMIN_THEME') . '/');
            define('ADMIN_CSS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/Css/');
            define('ADMIN_JS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/Js/');
            define('ADMIN_IMG_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/Images/');
            define('ADMIN_LAYOUT', C('TMPL_PATH') . '/' . C('ADMIN_APP_NAME') . '/' . C('ADMIN_THEME') . '/');
        }
        if (!defined('ADMIN_OR_SITE'))
        {
            define('ADMIN_OR_SITE', 'ADMIN');
        }
        //获取当前操作的前台语言
        $this->opSiteLang();
        //导入前台语言列表的语言包
        \Org\Helper\IncludeLang::QuickInc('System' . DS . 'language');
        //获取后台的默认语言
        $this->AdminLang = C('DEFAULT_LANG');
    }

    /**
     * 当前操作的前台语言
     */
    public function opSiteLang()
    {

        //判断有没有URL参数
        $langmod = DD('Language');
        if (I('get.opsitelang'))
        {
            $langinfo = $langmod->selectone(I('get.langid'));
            cookie('OpSiteLangInfo', $langinfo);
        } else
        {
            if (!cookie('OpSiteLangInfo'))
            {
                $langinfo = $langmod->findbydefault();
                cookie('OpSiteLangInfo', $langinfo);
            }
        }
        $this->OpSiteLangInfo = cookie('OpSiteLangInfo');
    }

}
