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

}
