
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
            .form-horizontal{ font-size: 13px;}
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
                                <?php
                                
                                foreach ($Fieldlist as $k => $f)
                                {
                                    ?>
                                    <div class="form-group">
                                        <label for="form-field-1" class="col-sm-1 control-label no-padding-right"> <?php echo L($f['langconf']); ?> </label>

                                        <div class="col-sm-11">
                                            <?php echo Org\Helper\CForm::create($f); ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>



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