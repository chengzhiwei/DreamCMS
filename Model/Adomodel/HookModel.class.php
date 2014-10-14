<?php

namespace Model\Adomodel;

class HookModel extends \Think\Model\AdvModel
{

    public function findbyval($hookval)
    {
        $condition = array();
        $condition['hookvalue'] = $hookval;
        return $this->cache(true)->where($condition)->find();
    }

    public function selbytype($type = 0)
    {
        
    }

}
