<script type="text/javascript" src="http://www.feilong100.com/staticV3/js/jquery.min.js"></script>
<script src="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/js/webuploader.min.js" ></script>
<script src="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/js/filesupload.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/css/style.css">
<link rel="stylesheet" type="text/css" href="http://fex-team.github.io/webuploader/css/bootstrap.min.css">
<style>
    .webuploader-container{ width: 95px;;display: block; float: left; }
    .webuploader-pick {
        position: relative;
        display: inline-block;
        cursor: pointer;
        background: #00b7ee;
        padding: 7px 15px;
        color: #fff;
        text-align: center;
        border-radius: 3px;
        overflow: hidden;
    }
</style>
<div id="uploader" class="wu-example">
    <!--用来存放文件信息-->
    <div id="thelist" class="uploader-list">
        <table class="table table-condensed" style=" width: 350px;">
      
        </table>
    </div>
    <div class="btns">
        <div id="picker">选择文件</div>
        <button id="uploadBtn" class="btn btn-default">开始上传</button>
    </div>
</div>


<input type="hidden" value="<?php echo URL('WebUpload/Upload/multiimgupload', '', 'plugin.php'); ?>" id="server" />