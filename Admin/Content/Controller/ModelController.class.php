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

namespace Content\Controller;

class ModelController extends \Auth\Controller\AuthbaseController
{

    /**
     * 模型列表
     */
    public function index()
    {
        $mod = DD('Model');
        $modellist = $mod->selectall();
        $this->assign('modellist', $modellist);
        $this->display();
    }

    /**
     * 添加模型
     */
    public function addmodel()
    {
        if (IS_POST)
        {
            $mod = DD('Model');
            if ($mod->addmodel())
            {
                $this->success(L('OP_SUCCESS'));
            } else
            {
                $this->error(L('OP_ERROR'));
            }
        } else
        {

            $this->display();
        }
    }

    public function fields()
    {
        $mid = I('mid');
        $ModelField = DD('ModelField');
        $fields = $ModelField->selFieldByMid($mid);
        $this->assign('fields', $fields);
        $this->display();
    }

    public function addfield()
    {
        if (IS_POST)
        {
            $field = DD('ModelField');
            $field->addField();
        } else
        {
            $plugin = DD('Plugin');
            $pluginlist = $plugin->select();
            foreach ($pluginlist as $p)
            {
                $plugin_lang = 'Lang/Plugin/zh-cn/' . $p['filetitle'] . '/' . $p['filetitle'] . '.php';
                if (is_file($plugin_lang))
                {
                    L(include($plugin_lang));
                }
            }
            $this->assign('pluginlist', $pluginlist);
            $this->assign('mid', I('mid'));
            $this->display();
        }
    }

    public function getvook()
    {
        if (IS_AJAX)
        {
            $pid = I('post.pid');
            $pluginMod = DD('Plugin');
            $plugininfo = $pluginMod->findbyid($pid);
            $hooklist = DD('HookList');
            $list = $hooklist->selbypid($pid);
            $new_list = array();
            foreach ($list as $l)
            {
                \Org\Helper\IncludeLang::QuickInc($plugininfo['filetitle'] . '/vhook', 'Plugin');
                $l['name'] = L($l['name']);
                $new_list[] = $l;
            }
            echo json_encode($new_list);
        }
    }

    public function fieldsort()
    {
        $id = I('post.id');
        $sort = I('post.sort');
        $ModelFieldMod = DD('ModelField');
        $ModelFieldMod->sort($id,$sort);
    }

}
