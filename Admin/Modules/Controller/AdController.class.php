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

namespace Modules\Controller;

class AdController extends \Auth\Controller\AuthbaseController
{

    public function typelist()
    {
        $Type = DD('AdType');
        $result = $Type->typelist();
        $this->assign('result', $result);
        $this->display();
    }

    public function addtype()
    {
        if (IS_POST)
        {
            $Type = DD('AdType');
            $data = I('post.');
            $result = $Type->addtype($data);
            if (!empty($result))
            {
                $this->redirect('typelist');
            } else
            {
                $this->error(L('OP_ERROR'));
            }
        } else
        {
            $this->display();
        }
    }

    public function edittype()
    {
        $Type = DD('AdType');
        if (IS_POST)
        {

            $b = $Type->updatetype(I('post.id'), I('post.'));
            if ($b)
            {
                $this->redirect('typelist');
            } else
            {
                $this->error(L('OP_ERROR'));
            }
        } else
        {
            $info = $Type->selbyid(I('get.id'));
            $this->assign('info', $info);
            $this->display();
        }
    }

    public function deltype()
    {
        $AdList = DD('AdList');
        $res = $AdList->selbytid(I('get.id'));
        if (count($res) != 0)
        {
            $this->error('该分类下存在广告，请先删除广告');
        } else
        {
            $Type = DD('AdType');
            $b = $Type->deltype(I('get.id'));
            $this->redirect('typelist');
        }
    }

    public function adlist()
    {
        $AdList = DD('AdList');
        $result = $AdList->adlist();
        $Type = DD('AdType');
        foreach ($result as $key => $r)
        {
            $res = $Type->selbyid($r['tid']);
            $result[$key]['type'] = $res['title'];
        }
        $this->assign('result', $result);
        $this->display();
    }

    public function addad()
    {
        if (IS_POST)
        {
            $AdList = DD('AdList');
            $imgpath = $this->upload();
            if (!empty($imgpath))
            {
                $arr['img'] = $imgpath;
            }
            $b = $AdList->addad($arr);
            if ($b)
            {
                $this->redirect('Modules/Ad/adlist');
            } else
            {
                $this->error(L('OP_ERROR'));
            }
        } else
        {
            $Type = DD('AdType');
            $types = $Type->typelist(cookie('langid'));
            $this->assign('types', $types);
            $this->display();
        }
    }

    public function editad()
    {
        $AdList = DD('AdList');
        $adinfo = $AdList->selbyid(I('get.id'));
        if (IS_POST)
        {
            $arr = I('post.');
            if ($_FILES['img']['error'] == 0)
            {
                $imgpath = $this->upload();
                $arr['img'] = $imgpath;
                if ($adinfo['img'])
                {
                    @unlink($adinfo['img']);
                }
            }
            $b = $AdList->updatetype($arr['id'], $arr);
            if ($b)
            {
                $this->redirect('adlist');
            } else
            {
                echo $AdList->getDbError() . $AdList->getError();
            }
        } else
        {
            $Type = DD('AdType');
            $adtype = $Type->typelist();
            $this->assign('adtype', $adtype);
            $this->assign('adinfo', $adinfo);
            $this->display();
        }
    }

    public function delad()
    {
        $AdList = DD('AdList');
        $res = $AdList->selbyid(I('get.id'));
        $result = $AdList->delad(I('get.id'));

        if ($result)
        {
            if ($res['img'])
            {
                @unlink($res['img']);
            }

            $this->redirect('adlist');
        } else
        {
            $this->error('删除错误');
        }
    }

    private function upload()
    {
        if ($_FILES['img']['error'] == 0)
        {
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 3292200;
            $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
            //设置附件上传目录
            $upload->savePath = 'adpic/';
            $info = $upload->upload();

            if (!$info)
            {
                //捕获上传异常
                $this->error($upload->getError());
            } else
            {
                $up_root = str_replace('./', '', $upload->rootPath);
                return $up_root . $info['img']['savepath'] . $info['img']['savename'];
            }
            return '';
        }
    }

}
