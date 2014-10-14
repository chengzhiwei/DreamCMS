<?php

/**
 * 单页面模型内容管理
 */

namespace Content\Controller;

class PageController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {
        $cid = I('get.cid');
        $pagemod = DD('Page');
        $info = $pagemod->findbycid($cid);
        if (IS_POST)
        {
            $data = I('post.');
            $data['content'] = htmlspecialchars_decode($data['content']);
            $data['cid'] = $cid;
            if (!$info)
            {
                $b = $pagemod->addpage($data);
            } else
            {
                $b = $pagemod->editpage($cid, $data);
            }
            if ($b)
            {
                $this->success('保存成功');
            } else
            {
                $this->error('发生错误');
            }
        } else
        {
            $this->assign('cid', $cid);
            $this->assign('info', $info);
            $this->display();
        }
    }

}
