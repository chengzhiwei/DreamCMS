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

    public $modelName = '';

    public function __construct($modname = '')
    {
        $this->modelName = $modname;
    }

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
                $this->execute($this->_addFieldSql());
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

    public function delField($id)
    {
        $condition = array();
        $fieldinfo = $this->where($condition)->find();

        $sql = $this->_delFieldSql($fieldinfo['fieldname']);
    }

    private function _addFieldSql()
    {
        $data = I('post.');
        $sql = 'alter ' . $this->_getModelname() . '  add ' . $data['fieldname'] . $this->_parseFieldType($data['type'], $data['len']);
        if (isset($_POST['isnull']))
        {
            $sql .= ' not null';
        }
        return $sql;
    }

    private function _delFieldSql($fieldname)
    {
        return 'alter table ' . $this->_getModelname() . ' drop column ' . $fieldname . ';';
    }

    private function _getModelname($data)
    {
        $text_arr = array('editor', 'moreupload',);
        if (in_array($data['type'], $text_arr))
        {
            return C('DB_PREFIX') . $this->modelName.'_data';
        }
        return C('DB_PREFIX') . $this->modelName;
    }

    /**
     * 单行文本 多行文本 缩略图
     * 编辑器 多文件上传 多图片上传 存放在副表多为TEXT 类型
     * 单选按钮 多选按钮
     */
    private function _parseFieldType($type, $len)
    {
        $varchar_arr = array('text', 'textarea',);
        $text_arr = array('editor', 'moreupload',);
        $select_arr = array('radio', 'checkbox',);
        if (in_array($type, $varchar_arr))
        {
            return ' varchar(' . $len . ') ';
        }

        if (in_array($type, $text_arr))
        {
            return ' text ';
        }

        if (in_array($type, $select_arr))
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


}
