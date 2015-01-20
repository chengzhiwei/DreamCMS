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

/**
 * 内容副表模型
 */
class ContentDataModel extends ContentBaseModel
{

    public function __construct($name = '', $tablePrefix = '', $connection = '')
    {
        parent::__construct($name, $tablePrefix, $connection);
    }

    /**
     * 添加数据
     * @param array $data
     * @param array $modelfield
     * @return boolean
     */
    public function adddata($data = array())
    {
        if (!$this->isexitTable())
        {
            return true;
        }
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
        }
        return false;
    }

    /**
     * 检查是否存在副表
     * @return boolean
     */
    public function isexitTable()
    {
        $ssql = "SELECT COUNT(*) as c FROM information_schema.tables WHERE table_schema = '" . C('DB_NAME') . "' AND table_name = '" . $this->trueTableName . "'; ";
        $info = $this->query($ssql);
        if ($info[0]['c'] == 0)
        {
            return false;
        } else
        {
            return true;
        }
    }

    /**
     * 查询附表信息
     * @param int $aid
     */
    public function findbyAid($aid)
    {
        if ($this->isexitTable())
        {
            $condition = array('aid' => $aid);
            return $this->where($condition)->find();
        }
        return array();
    }

    /**
     * 删除副表内容
     * @param int $aid
     * @return Boolean
     */
    public function delcontent($aid)
    {
        $condition = array('aid' => $aid);
        $b = $this->where($condition)->delete();
        if ($b !== false)
        {
            return true;
        }
    }

    /**
     * 根据一组文章编号查询
     * @param type $ids
     */
    public function selByIds($ids)
    {
        $condition = array('in', $ids);
        return $this->where($condition)->select();
    }

}
