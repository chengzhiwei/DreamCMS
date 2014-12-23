
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>DreamCMS 后台管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->
        <link href="<?php echo CSS_PATH; ?>bootstrap.min.css" rel="stylesheet" />
       <link rel="stylesheet" href="<?php echo CSS_PATH; ?>font-awesome.min.css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo CSS_PATH; ?>font-awesome-ie7.min.css" />
        <![endif]-->
        <!-- page specific plugin styles -->
        <!-- fonts -->
        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>ace.min.css" />
  

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo CSS_PATH; ?>ace-ie.min.css" />
        <![endif]-->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo JS_PATH; ?>html5shiv.js"></script>
        <script src="<?php echo JS_PATH; ?>respond.min.js"></script>
        <![endif]-->
        <style>
          .op_btn a{  margin-left: 5px;}
        </style>
    </head>

    <body>
<div class="page-content">

    <div class="row">
        
        
        
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="row">
                <div class="col-xs-12">
                     <form role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('FIELD_NAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="title" class="col-xs-10 col-sm-5" placeholder="<?php echo L('FIELD_NAME'); ?> ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('FIELD'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text"  name="fieldname" class="col-xs-10 col-sm-5" placeholder="<?php echo L('FIELD'); ?> ">
                    </div>
                </div>
                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"> <?php echo L('LANGCONF'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" name="langconf" class="col-xs-10 col-sm-5" placeholder="<?php echo L('LANGCONF'); ?>">

                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('FIELD_TYPE'); ?></label>

                    <div class="col-sm-9">
                        <select id="field_type" name="type">
                            <option value="text"><?php echo L('TEXT_BOX'); ?></option>
                            <option value="text"><?php echo L('TEXTAREA_BOX'); ?></option>
                            <option value="editor"><?php echo L('EDITOR'); ?></option>
                            <option value="thumb"><?php echo L('THUMB'); ?></option>
                            <option value="singleupload"><?php echo L('SINGLE_UPLOAD'); ?></option>
                            <option value="moreupload"><?php echo L('MORE_UPLOAD'); ?></option>
                            <option value="radio"><?php echo L('RADIO'); ?></option>
                            <option value="checkbox"><?php echo L('CHECKBOX'); ?></option>
                        </select>
                    </div>
                </div>
                <div id="field_val" class="form-group" style="display: none">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('FIELD_VAL') ?></label>

                    <div class="col-sm-9">
                        <textarea name="fieldvalue" class="col-xs-10 col-sm-5"></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('ALLOW_NULL') ?></label>

                    <div class="col-sm-9">
                        <input type="checkbox" name="isnull" class="chkall ace" autocomplete="off">
                        <span class="lbl"></span>

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('TACK_ATTR'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" name='tackattr' class="col-xs-10 col-sm-5" placeholder="">

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('COMMON_REG'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-4" name="reg" placeholder=""> 
                        <select class="col-xs-10 col-sm-1  ">
                            <option><?php echo L('NUMBER'); ?></option>
                            <option><?php echo L('EMAIL'); ?></option>
                            <option><?php echo L('MOBILE'); ?></option>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('CUSTOM_CONTROL'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" name='' class="col-xs-10 col-sm-4" placeholder="" />
                        <a data-toggle="modal" data-target=".bs-example-modal-lg" href="#" class=" btn btn-xs btn-info" style=" margin-top: 2px">
                            <b>选择控件</b>
                        </a>
                    </div>
                </div>

                <input type="hidden" value="<?php echo $mid ?>" name="mid"/>
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








        </div><!-- /.col -->
    </div><!-- /.row -->
</div>    </body>
</html>