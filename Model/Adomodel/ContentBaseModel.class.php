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

namespace Model\Adomodel;

class ContentBaseModel extends \Think\Model\AdvModel
{

    public function __construct($name = '', $tablePrefix = '', $connection = '')
    {
        parent::__construct($name, $tablePrefix, $connection);
    }

    /**
     * 校验数据
     * @param array $data
     * @param array $modelfield
     */
    public function checkData($data = array(), $modelfield = array())
    {
        $newmodelfield = $this->parseModelField($modelfield);
        foreach ($data as $k => $d)
        {
            if (key_exists($k, $newmodelfield))
            {
                if ($newmodelfield['isnull'] == 1 && trim($d) == '')
                {
                    return false;
                }
                if ($newmodelfield['reg'] != '' && trim($d) != '')
                {
                    //正则验证
                    if (!preg_match("/" . $newmodelfield['reg'] . "/", $d))
                    {
                        return false;
                    }
                }
            }
        }
        return true;
    }

    /**
     * 重新格式字段数组
     * @param array $modelfield
     */
    public function parseModelField($modelfield = array())
    {
        $newmodelfield = array();
        foreach ($modelfield as $k => $m)
        {
            $newmodelfield[$m['fieldname']] = $m;
        }
        return $newmodelfield;
    }

    /**
     * 过滤数据 重组
     * @param array $data
     * @param array $modelfield
     */
    public function filterData($data = array(), $modelfield = array())
    {
        $newmodelfield = $this->parseModelField($modelfield);
        $newdata = $data;
        foreach ($data as $k => $d)
        {
            if (key_exists($k, $newmodelfield))
            {
                switch ($newmodelfield[$k]['type'])
                {
                    case 'editor'://编辑器过滤XSS
                        Vendor('Htmlpurifier.library.HTMLPurifier#auto');
                        $config = \HTMLPurifier_Config::createDefault();
                        $purifier = new \HTMLPurifier($config);
                        $newdata[$k] = $purifier->purify(htmlspecialchars_decode($d));
                        break;

                    case 'position': //推荐位
                        $newdata[$k] = implode(',', $d);
                        break;
                    case 'checkbox':
                        $newdata[$k] = implode(',', $d);
                        break;
                }
            }
        }
        return $newdata;
    }

    /**
     * 检验数据和过滤
     * @param array $data
     * @param array $modelfield
     * @return mixed
     */
    public function ChkAndFilter($data = array(), $modelfield = array())
    {
        $data = $this->filterData($data, $modelfield);
        if ($data)
        {
            $b = $this->checkData($data, $modelfield);
            if ($b)
            {
                return $data;
            }
        }
        return false;
    }

}
