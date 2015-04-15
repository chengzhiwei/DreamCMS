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

    /**
     * 根据ID 查询 
     * @param int $id
     */
    public function findById($id)
    {
        return $this->where(array('id' => $id))->find();
    }

    /**
     * 修改
     * @param int $id
     * @param array $data
     */
    public function update($id, $data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            $b = $this->where(array('id' => $id))->save();
            if ($b !== false)
            {
                return true;
            }
        }
        return false;
    }

    public function delById($id)
    {
        return $this->where(array('id' => $id))->delete();
    }

    public function findByTitle($title)
    {
        return $this->where(array('title' => $title))->find();
    }
    
    
}
