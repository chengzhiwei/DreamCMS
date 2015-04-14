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
 * 导入SQL 文件
 */
class ImportSql
{

    /**
     * 执行SQL文件
     * @param string $sqlfile
     */
    public static function ExecuteSqlFile($sqlfile)
    {
        $sql = file_get_contents($sqlfile);
        $sql_arr = explode(';', $sql);
        $model = M();
        foreach ($sql_arr as $s)
        {
            if (trim($s) == '')
            {
                continue;
            }
            $model->execute($s);
        }
    }

}
