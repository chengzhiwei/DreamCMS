<?php

namespace Model\Adomodel;

class AdminAuthGroupModel extends \Think\Model\AdvModel
{

    public function __construct($name = '', $tablePrefix = '', $connection = '')
    {
        parent::__construct($name, $tablePrefix, $connection);
    }
    public function addgroup($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            if ($this->add())
            {
                return TRUE;
            } else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function selall($order = 'sort')
    {
        return $this->order($order)->select();
    }

    /**
     * 修改排序
     * @param int $sort 排序
     * @param int $id 编号
     */
    public function updateSort($sort, $id)
    {
        $b = $this->where(array('id' => $id))->save(array('sort' => $sort));
        if ($b === false)
        {
            return false;
        }
        return true;
    }

}
