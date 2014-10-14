<?php

namespace Index\Controller;

use Think\Controller;

class IndexController extends \Common\Controller\InstallController
{

    public function index()
    {
        $this->display();
    }

    public function systemcheck()
    {


        $this->display();
    }

    public function configset()
    {

        if (IS_POST)
        {
            /* 检查数据库配置是否连接正确 */
            $con = @mysql_connect(I('post.DB_HOST'), I('post.DB_USER'), I('post.DB_PWD'));
            if (!$con)
            {
                $this->error('不能连接到数据库');
            }
            /* 判断数据库书否存在 */
            $b = @mysql_select_db(I('post.DB_NAME'), $con);
            if ($b)
            {
                $this->error('数据库已存在');
            }
            /* 设置配置文件 */
            $system_config=I('post.');
            $system_config['DB_TYPE'] = 'mysql';

            $config = "<?php \n";
            $config.='return ' . var_export($system_config, true);
            $config.="\n ?>";
            @chmod('system', 0777);
            $fp = fopen('Config/system.php', 'w');
            fwrite($fp, $config);
            fclose($fp);
            @chmod('system', 0644);
            if (!mysql_query("CREATE DATABASE `" . I('post.DB_NAME') . "`", $con))
            {
                echo "Error creating database: " . mysql_error();
            }
            /* 创建表 */
            mysql_query("set names utf8");
            $sql = file_get_contents('Install/data/data.sql');
            $sql = str_replace('{pre}', I('post.DB_PREFIX'), $sql);
            $sql_arr = explode(';', $sql);
            mysql_select_db(I('post.DB_NAME'), $con);
            foreach ($sql_arr as $s)
            {
                if (trim($s) == '')
                {
                    continue;
                }
                if (!mysql_query($s))
                {
                    echo "Error creating datatable: " . mysql_error();
                }
            }
            mysql_close($con);
            //*最后删除install.php 和install文件夹*/
            $this->redirect('Index/index/complete');
            /* 安装数据库 */
        } else
        {
            $pex = $this->setpex();
            $db = str_replace('.', '', $_SERVER['HTTP_HOST']);
            $this->assign('pex', $pex);
            $this->assign('db', $db);
            $this->display();
        }
    }

    public function complete()
    {
        $this->display();
    }

    private function setpex($length = 3)
    {
        $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randString = '';
        $len = strlen($str) - 1;
        for ($i = 0; $i < $length; $i ++)
        {
            $num = mt_rand(0, $len);
            $randString .= $str[$num];
        }
        return $randString;
    }

}
