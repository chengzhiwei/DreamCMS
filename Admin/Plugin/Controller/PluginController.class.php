<?php

namespace Plugin\Controller;

class PluginController extends \Auth\Controller\AuthbaseController
{

    public function pluginlist()
    {
        $path = 'Plugin/';
        $files = \getfils($path, $path);
        $this->assign('files', $files);
        $this->display();
    }

    /**
     * 安装插件
     */
    public function installplugin()
    {
        /* 获取插件信息 */
        $plugin = I('get.plugin');
        $config_path = 'Plugin/' . $plugin . '/config.xml';
        $pluginfo = simplexml_load_file($config_path);
        $name = $pluginfo->name;
        $desc = $pluginfo->desc;
        $plugin_data = array('name' => $name, 'desc' => $desc, 'filetitle' => $plugin);
        //插件信息插入数据库
        var_dump($pluginfo);
        if (isset($pluginfo->vhook))//视图钩子
        {
            foreach ($pluginfo->vhook as $vhook)
            {
                //钩子信息插入数据库
            }
        }
        //获取插件SQL文件
    }

}
