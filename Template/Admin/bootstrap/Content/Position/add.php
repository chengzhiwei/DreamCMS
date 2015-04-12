<script src="<?php echo ADMIN_JS_PATH ?>jquery.poshytip.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH ?>formverify.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH; ?>/tip-yellow/tip-yellow.css" />
<div class="page-content">
    <div class="page-header">
        <h1>
            <small>
                <i class="icon-double-angle-right"></i>
                添加推荐位
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <form role="form" class="verifyForm form-horizontal" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('POSITIONNAME'); ?> </label>
                     
                    <div class="col-sm-9">
                        <input type="text" verify='[["require","<?php echo L('POSITIONNAME').L('NOTNULL'); ?>"]]' name="title" class="col-xs-10 col-sm-5" placeholder="<?php echo L('POSITIONNAME'); ?>" id="form-field-1">
                    </div>
                </div>

                <div class="space-4"></div>

                
               

                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info">
                            <i class="icon-ok bigger-110"></i>
                            Submit
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button type="reset" class="btn">
                            <i class="icon-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>

                <div class="hr hr-24"></div>

            </form>
        </div>
    </div>
</div>

