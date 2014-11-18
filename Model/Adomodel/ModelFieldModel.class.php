<?php

namespace Model\Adomodel;

/**
 * 模型子字段
 * 变更字段同时变更模型
 * 多图片 多文件 和内容放到附表里
 */
class ModelFieldModel
{

    public $modelName = '';

    public function __construct($modname = '')
    {
        $this->modelName = $modname;
    }

    public function addField()
    {
        
    }

    public function updateField()
    {
        $sql=  $this->_updateFieldSql();
    }

    public function delField()
    {

        $sql = $this->_delFieldSql($fieldname);
    }

    private function _addFieldSql($fieldname, $type, $len = 0, $isnull = true)
    {
        $sql = 'alter ' . $this->_getModelname() . ' infos add ' . $fieldname . ' ' . $type . '(' . $len . ') ';
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

}
