<?php

namespace Model\Adomodel;

class PageModel extends \Think\Model\AdvModel
{

    protected $_validate = array(
        array('title', 'require', '标题不能为空'),
        array('content', 'require', '内容不能为空'),
    );
    protected $_auto = array(
        array('addtime', 'time', 1, 'function'),
    );

   

    public function findbycid($cid)
    {
        $condition = array();
        $condition['cid'] = $cid;
        return $this->where($condition)->find();
    }

    public function addpage($data = array())
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

    public function editpage($cid, $data = array())
    {
        $condition = array();
        $condition['cid'] = $cid;
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            if ($this->where($condition)->save())
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

}
