<?php

namespace Content\Controller;

class CategoryController extends \Auth\Controller\AuthbaseController {

    public function index() {
        $Category = DD('Category');
        $result = $Category->selectall($_COOKIE['langid']);
        Vendor('Unlimitedclass.Unlimitedclass', '', '.class.php');
        $unlimitedclass = new \Unlimitedclass();
        $Category_arr = $unlimitedclass->cateresult($result);
        $this->assign('category', $Category_arr);
        $this->display();
    }

    public function add() {
        if (IS_POST) {
            $data = I('post.');
            $this->add_data($data);
        } else {
            $this->canshu();
            $this->display();
        }
    }

    public function update() {
        $data = I('get.');
        $this->canshu();
        $Category = DD('Category');
        $result = $Category->selectF($data['id']);
        if ($data['type'] == 'add') {
            if (IS_POST) {
                $this->add_data();
            } else {
                $array = array();
                $array['id'] = $result['id'];
                $this->assign('result', $array);
            }
        }

        if ($data['type'] == 'update') {
            if (IS_POST) {
                $data = I('post.');
                $this->update_data($data);
            } else {
                $this->assign('result', $result);
            }
        }
        $this->display();
    }

    public function delete() {
        $data = I('get.');
        $Category = DD('Category');
        $result = $Category->count1($data['id']);
        if ($result == 0) {
            $re = $Category->deletebyid($data['id']);
            $this->redirect('index');
        } else {
            $this->error('存在子栏目，请清空子栏目');
        }
    }

    public function canshu() {

        $Model = DD('Model');
        $Modellist = $Model->selectall($_COOKIE['langid']);
        $this->assign('Modellist', $Modellist);

        $Category = DD('Category');
        $result = $Category->selectall($_COOKIE['langid']);
        Vendor('Unlimitedclass.Unlimitedclass', '', '.class.php');
        $unlimitedclass = new \Unlimitedclass();
        $Category_arr = $unlimitedclass->cateresult($result);
        $this->assign('category', $Category_arr);

        $WebConfig = DD('WebConfig');
        $config = $WebConfig->configformat(1);
        $nowlang = cookie('langinfo');
        $dir = 'Template/Site/' . $nowlang['tmpl'] . '/Content/Content';
        if (!is_dir($tmpl_path)) {
            $dir = 'Template/Site/Default/Content/Content';
        }
        $listtmpl = array();
        $catetmpl = array();
        $newstmpl = array();
        $pagetmpl = array();
        $files = getfils($dir);
        foreach ($files as $f) {
            if (strpos(strtolower($f), 'category') === 0) {
                $f_arr = explode('.', $f);
                $catetmpl[] = $f_arr[0];
                continue;
            }
            if (strpos(strtolower($f), 'list') === 0) {
                $f_arr = explode('.', $f);
                $listtmpl[] = $f_arr[0];
                continue;
            }
            if (strpos(strtolower($f), 'news') === 0) {
                $f_arr = explode('.', $f);
                $newstmpl[] = $f_arr[0];
                continue;
            }
            if (strpos(strtolower($f), 'page') === 0) {
                $f_arr = explode('.', $f);
                $pagetmpl[] = $f_arr[0];
                continue;
            }
        }
        $this->assign('catetmpl', $catetmpl);
        $this->assign('listtmpl', $listtmpl);
        $this->assign('newstmpl', $newstmpl);
        $this->assign('pagetmpl', $pagetmpl);
    }

    private function add_data($data) {
        $module = DD('Category');
        $res = $module->selectbyname($data['title']);
        if (empty($res)) {
            $data = I('post.');
            $result = $module->addcate($data);
            $this->redirect('index');
        } else {
            $this->error("栏目名称重复");
        }
    }

    private function update_data($data) {
        $module = DD('Category');
        $arr = array();
        $arr['title'] = $data['title'];
        $arr['keyword'] = $data['keyword'];
        $arr['desc'] = $data['desc'];
        $arr['pid'] = $data['pid'];
        $arr['mid'] = $data['mid'];
        $arr['langid'] = $data['langid'];
        $arr['listtmpl'] = $data['listtmpl'];
        $arr['type'] = $data['type'];
        $arr['link'] = $data['link'];
        $arr['sort'] = $data['sort'];
        $arr['isleaf'] = $data['isleaf'];
        $arr['catetmpl'] = $data['catetmpl'];
        $arr['newstmpl'] = $data['newstmpl'];
        $arr['pagetmpl'] = $data['pagetmpl'];
        $result = $module->update($data['id'], $arr);
        $this->redirect('index');
    }

    public function updatesort() {
        $sort = I('post.sort');
        $id = I('post.id');
        $catemod = DD('Category');
        $b = $catemod->update($id, array('sort' => $sort));
        if ($b) {
            echo '1';
        } else {
            echo '-1';
        }
    }

}
