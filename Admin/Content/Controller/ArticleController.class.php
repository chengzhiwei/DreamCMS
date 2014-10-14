<?php

/**
 * 普通文章模型 内容管理
 */

namespace Content\Controller;

class ArticleController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {
        $article = DD('Article');
        $result = $article->selectbycid(I('get.cid'), I('get.p', 1));
        $count = $article->counts(I('get.cid')); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 20); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        $this->assign('page', $show); // 赋值分页输出
        $this->assign('category_name', I('get.category_name'));
        $this->assign('result', $result);
        $this->display();
    }

    public function edit()
    {
        if (IS_POST)
        {
            $data = array();
            $data = I('post.');
            $mid = $data['mid'];
            unset($data['mid']);
            if ($_FILES['picname']['error'] == 0)
            {
                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 3292200;
                $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
                $upload->savePath = './Uploads/';
                $info=$upload->upload();
                if (!$info)
                {
                    //捕获上传异常
                    $this->error($upload->getError());
                } else
                {
                    //取得成功上传的文件信息
                    $data['picname'] = $info['savename'];
                }
            }
            $article = DD('Article');
            $result = $article->update(I('post.id'), $data);
            if ($result)
            {
                $flags = I('post.flags');
                \Common\Cls\ContentCls::setpositiondata($flags, I('post.id'), $mid, $data['cid']);
                $this->success('编辑成功');
            } else
            {
                $this->error('发生错误请重试');
            }
        } else
        {
            $this->canshu();
            $article = DD('Article');
            $result = $article->selectbyid(I('get.id'));
            $this->assign('result', $result);
            $Category = DD('Category');
            $category = $Category->selectF($result['cid']);
            $this->assign('category_id', $category['id']);
            $this->assign('category_name', $category['title']);
            //获取选中的推荐位
            $PositionData = DD('PositionData');
            $PositionDataInfo = $PositionData->selbyaid(I('get.id'));
            $posids = array();
            foreach ($PositionDataInfo as $p)
            {
                $posids[] = $p['posid'];
            }
            $this->assign('posids', $posids);
            $this->display();
        }
    }

    /**
     * 文章模型添加
     */
    public function add()
    {
        if (IS_POST)
        {
            $data = array();
            $data = I('post.');
            $mid = $data['mid'];
            unset($data['mid']);
            if ($_FILES['picname']['error'] == 0)
            {
                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 3292200;
                $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
                $upload->savePath = './Uploads/';
                if (!$upload->upload())
                {
                    //捕获上传异常
                    $this->error($upload->getError());
                } else
                {
                    //取得成功上传的文件信息
                    $uploadList = $upload->getUploadFileInfo();
                    $data['picname'] = $uploadList[0]['savename'];
                }
            }
            $article = DD('Article');
            $result = $article->addArticle($data);
            if ($result)
            {
                $id = $article->getLastInsID();
                $flags = I('post.flags');
                \Common\Cls\ContentCls::setpositiondata($flags, $id, $mid, $data['cid']);
                $this->success('添加成功');
            } else
            {
                $this->error('发生错误请重试');
            }
        } else
        {
            $this->assign('category_id', I('get.cid'));
            $this->assign('category_name', I('get.category'));
            //获取推荐位
            $position = DD('Position');
            $positionlist = $position->positionlist();
            $this->assign('position', $positionlist);
            $this->display();
        }
    }

    public function del()
    {
        $id = I('get.id');
        $article = DD('Article');
        if ($article->del($id))
        {
            $PostionDatamod = DD('PositionData');
            $PostionDatamod->deldatabyaid($id);
            $this->success('删除成功');
        } else
        {
            $this->success('发生错误请重试');
        }
    }

    public function canshu()
    {
        //获取推荐位
        $positionlist = \Common\Cls\ContentCls::getposition();
        $this->assign('position', $positionlist);
        //获取栏目
        $Category_arr = \Common\Cls\ContentCls::getcate();
        $this->assign('category', $Category_arr);
    }

}
