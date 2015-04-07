<?php

/**
 * 采集插件后台管理
 */

namespace Collection\Controller;

class AdminController extends \Common\Controller\AdminpluginController
{

    /**
     * 采集列表页
     */
    public function index()
    {
        $PlgCollection = D('PlgCollection');
        $colList = $PlgCollection->select();
        $CateMod = M('Category');
        foreach ($colList as $k => $c)
        {
            $cateRule = explode(',', $c['cate']);
            $cateinfo = $CateMod->find($cateRule[0]);
            $colList[$k]['cateinfo'] = $cateinfo;
        }
        $this->assign('colList', $colList);
        $this->display();
    }

    /**
     * 添加采集规则
     */
    public function add()
    {
        if (IS_POST)
        {
            $data = array(
                'title' => I('post.title'),
                'cate' => I('post.cate')
            );
            //列表页规则
            $listRuleArr = array(
                'listurl' => I('post.listurl'),
                'listobj' => $_POST['listobj'],
                'listattr' => I('post.listattr'),
            );
            $data['listrule'] = json_encode($listRuleArr);
            //内容页规则
            $pageRuleArr = array();
            $cate = I('post.cate');
            $cateArr = explode(',', $cate);
            $mid = $cateArr[1];
            $ModelField = DD('ModelField');
            $fieldlist = $ModelField->selFieldByMid($mid);
            foreach ($fieldlist as $key => $f)
            {
                if (isset($_POST[$f['fieldname'] . '_rule']))
                {
                    $pageRuleArr[$f['fieldname']] = $_POST[$f['fieldname'] . '_rule'];
                }
            }
            $data['pagerule'] = json_encode($pageRuleArr);
            $PlgCollection = D('PlgCollection');
            $b = $PlgCollection->addData($data);
            if ($b !== false)
            {
                echo 'OK';
            } else
            {
                echo 'ERROR';
            }
        } else
        {
            $Category = DD('Category');
            $result = $Category->selectall(); //可以选择多语言版本的栏目
            Vendor('Unlimitedclass.Unlimitedclass', '', '.class.php');
            $unlimitedclass = new \Unlimitedclass();
            $Category_arr = $unlimitedclass->cateresult($result);
            $this->assign('category', $Category_arr);
            $this->display();
        }
    }

    public function getfields()
    {
        if (IS_AJAX)
        {
            $mid = I('post.mid');
            $ModelField = DD('ModelField');
            $fieldlist = $ModelField->selFieldByMid($mid);
            \Org\Helper\IncludeLang::QuickInc('Content/modelfield', 'Admin');
            foreach ($fieldlist as $key => $f)
            {
                $fieldlist[$key]['title'] = L($f['title']);
            }
            echo json_encode($fieldlist);
        }
    }

    /**
     * 测试采集列表
     */
    public function testlist()
    {
        $listurl = I('post.listurl');
        $listurl = str_replace('{$page}', 2, $listurl);

        $listobj = $_POST['listobj'];
        $listattr = I('post.listattr');
        Vendor('phpQuery.phpQuery', '', '.class.php');
        //'http://www.helloweba.com/blog.html'
        //".blog_li > h2 >a"
        \phpQuery::newDocumentFile($listurl);
        $artlist = pq($listobj);
        foreach ($artlist as $li)
        {
            print_r(pq($li)->attr($listattr));
            echo '<br />';
            //echo pq($li)->find('h2')->html() . "";
        }
    }

    /**
     * 测试采集内容
     */
    public function testpage()
    {
        header("Content-type: text/html; charset=utf-8");
        //列表地址
        $listurl = I('post.listurl');
        $listurl = str_replace('{$page}', 2, $listurl);

        $urlInfo = parse_url($listurl); //解析列表
        $listobj = $_POST['listobj']; //列表对象
        $listattr = I('post.listattr'); //列表属性
        //采集列表
        Vendor('phpQuery.phpQuery', '', '.class.php');
        \phpQuery::newDocumentFile($listurl);
        $artlist = pq($listobj);
        foreach ($artlist as $li)
        {
            $pageurl = pq($li)->attr($listattr);
            if (stripos($pageurl, 'http') !== 0)
            {
                $pageurl = $urlInfo['scheme'] . '://' . $urlInfo['host'] . $pageurl;
            }
            //采集内容
            \phpQuery::$defaultCharset=I('post.langcode');
            \phpQuery::newDocumentFileHTML($pageurl);
            //获取字段
            $cate = I('post.cate');
            $cateArr = explode(',', $cate);
            $mid = $cateArr[1];
            $ModelField = DD('ModelField');
            $fieldlist = $ModelField->selFieldByMid($mid);

            foreach ($fieldlist as $key => $f)
            {
                if (isset($_POST[$f['fieldname'] . '_rule']))
                {
                    $ruleJson = $_POST[$f['fieldname'] . '_rule'];
                    $ruleObj = json_decode($ruleJson);

                    if ($ruleObj->type == 0)
                    {
                        $artlist = pq($ruleObj->obj);
                        echo $artlist->text().'<br />';
                        
                    }
                }
            }

            $artlist = pq($listobj);
            break;
        }
    }

    public function startcollection()
    {
        //参数
        //采集ID
        $cid = I('get.cid');

        //采集类型 0 采集所有 1 按页数采集
        $ctype = I('get.ctype');

        //开始页数
        $sp = I('get.sp', 1, 'intval');

        //停止页数
        $tp = I('get.tp');

        //当前采集的页数
        $page = I('get.page', 1, 'intval');

        //按页数采集
        $blagStop = false;
        if ($ctype == 1)
        {
            if ($tp && $tp <= $page)
            {
                $blagStop = TRUE;
            }
        }

        //开始采集
        //获取采集规则详情
        $PlgCollection = D('PlgCollection');
        $colInfo = $PlgCollection->find($cid);
        $listRule = json_decode($colInfo['listrule']);
        $listurl = str_replace('{$page}', $page, $listRule->listurl);
        $urlInfo = parse_url($listurl); //解析列表
        Vendor('phpQuery.phpQuery', '', '.class.php');
        \phpQuery::newDocumentFile($listurl);
        $artlist = pq($listRule->listobj);
        foreach ($artlist as $li)
        {
            //获取详情页地址
            $pageurl = pq($li)->attr($listRule->listattr);
            if (strpos('http', $pageurl) === FALSE)
            {
                $pageurl = $urlInfo['scheme'] . '://' . $urlInfo['host'] . $pageurl;
            }

            //采集内容
            \phpQuery::newDocumentFile($pageurl);

            $cateArr = explode(',', $colInfo['cate']);
            $mid = $cateArr[1]; //模型
            $ModelField = DD('ModelField');
            $fieldlist = $ModelField->selFieldByMid($mid); //模型中所有字段
            $pagerule = json_decode($colInfo['pagerule'], true);
            foreach ($fieldlist as $key => $f)
            {
                if (isset($pagerule[$f['fieldname']]))
                {
                    $rulePageJson = $pagerule[$f['fieldname']];
                    $rulePageObj = json_decode($rulePageJson);
                    if ($rulePageObj->type == 0)
                    {

                        $artlist = pq($rulePageObj->obj);
                        dump($this->_TxtToUtf8(I('post.langcode'), $artlist->text()));
                        die();
                    }
                }
            }
        }


        dump($listRule);
        die();
        if ($blagStop === true)
        {
            //停止采集
        } else
        {
            //跳转到下一页开始采集
            $param = array(
                'cid' => $cid,
                'ctype' => $ctype,
                'sp' => $sp,
                'tp' => $tp,
                'page' => $page + 1,
            );
            //$this->redirect('Collection/Admin/startcollection', $param);
        }
        $this->display();
    }


}
