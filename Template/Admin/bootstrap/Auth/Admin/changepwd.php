<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                修改密码
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <form role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('USERNAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="username" class="col-xs-10 col-sm-5" placeholder="<?php echo L('USERNAME'); ?>" id="form-field-1">
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('PASSWORD'); ?></label>

                    <div class="col-sm-9">
                        <input type="password" name="pwd" class="col-xs-10 col-sm-5" placeholder="Password" id="form-field-2">

                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-tags" class="col-sm-3 control-label no-padding-right"><?php echo L('ROLE'); ?></label>

                    <div class="col-sm-9">
                        <a class="btn btn-xs btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"  >选择角色</a>
                        <span id="group_txt"></span>
                        <input type="hidden" value="" name="group" id="group" />
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


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button data-dismiss="modal" class="close close_js" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="myLargeModalLabel" class="modal-title">选择角色</h4>
            </div>
            <div class="modal-body" >

                <?php
                foreach ($AdminGroupList as $key => $g)
                {
                    ?>
                    <lable class="col-sm-3 chk_lbl">
                        <input type="radio" name="group_radio" value="<?php echo $g['id']; ?>" class="ace authlist" txtval="<?php echo L($g['langconf']); ?>" />
                        <span class="lbl"><?php echo L($g['langconf']); ?> </span>
                    </lable>

                    <?php
                }
                ?>
            </div>

            <div class="modal-footer">
                <button  data-dismiss="modal" class="btn btn-primary sure_js" type="button">确定</button>
                <button data-dismiss="modal" class="btn btn-default close_js"  type="button">取消</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.sure_js').click(function () {
            if ($("input[name='group_radio']:checked").is(':checked')) {
                $('#group_txt').html($("input[name='group_radio']:checked").attr('txtval'));
                $('#group').val($("input[name='group_radio']:checked").val());
            } else {
                alert('<?php echo L('PLEASE_CHK_ROLE')?>');
                return false;
            }
           
        });

    });
</script>