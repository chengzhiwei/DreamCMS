<?php

namespace Common\Cls;

class CommCls
{

    /**
     * 设置插件CSS JS IMG 等路径
     */
    public static function _setPlgStatic()
    {
        $layoutPath = __ROOT__ . '/' . C('TMPL_PATH') . '/' . C('PLG_APP_NAME') . '/' . MODULE_NAME . '/Layout/';
        define('PLG_LAYOUT_PATH', $layoutPath);
        define('PLG_CSS_PATH', $layoutPath . 'Css/');
        define('PLG_JS_PATH', $layoutPath . 'Js/');
        define('PLG_IMG_PATH', $layoutPath . 'Image/');
    }

    /**
     * 获取CSS JS 等资源文件
     * @param string $files
     * @param string $type
     */
    public static function _getResFile($files, $type)
    {

        switch (strtoupper($type))
        {
            case 'CSS':
                break;
            case 'JS':
                break;
        }
    }

}
