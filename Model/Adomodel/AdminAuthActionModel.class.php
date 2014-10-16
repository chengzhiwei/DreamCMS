<?php

namespace Model\Adomodel;

class AdminAuthActionModel extends \Think\Model\AdvModel
{

    public function selbycid($cid, $isshow = '')
    {
        $condition = array();
        $condition['cid'] = $cid;
        if ($isshow != '')
        {
            $condition['isshow'] = $isshow;
        }
        return $this->where($condition)->select();
    }

    public function selbygid($gid, $isshow = '')
    {
        $condition = array();
        $condition['gid'] = $gid;
        if ($isshow != '')
        {
            $condition['isshow'] = $isshow;
        }
        return $this->where($condition)->select();
    }

    /**
     * 根据分组模块和操作名查询
     * @param string $group
     * @param string $module
     * @param string $action
     */
    public function findbyGMA($module, $controller, $action)
    {
        $condition = array();
        $condition = array(
            'group' => $module,
            'controller' => $controller,
            'action' => $action,
        );
        return $this->cache(TRUE)->where($condition)->find();
    }

}
