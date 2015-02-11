<script src="<?php echo JS_PATH ?>jquery.poshytip.min.js"></script>
<script src="<?php echo JS_PATH ?>formverify.js"></script>
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/tip-yellow/tip-yellow.css" />
<div class="page-content">
    <div class="page-header">
        <h1>
            编辑模块

        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <form role="form" id="groupform" class="verifyForm form-horizontal" method="post">
                <input type="hidden" name="id" value="<?php echo $moduleinfo['id']?>" />
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('GROUPNAME'); ?> </label>
                    <div class="col-sm-9">

                        <select name="gid">
                            <?php
                            foreach ($grouplist as $gl)
                            {
                                ?>
                            <option  <?php echo $gl['id']==$moduleinfo['gid']?'selected="selected"':""?> value="<?php echo $gl['id']; ?>"><?php echo L($gl['title']); ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('MODULENAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="titlename" value="<?php echo L($moduleinfo['title']);?>" id="titlename" verify='[["require","<?php echo L('MODULENAME') . L('NOTNULL'); ?>"]]'  class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('FLODERNAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" id="cname" value="<?php echo $moduleinfo['cname'];?>" name="cname" verify='[["require","<?php echo L('FLODERNAME') . L('NOTNULL'); ?>"]]'  class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>


                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('LANGCONF'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text"  value="<?php echo $moduleinfo['title'];?>" id="title" name="title" verify='[["require","<?php echo L('LANGCONF') . L('NOTNULL'); ?>"]]' class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>
                <div class="space-4"></div>


                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="SUBMIT" class="btn btn-info">
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
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
<script>
    $(function () {
         $('#cname').blur(function () {
            title = $(this).val().toUpperCase();
            $('#title').val('CTL_' + title);
        });
    });

</script>