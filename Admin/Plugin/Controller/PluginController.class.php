<?php

/*
 * +----------------------------------------------------------------------
 * | DreamCMS [ WE CAN  ]
 * +----------------------------------------------------------------------
 * | Copyright (c) 2006-2014 DreamCMS All rights reserved.
 * +----------------------------------------------------------------------
 * | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * +----------------------------------------------------------------------
 * | Author: 孔雀翎 <284909375@qq.com>
 * +----------------------------------------------------------------------
 */

namespace Plugin\Controller;

class PluginController extends \Auth\Controller\AuthbaseController
{

    public function pluginlist()
    {
        $path = 'Plugin/';
        $files = \getfils($path, $path);
        $filter = array('Base', 'Common', 'Home');
        $plugin_arr = array();
        foreach ($files as $f)
        {
            if (!in_array($f, $filter))
            {
                $lang_file = 'Lang/Plugin/' . C('DEFAULT_LANG') . '/' . $f . '/' . strtolower($f) . '.php';
                if (file_exists($lang_file))
                {
                    L(include($lang_file));
                }
                $xml = simplexml_load_file('Plugin/' . $f . '/config.xml');
                $xml->plugin = $f;
                $plugin_arr[] = $xml;
            }
        }
        $this->assign('plugin_arr', $plugin_arr);
        $this->display();
    }

    /**
     * 安装插件
     * 后台需要插入权限和菜单
     */
    public function install()
    {
        /* 获取插件信息 */
        $plugin = I('get.plugin');
        $config_path = 'Plugin/' . $plugin . '/config.xml';
        $pluginfo = \simplexml_load_file($config_path);
        $name = (string) $pluginfo->name;
        $desc = (string) $pluginfo->desc;
        $plugin_data = array('name' => $name, 'desc' => $desc, 'filetitle' => $plugin);
        //插件信息插入数据库
        //判断后台菜单  插入数据库
        if (isset($pluginfo->admin->menus))
        {
            foreach ($pluginfo->admin->menus->menu as $m)
            {
                $gid = 0;
                $plugin_group = (string) $m->group;
                if (ctype_digit($plugin_group))
                {
                    $gid = intval($plugin_group);
                }
            }
        }
        //写入插件资源 
        //写入钩子
        if (isset($pluginfo->vhook))//视图钩子
        {
            foreach ($pluginfo->vhook as $vhook)
            {
                //钩子信息插入数据库
            }
        }
        //获取插件SQL文件
    }

    /**
     * 卸载插件
     * 从数据库移除
     */
    public function uninstall()
    {
        
    }

    /**
     * 删除插件
     * 先从数据库移除 在删除
     */
    public function delete()
    {
        
    }

}
