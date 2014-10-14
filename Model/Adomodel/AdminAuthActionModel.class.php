<?php

namespace Model\Adomodel;

class AdminAuthActionModel extends \Think\Model\AdvModel
{
    public function selbycid($cid,$isshow='')
    {
        $condition=array();
        $condition['cid']=$cid;
        if($isshow!='')
        {
            $condition['isshow']=$isshow;
        }
        return $this->where($condition)->select();
    }
}
