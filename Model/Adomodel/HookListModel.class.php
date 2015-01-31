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

    /**
     * 根据类型查询钩子
     * @param int $type
     * @return array
     */
    public function selbyPidType($pid, $type)
    {
        return $this->where(array('pid' => $pid, 'type' => $type))->select();
    }

    /**
     * 根据插件ID 删除钩子
     * @param int $pid
     * @return boolean
     */
    public function delbypid($pid)
    {
        return $this->where(array('pid' => $pid))->delete();
    }

    /**
     * 根据路径和方法查询
     * @param string $path
     * @param string $method
     * @return array
     */
    public function findByPathMethod($path, $method)
    {
        $condition = array('path' => $path, 'method' => $method);
        return $this->where($condition)->find();
    }

    /**
     * 根据一组编号修改状态
     * @param int $status
     * @param array $ids
     */
    public function updateStatusByIds($status, $ids = array())
    {
        $condition = array('id' => array('in', $ids));
        return $this->where($condition)->save(array('status' => $status));
    }

}
