<?php

namespace Element;

class Element extends \Think\Controller
{

    public $tmpl = '';

    public function __construct()
    {
        parent::__construct();
        $class = new \ReflectionClass($this);
        $path = str_replace('\\', '/', $class->name);
        $path_arr = explode('/', $path);
        $last = end($path_arr);
        unset($path_arr[count($path_arr) - 1]);
        $true_path = implode('/', $path_arr);
        $this->tmpl = $true_path . '/View/' . strtolower($last) . '.php';
        define('ELT_CSS', __ROOT__ . '/' . $true_path . '/View/css/');
        define('ELT_JS', __ROOT__ . '/' . $true_path . '/View/js/');
        define('ELT_IMG', __ROOT__ . '/' . $true_path . '/View/images/');
        define('ELT_VIEW', __ROOT__ . '/' . $true_path . '/View/');
    }

    public function display($path = '')
    {
        $tpl = '';
        $path == '' ? $tpl = $this->tmpl : $tpl = $path;
        parent::display($tpl);
    }

}
