<?php

namespace Common\Controller;

import('Auth\Controller\AuthbaseController', 'Admin');

class AdminpluginController extends \Auth\Controller\AuthbaseController
{

    public function __construct()
    {
        C('IS_LAYOUT', true);
        C('TMPL_ENGINE_TYPE', 'PHP');
        parent::__construct();
    }

    public function display()
    {
        $view = PLUGIN_TMPL_PATH . MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME . C('TMPL_TEMPLATE_SUFFIX');
        parent::display($view);
    }

}
