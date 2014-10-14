<?php

namespace Common\Controller;

class SitePluginController extends \Think\Controller
{

    public function _initialize()
    {
        C('LAYOUT_NAME', '../../Site/' . C('ADMIN_THEME') . '/layout');
    }

}
