<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                修改友情链接
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('LINKNAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="name" class="col-xs-10 col-sm-5" value="<?php echo $link['name']; ?>" placeholder="<?php echo L('LINKNAME'); ?>" id="form-field-1">
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('LINKURL'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" name="url" value="<?php echo $link['url']; ?>" class="col-xs-10 col-sm-5" placeholder="" id="form-field-2">

                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-tags" class="col-sm-3 control-label no-padding-right">LOGO</label>

                    <div class="col-sm-9">
                        <input type="file" name="image"/>
                        <?php
                        if ($link['image_url'] != '')
                        {
                            echo "<img src='" . __ROOT__ . "/" . $link['image_url'] . "' width='120px' height='60px;'/>";
                        }
                        ?>
                    </div>
                </div>

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

