<?php

namespace Ueditor\Hook;

import('Common/Controller/SitevhookController', 'Plugin');

class Vhook extends \Common\Controller\SitevhookController
{

    public function ueditor()
    {
        $this->display('ueditor');
    }

}
