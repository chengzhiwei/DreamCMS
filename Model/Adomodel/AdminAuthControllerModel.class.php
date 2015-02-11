<?php

namespace Model\Adomodel;

class AdminAuthControllerModel extends \Think\Model\AdvModel
{

    public function selbygid($gid)
    {
        $condition = array();
        $condition['gid'] = $gid;
        return $this->where($condition)->select();
    }

    public function selall()
    {
        return $this->select();
    }

    public function add($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }

        if ($this->create($data))
        {
            if (parent::add())
            {
                return true;
            }
        }
        return false;
    }

    /**
     * 删除
     */
    public function delByID($id)
    {
        return $this->where(array('id' => $id))->delete();
    }

    /**
     * 编辑
     * @param int  $id
     * @param int $data
     */
    public function editModule($id, $data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            $b = $this->where(array('id' => $id))->save();
            if ($b !== FALSE)
            {
                return TRUE;
            }
        }
        return false;
    }

    public function findByTitle($title)
    {
        return $this->where(array('title' => $title))->find();
    }

}
