<?php

namespace Common\Controller;

class InstallController extends \Think\Controller
{

    public function _initialize()
    {
        define('TMPL_PATH', 'Template/Install/' . C('INSTALL_THEME') . '/');
        define('CSS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/Css/');
        define('JS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/Js/');
        define('IMG_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/Image/');
    }

}
