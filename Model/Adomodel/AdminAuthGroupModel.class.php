<?php

namespace Model\Adomodel;

class AdminAuthGroupModel extends \Think\Model\AdvModel
{

    public function addgroup($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            if ($this->add($data))
            {
                return TRUE;
            } else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }
    
    public function selall($order='sort')
    {
        return $this->order($order)->select();
    }
}
