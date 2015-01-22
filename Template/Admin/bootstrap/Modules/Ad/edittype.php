<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                添加广告分类
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <form role="form" class="form-horizontal" method="post" >
                <input type="hidden" name="id" value="<?php echo $info['id']; ?>" />
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('TYPENAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" value="<?php echo $info['title'] ?>" name="title" class="col-xs-10 col-sm-5" placeholder="<?php echo L('TYPENAME'); ?>" id="form-field-1">
                    </div>
                </div>

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

