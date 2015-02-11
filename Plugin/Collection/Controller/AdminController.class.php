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
         $this->display();
    }

}
