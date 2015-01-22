<?php

namespace Model\Adomodel;

/**
 * Description of FriendLinkModel
 *
 * @author Panxin <americapan@vip.qq.com>
 * @date 2014-8-21 15:31:15
 */
class FriendLinkModel extends \Think\Model\AdvModel
{

    public function addcate($data = array())
    {
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

    public function selectAll()
    {
        return $this->order('show_order DESC')->select();
    }

    public function selectbyid($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->find();
    }

    public function deletebyid($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->delete();
    }

    public function update($id, $data)
    {
        $condition = array();
        $condition['id'] = $id;
        $b= $this->where($condition)->save($data);
        if($b!==FALSE)
        {
            return true;
        }
        return false; 
    }

}
