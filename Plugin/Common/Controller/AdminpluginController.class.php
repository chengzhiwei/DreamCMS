<?php

namespace Common\Controller;

import('Auth\Controller\AuthbaseController', 'Admin');

class AdminpluginController extends \Auth\Controller\AuthbaseController
{

    public function __construct()
    {
        C('IS_LAYOUT', true);
        C('TMPL_ENGINE_TYPE', 'PHP');
        \Org\Helper\IncludeLang::QuickInc('Common/Common', 'Admin'); //加载语言包
        parent::__construct();
    }

    public function display()
    {
        $view = C('TMPL_PATH') . '/' . C('PLG_APP_NAME') . '/' . MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME . C('TMPL_TEMPLATE_SUFFIX');
        parent::display($view);
    }

}
