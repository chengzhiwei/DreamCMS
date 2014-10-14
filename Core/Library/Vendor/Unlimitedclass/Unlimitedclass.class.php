<?php

class Unlimitedclass
{

    public function __construct()
    {
        
    }

    public function cateresult(&$list, $pid = 0, $level = 0, $html = '--')
    {
        static $tree = array();
        foreach ($list as $v)
        {
            if ($v['pid'] == $pid)
            {
                $v['html'] = str_repeat($html, $level);
                $v['deep'] = $level;
                $tree[] = $v;
                $this->cateresult($list, $v['id'], $level + 1);
            }
        }
        return $tree;
    }

    public function catearray(&$list, $pid = 0)
    {
        $tree = array();
        foreach ($list as $v)
        {
            if ($v['pid'] == $pid)
            {
                $v['child'] = $this->catearray($list, $v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }


}
