<?php

namespace Model\Adomodel;

/**
 * 所有内容模型
 */
class ContentModel extends \Think\Model\AdvModel
{

    public $_tbl = '';

    public function __construct($name = '', $tablePrefix = '', $connection = '')
    {
        parent::__construct($name, $tablePrefix, $connection);
    }

    public function add($data = array())
    {
        if (!$data)
        {
            $data = I('post');
        }
        if($this->create($data))
        {
            if($this->add())
            {
                return true;
            }
            return false;
        }
        else
        {
            return true;
        }
    }

}
