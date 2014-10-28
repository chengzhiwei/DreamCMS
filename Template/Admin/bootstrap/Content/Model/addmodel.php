<script>
    $(function () {
        $('#langconf').focus(function () {
            $(this).val('MDL_' + $('#table').val().toUpperCase());
        });
    });
</script>
<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                添加模型
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <form role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <label  class="col-sm-3 control-label no-padding-right"> <?php echo L('MODEL_NAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="title" class="col-xs-10 col-sm-5" placeholder="<?php echo L('MODEL_NAME'); ?>" >
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label no-padding-right"> <?php echo L('TABLE_NAME'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" id="table" name="table" placeholder="<?php echo L('TABLE_NAME'); ?>" class="col-xs-10 col-sm-5" placeholder="Password" >

                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label no-padding-right"><?php echo L('LANGCONF'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" name="langconf" id="langconf" class="col-xs-10 col-sm-5" placeholder="<?php echo L('LANGCONF'); ?>" >
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