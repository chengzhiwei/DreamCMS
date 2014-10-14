<?php

namespace Model\Adomodel;

class AdminGroupModel extends \Think\Model\AdvModel
{

    public function allgroup()
    {
        return $this->select();
    }

}
