<?php

namespace Model\Adomodel;

class ModelModel extends \Think\Model\AdvModel
{

    public function selectall()
    {
        return $this->select();
    }

    public function addmodel($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            if ($this->add($data))
            {
                $this->createTbl($data['table']);
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

    public function findByID($id)
    {
        return $this->where(array('id' => $id))->find();
    }

    /**
     * 创建表 主表和副表 副表存放大数据 如内容 多图片 多文件等
     * 主表字段 有主键 标题 添加时间 推荐位 缩略图
     * 副表字段有主键 Aid 内容（编辑器内容）
     * @param string  $tablename 表名
     */
    public function createTbl($tablename)
    {
        $sql = "CREATE TABLE `" . C('DB_PREFIX') . $tablename . "` "
                . "(`id` int(11) NOT NULL AUTO_INCREMENT,`title` varchar(255) NOT NULL,`thumb` varchar(255),`position` varchar(100), PRIMARY KEY (`id`)) "
                . "ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
        $datasql = "CREATE TABLE `" . C('DB_PREFIX') . $tablename . "_data` "
                . "(`id` int(11) NOT NULL AUTO_INCREMENT,`aid` int(11) NOT NULL ,`content` text NOT NULL, PRIMARY KEY (`id`)) "
                . "ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

        $this->execute($sql);
        $this->execute($datasql);
        return true;
    }

}
