<?php

namespace Model\Adomodel;

class LanguageModel extends \Think\Model\AdvModel
{

    protected $_validate = array(
        array('title', 'require', '语言名不能为空'),
        array('lang', 'require', '语言英文名不能为空'),
    );

    public function addlang($data = array())
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

    public function lanlist()
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
        $result = $this->where($condition)->save($data);
        return $result;
    }

    public function del($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->delete();
    }

    public function selectall()
    {
        return $this->select();
    }

    public function findbydefault()
    {
        $condition = array();
        $condition['default'] = 1;
        return $this->where($condition)->find();
    }

    public function findbylang($lang)
    {
        $condition = array();
        $condition['lang'] = $lang;
        return $this->where($condition)->find();
    }

}
