<?php

namespace Auth\Controller;

class PermissionsController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {
        $this->display();
    }

    /**
     * 添加权限组
     */
    public function addgroup()
    {
        if (IS_POST)
        {

            /* 获取多语言参数
              '多言语参数'=>分组名写到语言包
             *              */
            $data = I('post.');
            $path = 'Lang/Admin/zh-cn/Common/Comm_auth.php';
            $conf = array($data['langconf'] => $data['title']);
            \writeconf($path, $conf);
            $arr = array();
            $groupmodel = DD('AdminAuthGroup');
            $b = $groupmodel->addgroup();
            if (!$b)
            {
                $arr = array(
                    'status' => 'faile',
                    'msg' => L('ERROR'),
                );
            } else
            {
                $arr = array(
                    'status' => 'success',
                    'msg' => L('OPTER_OK'),
                );
            }
            echo json_encode($arr);
        } else
        {
            $this->display();
        }
    }

    public function addmodule()
    {
        if (IS_POST)
        {
            
        } else
        {
            $this->display();
        }
    }

    public function addaction()
    {
        if (IS_POST)
        {
            
        } else
        {
            $this->display();
        }
    }

}
