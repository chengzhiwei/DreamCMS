<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace Behavior;

use Think\Behavior;

defined('THINK_PATH') or exit();

/**
 * 语言检测 并自动加载语言包
 * @category   Extend
 * @package  Extend
 * @subpackage  Behavior
 * @author   liu21st <liu21st@gmail.com>
 */
class FlChkLangBehavior extends Behavior
{

    // 行为参数定义（默认值） 可在应用配置中覆盖
    protected $options = array(
        'LANG_SWITCH_ON' => false, // 默认关闭语言包功能
        'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
        'LANG_LIST' => 'zh-cn', // 允许切换的语言列表 用逗号分隔
        'VAR_LANGUAGE' => 'l', // 默认语言切换变量
    );

    // 行为扩展的执行入口必须是run
    public function run(&$params)
    {
        // 检测语言
        $this->checkLanguage();
    }

    /**
     * 语言检查
     * 检查浏览器支持语言，并自动加载语言包
     * @access private
     * @return void
     */
    private function checkLanguage()
    {
        // 不开启语言包功能，仅仅加载框架语言文件直接返回
        if (!C('LANG_SWITCH_ON'))
        {
            return;
        }
        $langSet = C('DEFAULT_LANG');
        // 启用了语言包功能
        // 根据是否启用自动侦测设置获取语言选择
        if (C('LANG_AUTO_DETECT'))
        {

            if (isset($_GET[C('VAR_LANGUAGE')]))
            {
                $langSet = $_GET[C('VAR_LANGUAGE')]; // url中设置了语言变量
            }
            if (false === stripos(C('LANG_LIST'), $langSet))
            { // 非法语言参数
                $langSet = C('DEFAULT_LANG');
            }
        }
        // 定义当前语言
        define('LANG_SET', strtolower($langSet));
        // 读取框架语言包
        $file = THINK_PATH . 'Lang/' . LANG_SET . '.php';
        if (LANG_SET != C('DEFAULT_LANG') && is_file($file))
            L(include $file);


        $file = getcwd() . '/Lang/' . APP_NAME . '/' . LANG_SET . '/' . MODULE_NAME . '/' . strtolower(CONTROLLER_NAME) . '.php';
        if (is_file($file))
            L(include $file);

        $file = './Lang/' . APP_NAME . '/' . LANG_SET . '/Common/common.php';
        if (is_file($file))
            L(include $file);
        if (MODULE_NAME == 'Content')
        {
            $file = getcwd() . '/Lang/' . APP_NAME . '/' . LANG_SET . '/Common/comm_content.php';
            if (is_file($file))
                L(include $file);
        }
    }

}
