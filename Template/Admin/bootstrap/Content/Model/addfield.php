<script>
$(function(){
    $('#field_type').change(function(){
        if($(this).val()=='radio' ||$(this).val()=='checkbox')
        {
            $('#field_val').show(400);
        }
        else
        {
            $('#field_val').hide();
        }
    });
});
</script>
<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                <?php echo L('ADD_FIELD');?>
            </small>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <form role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('FIELD_NAME');?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="title" class="col-xs-10 col-sm-5" placeholder="<?php echo L('FIELD_NAME');?> ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-1" name="fieldname" class="col-sm-3 control-label no-padding-right"> <?php echo L('FIELD');?> </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" placeholder="<?php echo L('FIELD');?> ">
                    </div>
                </div>
                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"> <?php echo L('LANGCONF');?></label>

                    <div class="col-sm-9">
                        <input type="text" name="langconf" class="col-xs-10 col-sm-5" placeholder="<?php echo L('LANGCONF');?>">

                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('FIELD_TYPE');?></label>

                    <div class="col-sm-9">
                        <select id="field_type" name="type">
                            <option value="text"><?php echo L('TEXT_BOX');?></option>
                            <option value="text"><?php echo L('TEXTAREA_BOX');?></option>
                            <option value="editor"><?php echo L('EDITOR');?></option>
                            <option value="thumb"><?php echo L('THUMB');?></option>
                            <option value="singleupload"><?php echo L('SINGLE_UPLOAD');?></option>
                            <option value="moreupload"><?php echo L('MORE_UPLOAD');?></option>
                            <option value="radio"><?php echo L('RADIO');?></option>
                            <option value="checkbox"><?php echo L('CHECKBOX');?></option>
                        </select>
                    </div>
                </div>
                <div id="field_val" class="form-group" style="display: none">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('FIELD_VAL')?></label>

                    <div class="col-sm-9">
                        <textarea name="fieldvalue" class="col-xs-10 col-sm-5"></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('ALLOW_NULL')?></label>

                    <div class="col-sm-9">
                        <input type="checkbox" name="isnull" class="chkall ace" autocomplete="off">
                        <span class="lbl"></span>

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('TACK_ATTR');?></label>

                    <div class="col-sm-9">
                        <input type="text" name='tackattr' class="col-xs-10 col-sm-5" placeholder="">

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('COMMON_REG');?></label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-4" name="reg" placeholder=""> 
                        <select class="col-xs-10 col-sm-1  ">
                            <option><?php echo L('NUMBER');?></option>
                            <option><?php echo L('EMAIL');?></option>
                            <option><?php echo L('MOBILE');?></option>
                        </select>

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


        </div><!-- /.col -->
    </div><!-- /.row -->
</div>