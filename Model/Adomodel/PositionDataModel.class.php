<?php

namespace Model\Adomodel;

class PositionDataModel extends \Think\Model\AdvModel
{

    public function addallposition($posdata = array(), $aid, $mid, $cid)
    {
        $pd = array();
        foreach ($posdata as $k => $v)
        {
            $pd[$k] = array(
                'posid' => $v,
                'aid' => $aid,
                'mid' => $mid,
                'cid' => $cid,
            );
        }
        $b= $this->addAll($pd);
        if($b!==false)
        {
            return true;
        }
        return false;
    }

    public function deldatabyaid($aid)
    {
        $condition = array();
        $condition['aid'] = $aid;
        return $this->where($condition)->delete();
    }

    public function selbyaid($aid)
    {
        $condition = array();
        $condition['aid'] = $aid;
        return $this->where($condition)->select();
    }

}
