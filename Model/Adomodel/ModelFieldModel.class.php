<?php

namespace Model\Adomodel;

/**
 * 模型子字段
 * 变更字段同时变更模型
 * 多图片 多文件 和内容放到附表里
 * 字段管理 目前不支持修改
 */
class ModelFieldModel extends \Think\Model\AdvModel
{

    public $text_arr = array('editor', 'moreupload',);
    public $varchar_arr = array('text', 'textarea',);
    public $select_arr = array('radio', 'checkbox',);

    public function addField($data = array())
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
                echo $this->getDbError();
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function addtablefield($data = array())
    {

        if (!$data)
        {
            $data = I('post.');
        }
        $b = true;
        if (in_array($data['type'], $this->text_arr))
        {

            $b = $this->_createTable($data);
        }
        if (!$b)
        {
            return false;
        }
        $sql = $this->_addFieldSql($data);
        return $this->execute($sql);
    }

    private function _addFieldSql($data)
    {
        $sql = 'alter table ' . $this->_getModelname($data) . '  add ' . $data['fieldname'] . $this->_parseFieldType($data);
        if (isset($_POST['isnull']))
        {
            $sql .= ' not null';
        }
        return $sql;
    }

    public function delTableField($table, $fields)
    {
        $sql = 'alter table ' . C('DB_PREFIX') . $table . ' drop column ' . $fields . ';';
        return $this->execute($sql);
    }

    private function _delFieldSql($data)
    {
        return 'alter table ' . $this->_getModelname($data) . ' drop column ' . $data['fieldname'] . ';';
    }

    private function _getModelname($data)
    {
        $model = DD('Model');
        $modelinfo = $model->findByID($data['mid']);
        if (in_array($data['type'], $this->text_arr))
        {
            return C('DB_PREFIX') . $modelinfo['table'] . '_data';
        }
        return C('DB_PREFIX') . $modelinfo['table'];
    }

    /**
     * 单行文本 多行文本 缩略图
     * 编辑器 多文件上传 多图片上传 存放在副表多为TEXT 类型
     * 单选按钮 多选按钮
     */
    private function _parseFieldType($data)
    {
        if (in_array($data['type'], $this->varchar_arr))
        {
            if (!$len)
            {
                $len = 255;
            }
            return ' varchar(' . $len . ') ';
        }

        if (in_array($data['type'], $this->text_arr))
        {
            return ' text ';
        }

        if (in_array($data['type'], $this->select_arr))
        {
            $fieldvalue_arr = explode("\r\n", I('post.fieldvalue'));
            $isnum = true;
            foreach ($fieldvalue_arr as $k => $arr)
            {
                $val_arr = explode(',', $arr);
                if (!is_numeric($val_arr[1]))
                {
                    $isnum = false;
                    break;
                }
            }
            if ($isnum === true)
            {
                return ' tinyint(4) ';
            } else
            {
                return ' varchar(255)';
            }
        }
    }

    /**
     * 建新表
     * @param array $data
     */
    private function _createTable($data)
    {
        $ssql = "SELECT COUNT(*) as c FROM information_schema.tables WHERE table_schema = '" . C('DB_NAME') . "' AND table_name = '" . $this->_getModelname($data) . "'; ";
        $info = $this->query($ssql);
        if ($info[0]['c'] == 0)
        {
            $esql = 'CREATE TABLE `' . $this->_getModelname($data) . '` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `aid` int(11) NOT NULL,PRIMARY KEY (`id`)   ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;  ';
            $b = $this->execute($esql);
            if ($b !== false)
            {
                return true;
            } else
            {
                return false;
            }
        }
        return true;
    }

    public function selFieldByMid($mid)
    {
        $condition = array();
        $condition['mid'] = $mid;
        return $this->where($condition)->select();
    }

    /**
     * 字段排序
     * @param int $id
     * @param int $sort
     */
    public function sort($id, $sort)
    {
        $b = $this->where(array('id' => $id))->save(array('sort' => $sort));
        if ($b !== false)
        {
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * 删除字段
     * @param int $id
     * @return boolean
     */
    public function delfield($id)
    {
        $b = $this->where(array('id' => $id))->delete();
        if ($b !== false)
        {
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * 根据模型编号和字段查询
     * @param int $mid
     * @param string $fieldname
     */
    public function findByMidFiled($mid, $fieldname)
    {
        $condition = array(
            'mid' => $mid,
            'fieldname' => $fieldname,
        );
        return $this->where($condition)->find();
    }

    /**
     * 
     * @param int $id
     * @param array $data
     */
    public function updatefield($id, $data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        $b = $this->where(array('id' => $id))->save($data);
        if ($b !== false)
        {
            return true;
        }
        return true;
    }

    /**
     * 添加默认字段
     */
    public function addDefaultField()
    {
        $fields = array(
            array(),
        );
    }

}
