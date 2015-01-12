<script type="text/javascript" src="http://www.feilong100.com/staticV3/js/jquery.min.js"></script>
<script src="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/js/webuploader.min.js" ></script>
<script src="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/js/thumbupload.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/css/style.css">
<div id="uploader-demo" style=" width: 120px;">
    <!--用来存放item-->
    <div id="fileList" class="uploader-list"></div>
    <div id="filePicker" style=" float: left; width: 100px;display: block" >选择图片</div>
    <div id="" style=" float: left;display: block;width: 100px;">裁剪图片</div>
</div>
<input type="hidden" value="<?php echo URL('WebUpload/Upload/multiimgupload', '', 'plugin.php'); ?>" id="server" />