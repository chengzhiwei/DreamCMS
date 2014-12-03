<?php

namespace Auth\Controller;

class LoginController extends \Common\Controller\AdminbaseController
{

    public function logout()
    {
        session('admin', NULL);
        redirect(URL('Auth/Login/Login', 'Admin'));
    }

    public function login()
    {
        if (IS_POST)
        {
            $verify = new \Think\Verify();
            if (!$verify->check(I('post.code')))
            {
                $this->error(L('VERIFY_ERR'));
            }
            $pwd = I('post.pwd');
            $adminModel = DD('Admin');
            $admininfo = $adminModel->findbyname();
            if ($admininfo['pwd'] == \cusMd5($pwd, C('PWD_TOKEN')))
            {
                unset($admininfo['pwd']);
                session('Dream_admin', $admininfo);
                $this->redirect('Index/Index/index');
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
