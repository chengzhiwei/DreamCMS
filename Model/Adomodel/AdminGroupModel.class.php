<?php

namespace Model\Adomodel;

class AdminGroupModel extends \Think\Model\AdvModel
{

    public function allgroup()
    {
        return $this->select();
    }

    public function addgroup($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            if ($this->add())
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
