<?php

namespace Content\Controller;

class PhotoController extends \Auth\Controller\AuthbaseController {

    public function index() {
        $photo = DD('Photo');
        $result = $photo->selectall(I('get.p', 1));
        $count = $photo->photocount(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 20); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        $this->assign('page', $show); // 赋值分页输出
        $this->assign('result', $result);
        $this->assign('category_name', I('get.category'));
        $this->display();
    }

    public function add() {
        if (IS_POST) {
            $data = I('post.');
            $mid = $data['mid'];
            unset($data['mid']);
            if ($_FILES['picname']['error'] == 0) {
                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 3292200;
                $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
                $upload->savePath = '/Photo_thumb/';
                $info = $upload->upload();
                if (!$info) {
                    //捕获上传异常
                    $this->error($upload->getError());
                } else {
                    //取得成功上传的文件信息
                    $data['thumb'] = 'Uploads' . $info['picname']['savepath'] . $info['picname']['savename'];
                }
            }
            $photo = DD('Photo');
            $result = $photo->addPhoto($data);
            $id = $photo->getLastInsID();
            $photodata = DD('PhotoData');
            foreach ($data['imgpath'] as $key => $path) {
                $arr = array();
                $arr['pic'] = $path;
                $arr['title'] = $data['imgtitle'][$key];
                $arr['pid'] = $id;
                $res = $photodata->addPhotodata($arr);
            }
            if ($result) {
                $flags = I('post.flags');
                \Common\Cls\ContentCls::setpositiondata($flags, $id, $mid, $data['cid']);
                $this->success('添加成功');
            } else {
                $this->error('发生错误请重试');
            }
        } else {
            $this->assign('category_id', I('get.cid'));
            $this->assign('category_name', I('get.category'));
            //获取推荐位
            $position = DD('Position');
            $positionlist = $position->positionlist();
            $this->assign('position', $positionlist);
            $this->display();
        }
    }

    public function edit() {
        $this->canshu();
        $photo = DD('Photo');
        $result = $photo->selectbyid(I('get.id'));
        $Category = DD('Category');
        $category = $Category->selectF($result['cid']);
        //获取选中的推荐位
        $PositionData = DD('PositionData');
        $PositionDataInfo = $PositionData->selbyaid(I('get.id'));
        $posids = array();
        foreach ($PositionDataInfo as $p) {
            $posids[] = $p['posid'];
        }
        //获取图片组
        $photodata = DD('PhotoData');
        $res = $photodata->selectbypid(I('get.id'));

        if (IS_POST) {
            $data = I('post.');
            $mid = $data['mid'];
            unset($data['mid']);
            if ($_FILES['picname']['error'] == 0) {
                @unlink($result['thumb']);
                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 3292200;
                $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
                $upload->savePath = '/Photo_thumb/';
                $info = $upload->upload();
                if (!$info) {
                    //捕获上传异常
                    $this->error($upload->getError());
                } else {
                    //取得成功上传的文件信息
                    $data['thumb'] = 'Uploads' . $info['picname']['savepath'] . $info['picname']['savename'];
                }
            }
            $photo = DD('Photo');
            $resul = $photo->update(I('post.id'), $data);

            $photodata = DD('PhotoData');
            $res = $photodata->del(I('post.id'));
            //删除对应图片
            foreach ($data['imgpath'] as $key => $path) {
                $arr = array();
                $arr['pic'] = $path;
                $arr['title'] = $data['imgtitle'][$key];
                $arr['pid'] = I('post.id');
                $resu = $photodata->addPhotodata($arr);
            }
            if ($resul) {
                $flags = I('post.flags');
                \Common\Cls\ContentCls::setpositiondata($flags, I('post.id'), $mid, $data['cid']);
                $this->success('添加成功');
            } else {
                $this->error('发生错误请重试');
            }
        } else {


            $this->assign('posids', $posids);
            $this->assign('category_id', $category['id']);
            $this->assign('category_name', $category['title']);
            $this->assign('result', $result);
            $this->assign('imgdate', $res);
            $this->display();
        }
    }

    public function delete() {
        $photo = DD('Photo');
        $result=$photo->selectbyid(I('get.id'));
        if ($photo->del(I('get.id')))
        {
            @unlink($result['thumb']);
            $photodata = DD('PhotoData');
            $res=$photodata->selectbypid(I('get.id'));
            foreach ($res as $r){
                @unlink($r['pic']);
            }
            $photodata->del(I('get.id'));
            $PostionDatamod = DD('PositionData');
            $PostionDatamod->deldatabyaid(I('get.id'));
            $this->success('删除成功');
        } else
        {
            $this->success('发生错误请重试');
        }
    }

    public function uploadpics() {
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        @set_time_limit(5 * 60);
        $targetDir = 'Uploads/images';
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            die('{"jsonrpc" : "2.0", "error" : {"code": 500, "message": "上传错误"}, "id" : "id"}');
        }
        $filePath = $targetDir . DIRECTORY_SEPARATOR . '/' . $fileName;
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        // Remove old temp files	
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
                if ($tmpfilePath == "{$filePath}.part") {
                    continue;
                }
                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }
        if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        die('{"jsonrpc" : "2.0", "filepath":"' . $filePath . '","n_filename" : "' . $fileName . '", "filename" : "' . $_REQUEST["true_fn"] . '", "tmp_name" : "' . $_REQUEST["name"] . '"}');
    }

    public function canshu() {
        //获取推荐位
        $positionlist = \Common\Cls\ContentCls::getposition();
        $this->assign('position', $positionlist);
        //获取栏目
        $Category_arr = \Common\Cls\ContentCls::getcate();
        $this->assign('category', $Category_arr);
    }

    public function delimg() {
        $result = @unlink(I('post.url'));
        print_r($result);
    }

}
