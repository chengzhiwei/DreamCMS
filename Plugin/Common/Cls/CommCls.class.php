<?php

namespace Common\Cls;

class CommCls
{

    /**
     * 设置插件CSS JS IMG 等路径
     */
    public static function _setPlgStatic()
    {
        PLUGIN_TMPL_PATH . '/' . APP_NAME . '/' . MODULE_NAME . '/Static/';
    }

}
