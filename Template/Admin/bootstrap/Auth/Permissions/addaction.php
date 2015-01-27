<script src="<?php echo JS_PATH ?>jquery.poshytip.min.js"></script>
<script src="<?php echo JS_PATH ?>formverify.js"></script>
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/tip-yellow/tip-yellow.css" />
<script>
    function getmodule(gid)
    {
        $.ajax({
            type: "post",
            url: "<?php echo U('Auth/Permissions/getmodulebygid') ?>",
            data: {gid: gid},
            dataType: 'json',
            success: function (data) {
                opt = '';
                $.each(data, function (i, item) {
                    opt += '<option value="' + item.id + '" cname="' + item.cname + '">' + item.title + '</option>';
                });
                $('.sel_module').html(opt);
            }
        });
    }
    $(function () {
        v = $('.sel_group').find("option:selected").attr('value');
        getmodule(v);
        $('.sel_group').change(function () {
            getmodule($(this).val());
        });

        $('#actionopname').blur(function () {
            langconf = 'ACT_' + rtnselattr($('.sel_group'), 'groupname').toUpperCase() + '_' + rtnselattr($('.sel_module'), 'cname').toUpperCase() + '_' + $(this).val().toUpperCase();
            $('#langconf').val(langconf);

        });
    });
    function rtnselattr(obj, attrval)
    {
        return obj.find("option:selected").attr(attrval);
    }
    function bef_formsubmit()
    {
        $('#hid_group').val(rtnselattr($('.sel_group'), 'groupname'));
        $('#hid_controller').val(rtnselattr($('.sel_module'), 'cname'));
        return true;
    }
</script>
<div class="page-content">
    <div class="page-header">
        <h1>
            添加权限

        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <form role="form" class="verifyForm form-horizontal" method="post" onsubmit="return bef_formsubmit();">
                <input type='hidden' value="" name="group" id='hid_group' />
                <input type='hidden' value="" name="controller"  id='hid_controller' />
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"><?php echo L('GENUS_GROUP'); ?> </label>

                    <div class="col-sm-3">
                        <select name='gid' id="form-field-select-1" class="form-control sel_group" >
                            <?php
                            foreach ($grouplist as $key => $li)
                            {
                                ?>
                                <option value="<?php echo $li['id']; ?>" groupname="<?php echo $li['groupname'] ?>"><?php echo L($li['langconf']) ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('GENUS_MODULE'); ?> </label>

                    <div class="col-sm-3">
                        <select name='cid' id="form-field-select-1" class="form-control sel_module">

                        </select>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('ACTION_NAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="title"  verify='[["require","<?php echo L('ACTION_NAME').L('NOTNULL'); ?>"]]' class="col-xs-10 col-sm-5" placeholder="" >
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('ACTION_OP_NAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="action" verify='[["require","<?php echo L('ACTION_OP_NAME').L('NOTNULL'); ?>"]]'  class="col-xs-10 col-sm-5" placeholder="" id="actionopname">
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('IS_MENU_SHOW'); ?> </label>

                    <div class="col-sm-9">
                        <label>
                            <input type="checkbox" name='isshow' value='1' class="ace ace-checkbox-2" name="form-field-checkbox">
                            <span class="lbl"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('LANGCONF'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" verify='[["require","<?php echo L('LANGCONF').L('NOTNULL'); ?>"]]' name="langconf" class="col-xs-10 col-sm-5" placeholder="" id="langconf">
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