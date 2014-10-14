<?php

namespace Model\Adomodel;

class PositionDataModel extends \Think\Model\AdvModel
{

    public function addallposition($datalist = array())
    {
        return $this->addAll($datalist);
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
