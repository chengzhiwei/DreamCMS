<?php

namespace Element;

class Element extends \Think\Controller
{

    public $tmpl = '';

    public function __construct()
    {
        $class = new \ReflectionClass($this);
        $path = str_replace('\\', '/', $class->name);
        $this->tmpl = __ROOT__ . '/' . $path . '.php';
        $path_arr = explode('/', $path);
        unset($path_arr[count($path_arr) - 1]);
        $true_path = implode('/', $path_arr);
        $this->assign('ELT_CSS', __ROOT__ . '/' . $true_path . '/View/css');
        $this->assign('ELT_JS', __ROOT__ . '/' . $true_path . '/View/js');
        $this->assign('ELT_IMG', __ROOT__ . '/' . $true_path . '/View/images');
        parent::__construct();
    }

    public function display($path='')
    {
        $tpl='';
        $path==''?$tpl=  $this->tmpl:$tpl=$path;
        parent::display($tpl);
    }

}
