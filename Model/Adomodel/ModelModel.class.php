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
        if ($this->create())
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

}
