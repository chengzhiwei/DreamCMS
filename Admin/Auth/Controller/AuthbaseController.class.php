<?php

namespace Auth\Controller;

import('Common\Controller\AdminbaseController', 'Admin');

class AuthbaseController extends \Common\Controller\AdminbaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->_chkauth();
    }

    private function _chkauth()
    {

        if (!session('Dream_admin'))
        {
            $this->redirect('Auth/Login/login');
        }
    }

}
