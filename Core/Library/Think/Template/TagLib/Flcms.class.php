<?php

namespace Think\Template\TagLib;

use Think\Template\TagLib;

class Flcms extends TagLib
{

    protected $tags = array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'Article' => array('attr' => 'cid,limit,order,position,thumb,,return,empty,key', 'close' => 1, 'level' => 3),
        'Ad' => array('attr' => 'cid,limit,order,return,empty,key', 'close' => 1, 'level' => 3),
        'Link' => array('attr' => 'limit,image,return,empty,key', 'close' => 1, 'level' => 3),
        'Get' => array('attr' => 'sql,return', 'close' => 0, 'level' => 3),
    );

    public function _Article($tag, $content)
    {


        $article = M('Article');
        //组装where条件
        $tag['type'] = 'article';
        $condition = $this->_where($tag);
        if (!$tag['position'])
        {
            $order = 'id desc';
            if ($tag['order'])
                $order = $tag['order'];
            $list = $article->cache(true)->where($condition)->order($order)->limit($tag['limit'])->select();
        } else
        {
            $order = C('DB_PREFIX') . 'article.id';
            if ($tag['order'])
                $order = C('DB_PREFIX') . 'article.' . $tag['order'];
            $list = $article
                    ->join(C('DB_PREFIX') . 'position_data on ' . C('DB_PREFIX') . 'position_data.aid=' . C('DB_PREFIX') . 'article.id')
                    ->field(C('DB_PREFIX') . 'article.*')
                    ->cache(true)
                    ->order($order)
                    ->where($condition)
                    ->limit($tag['limit'])
                    ->select();
        }

        foreach ($list as $k => $v)
        {
            $v['href'] = ROU('Content/Content/news', array('id' => $v['id'], 'cid' => $v['cid']));
            $list[$k] = $v;
        }
        //return $list;
        return $this->_parsestr($tag, $content, $list);
    }

    public function _Photo($tag)
    {
        $photo = M('Photo');
        $tag['type'] = 'photo';
        //组装where条件
        $condition = $this->_where($tag);
        if (!$tag['position'])
        {
            $order = 'id desc';
            if ($tag['order'])
                $order = $tag['order'];
            $list = $photo->cache(true)->where($condition)->limit($tag['limit'])->select();
        } else
        {
            $order = C('DB_PREFIX') . 'article.id';
            if ($tag['order'])
                $order = C('DB_PREFIX') . 'photo.' . $tag['order'];
            $list = $photo
                    ->join(C('DB_PREFIX') . 'position_data on ' . C('DB_PREFIX') . 'position_data.aid=' . C('DB_PREFIX') . 'photo.id')
                    ->field(C('DB_PREFIX') . 'photo.*')
                    ->cache(true)
                    ->where($condition)
                    ->limit($tag['limit'])
                    ->select();
        }
        $photodata = M('PhotoData');
        foreach ($list as $k => $v)
        {
            $v['href'] = ROU('Content/Content/news', array('id' => $v['id'], 'cid' => $v['cid']));
            $list[$k] = $v;
            $condition = array();
            $condition['pid'] = $v['id'];
            $pd = $photodata->where($condition)->select();
            $list[$k]['photodata'] = $pd;
        }
        return $list;
    }

    public function _ad($tag, $content)
    {
        $lang = nowlang();
        $condition = array();
        $condition['lid'] = $lang['id'];
        if ($tag['cid'])
        {
            $condition['tid'] = $tag['cid'];
        }
        $AdList = M('AdList');
        $limit = '';
        if ($tag['limit'])
        {
            $limit = $tag['limit'];
        }
        $link = $AdList->where($condition)->limit($limit)->select();
        foreach ($link as $k => $v)
        {
            $link[$k]['href'] = $v['url'];
        }
        return $this->_parsestr($tag, $content, $link);
    }

    public function _link($tag, $content)
    {
        $lang = nowlang();
        $condition = array();
        $condition['lid'] = $lang['id'];
        if ($tag['image'] == 1)
        {
            $condition['image_url'] = array('neq', '');
        }
        $FriendLink = M('FriendLink');
        $limit = '';
        if ($tag['limit'])
        {
            $limit = $tag['limit'];
        }
        $link = $FriendLink->where($condition)->limit($limit)->select();
        foreach ($link as $k => $v)
        {
            $link[$k]['title'] = $v['name'];
            $link[$k]['href'] = $v['url'];
            $link[$k]['img'] = $v['image_url'];
        }
        return $this->_parsestr($tag, $content, $link);
    }

    /**
     * 组装WHERE条件 除文章模块 其他没有POSITION属性
     * @param type $tag
     * @return type
     */
    public function _where($tag)
    {
        $lang = nowlang();
        $lid = $lang['id'];
        $condition = array();
        $tbl = C('DB_PREFIX') . $tag['type'];
        $postbl = C('DB_PREFIX') . 'position_data';
        if ($tag['position'])
        {
            $condition[$postbl . '.posid'] = $tag['position'];
        }
        if ($tag['thumb'] == 1)
        {
            $condition[$tbl . '.thumb'] = array('neq', '');
        }
        if ($tag['cid'])
        {
            $cids = $tag['cid'];
            //判断语言zh-cn/1,2,3|en-us/4,5,6
            $cid_param = explode('|', $tag['cid']);
            foreach ($cid_param as $c)
            {
                $cids_lang = explode('/', $c);
                $c_l = '';
                if (count($cids_lang) == 2)
                {
                    $c_l = $cids_lang[0];
                } else
                {
                    $c_l = $def_lang['lang'];
                }
                if ($c_l == $lang['lang'])
                {
                    $cids = $cids_lang[1];
                    break;
                }
            }
        }
        $condition[$tbl . '.cid'] = array('in', $cids);
        $condition[$tbl . '.lid'] = $lid;
        return $condition;
    }

    public function _Get($tag)
    {
        $sql = $tag['sql'];
        $lang = nowlang();
        $def_lang = defaultlang();
        $lid = $lang['id'];
        $article = M('Article');
        //组装where条件
        $condition = array();
        //判断语言1,2,3/zh-cn|4,5,6/en-us
        $sql_param = explode('|', $sql);
        foreach ($sql_param as $s)
        {
            $sqls_lang = explode('/', $s);
            $c_l = '';
            if (count($sqls_lang) == 2)
            {
                $c_l = $sqls_lang[0];
            } else
            {
                $c_l = $def_lang['lang'];
            }
            if ($c_l == $lang['lang'])
            {
                $sql = $sqls_lang[1];
                break;
            }
        }
        $return = $tag['return'];
        $parseStr = '<?php ';
        $parseStr.='$m=new \Think\Model();';
        $return = '$' . $return;
        $parseStr.=$return . '=$m->cache(3600,true)->query("' . $sql . '")';
        $parseStr.=' ?>';
        return $parseStr;
    }

    private function _parsestr($tag, $content, $data)
    {
        $returndata = 'data';
        if ($tag['return'])
        {
            $returndata = $tag['return'];
        }
        $key = !empty($tag['key']) ? $tag['key'] : 'i';
        $empty = isset($tag['empty']) ? $tag['empty'] : '';
        //$result = array('arr_' . $returndata => $data);
        //extract($result, EXTR_OVERWRITE);
        $name = $this->autoBuildVar('arr_' . $returndata);
        $this->tpl->set('arr_' . $returndata, $data);
        $parseStr = '<?php ';
        $parseStr .= 'if(is_array(' . $name . ')): $' . $key . ' = 0;';
        $parseStr .= ' $__LIST__ = ' . $name . ';';
        $parseStr .= 'if( count($__LIST__)==0 ) : echo "' . $empty . '" ;';
        $parseStr .= 'else: ';
        $parseStr .= 'foreach($__LIST__ as $key=>$' . $returndata . '): ';
        $parseStr .= '++$' . $key . ';?>';
        $parseStr .= $this->tpl->parse($content);
        $parseStr .= '<?php endforeach; endif; else: echo "' . $empty . '" ;endif; ?>';
        if (!empty($parseStr))
        {
            return $parseStr;
        }
        return;
    }

}
