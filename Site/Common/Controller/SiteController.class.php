<?php

namespace Common\Controller;

class SiteController extends \Think\Controller
{
    public $site_tmpl='';
    public function __construct()
    {
        parent::__construct();
        $this->settplpath();
        $this->SEO();
        $menu = $this->getmenu();
        $this->assign('menu', $menu);
        $lang = langlist();
        $this->assign('lang', $lang);
    }

    public function SEO()
    {
        $langinfo = \nowlang();
        $seo = array(
            'title' => $langinfo['seotitle'],
            'keyword' => $langinfo['seokeyword'],
            'desc' => $langinfo['seodesc'],
        );
        $this->assign('seo', $seo);
    }

    /**
     * 获取菜单
     */
    public function getmenu()
    {
        $nowlang = \nowlang();
        $lid = $nowlang['id'];
        if (!S('menu_' . $lid))
        {
            $Category = DD('Category');
            $result = $Category->selectbylang($lid);
            foreach ($result as $key => $v)
            {
                if ($v['type'] == 1)
                {
                    $v['href'] = $v['link'];
                } else
                {
                    if ($v['mid'] == 3)//单页面模型
                    {
                        $v['href'] = \ROU('Content/Content/page', array('cid' => $v['id']));
                    } else
                    {
                        if ($v['isleaf'] == 1)//子级调用list
                        {
                            $v['href'] = \ROU('Content/Content/newslist', array('cid' => $v['id']));
                        } else //父级调用CATEGORY
                        {
                            $v['href'] = \ROU('Content/Content/category', array('cid' => $v['id']));
                        }
                    }
                }
                $result[$key] = $v;
            }
            $menu = $this->_menuarray($result, 0, $pid_arr);
            S('menu_' . $lid, $menu);
        } else
        {
            $menu = S('menu_' . $lid);
        }
        return $menu;
    }

    private function _menuarray(&$list, $pid = 0, $pid_arr)
    {
        static $tree = array();
        foreach ($list as $v)
        {

            if ($v['pid'] == $pid)
            {
                $c = $this->_menuarray($list, $v['id'], $pid_arr);
                $v['child'] = $c;
                $tree[$v['id']] = $v;
            }
        }
        return $tree;
    }

    private function settplpath()
    {
        $nowlang = \nowlang();
        $tmpl_path = 'Template/Site/' . $nowlang['tmpl'] . '/';
        if (!is_dir($tmpl_path))
        {
            $tmpl_path = 'Template/Site/Default/';
        }
        $this->site_tmpl=$tmpl_path;
        define('TMPL_PATH', $tmpl_path);
        define('CSS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/Css/');
        define('JS_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/Js/');
        define('IMG_PATH', __ROOT__ . '/' . TMPL_PATH . 'Layout/Image/');
        $this->assign('CSS_PATH', CSS_PATH);
        $this->assign('JS_PATH', JS_PATH);
        $this->assign('IMG_PATH', IMG_PATH);
        C('TMPL_ACTION_ERROR', 'template/' . APP_NAME . '/' . $nowlang['tmpl'] . '/Layout/error.html');
        C('TMPL_ACTION_SUCCESS', 'template/' . APP_NAME . '/' . $nowlang['tmpl'] . '/Layout/success.html');
    }

}
