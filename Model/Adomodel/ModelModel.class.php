<?php

namespace Model\Adomodel;

class ModelModel extends \Think\Model\AdvModel
{

    public function selectall()
    {
        return $this->select();
    }

    public function addmodel($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            if ($this->add($data))
            {
                return true;
            } else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function findByID($id)
    {
        return $this->where(array('id' => $id))->find();
    }

}
