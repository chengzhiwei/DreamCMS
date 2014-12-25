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
            define('TMPL_PATH', 'Template/Admin/' . C('ADMIN_THEME') . '/');
            define('CSS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/css/');
            define('JS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/js/');
            define('IMG_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/images/');
            define('ADMIN_LAYOUT', 'Template/Admin/' . C('ADMIN_THEME') . '/');
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
            $this->OpSiteLangInfo = $langinfo;
            cookie('OpSiteLangInfo', $langinfo);
        } else
        {
            if (!cookie('OpSiteLangInfo'))
            {
                $langinfo = $langmod->findbydefault();
                $this->OpSiteLangInfo = $langinfo;
                cookie('OpSiteLangInfo', $langinfo);
            }
        }
    }

}
