<?php

namespace Model\Adomodel;

/**
 * Description of ArticleModel
 *
 * @author Panxin <americapan@vip.qq.com>
 * @date 2014-8-26 9:05:58
 */
class ArticleModel extends \Think\Model\AdvModel
{

    protected $_validate = array(
        array('title', 'require', '标题必须填写！'),
        array('content', 'require', '内容必须填写！'),
    );
    protected $_auto = array(
        array('addtime', 'time', 1, 'function'),
        array('content', 'htmlcontent', 3, 'callback'),
        array('author', 'getauth', 1, 'callback')
    );

    public function htmlcontent()
    {
        $content = htmlspecialchars_decode(I('post.content'));
        return $content;
    }

    public function getauth()
    {
        if (!I('post.author'))
        {
            $name = session('admin');
            return $name['name'];
        }
    }

    public function addArticle($data = array())
    {
        if ($this->create($data))
        {
            if ($this->add())
            {
                return true;
            } else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function selectbycid($id, $page, $pagesize = 20)
    {
        $condition = array();
        $condition['cid'] = $id;
        return $this->where($condition)->order('id desc')->page($page . ',' . $pagesize)->select();
    }

    public function counts($id)
    {
        $condition = array();
        $condition['cid'] = $id;
        return $this->where($condition)->count();
    }

    public function selectbyid($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->find();
    }

    public function update($id, $data)
    {

        $condition = array();
        $condition['id'] = $id;
        if ($this->create($data))
        {
            if ($this->where($condition)->save())
            {
                return true;
            } else
            {
                if (empty($this->getDbError))
                {
                    return true;
                }
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function del($id)
    {
        $condition = array();
        $condition['id'] = $id;
        return $this->where($condition)->delete();
    }

}
