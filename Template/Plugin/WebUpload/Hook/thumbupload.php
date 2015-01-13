
<script src="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/js/webuploader.min.js" ></script>
<script src="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/js/thumbupload.js" ></script>
<script src="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/js/cropper.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__ ?>/Template/Plugin/WebUpload/css/cropper.css">
<style>

    .img-preview {height: auto;overflow: hidden;}
    .img-preview { border: 1px solid #ccc; height: 150px; margin-top: 1em;width: 150px;}
    .thumbnail { max-width:  150px}
</style>
<div id="uploader-demo" style="">
    <!--用来存放item-->
    <div id="fileList" class="uploader-list"></div>
    <div id="filePicker" style="width: 95px; float: left">选择图片</div>
    <a  href='#' id='cropa' ><div class='webuploader-pick' style="float: left">裁剪图片</div></a>
</div>
<input type="hidden" value="<?php echo URL('WebUpload/Upload/multiimgupload', '', 'plugin.php'); ?>" id="server" />
<input type="hidden" value="<?php echo __ROOT__ ?>" id="orgpic" autocomplete='off' />


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">图片裁剪</h4>
            </div>
            <div class="modal-body">
                <div class="img-container" style=" overflow: hidden; display: block; max-width: 300px; float: left">
                    <img   src="" />
                </div>

                <div style="float:left; margin-left: 30px">
                    <span style='display: block; margin: 10px 0 0 0'>宽：<input type="text" style=" width: 100px;" value="100px"   />px</span>
                    <span style='display: block;margin: 10px 0 10px 0'>高：<input type="text" style=" width: 100px;" value="100px" />px</span>
                    <div ></div>
                    <div class='img-preview' ></div>

                </div>
            </div>
            <div style="clear:both"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {

        $image = $(".img-container").find('img');
        $('#cropa').click(function () {
            
            $('#myModal').modal('show');


        });

        $('#myModal').on('shown.bs.modal', function () {
            $image.cropper({
                aspectRatio: 1,
                data: {
                    width: 200,
                    height: 200
                },
                zoom:0.5,
                preview: ".img-preview",
                done: function (data) {

                }
            });
        });
        $('#myModal').on('hidden.bs.modal', function () {
            $image.cropper("destroy");
        });

    });
</script>