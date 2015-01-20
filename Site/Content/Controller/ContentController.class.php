<?php

namespace Content\Controller;

use Think\Controller;

class ContentController extends \Common\Controller\SiteController
{

    public function index()
    {
        $this->display();
    }

    public function category()
    {
        $cateinfo = $this->_getcate();
        $this->display($cateinfo['catetmpl']);
    }

    public function newslist()
    {

        $cateinfo = $this->_getcate();
        /* $boname = \Common\Cls\ContentCls::getmoduletablebycid();
          $bomod = BO(ucfirst($boname));
          $crumbs = \Common\Cls\ContentCls::breadcrumbs();
          $this->assign('crumbs', $crumbs);
          $method = $boname . 'list';
          $listinfo = $bomod->$method();
          $this->_assign($listinfo); */

        $this->display($cateinfo['listtmpl']);
    }

    public function news()
    {
        $cateinfo = $this->_getcate();
        $model = DD('Model');
        $modelinfo = $model->findByID($cateinfo['mid']);
        $Content = DD('Content', array($modelinfo['table']));
        $contentinfo = $Content->findbyId(I('get.id'));
        $ContentData = DD('ContentData', array($modelinfo['table'] . '_data'));
        $ContentDatainfo = $ContentData->findbyAid(I('get.id'));
        $news = array_merge($ContentDatainfo, $contentinfo);
        $this->_assign($news);
        $this->display($cateinfo['newstmpl']);
    }

    public function page()
    {
        $cateinfo = $this->_getcate();
        $pagemod = DD('Page');
        $pageinfo = $pagemod->findbycid(I('get.cid'));
        $this->_assign($pageinfo);
        $this->display($cateinfo['pagetmpl']);
    }

    /**
     * 文章信息
     */
    private function newsinfo()
    {
        $cateinfo = $this->_getcate();
        $boname = \Common\Cls\ContentCls::getmoduletablebycid();
        $bomod = BO($boname);
        $crumbs = \Common\Cls\ContentCls::breadcrumbs();
        $this->assign('crumbs', $crumbs);
        $method = $boname . 'info';
        $news = $bomod->$method();
        $this->_assign($news);
        $this->display($cateinfo['newstmpl']);
    }

    private function _getcate($cid = '')
    {
        $cateinfo = \Common\Cls\ContentCls::getcate($cid);
        foreach ($cateinfo as $k => $v)
        {
            $this->assign($k, $v);
        }
        return $cateinfo;
    }

    private function _assign($arr = array())
    {
        foreach ($arr as $key => $v)
        {
            $this->assign($key, $v);
        }
    }

}
