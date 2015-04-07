<?php

/**
 * 采集模型
 */

namespace Collection\Model;

class PlgCollectionModel extends \Think\Model\AdvModel
{

    public function addData($data = array())
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
            }
        } else
        {
            return false;
        }
    }
 
    
    

}
