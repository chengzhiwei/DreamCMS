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

}
