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

class LinkController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {
        $FriendLink = DD('FriendLink');
        $result = $FriendLink->selectAll();
        $this->assign('result', $result);
        $this->display();
    }

    public function add()
    {

        if (IS_POST)
        {
            $data = I('post.');
            $data['lid'] = cookie('langid');
            if ($_FILES['image']['error'] == 0)
            {
                $upload = new \Think\Upload();
                $upload->maxSize = 3292200;
                $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
                $upload->savePath = 'link/';
                $info = $upload->upload();
                if (!$info)
                {
                    $this->error($upload->getError());
                } else
                {
                    $up_root = str_replace('./', '', $upload->rootPath);
                    $data['image_url'] = $up_root . $info['image']['savepath'] . $info['image']['savename'];
                }
            }
            $FriendLink = DD('FriendLink');
            $result = $FriendLink->addcate($data);
            if ($result)
            {
                $this->success('添加成功');
            } else
            {
                $this->error('发生错误，请重试');
            }
        } else
        {
            $this->display();
        }
    }

    public function delete()
    {
        $id = I('get.id');
        $FriendLink = DD('FriendLink');
        $info = $FriendLink->selectbyid($id);
        $result = $FriendLink->deletebyid($id);
        @unlink($info['image_url']);
        $this->redirect('index');
    }

    public function update()
    {
        $id = I('get.id');
        $FriendLink = DD('FriendLink');
        $result = $FriendLink->selectbyid($id);
        if (IS_POST)
        {
            $data = I('post.');
            if ($_FILES['image']['error'] == 0)
            {
                $upload = new \Think\Upload();
                $upload->maxSize = 3292200;
                $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
                $upload->savePath = 'link/';
                $info = $upload->upload();
                if (!$info)
                {
                    $this->error($upload->getError());
                } else
                {
                    $up_root = str_replace('./', '', $upload->rootPath);
                    $data['image_url'] = $up_root . $info['image']['savepath'] . $info['image']['savename'];
                }
                @unlink($result['image_url']);
                $FriendLink = DD('FriendLink');
                $result = $FriendLink->update($id, $data);
                if ($result)
                {
                    $this->success('修改成功');
                } else
                {

                    $this->error('发生错误，请重试');
                }
            }
        } else
        {

            $this->assign('result', $result);
            $this->display();
        }
    }

}
