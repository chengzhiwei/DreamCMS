<?php

/*
 * +----------------------------------------------------------------------
 * | DreamCMS [ WE CAN  ]
 * +----------------------------------------------------------------------
 * | Copyright (c) 2006-2014 DreamCMS All rights reserved.
 * +----------------------------------------------------------------------
 * | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * +----------------------------------------------------------------------
 * | Author: 孔雀翎 <284909375@qq.com>
 * +----------------------------------------------------------------------
 */

namespace Model\Adomodel;

class PluginModel extends \Think\Model\AdvModel
{

    public function add($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            if (parent::add())
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

    public function findbyid($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->find();
    }

    /**
     * 根据主键删除
     * @param int $id
     * @return boolean
     */
    public function delbyid($id)
    {
        return $this->where(array('id' => $id))->delete();
    }
    
    
    /**
     * 根据插件文件名查找
     * @param string $file
     * @return boolean
     */
    public function findByPlginFile($file)
    {
        return $this->where(array('filetitle'=>$file))->find();
    }

}
