<?php

/**
 * 网站设置
 */

namespace System\Controller;

class WebsetController extends \Auth\Controller\AuthbaseController
{
    /* 设置网站标题 关键词 描述 */

    public function index()
    {
        if (IS_POST)
        {
            $data = I('post.');
            $sys = include 'system.php';
            $sys['SITE_TITLE'] = $data['SITE_TITLE'];
            $sys['SITE_KEYWORD'] = $data['SITE_KEYWORD'];
            $sys['SITE_DESC'] = $data['SITE_DESC'];

            $config = "<?php \n";
            $config.='return ' . var_export($sys, true) . ';';
            $fp = fopen('system.php', 'w');
            fwrite($fp, $config);
            fclose($fp);
            @chmod('system', 0644);
            $this->success('保存成功');
        } else
        {
            $this->display();
        }
    }

    private function update($keyvalue, $value)
    {
        $set = DD('WebConfig');
        foreach ($keyvalue as $key => $k)
        {
            $condition = array();
            $condition['code'] = $k;
            $data = array();
            $data['value'] = $value[$key];
            $result = $set->update($condition, $data);
        }
    }

    /* 路由设置 */

    public function router()
    {
        $file = 'Router/Site/Content.php';
        if (IS_POST)
        {
            $data = I('post.');
            $router = array_flip($data);
            $config = "<?php \n";
            $config.='return ' . var_export(array('URL_ROUTE_RULES' => $router), true) . ';';
            $fp = fopen($file, 'w');
            fwrite($fp, $config);
            fclose($fp);
            @chmod('system', 0644);
            $this->success('保存成功');
        } else
        {
            /* 开始获取路由 */
            $router = array();
            if (is_file($file))
            {
                $router = include $file;
            }
            if ($router)
            {
                $router = array_flip($router['URL_ROUTE_RULES']);
            }
            $this->assign('router', $router);
            $this->display();
        }
    }

}
