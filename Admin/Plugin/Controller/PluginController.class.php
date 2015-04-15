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
        $config_path = C('PLG_APP_NAME') . '/' . $plugin . '/config.xml';
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
                ctype_digit($menu_group) == true ? $menu_gid = intval($menu_group) : $menu_gid = 0;
                ctype_digit($menu_module) == true ? $menu_mid = intval($menu_module) : $menu_mid = 0;

                //添加新分组
                if ($menu_gid == 0)
                {
                    $AdminAuthGroup = DD('AdminAuthGroup');
                    $groupinfo = $AdminAuthGroup->findByTitle($menu_group);
                    if ($groupinfo)
                    {
                        $menu_gid = $groupinfo['id'];
                    } else
                    {
                        //根据langconf 查询 
                        $groupdata = array(
                            'title' => $menu_group, 'groupname' => $plugin, 'app' => \Model\Enum\AppEnum::PLUGIN,
                        );
                        $b = $AdminAuthGroup->addgroup($groupdata);
                        if ($b)
                        {
                            $menu_gid = $AdminAuthGroup->getLastInsID();
                        }
                    }
                }

                //添加新Controller
                if ($menu_mid == 0)
                {
                    $AdminAuthController = DD('AdminAuthController');
                    $ctrinfo = $AdminAuthController->findByTitle($menu_module);
                    if ($ctrinfo)
                    {
                        $menu_mid = $ctrinfo['id'];
                    } else
                    {
                        $control_data = array(
                            'title' => $menu_module, 'cname' => $control,
                            'gid' => $menu_gid, 'cls' => 'icon-resize-full',
                            'app' => 'plugin.php', 'appname' => $plugin,
                        );
                        $b = $AdminAuthController->add($control_data);
                        if ($b)
                        {
                            $menu_mid = $AdminAuthController->getLastInsID();
                        }
                    }
                }

                //添加Action
                $action_data = array(
                    'title' => (string) $op->name, 'app' => \Model\Enum\AppEnum::PLUGIN, 'gid' => $menu_gid, 'cid' => $menu_mid,
                    'group' => $plugin, 'controller' => $control, 'action' => $action,
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
                        'js' => (string) $op->res->js, 'css' => (string) $op->res->css,
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
                        'js' => (string) $op->js, 'css' => (string) $op->css,
                        'acname' => (string) $op->name, 'pid' => $pluginid,
                    );
                    $k++;
                }
            }
        }

        //写入插件资源 
        $PluginRes = DD('PluginRes');
        $b = $PluginRes->addlist($plugin_data_list);
        //写入钩子
        $hooklistdata = array();
        if (isset($pluginfo->vhooks->vhook))//视图钩子
        {
            foreach ($pluginfo->vhooks->vhook as $vhook)
            {
                $data = array(
                    'name' => (string) $vhook->name, 'path' => $plugin . '/' . (string) $vhook->class, 'method' => (string) $vhook->method, 'type' => '1',
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
                    'name' => (string) $bhook->name, 'path' => $plugin . '/' . (string) $bhook->class, 'method' => (string) $bhook->method, 'type' => '2',
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
        //执行插件SQL 主要用于建表
        $install = C('PLG_APP_NAME') . '/' . $plugin . '/install.sql';
        \Org\Helper\ImportSql::ExecuteSqlFile($install);
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
        //删除插件信息表
        $delPlugin = $pluginmod->delbyid($pid);
        //删除插件资源表
        $pluginresmod = DD('PluginRes');
        $delPluginRes = $pluginresmod->delbypid($pid);

        //删除插件钩子表
        $hooklistmod = DD('HookList');
        $delPluginHook = $hooklistmod->delbypid($pid);
        /* 删除后台权限菜单表 */
        $ActionMod = DD('AdminAuthAction');
        //查询cid
        $actions = $ActionMod->selPlgByGroup($file);
        $cid = $actions[0]['cid'];
        //删除权限菜单action表
        $ActionMod->delPlgByGroup($file);
        //判断该模块下还有没有其它菜单 没有删除模块导航
        $CidActions = $ActionMod->selByCid($cid);
        if (!$CidActions && $cid)
        {
            //删除模块菜单Controller
            $ControllerMod = DD('AdminAuthController');
            $controlInfo = $ControllerMod->find($cid);
            $ControllerMod->delById($cid);
            $Controllers = $ControllerMod->selbygid($controlInfo['gid']);
            if (!$Controllers && $controlInfo['gid'])
            {
                //删除分组
                $GroupMod = DD('AdminAuthGroup');
                $GroupMod->delById($controlInfo['gid']);
            }
        }
        if ($delPlugin !== false && $delPluginHook !== false && $delPluginRes !== false)
        {
            $install = C('PLG_APP_NAME') . '/' . $file . '/uninstall.sql';
            \Org\Helper\ImportSql::ExecuteSqlFile($install);
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
     * 
     */
    public function doconfigure()
    {
        //处理视图钩子
        $pid = I('post.pid');
        $postvhookids = I('post.vhookids');
        $hooklistMod = DD('HookList');
        $vhooklist = $hooklistMod->selbypid($pid);
        $vhookids = array();
        foreach ($vhooklist as $k => $v)
        {
            $vhookids[] = $v['id'];
        }
        $intersectvhook = array_intersect($postvhookids, $vhookids); //交集
        $diffvhook = array_diff($vhookids, $postvhookids); //差集
        $hooklistMod->updateStatusByIds(1, $intersectvhook); //交集启用
        $hooklistMod->updateStatusByIds(0, $diffvhook); //差集停用
        //处理业务钩子
        $postbhookids = I('post.bhookids');
        $intersectbhook = array_intersect($postbhookids, $vhookids); //交集
        $diffbhook = array_diff($vhookids, $postbhookids); //差集
        $hooklistMod->updateStatusByIds(1, $intersectbhook); //交集启用
        $hooklistMod->updateStatusByIds(0, $diffbhook); //差集停用
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

            //插件基本信息
            $pluginMod = DD('Plugin');
            $plugininfo = $pluginMod->findbyid($pid);
            //加载语言包
            \Org\Helper\IncludeLang::IncFloder($plugininfo['filetitle'], 'Plugin');

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
            $vhooklist = $hooklistMod->selbyPidType($pid, 1);
            foreach ($vhooklist as $k => $vh)
            {
                $vhooklist[$k]['name'] = L($vh['name']);
            }
            //获取业务钩子
            $bhooklist = $hooklistMod->selbyPidType($pid, 2);
            $config = array(
                'siteplugin' => $siteplugin,
                'adminplugin' => $adminplugin,
                'vhooklist' => $vhooklist,
                'bhooklist' => $bhooklist,
            );
            echo json_encode($config);
        }
    }

}
