<?php

namespace Common\Controller;

class SitePluginController extends \Think\Controller
{

    public function __construct()
    {
        parent::__construct();
        C('LAYOUT_NAME', '../../Site/' . C('ADMIN_THEME') . '/layout');
    }

}
