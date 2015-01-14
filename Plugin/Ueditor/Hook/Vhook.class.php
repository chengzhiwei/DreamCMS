<?php

namespace Ueditor\Hook;

import('Common/Controller/SitevhookController', 'Plugin');

class Vhook extends \Common\Controller\SitevhookController
{

    public function ueditor($arr = array())
    {
      
        $this->assign('data', $arr);
        $this->display('ueditor');
    }

}
