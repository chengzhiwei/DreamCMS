<script type="text/javascript" src="http://www.feilong100.com/staticV3/js/jquery.min.js"></script>
<script src="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/js/webuploader.min.js" ></script>
<script src="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/js/upload.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/css/style.css">
<div id="wrapper">
    <div id="container">
        <!--头部，相册选择和格式选择-->

        <div id="uploader">
            <div class="queueList">
                <div id="dndArea" class="placeholder">
                    <div id="filePicker"></div>
                    <p>或将照片拖到这里，单次最多可选300张</p>
                </div>
            </div>
            <div class="statusBar" style="display:none;">
                <div class="progress">
                    <span class="text">0%</span>
                    <span class="percentage"></span>
                </div><div class="info"></div>
                <div class="btns">
                    <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" value="<?php echo URL('WebUpload/Upload/multiimgupload', '', 'plugin.php'); ?>" id="server" />