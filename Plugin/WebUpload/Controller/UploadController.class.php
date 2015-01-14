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

class UploadController extends \Common\Controller\AdminpluginController
{

    public function multiimgupload()
    {
        $file = date('Y-m-d', time());
        $targetDir = 'Uploads/tmp';
        $uploadDir = 'Uploads/Content/' . $file;
        if (!\file_exists($targetDir))
        {
            \mkdir($targetDir, 0777, true);
        }
        if (!\file_exists($uploadDir))
        {
            \mkdir($uploadDir, 0777, true);
        }
        if (isset($_REQUEST["name"]))
        {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES))
        {
            $fileName = $_FILES["file"]["name"];
        } else
        {
            $fileName = uniqid("file_");
        }
        $filePath = $targetDir . '/' . $fileName;
        $uploadPath = $uploadDir . '/' . $fileName;

// Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


// Remove old temp files
        if ($cleanupTargetDir)
        {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir))
            {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false)
            {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp")
                {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge))
                {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


// Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb"))
        {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES))
        {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"]))
            {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb"))
            {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else
        {
            if (!$in = @fopen("php://input", "rb"))
            {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096))
        {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $index = 0;
        $done = true;
        for ($index = 0; $index < $chunks; $index++)
        {
            if (!file_exists("{$filePath}_{$index}.part"))
            {
                $done = false;
                break;
            }
        }
        if ($done)
        {
            if (!$out = @fopen($uploadPath, "wb"))
            {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if (flock($out, LOCK_EX))
            {
                for ($index = 0; $index < $chunks; $index++)
                {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb"))
                    {
                        break;
                    }

                    while ($buff = fread($in, 4096))
                    {
                        fwrite($out, $buff);
                    }

                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }

                flock($out, LOCK_UN);
            }
            @fclose($out);
        }


        // Return Success JSON-RPC response
        $arr = array(
            'jsonrpc' => '2.0',
            'result' => array('imgpath' => $uploadPath),
            'id' => 'idqq',
        );
        echo json_encode($arr);
        die();
    }

    public function cropimg()
    {
        if (IS_AJAX)
        {
            $img = I('post.img');
            $img = str_replace(__ROOT__ . '/', '', $img);
            $image = new \Think\Image();
            $image->open($img);
            $pathinfo = pathinfo($img);
            $savepath = $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '_' . I('post.tw') . '_' . I('post.th') . '.' . $pathinfo['extension'];
            $b = $image->crop(I('post.w'), I('post.h'), I('post.x'), I('post.y'), I('post.tw'), I('post.th'))->save($savepath);
            if ($b)
            {
                echo __ROOT__ . '/' . $savepath;
            } else
            {
                echo '';
            }
        }
    }

}
