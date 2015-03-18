<?php

namespace Content\Controller;

class CategoryController extends \Auth\Controller\AuthbaseController
{

    public function index()
    {
        $Category = DD('Category');
        $result = $Category->selectall($this->OpSiteLangInfo['id']);
        Vendor('Unlimitedclass.Unlimitedclass', '', '.class.php');
        $unlimitedclass = new \Unlimitedclass();
        $Category_arr = $unlimitedclass->cateresult($result);
        $this->assign('category', $Category_arr);
        $this->display();
    }

    public function add()
    {
        if (IS_POST)
        {
            $Category = DD('Category');
            $b = $Category->addcate();
            if ($b !== false)
            {
                $this->redirect('Content/Category/index');
            } else
            {
                $this->error(L('OP_ERROR'));
            }
        } else
        {
            $this->_catecommon();
            $this->display();
        }
    }

    public function update()
    {
        $Category = DD('Category');
        if (IS_POST)
        {
            $data = I('post.');
            if (!isset($data['menushow']))
            {
                $data['menushow'] = 0;
            }
            $b = $Category->update($data['id'], $data);
            if ($b)
            {
                $this->redirect('Content/Category/index');
            } else
            {
                echo $Category->getDbError();
            }
        } else
        {
            $this->_catecommon();
            $cateinfo = $Category->findbyid(I('get.id'));
            $this->assign('cateinfo', $cateinfo);
            $this->display();
        }
    }

    public function delete()
    {
        $id = I('get.id');
        $Category = DD('Category');
        //判断有没有子栏目 
        $childcate = $Category->selByPid($id);
        if (count($childcate) > 0)
        {
            $this->error(L('PLS_DEL_CHILD'));
        }
        //判断 有没有文章
        $cateinfo = $Category->findbyid($id);
        $model = DD('Model');
        $modelinfo = $model->findByID($cateinfo['mid']);
        $Content = DD('Content', array($modelinfo['table']));
        $Contentlist = $Content->SimpleLimit($id, 1);
        if (count($Contentlist) > 0)
        {
            $this->error(L('PLS_DEL_CONTENT'));
        }
        $b = $Category->deletebyid($id);
        if ($b !== false)
        {
            $this->redirect('Content/Category/index');
        } else
        {
            $this->error(L('OP_ERROR'));
        }
    }

    public function sort()
    {
        $sort = I('post.sort');
        $id = I('post.id');
        $catemod = DD('Category');
        $b = $catemod->update($id, array('sort' => $sort));
        if ($b)
        {
            echo '1';
        } else
        {
            echo '-1';
        }
    }

    private function _catecommon()
    {
        /* 模型 */
        $Model = DD('Model');
        $Modellist = $Model->selectall($this->OpSiteLangInfo['id']);
        $this->assign('Modellist', $Modellist);
        /* 分类 */
        $Category = DD('Category');
        $result = $Category->selectall($this->OpSiteLangInfo['id']);
        Vendor('Unlimitedclass.Unlimitedclass', '', '.class.php');
        $unlimitedclass = new \Unlimitedclass();
        $Category_arr = $unlimitedclass->cateresult($result);
        $this->assign('category', $Category_arr);
        /* 模板 */
        $dir = 'Template/Site/' . $this->OpSiteLangInfo['tmpl'] . '/Content/Content';
        $listtmpl = array();
        $catetmpl = array();
        $newstmpl = array();
        $pagetmpl = array();
        $files = getfils($dir);
        foreach ($files as $f)
        {
            if (strpos(strtolower($f), 'category') === 0)
            {
                $f_arr = explode('.', $f);
                $catetmpl[] = $f_arr[0];
                continue;
            }
            if (strpos(strtolower($f), 'list') === 0)
            {
                $f_arr = explode('.', $f);
                $listtmpl[] = $f_arr[0];
                continue;
            }
            if (strpos(strtolower($f), 'news') === 0)
            {
                $f_arr = explode('.', $f);
                $newstmpl[] = $f_arr[0];
                continue;
            }
            if (strpos(strtolower($f), 'page') === 0)
            {
                $f_arr = explode('.', $f);
                $pagetmpl[] = $f_arr[0];
                continue;
            }
        }
        $this->assign('tmpl', array(
            'catetmpl' => $catetmpl,
            'listtmpl' => $listtmpl,
            'newstmpl' => $newstmpl,
            'pagetmpl' => $pagetmpl,
        ));
    }

}
