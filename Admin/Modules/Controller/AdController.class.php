<?php

namespace Modules\Controller;

class AdController extends \Auth\Controller\AuthbaseController
{

    public function typelist()
    {
        $Type = DD('AdType');
        $result = $Type->typelist(cookie('langid'));
        $this->assign('result', $result);
        $this->display();
    }

    public function addtype()
    {
        if (IS_POST)
        {
            $Type = DD('AdType');
            $data = I('post.');
            $data['langid'] = cookie('langid');

            $res = $Type->selbytitle($data['title']);
            if (!empty($res))
            {
                $this->error('分类名称重复');
            } else
            {
                $result = $Type->addtype($data);
                if (!empty($result))
                {
                    $this->redirect('typelist');
                } else
                {
                    $this->error('添加失败');
                }
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
            $res = $Type->selbytitle(I('post.title'));
            if (!empty($res))
            {
                $this->error('分类名称重复');
            } else
            {
                $arr = array();
                $arr['title'] = I('post.title');
                $result = $Type->updatetype(I('post.id'), $arr);
                if (!empty($result))
                {
                    $this->redirect('typelist');
                } else
                {
                    $this->error('修改失败');
                }
            }
        } else
        {
            $result = $Type->selbyid(I('get.id'));
            $this->assign('result', $result);
            $this->display();
        }
    }

    public function deltype()
    {
        $AdList = DD('AdList');
        $res = $AdList->selbytid(I('get.id'));
        if ($res != '0')
        {
            $this->error('该分类下存在广告，请先删除广告');
        } else
        {
            $Type = DD('AdType');
            $result = $Type->deltype(I('get.id'));
            $this->redirect('typelist');
        }
    }

    public function adlist()
    {
        $AdList = DD('AdList');
        $result = $AdList->adlist(cookie('langid'));
        $Type = DD('AdType');
        foreach ($result as $key => $r)
        {
            $res = $Type->selbyid($r['tid']);
            $result[$key]['fenlei'] = $res['title'];
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
            $arr['langid'] = cookie('langid');
            $result = $AdList->addad($arr);
            $this->redirect('adlist');
        } else
        {
            $Type = DD('AdType');
            $result = $Type->typelist(cookie('langid'));
            $this->assign('result', $result);
            $this->display();
        }
    }

    public function editad()
    {
        $AdList = DD('AdList');
        $result = $AdList->selbyid(I('get.id'));
        if (IS_POST)
        {
            $arr = I('post.');
            if ($_FILES['img']['error'] == 0)
            {
                $imgpath = $this->upload();
                $arr['img'] = $imgpath;
                if ($result['img'])
                {
                    @unlink($result['img']);
                }

                $arr['langid'] = cookie('langid');
                $result = $AdList->updatetype(I('get.id'), $arr);
                $this->redirect('adlist');
            }
        } else
        {
            $Type = DD('AdType');
            $res = $Type->typelist(cookie('langid'));
            $this->assign('res', $res);
            $this->assign('result', $result);
            $this->display();
        }
    }

    public
            function delad()
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

    private
            function upload()
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
