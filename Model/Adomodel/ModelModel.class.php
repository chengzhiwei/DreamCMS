<?php

namespace Model\Adomodel;

class ModelModel extends \Think\Model\AdvModel
{

    public function selectall()
    {
        return $this->select();
    }

}
