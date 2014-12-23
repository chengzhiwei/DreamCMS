<?php

namespace Content\Controller;

class ContentController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {

        $Category = DD('Category');
        $catelist = $Category->selectall(cookie('langid'));
        Vendor('Unlimitedclass.Unlimitedclass', '', '.class.php');
        $unlimitedclass = new \Unlimitedclass();
        $Category_arr = $unlimitedclass->cateresult($catelist);
        $this->assign('Category_arr', $Category_arr);
        $Model = DD('Model');
        $Modellist = $Model->selectall();
        $newmodlist = array();
        foreach ($Modellist as $l)
        {
            $newmodlist[$l['id']] = $l;
        }
        $this->assign('modlist', $newmodlist);
        $this->display();
    }

    public function contentlist()
    {
        C('IS_LAYOUT',false);
        $this->display();
    }

    public function add()
    {
        if (IS_POST)
        {
            
        } else
        {
            C('IS_LAYOUT',false);
            $cid=I('get.cid');
            $catemod=DD('Category');
            $cateinfo=$catemod->find($cid);
            $ModelFieldMod=DD('ModelField');
            $Fieldlist=$ModelFieldMod->selFieldByMid($cateinfo['mid']);
            $this->assign('Fieldlist', $Fieldlist);
            $this->display();
        }
    }

    public function edit()
    {
        if (IS_POST)
        {
            
        } else
        {
            $this->display();
        }
    }

}
