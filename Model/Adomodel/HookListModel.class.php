<?php

namespace Model\Adomodel;

class HookListModel extends \Think\Model\AdvModel
{

    public function sellistbyhid($hid)
    {
        $condition = array();
        $condition['hid'] = $hid;
        return $this->cache(TRUE)->where($condition)->select();
    }

    public function addlist($datalist)
    {
        return $this->addAll($datalist);
    }

    public function selbypid($pid)
    {
        $condition = array('pid' => $pid);
        return $this->where($condition)->select();
    }

}
