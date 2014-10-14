<?php

namespace Auth\Controller;

class AuthController extends \Auth\Controller\AuthbaseController
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

    public function addauth()
    {
        if (IS_POST)
        {
            
        } else
        {
            $this->display();
        }
    }

}
