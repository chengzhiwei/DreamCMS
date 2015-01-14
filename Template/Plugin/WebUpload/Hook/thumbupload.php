
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

                <div style="float:left; margin-left: 30px" >
                    <span style='display: block; margin: 10px 0 0 0'>宽：<input id="imgwidth" type="text" style=" width: 100px;" value="100"   />px</span>
                    <span style='display: block;margin: 10px 0 10px 0'>高：<input id="imgheigth" type="text" style=" width: 100px;" value="100" />px
                        <a class="btn btn-info btn-xs" id="setsize">设置</a>
                    </span>
                    <div ></div>
                    <div class='img-preview' ></div>

                </div>
            </div>
            <div style="clear:both"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" id="crop" class="btn btn-primary">裁剪</button>
            </div>
        </div>
    </div>
</div>
<script>
    function setperview()
    {
        $tw = parseInt($('#imgwidth').val());
        $th = parseInt($('#imgheigth').val());
        if (parseInt($('#imgwidth').val()) > 200)
        {
            $tw = 200;
            $th = parseInt($('#imgheigth').val()) / (parseInt($('#imgwidth').val()) / 200);
        }
        $('.img-preview').css({'height': $th, 'width': $tw});
    }
    $(function () {

        $image = $(".img-container").find('img');
        $('#cropa').click(function () {

            $('#myModal').modal('show');
        });
        $('#myModal').on('shown.bs.modal', function () {

            setperview();
            $image.cropper({
                aspectRatio: parseInt($('#imgwidth').val()) / parseInt($('#imgheigth').val()),
                data: {
                    width: 200,
                    height: 200
                },
                zoom: 0.5,
                preview: ".img-preview",
                done: function (data) {

                }
            });
        });
        $('#myModal').on('hidden.bs.modal', function () {
            $image.cropper("destroy");
        });
        $('#setsize').click(function () {
            setperview();
            $image.cropper("setAspectRatio", parseInt($('#imgwidth').val()) / parseInt($('#imgheigth').val()));
        });
        $('#crop').click(function () {
            data = $image.cropper("getData");
            img=$('#orgpic').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo URL('WebUpload/Upload/cropimg','','Plugin.php'); ?>',
                data: {x: data.x1, y: data.y1, w: data.width, h: data.height, tw: parseInt($('#imgwidth').val()), th: parseInt($('#imgheigth').val()),img:img},
                success: function (data) {
                    if(data=='')
                    {
                        alert('发错错误，请重试');
                    }
                    else
                    {
                        $('.thumbnail').find('img').attr('src',data);
                        $('#myModal').modal('hide');
                    }
                }
            });
        });
    });
</script>