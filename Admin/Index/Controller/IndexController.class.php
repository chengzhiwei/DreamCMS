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
    
    public function getleftmenu()
    {
        if (IS_AJAX)
        {
            $gid = I('post.gid');
            $controllermod = DD('AdminAuthController');
            $controllerlist = $controllermod->selbygid($gid);
            $ctl_arr = array();
            foreach ($controllerlist as $key => $li)
            {
                $ctl_arr[$li['id']] = $li;
            }

            $actionmod = DD('AdminAuthAction');
            $actionlist = $actionmod->selbygid($gid, 1);
            $ac_arr = array();
            foreach ($actionlist as $key => $ac)
            {
                $ac_arr[$ac['cid']][] = $ac;
            }
            $menu = array();
            foreach ($ctl_arr as $key => $ca)
            {
                $ca['child'] = $ac_arr[$key];
                $menu[] = $ca;
            }
            echo json_encode($menu);
        }
    }

}
