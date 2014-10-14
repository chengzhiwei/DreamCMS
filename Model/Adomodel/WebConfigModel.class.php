<?php

namespace Model\Adomodel;

class WebConfigModel extends \Think\Model\AdvModel
{

    public function selectconfig($id)
    {
        $condition = array();
        $condition['parent_id'] = $id;
        return $this->where($condition)->select();
    }

    public function update($condition, $data)
    {
        return $this->where($condition)->save($data);
    }

    public function configformat($id)
    {
        $config = $this->selectconfig($id);
        $newconfig = array();
        foreach ($config as $c)
        {
            $newconfig[$c['code']] = $c;
        }
        return $newconfig;
    }

}
