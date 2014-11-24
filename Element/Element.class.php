<?php

namespace Element;

class Element extends \Think\Controller
{

    public function haha()
    {
        // print_r(get_declared_classes());
        $class = new \ReflectionClass($this);
        print_r($class);
    }

    public function display()
    {

        parent::display();
    }

    public function findPlugins()
    {
        $plugins = array();
        foreach (get_declared_classes()as $class)
        {
            $reflectionClass = new ReflectionClass($class);
            //判断一个类是否实现了IPlugin 接口  
            if ($reflectionClass->implementsInterface('IPlugin'))
            {
                $plugins[] = $reflectionClass;
            }
        }
        return $plugins;
    }

}
