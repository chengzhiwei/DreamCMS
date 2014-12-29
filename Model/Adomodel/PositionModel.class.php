<?php

namespace Model\Adomodel;

class PositionModel extends \Think\Model\AdvModel
{

    protected $_validate = array(
        array('title', 'require', '推荐位名称不能为空'),
    );

    public function addposition($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }

        if ($this->create($data))
        {
            if ($this->add())
            {
                return true;
            } else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function positionlist()
    {
        return $this->select();
    }

    public function selectone($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->find();
    }

    public function edit($id, $data)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->save($data);
    }

    public function del($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->delete();
    }

    /**
     * 根据语言查询推荐位
     * 每个语言模板可能不同 所以推荐位不同
     * @param int $lid
     * @return array
     */
    public function selbylid($lid)
    {
        return $this->where(array('lid' => $lid))->select();
    }

}
