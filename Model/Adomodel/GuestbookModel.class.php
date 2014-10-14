<?php

namespace Model\Adomodel;

class GuestbookModel extends \Think\Model\AdvModel
{

    protected $_validate = array(
        array('username', 'require', '用户名必须填写！'),
        array('telephone', 'require', '电话必须填写！'),
        array('content', 'require', '内容必须填写！'),
    );

    public function guestlist()
    {
        return $this->select();
    }

    public function del($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->delete();
    }

    public function addguest($data = array())
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

}
