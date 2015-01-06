<?php

namespace Auth\Controller;

import('Common\Controller\AdminbaseController', 'Admin');

class AuthbaseController extends \Common\Controller\AdminbaseController
{

    public $LoginAdminInfo;

    public function __construct()
    {
        parent::__construct();
        $this->_chkauth();
        $this->_common();
        $this->_nowpermissions();
    }

    private function _chkauth()
    {

        if (!session('Dream_admin'))
        {
            redirect(URL('Auth/Login/Login', '', 'Admin.php'));
        }
        $this->LoginAdminInfo = session('Dream_admin');
    }

    private function _common()
    {
        $authgroupmodel = DD('AdminAuthGroup');
        $authgrouplist = $authgroupmodel->selall();
        $this->assign('authgrouplist', $authgrouplist);
    }

    /**
     * 重写DISPLAY方法 支持PHP模板引擎的模板布局
     * @param string $view
     */
    public function display($view = '')
    {

        if (C('IS_LAYOUT'))
        {
            if ($view == '')
            {
                $view = TMPL_PATH . MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME . C('TMPL_TEMPLATE_SUFFIX');
            }
            $this->assign('view', $view);
            parent::display(ADMIN_LAYOUT . 'Layout/layout.php');
        } else
        {
            parent::display();
        }
    }

    private function _nowpermissions()
    {
        $actionmod = DD('AdminAuthAction');
        $actioninfo = $actionmod->findbyGMA(MODULE_NAME, CONTROLLER_NAME, ACTION_NAME);
        if ($actioninfo)
        {
            $this->assign('group_id', $actioninfo['gid']);
            $this->assign('controller_id', $actioninfo['cid']);
            $this->assign('action_id', $actioninfo['id']);
        }
    }

}
