<?php

namespace Auth\Controller;

class LoginController extends \Common\Controller\AdminbaseController
{

    public function logout()
    {
        session('admin', NULL);
        $this->redirect('Auth/Login/Login');
    }

    public function login()
    {
        if (IS_POST)
        {
            $pwd = I('post.pwd');
            $adminModel = DD('Admin');
            $admininfo = $adminModel->findbyname();
            if ($admininfo['pwd'] == \cusMd5($pwd))
            {
                unset($admininfo['pwd']);
                cookie('share_admin', $admininfo);
                $this->success(L('LOGIN_SUCCESS'), U('Index/Index/index'));
            } else
            {
                $this->error(L('ACCOUNT_FAILE'));
            }
        } else
        {
            $this->display();
        }
    }

    public function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->fontSize = 30;
        $Verify->length = 3;
        $Verify->useNoise = false;
        $Verify->entry();
    }

}
