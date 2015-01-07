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
        //获取已经安装的插件列表
        $pluginmod = DD('Plugin');
        $plugin_install = $pluginmod->select();
        foreach ($plugin_install as $k => $ins)
        {
            $plugin_install[$ins['filetitle']] = $ins;
        }
        $this->assign('plugin_arr', $plugin_arr);
        $this->assign('plugin_install', $plugin_install);
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
        $pluginModel = DD('Plugin');
        $b = $pluginModel->add($plugin_data);
        if (!$b)
        {
            $this->error(L('OP_ERROR'));
        }
        $pluginid = $pluginModel->getLastInsID();
        $plugin_data_list = array();
        //判断后台菜单  插入数据库
        $k = 0;
        if (isset($pluginfo->admin->operation))
        {
            foreach ($pluginfo->admin->operation as $op)
            {
                $path = (string) $op->path;
                $group = $plugin;
                $path_arr = explode('/', $path);
                list($control, $action) = $path_arr;
                $menu_group = (string) $op->menu_group;
                $menu_module = (string) $op->menu_module;
                ctype_digit($menu_group) == true ? $menu_gid = ctype_digit($menu_group) : $menu_gid = 0;
                ctype_digit($menu_module) == true ? $menu_mid = ctype_digit($menu_module) : $menu_mid = 0;

                //添加新分组
                if ($menu_gid == 0)
                {
                    $AdminAuthGroup = DD('AdminAuthGroup');
                    $groupdata = array(
                        'title' => '', 'groupname' => $plugin, 'langconf' => $menu_group,
                    );
                    $b = $AdminAuthGroup->addgroup($groupdata);
                    if ($b)
                    {
                        $menu_gid = $AdminAuthGroup->getLastInsID();
                    }
                }

                //添加新Controller
                if ($menu_mid == 0)
                {
                    $control_data = array(
                        'title' => '', 'cname' => $control, 'gid' => $menu_gid, 'lanconf' => $menu_module, 'cls' => 'icon-resize-full',
                    );
                    $AdminAuthController = DD('AdminAuthController');
                    $b = $AdminAuthController->add($control_data);
                    if ($b)
                    {
                        $menu_mid = $AdminAuthController->getLastInsID();
                    }
                }

                //添加Action
                $action_data = array(
                    'title' => '', 'app' => 'plugin.php', 'gid' => $menu_gid, 'cid' => $menu_mid,
                    'group' => $plugin, 'controller' => $control, 'action' => $action,
                    'langconf' => (string) $op->name,
                );
                if (isset($op->ismenu))
                {
                    if ((string) $op->ismenu == 1)
                    {
                        //是菜单
                        $action_data['isshow'] = 1;
                    }
                }
                $AdminAuthAction = DD('AdminAuthAction');
                $AdminAuthAction->addAction($action_data);

                if ((string) $op->res->js != '' || (string) $op->res->css != '')
                {
                    $plugin_data_list[$k] = array(
                        'path' => $plugin . '/' . $path,
                        'js' => $op->res->js, 'css' => $op->res->css,
                        'acname' => (string) $op->name, 'pid' => $pluginid,
                    );
                    $k++;
                }
            }
        }

        //前台资源
        if (isset($pluginfo->site->operation))
        {
            foreach ($pluginfo->site->operation as $op)
            {
                if ((string) $op->js != '' || (string) $op->css != '')
                {
                    $plugin_data_list[$k] = array(
                        'path' => $plugin . '/' . $path,
                        'js' => $op->js, 'css' => $op->css,
                        'acname' => (string) $op->name, 'pid' => $pluginid,
                    );
                    $k++;
                }
            }
        }

        //写入插件资源 
        $PluginRes = DD('PluginRes');
        $b = $PluginRes->addlist();
        //写入钩子
        $hooklistdata = array();
        if (isset($pluginfo->vhooks->vhook))//视图钩子
        {
            foreach ($pluginfo->vhooks->vhook as $vhook)
            {
                $data = array(
                    'name' => (string)$vhook->name, 'path' => $plugin . '/' . (string) $vhook->class, 'method' => (string) $vhook->method, 'type' => '1',
                    'pid' => $pluginid, 'js' => (string) $vhook->res->js, 'css' => (string) $vhook->res->css,
                );
                if ((string) $vhook->hookpos)
                {
                    $data['hid'] = (int) $vhook->hookpos;
                }
                $hooklistdata[] = $data;
            }
        }

        if (isset($pluginfo->bhooks->bhook))//业务钩子
        {
            foreach ($pluginfo->bhooks->bhook as $bhook)
            {
                $data = array(
                    'name' => (string)$bhook->name, 'path' => $plugin . '/' . (string) $bhook->class, 'method' => (string) $bhook->method, 'type' => '2',
                    'pid' => $pluginid, 'js' => (string) $bhook->res->js, 'css' => (string) $bhook->res->css,
                );
                if ((string) $bhook->hookpos)
                {
                    $data['hid'] = (int) $vhook->hookpos;
                }
                $hooklistdata[] = $data;
            }
        }
        $Hooklist = DD('HookList');
        $Hooklist->addlist($hooklistdata);
        $this->redirect('Plugin/Plugin/pluginlist');
    }

    /**
     * 卸载插件
     * 从数据库移除
     */
    public function uninstall()
    {
        $file = I('get.file');
        $pluginmod = DD('Plugin');
        $plugininfo = $pluginmod->findByPlginFile($file);
        $pid = $plugininfo['id'];
        $pluginmod->startTrans();
        $delPlugin = $pluginmod->delbyid($pid);
        $pluginresmod = DD('PluginRes');
        $delPluginRes = $pluginresmod->delbypid($pid);
        $hooklistmod = DD('HookList');
        $delPluginHook = $hooklistmod->delbypid($pid);
        if ($delPlugin !== false && $delPluginHook !== false && $delPluginRes !== false)
        {
            $pluginmod->commit();
            $this->redirect('Plugin/Plugin/pluginlist');
        } else
        {
            $pluginmod->rollback();
            $this->error(L('OP_ERROR'));
        }
    }

    /**
     * 删除插件
     * 先从数据库移除 在删除
     */
    public function delete()
    {
        
    }

    /**
     * 配置插件
     */
    public function doconfigure()
    {
        
    }

    /**
     * 获取插件配置
     */
    public function getconfigure()
    {
        if (IS_AJAX)
        {
            //插件编号
            $pid = I('post.pid');
            //获取前台插件
            $PluginResMod = DD('PluginRes');
            $siteplugin = $PluginResMod->selByTypePid(1, $pid);
            //前台资源
            foreach ($siteplugin as $k => $sp)
            {
                $siteplugin[$k]['js'] = explode(',', $sp['js']);
                $siteplugin[$k]['css'] = explode(',', $sp['css']);
            }
            //获取后台插件
            $adminplugin = $PluginResMod->selByTypePid(2, $pid);
            //后台资源
            foreach ($adminplugin as $k => $ap)
            {
                $adminplugin[$k]['js'] = explode(',', $ap['js']);
                $adminplugin[$k]['css'] = explode(',', $ap['css']);
            }
            //获取视图钩子
            $hooklistMod = DD('HookList');
            $vhoodlist = $hooklistMod->selbyPidType($pid, 1);
            //获取业务钩子
            $bhoodlist = $hooklistMod->selbyPidType($pid, 2);
            $config = array(
                'siteplugin' => $siteplugin,
                'adminplugin' => $adminplugin,
                'vhoodlist' => $vhoodlist,
                'bhoodlist' => $bhoodlist,
            );
            echo json_encode($config);
        }
    }

}
