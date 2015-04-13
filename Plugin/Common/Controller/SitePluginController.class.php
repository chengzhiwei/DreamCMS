<?php

namespace Common\Controller;

import('Common\Controller\SiteController', 'Site');

class SitePluginController extends \Common\Controller\SiteController
{

    public function __construct()
    {
        $tmpl_path = 'Template/Plugin/';
        define('TMPL_PATH', $tmpl_path);
        parent::__construct();
        \Common\Cls\CommCls::_setPlgStatic();
        $this->assign('site_tmpl', $this->site_tmpl);
    }

}
