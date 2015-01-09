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
        \Org\Helper\IncludeLang::QuickInc('Content/modelfield'); //加载语言包
        $this->assign('fields', $fields);
        $this->display();
    }

    public function addfield()
    {
        if (IS_POST)
        {
            //判断是否存在相同的字段
            $fieldMod = DD('ModelField');
            $fieldinfo = $fieldMod->findByMidFiled(I('post.mid'), I('post.fieldname'));
            if ($fieldinfo)
            {
                $this->error(L('THE_SAME_FILED'));
            }
            //findByMidFiled
            //插入语言包
            $setLang = new \Org\Helper\SetLang('Content/modelfield', true);
            $b = $setLang->setOneLang(I('post.langconf'), I('post.title'));
            if (!$b)
            {
                $this->error(L('OP_ERROR'));
            }
            //添加模型字段
            $fieldMod->startTrans();
            //添加模型表字段
            $addmodelfile = $fieldMod->addField();
            $addtablefile = $fieldMod->addtablefield;
            if ($addmodelfile !== false && $addtablefile !== false)
            {
                $fieldMod->commit();
                $this->success(L('OP_SUCCESS'));
            } else
            {
                $fieldMod->rollback();
                $this->error(L('OP_ERROR'));
            }
        } else
        {
            $plugin = DD('Plugin');
            $pluginlist = $plugin->select();
            foreach ($pluginlist as $p)
            {
                \Org\Helper\IncludeLang::QuickInc($p['filetitle'] . '/' . $p['filetitle'], 'Plugin');
            }
            $Mod = DD('Model');
            $modelinfo = $Mod->findByID(I('mid'));
            $this->assign('modelinfo', $modelinfo);
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
        $b = $ModelFieldMod->sort($id, $sort);
        if ($b)
        {
            echo '1';
        } else
        {
            echo '-1';
        }
    }

    public function delfield()
    {
        $id = I('get.id');
        $fieldMod = DD('ModelField');
        $fieldinfo = $fieldMod->find($id);
        //删除语言
        $setLang = new \Org\Helper\SetLang('Content/modelfield', true);
        $b = $setLang->delOneLang($fieldinfo['langconf']);
        $Model = DD('Model');
        $modelinfo = $Model->findByID($fieldinfo['mid']);
        //删除模型字段
        $ModelFieldDel = $fieldMod->delfield($id);
        //删除表字段
        $TableFieldDel = $fieldMod->delTableField($modelinfo['table'], $fieldinfo['filename']);
        if ($ModelFieldDel)
        {
            $this->redirect('Content/Model/fields', array('mid'=>$fieldinfo['mid']));
        } else
        {
            $this->error(L('OP_ERROR'));
        }
    }

    /**
     * 修改字段
     */
    public function editfield()
    {
        if (IS_POST)
        {
            $fieldMod = DD('ModelField');
            $b = $fieldMod->updatefield(I('post.id'));
            if ($b)
            {
                $this->success(L('OP_SUCCESS'));
            } else
            {
                $this->error(L('OP_ERROR'));
            }
        } else
        {
            $id = I('get.id');
            $fieldMod = DD('ModelField');
            $fieldinfo = $fieldMod->find($id);
            \Org\Helper\IncludeLang::QuickInc('Content/modelfield');
            //查询控件
            $plugin = $fieldinfo['plugin'];
            if ($plugin != '')
            {
                $plugin_arr = explode('/', $plugin);
                $method = $plugin_arr[count($plugin_arr) - 1];
                unset($plugin_arr[count($plugin_arr) - 1]);
                $path = implode('/', $plugin_arr);
                $hooklistmod = DD('HookList');
                //加载插件语言库
                $hookinfo = $hooklistmod->findByPathMethod($path, $method);
                \Org\Helper\IncludeLang::QuickInc($plugin_arr[0] . '/' . $plugin_arr[count($plugin_arr) - 1], 'Plugin');
                $this->assign('hookinfo', $hookinfo);
            }

            $pluginMod = DD('Plugin');
            $pluginlist = $pluginMod->select();
            foreach ($pluginlist as $p)
            {
                \Org\Helper\IncludeLang::QuickInc($p['filetitle'] . '/' . $p['filetitle'], 'Plugin');
            }

            $this->assign('pluginlist', $pluginlist);
            $this->assign('fieldinfo', $fieldinfo);
            $this->display();
        }
    }

}
