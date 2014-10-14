<?php

namespace Content\Controller;

class IndexController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {
        $this->assign('name', 'haha');
        $this->display();
    }

}
