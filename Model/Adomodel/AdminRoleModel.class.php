<?php

namespace Model\Adomodel;

class AdminRoleModel extends \Think\Model\AdvModel
{

    public function pladd($datalist)
    {
        if ($this->addAll($datalist))
        {
            return TRUE;
        } else
        {
            return false;
        }
    }
    
    

}
