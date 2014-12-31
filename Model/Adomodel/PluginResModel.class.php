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

class PluginResModel extends \Think\Model\AdvModel
{

    public function addlist($dataList)
    {
        return $this->addAll($dataList);
    }

    public function selByTypePid($type, $pid)
    {
        $condition = array(
            'type' => $type,
            'pid' => $pid,
        );
        return $this->where($condition)->select();
    }

}
