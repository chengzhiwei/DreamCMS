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

}
