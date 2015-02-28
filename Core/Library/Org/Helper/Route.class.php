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
 * 路由类
 * 只支持正则路路由
 */
class Route
{

    public static $routeFile; //路由文件地址

    public static function CUrl($url, $param = array())
    {
        self::$routeFile = 'Config/Router/Site/Content.php';
        $param_ext = '';
        if ($param)
        {
            $keys = $param;
            $keys_arr = array_keys($keys);
            ksort($keys_arr);
            $param_ext = implode('_', $keys_arr);
        }
        //去掉MODULE_NAME;

        $rule = $url . '_' . $param_ext;
        $parseConfig = self::_parseRule();
        if (key_exists($rule, $parseConfig))
        {

            $rou_text = preg_split("/\((.*)\)/U", $parseConfig[$rule][0]);
            $rou_url = '';
            foreach ($rou_text as $k => $rt)
            {
                count($rou_text) - 1 == $k ? $rou_url.=$rt : $rou_url.=$rt . $param[$parseConfig[$rule][2][$k]];
            }
            $rou_url = str_replace(array('\\', '/^', '$/'), '', $rou_url);
            C('URL_MODEL') == 0 ? $rou_url = __APP__ . '/' . $rou_url : $rou_url = __ROOT__ . '/' . $rou_url;
            return $rou_url;
        } else
        {
            return \U($url, $param);
        }
    }

    /**
     * 格式化路由规则
     */
    private static function _parseRule()
    {
        $routeconfig = @include self::$routeFile;
        if (!$routeconfig['URL_ROUTE_RULES'])
        {
            return array();
        }
        $parseConfig = array(); //格式化之后的数组
        foreach ($routeconfig['URL_ROUTE_RULES'] as $key => $config)
        {
            $config_arr = explode('?', $config);
            $param_ext = '';
            if ($config_arr[1])//有参数
            {
                $param_arr = explode('&', $config_arr[1]);
                $paramKeyArr = array();
                $paramKeyValArr = array();
                foreach ($param_arr as $k => $v)
                {
                    $paramArr = explode('=', $v);
                    $paramKeyArr[] = $paramArr[0];
                    $paramKeyValArr[intval(str_replace(':', '', $paramArr[1]))] = $paramArr[0];
                }
                $paramKeyArrSort = $paramKeyArr; //用于键值排序
                ksort($paramKeyArrSort);
                $param_ext = implode('_', $paramKeyArrSort);
                ksort($paramKeyValArr);
                $paramKeyValArr = array_values($paramKeyValArr); //重建索引
            }
            $parseConfig[$config_arr[0] . '_' . $param_ext] = array($key, $paramKeyArr, $paramKeyValArr);
        }
        return $parseConfig;
    }

}
