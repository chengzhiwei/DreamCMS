<?php

namespace Model\Adomodel;

class CategoryModel extends \Think\Model\AdvModel
{

    protected $_validate = array(
        array('title', 'require', '用户名不能为空'),
    );

    public function addcate($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            if ($this->add())
            {
                
            } else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function selectall($id)
    {
        $condition = array();
        $condition['langid'] = $id;
        return $this->where($condition)->order('sort')->select();
    }

    public function count1($id)
    {
        $condition = array();
        $condition['pid'] = $id;
        $result = $this->where($condition)->count();
        return $result;
    }

    public function selectF($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->find();
    }

    public function selectS($id)
    {
        $condition = array();
        $condition['pid'] = $id;
        return $this->where($condition)->field('id,title,pid')->select();
    }

    public function update($id, $data)
    {
        $conition = array();
        $conition['id'] = $id;
        $result = $this->where($conition)->save($data);
        return $result;
    }

    public function deletebyid($id)
    {
        $conition = array();
        $conition['id'] = $id;
        return $this->where($conition)->delete();
    }

    public function selectbyname($title)
    {
        $condition = array();
        $condition['title'] = $title;
        return $this->where($condition)->find();
    }

    public function selectbylang($lid,$menushow=-1)
    {
        $condition = array();
        $condition['langid'] = $lid;
        if($menushow!=-1)
        {
            $condition['menushow'] = $menushow;
        }
        return $this->where($condition)->select();
    }

    public function findbyid($id)
    {
        return $this->find($id);
    }

}
