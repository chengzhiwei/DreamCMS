<?php

namespace Index\Controller;

use Think\Controller;

class IndexController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {
        $menu = \Common\Cls\AuthCls:: menu();
        $langmodel = DD('Language');
        $langlist = $langmodel->selectall();
        $admin = session('admin');
        $this->assign('langlist', $langlist);
        $this->assign('menu', $menu);
        $this->assign('admin', $admin);
        $this->assign('a','aaa');
        $this->display();
    }

}
