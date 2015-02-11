<?php

namespace Index\Controller;

use Think\Controller;

class IndexController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {
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
                if($li['app']=='plugin.php')
                {
                    \Org\Helper\IncludeLang::QuickInc($li['appname'].'/'. strtolower($li['appname']),'plugin');//加载插件语言包
                }
                $li['title'] = L($li['title']);
                $ctl_arr[$li['id']] = $li;
            }

            $actionmod = DD('AdminAuthAction');
            $actionlist = $actionmod->selbygid($gid, 1);
            $ac_arr = array();
            foreach ($actionlist as $key => $ac)
            {
               
                $ac['title']=L($ac['title']);
                $ac['url'] = URL($ac['group'] . '/' . $ac['controller'] . '/' . $ac['action'], '', $ac['app']);
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
