<?php

namespace Content\Bo;

class ArticleBo
{

    public function articlelist($cid, $pagesize = 20)
    {
        if (!$cid)
        {
            $cid = I('get.cid');
        }
        $articlemod = DD('Article');
        $p = I('get.p', 1, 'intval');
        $list = $articlemod->selectbycid($cid, $p);
        $count = $articlemod->counts($cid);
        $pages = \Common\Cls\ContentCls::getpage($count, $pagesize, array('cid' => I('get.cid')));
        return array(
            'list' => $list,
            'count' => $count,
            'pages' => $pages,
        );
    }

    public function articleinfo($id = '')
    {
        if (!$id)
        {
            $id = I('get.id');
        }
        $info = S('info_' . $id);
        if (!$info)
        {
            $articlemod = DD('Article');
            $info = $articlemod->selectbyid($id);
            S('info_' . $id, $info);
        }
        return $info;
    }

}
