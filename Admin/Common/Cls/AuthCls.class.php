<?php

namespace Common\Cls;

class AuthCls
{

    public static function menu()
    {
        $authgroup = DD('AdminAuthGroup');
        $AuthController = DD('AdminAuthController');
        $Authaction = DD('AdminAuthAction');
        $menu = array();
        $authgrouplist = $authgroup->order('sort')->select();
        foreach ($authgrouplist as $key => $g)
        {
            $menu[$key] = $g;
            $Clist = $AuthController->selbygid($g['id']);
            $menu[$key]['clist'] = $Clist;
            foreach ($Clist as $ck => $c)
            {
                $alist = $Authaction->selbycid($c['id'], 1);
                $menu[$key]['clist'][$ck]['alist'] = $alist;
            }
        }
        return $menu;
    }

}
