<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhotoData
 *
 * @author Panxin <americapan@vip.qq.com>
 * @date 2014-9-10 9:38:36
 */

namespace Model\Adomodel;

class PhotoDataModel extends \Think\Model\AdvModel
{

    public function addPhotodata($data = array())
    {
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

    public function selectbypid($pid)
    {
        $condition = array();
        $condition['pid'] = $pid;
        return $this->where($condition)->select();
    }

    public function del($id)
    {
        $condition = array();
        $condition['pid'] = $id;
        return $this->where($condition)->delete();
    }

}
