<?php

namespace Auth\Controller;

class PermissionsController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {
        $this->display();
    }

    /**
     * 分组列表
     */
    public function grouplist()
    {
        $groupmodel = DD('AdminAuthGroup');
        $grouplist = $groupmodel->selall();
        $this->assign('grouplist', $grouplist);
        $this->display();
    }

    /**
     * 添加权限组
     */
    public function addgroup()
    {
        if (IS_POST)
        {
            $data = I('post.');
            $setlang = new \Org\Helper\SetLang();
            $setlang->setOneLang($data['title'], $data['titlename']); //设置语言
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
            $data = I('post.');
            $path = 'Common/Comm_auth.php';
            $setlang = new \Org\Helper\SetLang($path, true);
            $setlang->setOneLang($data['langconf'], $data['title']);
            $actionmod = DD('AdminAuthAction');
            $b = $actionmod->addAction();
            if ($b)
            {
                $this->success('ok');
            }
        } else
        {
            //获取分组
            $groupmod = DD('AdminAuthGroup');
            $grouplist = $groupmod->selall();
            $this->assign('grouplist', $grouplist);
            $this->display();
        }
    }

    public function getmodulebygid()
    {
        if (IS_POST)
        {
            $ctlmod = DD('AdminAuthController');
            $list = $ctlmod->selbygid(I('post.gid'));
            foreach ($list as $key => $val)
            {
                $list[$key]['title'] = L($val['title']);
            }
            echo json_encode($list);
        }
    }

    /**
     * 权限列表
     */
    public function actions()
    {
        $groupmod = DD('AdminAuthGroup');
        $grouplist = $groupmod->selall();
        $ctlmod = DD('AdminAuthController');
        $ctllist = $ctlmod->selall();
        $newctllist = array();
        foreach ($ctllist as $cl)
        {
            $newctllist[$cl['gid']][] = $cl;
        }
        $actmod = DD('AdminAuthAction');
        $actlist = $actmod->select();
        $newactlist = array();
        foreach ($actlist as $al)
        {
            $newactlist[$al['cid']][] = $al;
        }
        $this->assign('grouplist', $grouplist);
        $this->assign('ctllist', $newctllist);
        $this->assign('actlist', $newactlist);
        $this->display();
    }

    public function delaction()
    {
        if (IS_AJAX)
        {
            $id = I('get.id');
            $actmod = DD('AdminAuthAction');
            $b = $actmod->delAction($id);
            $info = array();
            if ($b)
            {
                echo 1;
            } else
            {
                echo -1;
            }
        }
    }

    public function editaction()
    {
        if (IS_POST)
        {
            $data = I('post.');
            if (!isset($_POST['isshow']))
            {
                $data['isshow'] = 0;
            }
            $id = I('post.id');
            $actmod = DD('AdminAuthAction');
            $b = $actmod->edit($id, $data);
            if ($b)
            {
                $this->success(L('OP_SUCCESS'), U('Auth/Permissions/actions'));
            } else
            {
                $this->error(L('OP_ERROR'));
            }
        } else
        {
            $id = I('get.id');
            $actmod = DD('AdminAuthAction');
            $actioninfo = $actmod->findByID($id);
            $groupmod = DD('AdminAuthGroup');
            $grouplist = $groupmod->selall();
            $ctlmod = DD('AdminAuthController');
            $ctllist = $ctlmod->selall();
            $this->assign('grouplist', $grouplist);
            $this->assign('ctllist', $ctllist);
            $this->assign('actioninfo', $actioninfo);
            $this->display();
        }
    }

    public function sortgroup()
    {
        $id = I('post.id');
        $sort = I('post.sort');
        $authgroup = DD('AdminAuthGroup');
        $b = $authgroup->updateSort($sort, $id);
        $result = 0;
        $b == true ? $result = 1 : $result = 0;
        echo $result;
    }
    
    /**
     * 删除分组
     */
    public function delgroup()
    {
        
    }
}
