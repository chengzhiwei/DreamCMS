<?php

namespace Common\Cls;

class ContentCls
{

    /**
     * 获取分类信息
     * @param type $cid
     * @return type
     */
    public static function getcate($cid = '')
    {
        if (!$cid)
        {
            $cid = I('get.cid');
        }
        $cateinfo = S('cateinfo_' . $cid);
        if (!$cateinfo)
        {
            $catemod = DD('Category');
            $cateinfo = $catemod->findbyid($cid);
            S('cateinfo_' . $cid, $cateinfo);
        }
        return $cateinfo;
    }

    /**
     * 分页条
     * @param int $allcount 总条数
     * @param int $pagesize 分页大小
     * @param array $param 额外参数
     * @param string $url URL
     * @return string 分页条
     */
    public static function getpage($allcount, $pagesize = 20, $param = array(), $url = '')
    {
        $pageconfig = include 'Config/page.php';
        $Page = new \Common\Cls\PageCls($allcount, $pagesize);
        $Page->config = $pageconfig;
        if (!$url)
        {
            $url = MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME;
        }
        $Page->url = $url;
        $Page->parameter = $param;
        $show = $Page->show();
        return $show;
    }

    public static function breadcrumbs($cid = '')
    {
        if (!$cid)
        {
            $cid = I('get.cid');
        }
        $crumbs = S('crumbs_' . $cid);
        if (!$crumbs)
        {
            $catemod = DD('Category');
            $nowlang = nowlang();
            $catelist = $catemod->selectbylang($nowlang['id']);
            $new_arr = array();
            foreach ($catelist as $key => $cate)
            {
                $new_arr[$cate['id']] = $cate;
            }
            $crumbs = self::getparentcate($new_arr, $cid);
            $crumbs = array_reverse($crumbs);
            foreach ($crumbs as $key => $c)
            {
                if ($c['mid'] == 3)//单页面模型
                {
                    $c['href'] = ROU('Content/Content/page', array('id' => $c['id']));
                } else
                {
                    if ($c['isleaf'] == 1)//子级调用list
                    {
                        $c['href'] = ROU('Content/Content/newslist', array('cid' => $c['id']));
                    } else //父级调用CATEGORY
                    {
                        $c['href'] = ROU('Content/Content/category', array('cid' => $c['id']));
                    }
                }
                $crumbs[$key] = $c;
            }
            S('crumbs_' . $cid, $crumbs);
        }
        return $crumbs;
    }

    private static function getparentcate($catelist, $cid)
    {
        static $cate_arr = array();
        $cate_arr[] = $catelist[$cid];
        if ($catelist[$cid]['pid'] != 0)
        {
            self::getparentcate($catelist, $catelist[$cid]['pid']);
        }
        return $cate_arr;
    }

    /**
     * modulelist id做键值
     * @return type
     */
    public static function modulelist()
    {
        $modulelist = S('modulelist');
        if (!$modulelist)
        {
            $mod = DD('Module');
            $modulelist = $mod->selectall();
            $newmodlist = array();
            foreach ($modulelist as $key => $val)
            {
                $newmodlist[$val['id']] = $val;
            }
            S('modulelist', $newmodlist);
        }
        return $modulelist;
    }

    public static function getmoduletablebycid($cid = '')
    {
        $cateinfo = self::getcate($cid);
        $modulelist = \Common\Cls\ContentCls::modulelist();
        $boname = $modulelist[$cateinfo['mid']]['table'];
        return $boname;
    }

}
