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

namespace WebUpload\Controller;

class UploadController extends \Think\Controller
{

    public function multiimgupload()
    {
        $file = date('Y-m-d', time());
        $targetDir = 'Uploads/tmp';
        $uploadDir = 'Uploads/Content';
         mkdir($uploadDir,0777,true);
        if (!is_dir($targetDir))
        {
            mkdir($targetDir,0777,true);
        }
        if (!is_dir($uploadDir))
        {
            mkdir($uploadDir,0777,true);
        }
    }

}
