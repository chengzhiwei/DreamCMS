<?php

/**
 * 内容公共类
 */

namespace Common\Cls;

class ContentCls
{

    public static function setpositiondata($position, $aid, $mid, $cid)
    {

        //先删除在添加
        $PostionDatamod = DD('PositionData');
        $PostionDatamod->deldatabyaid($aid);
        $datalist = array();
        foreach ($position as $k => $v)
        {
            $datalist[$k] = array(
                'aid' => $aid,
                'posid' => $v,
                'mid' => $mid,
                'cid' => $cid,
                'lid' => cookie('langid'),
            );
        }
        if ($position)
        {
            return $PostionDatamod->addallposition($datalist);
        }
        return true;
    }

    public static function getposition()
    {
        $position = DD('Position');
        $positionlist = $position->positionlist();
        return $positionlist;
    }

    public static function getcate()
    {
        $Category = DD('Category');
        $result = $Category->selectall($_COOKIE['langid']);
        Vendor('Unlimitedclass.Unlimitedclass', '', '.class.php');
        $unlimitedclass = new \Unlimitedclass();
        $Category_arr = $unlimitedclass->cateresult($result);
    }

}
