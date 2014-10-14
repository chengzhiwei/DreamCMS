<?php

namespace Auth\Controller;

class AdminController extends AuthbaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function admininfo()
    {
        $adomodel = DD('Admin');
        $info = $adomodel->findById(1);
        print_r($info);
    }

    public function addadmin()
    {
        if (IS_POST)
        {
            $adomodel = DD('Admin');
            $b = $adomodel->addadmin();
            if (!$b)
            {
                $this->error($adomodel->getError() . $adomodel->getDbError());
            }
        } else
        {
            $this->display();
        }
    }

    public function index()
    {
        $adminmodel = DD('Admin');
        $list = $adminmodel->alladmin();
        $groupmodel = DD('AdminGroup');
        $group = $groupmodel->allgroup();
        $admingroup = array();
        foreach ($group as $g)
        {
            $admingroup[$g['id']] = $g;
        }
        $this->assign('list', $list);
        $this->assign('admingroup', $admingroup);
        $this->display();
    }

    public function changepwd()
    {
        if (IS_POST)
        {
            $arr = array();
            $id = I('post.id');
            $newpwd = I('post.newpwd');
            $repwd = I('post.repwd');
            if ($newpwd == '')
            {
                $arr['status'] = 'faile';
                $arr['msg'] = L('PWD_NOT_NULL');
                echo json_encode($arr);
                die();
            }
            if ($newpwd != $repwd)
            {
                $arr['status'] = 'faile';
                $arr['msg'] = L('PWD_NOT_SAME');
                echo json_encode($arr);
                die();
            }
            $adminmod = DD('Admin');
            $b = $adminmod->updatepwd($id, md5(C('COOKIE_TOKEN') . $newpwd));
            if ($b)
            {
                $arr['status'] = 'success';
                echo json_encode($arr);
                die();
            } else
            {
                $arr['status'] = 'faile';
                $arr['msg'] = $adminmod->getError() . $adminmod->getDbError();
                echo json_encode($arr);
                die();
            }
        } else
        {
            $id = I('get.id');
            $this->assign('id', $id);
            $this->display();
        }
    }

}
