<?php

namespace Content\Bo;

class PhotoBo
{

    public function Photolist($cid = '', $pagesize = 20)
    {
        if (!$cid)
        {
            $cid = I('get.cid');
        }
        $Photomod = DD('Photo');
        $p = I('get.p', 1, 'intval');
        $list = $Photomod->photolist($cid, $p);
        $PhotoData = DD('PhotoData');
        foreach ($list as $k => $v)
        {
            //查询图片列表
            $list[$k]['photodata'] = $PhotoData->selectbypid($v['id']);
        }
        $count = $Photomod->photocount($cid);
        $pages = \Common\Cls\ContentCls::getpage($count, $pagesize, array('cid' => I('get.cid')));
        return array(
            'list' => $list,
            'count' => $count,
            'pages' => $pages,
        );
    }

    public function Photoinfo($id = '')
    {
        if (!$id)
        {
            $id = I('get.id');
        }
        $info = S('info_' . $id);
        if (!$info)
        {
            $Photomod = DD('Photo');
            $PhotoData = DD('PhotoData');
            $info = $Photomod->findbyid($id);
            $info['photodata'] = $PhotoData->selectbypid($id);
            S('info_' . $id, $info);
        }
        return $info;
    }

}
