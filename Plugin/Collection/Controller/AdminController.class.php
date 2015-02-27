<?php

/**
 * 采集插件后台管理
 */

namespace Collection\Controller;

class AdminController extends \Common\Controller\AdminpluginController
{

    /**
     * 采集列表页
     */
    public function index()
    {
        $this->display();
    }

    /**
     * 添加采集规则
     */
    public function add()
    {
        $model = DD('Model');
        $modellist = $model->select();
        \Org\Helper\IncludeLang::QuickInc('Content/model', 'Admin');
        $this->assign('modellist', $modellist);
        $this->display();
    }

    public function getfields()
    {
        if (IS_AJAX)
        {
            $mid = I('post.mid');
            $ModelField = DD('ModelField');
            $fieldlist = $ModelField->selFieldByMid($mid);
            \Org\Helper\IncludeLang::QuickInc('Content/modelfield', 'Admin');
            foreach ($fieldlist as $key => $f)
            {
                $fieldlist[$key]['title'] = L($f['title']);
            }
            echo json_encode($fieldlist);
        }
    }

}
