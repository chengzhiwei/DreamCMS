<?php

/*
 * +----------------------------------------------------------------------
 * | DreamCMS [ WE CAN  ]
 * +----------------------------------------------------------------------
 * | Copyright (c) 2006-2014 DreamCMS All rights reserved.
 * +----------------------------------------------------------------------
 * | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * +----------------------------------------------------------------------
 * | Author: 孔雀翎 <284909375@qq.com>
 * +----------------------------------------------------------------------
 */

namespace Org\Helper;

/**
 * 设置语言包
 */
class SetLang
{

    public $LangFilePath = '';

    /**
     * 构造函数
     * @param string $langfilepath 语言文件地址
     * @param boolean $short 是否是短地址（模块/控制器）
     */
    public function __construct($langfilepath = '', $short = false)
    {
        $this->setLangFilePath($langfilepath, $short);
    }

    /**
     * 设置路径
     * @param string $langfilepath 语言文件地址
     * @param boolean $short 是否是短地址（模块/控制器）
     */
    public function setLangFilePath($langfilepath = '', $short = false)
    {
        if ($short === true)
        {
            $this->LangFilePath = $this->parseLangFilePath($langfilepath);
        } else
        {
            $this->LangFilePath = $langfilepath;
        }
    }

    public function getFilePath()
    {
        if ($this->LangFilePath)
        {
            return $this->LangFilePath;
        } else
        {
            return $this->parseLangFilePath();
        }
    }

    /**
     * 解析默认路径 
     * 默认：项目/语言/模块/控制器.php
     * 
     */
    public function parseLangFilePath($shortFile = '')
    {
        $lang = \getlang();
        if (!$shortFile)
        {
            $PATH = 'Lang' . DIRECTORY_SEPARATOR . APP_NAME . DIRECTORY_SEPARATOR .
                    $lang . DIRECTORY_SEPARATOR . MODULE_NAME .
                    DIRECTORY_SEPARATOR . strtolower(CONTROLLER_NAME) . '.php';
        } else
        {
            $PATH = 'Lang' . DIRECTORY_SEPARATOR . APP_NAME .
                    DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR . $shortFile . '.php';
        }
        if (!is_file($PATH))
        {
            mkdir($PATH, 0777, true);
        }
        return $PATH;
    }

    /**
     * 单一设置语言
     * @param string $key
     * @param string $val
     * @return boolean
     */
    public function setOneLang($key, $val)
    {
        $path = $this->getFilePath();
        return $this->writeConf($path, array($key => $val));
    }

    /**
     * 批量设置语言
     * @param array $langlist
     * @return boolean
     */
    public function setListLang($langlist = array())
    {
        if (is_array($langlist) && count($langlist) > 0)
        {
            $path = $this->getFilePath();
            return $this->writeConf($path, $langlist);
        }
    }

    /**
     * 写入文件
     * @param string $path
     * @param string $content
     * @param boolean $isappend
     * @return boolean
     */
    public function writeFile($path, $content, $isappend = false)
    {
        if ($isappend === true)
        {
            $type = 'a+';
        } else
        {
            $type = 'w+';
        }
        chmod($path, 0777); // 以最高操作权限操作当前目录
        $file = fopen($path, $type); // a模式就是一种追加模式，如果是w模式则会删除之前的内容再添加
        fwrite($file, $content);
        fclose($file);
        // 销毁文件资源句柄变量
        unset($file);
        return true;
    }

    /**
     * 写配置文件
     * @param string $path
     * @param array $content
     * @return boolean
     */
    public function writeConf($path, $content)
    {
        $o_content = include $path;
        $new_conf = $content;
        if ($o_content)
        {
            $new_conf = array_merge($content, $o_content);
        }
        $str = "<?php \r\n return " . var_export($new_conf, true) . "; \r\n?>";

        return $this->writefile($path, $str);
    }

    /**
     * 删除语言包
     * @param string $key
     * @return boolean
     */
    public function delOneLang($key)
    {
        $path = $this->getFilePath();
        $arr = include $path;
        unset($arr[$key]);
        $str = "<?php \r\n return " . var_export($arr, true) . "; \r\n?>";
        return $this->writefile($path, $str);
    }

    /**
     * 批量删除语言包
     * @param array $arrkey
     * @example array('TITLE','CONTENT')
     */
    public function delAllLang($arrkey)
    {
        $path = $this->getFilePath();
        $arr = include $path;
        foreach ($arrkey as $v)
        {
            unset($arr[$v]);
        }
        $str = "<?php \r\n return " . var_export($arr, true) . "; \r\n?>";
        return $this->writefile($path, $str);
    }

}
