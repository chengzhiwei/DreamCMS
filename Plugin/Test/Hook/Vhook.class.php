<?php

namespace Test\Hook;

import('Common/Controller/SitevhookController', 'Plugin');

class Vhook extends \Common\Controller\SitevhookController
{

    public function show()
    {
        $this->vhookshow('test');
    }

}