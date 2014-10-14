<?php

namespace System\Controller;

/**
 * 多语言管理
 */
class LanguageController extends \Auth\Controller\AuthbaseController
{

    public function langlist()
    {
        $l = DD('Language');
        $res = $l->lanlist();
        $this->assign('list', $res);
        $this->display();
    }

    public function add()
    {
        $l = DD('Language');
        if (IS_POST)
        {
            $data = I('post.');
            if (I('post.default') == '1')
            {
                //只能一个被默认，前默认改为0
                $r = $l->findbydefault();
                $de = $l->edit($r['id'], array('default' => 0));
                $data['default'] = '1';
            } else
            {
                $data['default'] = '0';
            }
            $res = $l->addlang($data);
            if ($res)
            {
                $this->setlangconfig();
                $this->success('添加成功', U('langlist'));
            } else
            {
                $this->error('添加失败');
            }
        } else
        {
            $tmpl_list = getfils('Template/Site');
            $this->assign('tmpl', $tmpl_list);
            $this->display();
        }
    }

    public function edit()
    {
        $l = DD('Language');
        $id = $_GET['id'];
        if (IS_POST)
        {
            $data = I('post.');

            if (I('post.default') == '1')
            {
                //只能一个被默认，前默认改为0
                $r = $l->findbydefault();
                $de = $l->edit($r['id'], array('default' => 0));
                $data['default'] = '1';
            } else
            {
                $data['default'] = '0';
            }
            $res = $l->edit($id, $data);
            if ($res)
            {
                $this->setlangconfig();
                $this->success('编辑成功', U('langlist'));
            } else
            {
                $this->error('编辑失败');
            }
        } else
        {
            $info = $l->selectone($id);
            $this->assign('info', $info);
            $tmpl_list = getfils('Template/Site');
            $this->assign('tmpl', $tmpl_list);
            $this->display();
        }
    }

    public function del()
    {
        $l = DD('Language');
        $id = I('get.id', 'intval');
        $res = $l->del($id);
        if ($res)
        {
            $this->success("删除成功");
        } else
        {
            $this->error('删除失败');
        }
    }

    public function setlangconfig()
    {
        $l = DD('Language');
        $res = $l->lanlist();
        $config = array();
        $config['LANG_SWITCH_ON'] = false;
        if (count($res) > 1)
        {
            $config['LANG_SWITCH_ON'] = true;
        }
        $LANG_LIST = '';
        foreach ($res as $r)
        {
            if ($r['default'] == 1)
            {
                $config['DEFAULT_LANG'] = $r['lang'];
            }
            $LANG_LIST.=$r['lang'] . ',';
        }
        $LANG_LIST = rtrim($LANG_LIST, ',');
        $config['LANG_LIST'] = $LANG_LIST;

        $file = 'Config/langset.php';
        $config_str = "<?php \n";
        $config_str.='return ' . var_export($config, true) . ';';
        $fp = fopen($file, 'w');
        fwrite($fp, $config_str);
        fclose($fp);
        @chmod('system', 0644);
    }

}
