<?php

namespace Common\Controller;

class SitevhookController extends \Think\Controller
{

    public $vhook_tpl;

    public function __construct()
    {
        parent::__construct();
        C('LAYOUT_ON', false);
        $this->vhook_tpl = $this->vhooktplpath();
    }

    public function vhooktplpath()
    {
        $class = new \ReflectionClass($this);
        $arr = explode('\\', $class->name);
        $path = '';
        for ($i = 0; $i < count($arr) - 1; $i++)
        {
            $path.=$arr[$i] . '/';
        }
        return 'Template/Plugin/' . $path;
    }

    public function display($tpl = '')
    {
        $P = $this->vhook_tpl . $tpl . '.php';
        if (file_exists($P))
        {
            parent::display($P);
        }
    }

}
