<?php

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
        $this->display();
    }

    public function addfield()
    {
        if (IS_POST)
        {
            $field=  DD('ModelField');
            $field->addField();
        } else
        {
            $this->display();
        }
    }

}
