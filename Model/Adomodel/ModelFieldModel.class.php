<?php

namespace Model\Adomodel;

/**
 * 模型子字段
 * 变更字段同时变更模型
 * 多图片 多文件 和内容放到附表里
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
        $fieldMethod = '_' . $data['type'] . 'field';
        if (!method_exists($this, $fieldMethod))
        {
            return false;
        }
        $fielddata = $this->$fieldMethod();
        if ($this->create($fielddata))
        {
            if ($this->add())
            {
                $this->execute($this->_addFieldSql($fieldname, $type));
            } else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function updateField()
    {
        $sql = $this->_updateFieldSql();
    }

    public function delField()
    {

        $sql = $this->_delFieldSql($fieldname);
    }

    private function _addFieldSql($fieldname, $type, $len = 0, $isnull = true)
    {
        $sql = 'alter ' . $this->_getModelname() . ' infos add ' . $fieldname . $this->_parseFieldType();
        if ($isnull === false)
        {
            $sql.=' not null';
        }
        $sql.=' ;';
        return $sql;
    }

    private function _updateFieldSql()
    {
        
    }

    private function _delFieldSql($fieldname)
    {
        return 'alter table ' . $this->_getModelname() . ' drop column ' . $fieldname . ';';
    }

    private function _getModelname()
    {
        return C('DB_PREFIX') . $this->modelName;
    }

    private function _parseFieldType()
    {
        $type = I('post.type');
        $len = I('post.len');
        switch ($type)
        {
            case 'text';
                return ' varchar(' . $len . ') ';
                break;
            case 'textarea';
                return ' varchar(' . $len . ') ';
                break;
            case 'editor';
                 return ' text ';
                break;
        }
    }

    private function _textfield()
    {
        return $this->_fielddata();
    }

    private function _textareafield()
    {
        return $this->_fielddata();
    }

    private function _editorfield()
    {
        return $this->_fielddata();
    }

    private function _thumbfield()
    {
        return $this->_fielddata();
    }

    private function _fielddata()
    {
        $post = I('post.');
        return $data = array(
            'title' => $post['title'],
            'langconf' => $post['langconf'],
            'type' => $post['type'],
            'reg' => $post['reg'],
        );
    }

}
