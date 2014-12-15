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
            } else
            {
                return FALSE;
            }
        } else
        {
            return false;
        }
    }

}
