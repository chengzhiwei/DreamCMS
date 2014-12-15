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

}
