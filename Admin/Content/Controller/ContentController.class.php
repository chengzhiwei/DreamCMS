<?php

/*
 * +----------------------------------------------------------------------
 * | DreamCMS [ WE CAN  ]
 * +----------------------------------------------------------------------
 * | Copyright (c) 2006-2014 DreamCMS All rights reserved.
 * +----------------------------------------------------------------------
 * | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * +----------------------------------------------------------------------
 * | Author: 孔雀翎 <284909375@qq.com>
 * +----------------------------------------------------------------------
 */

namespace Content\Controller;

class ContentController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {

        $Category = DD('Category');
        $catelist = $Category->selectall($this->OpSiteLangInfo['id']);
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
        C('IS_LAYOUT', false);

        //栏目
        $cid = I('get.cid');
        $catemod = DD('Category');
        $cateinfo = $catemod->find($cid);

        //模型
        $mid = I('get.mid');
        $modelMod = DD('Model');
        $modelinfo = $modelMod->findByID($cateinfo['mid']);

        $contentmod = DD('Content', array($modelinfo['table']));
        $page = I('get.p', 1, 'intval');
        $list = $contentmod->SimpleList($cid);

        $this->assign('list', $list);
        $this->display();
    }

    public function add()
    {
        C('IS_LAYOUT', false);
        if (IS_POST)
        {

            $data = I('post.');
            $cid = I('post.cid');
            //栏目
            $catemod = DD('Category');
            $cateinfo = $catemod->find($cid);
            //模型
            $modelMod = DD('Model');
            $modelinfo = $modelMod->findByID($cateinfo['mid']);
            //模型字段
            $ModelFieldMod = DD('ModelField');
            $Fieldlist = $ModelFieldMod->selFieldByMid($cateinfo['mid']);

            $contentmod = DD('Content', array($modelinfo['table']));
            //检查过滤数据
            $data = $contentmod->ChkAndFilter($data, $Fieldlist);
            if ($data === false)
            {
                return false;
            }
            //主表
            $contentmod->startTrans();
            $addcontent = $contentmod->add($data);
            $aid = $contentmod->getLastInsID();
            //副表
            $contentDatamod = DD('ContentData', array($modelinfo['table'] . '_data'));
            $data['aid'] = $aid;
            $addcontentdata = $contentDatamod->adddata($data);

            //推荐位
            $posdataMod = DD('PositionData');
            $addpostion = $posdataMod->addallposition(I('post.position'), $aid, $cateinfo['mid'], $cid);
            //事务回滚
            if ($addcontent && $addcontentdata && $addpostion)
            {
                $contentmod->commit();
                $this->redirect('Content/Content/contentlist', array('mid' => $cateinfo['mid'], 'cid' => $cid));
            } else
            {
                $contentmod->rollback();
                echo 'err';
            }
        } else
        {

            $cid = I('get.cid');
            $catemod = DD('Category');
            $cateinfo = $catemod->find($cid);
            $ModelFieldMod = DD('ModelField');
            \Org\Helper\IncludeLang::QuickInc('Content/modelfield');
            $Fieldlist = $ModelFieldMod->selFieldByMid($cateinfo['mid']);
            $this->assign('Fieldlist', $Fieldlist);
            $this->display();
        }
    }

    public function edit()
    {
        C('IS_LAYOUT', false);
        if (IS_POST)
        {
            
        } else
        {
            $cid = I('get.cid');
            $id = I('get.id');
            $catemod = DD('Category');
            $cateinfo = $catemod->find($cid);

            //表单
            $ModelFieldMod = DD('ModelField');
            \Org\Helper\IncludeLang::QuickInc('Content/modelfield');
            $Fieldlist = $ModelFieldMod->selFieldByMid($cateinfo['mid']);
            $this->assign('Fieldlist', $Fieldlist);

            //模型
            $modelMod = DD('Model');
            $modelinfo = $modelMod->findByID($cateinfo['mid']);

            //查询主表信息
            $contentmod = DD('Content', array($modelinfo['table']));
            $contentarray = $contentmod->findbyId($id);
            //查询副表信息
            $contentdatamod = DD('ContentData', array($modelinfo['table'] . '_data'));
            $contentdataarray = $contentdatamod->findbyAid($id);
            $info = count($contentdataarray) == 0 ? $contentarray : array_merge($contentarray, $contentdataarray);
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 编辑单页面
     */
    public function editpage()
    {
        $page = DD('Page');
        $pageinfo = $page->findbycid(I('cid'));
        if (IS_POST)
        {
            if (!$pageinfo)
            {
                //新增
                $b = $page->addpage();
            } else
            {
                //修改
                $b = $page->editpage(I('cid'));
            }
            if ($b)
            {
                $this->success(L('OP_SUCCESS'));
            } else
            {
                $this->success(L('OP_ERROR'));
            }
        } else
        {
            C('IS_LAYOUT', false);
            $this->assign('pageinfo', $pageinfo);
            $this->display();
        }
    }

    /**
     * 删除内容
     */
    public function delete()
    {
        $cid = I('get.cid');
        $id = I('get.id');
        //栏目
        $catemod = DD('Category');
        $cateinfo = $catemod->find($cid);

        //模型
        $modelMod = DD('Model');
        $modelinfo = $modelMod->findByID($cateinfo['mid']);

        //删除主表
        $contentmod = DD('Content', array($modelinfo['table']));
        $contentmod->startTrans();
        $contentDel = $contentmod->delcontent($id);

        //删除附表
        $contentdatamod = DD('ContentData', array($modelinfo['table'] . '_data'));
        $contentdataDel = $contentdatamod->delcontent($id);
        if ($contentDel && $contentdataDel)
        {
            $contentmod->commit();
            $this->redirect('Content/Content/contentlist', array('mid' => $cateinfo['mid'], 'cid' => $cid));
        } else
        {
            $contentmod->rollback();
            $this->success(L('OP_ERROR'));
        }
    }

}
