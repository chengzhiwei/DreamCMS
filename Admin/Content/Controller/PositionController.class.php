<?php

namespace Content\Controller;

class PositionController extends \Auth\Controller\AuthbaseController
{

    public function positionlist()
    {
        $p = DD('Position');
        $res = $p->positionlist();
        $this->assign('list', $res);
        $this->display();
    }
    public function add()
    {
        $p = DD('Position');
        if (IS_POST)
        {
            $condition = array();
            $condition['title'] = I('post.title');
            $res = $p->addposition($condition);
            if ($res)
            {
                $this->success('添加成功', U('positionlist'));
            } else
            {
                $this->error('添加失败');
            }
        } else
        {
            $this->display();
        }
    }

    public function edit()
    {
        $p = DD('Position');
        $id = $_GET['id'];
        if (IS_POST)
        {
            $condition = array();
            $condition['title'] = I('post.title');
            $res = $p->edit($id, $condition);
            if ($res)
            {
                $this->success('编辑成功', U('positionlist'));
            } else
            {
                $this->error('编辑失败');
            }
        } else
        {
            $info = $p->selectone($id);
            $this->assign('info', $info);
            $this->display();
        }
    }
    
    public function del()
    {
        $p = DD('Position');
        $id = I('get.id', 'intval');
        $res = $p->del($id);
        if ($res)
        {
            $this->success("删除成功");
        } else
        {
            $this->error('删除失败');
        }
    }

}
