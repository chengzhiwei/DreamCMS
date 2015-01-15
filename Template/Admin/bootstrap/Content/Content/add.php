
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>DreamCMS 后台管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->
        <link href="<?php echo CSS_PATH; ?>bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/tip-yellow/tip-yellow.css" />
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

        <script src="<?php echo JS_PATH ?>jquery-1.10.2.min.js"></script>
        <script src="<?php echo JS_PATH ?>jquery.poshytip.min.js"></script>
        <script src="<?php echo JS_PATH ?>bootstrap.min.js"></script>
    </head>

    <body>
        <div class="page-content">

            <div class="row">



                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" class="form-horizontal" method="post" onsubmit="return chkform()">
                                <?php
                                $validator = '';
                                foreach ($Fieldlist as $k => $f)
                                {
                                    $validator.=$f['type'] . ',' . $f['fieldname'] . ',' . $f['isnull'] . ',' . $f['reg'] . '|';
                                    ?>
                                    <div class="form-group">
                                        <label for="form-field-1" class="col-sm-1 control-label no-padding-right"> <?php echo L($f['langconf']); ?> </label>

                                        <div class="col-sm-11  pull-left" >
                                            <?php echo Org\Helper\CForm::create($f); ?> 
                                            <br />
                                            <span  id="<?php echo $f['fieldname'] ?>_tip"></span>
                                        </div>

                                    </div>
                                    <?php
                                }
                                ?>


                                <input type="hidden" value="<?php echo I('get.cid') ?>" name="cid"/>
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

                </div>
            </div>
        </div>

        <input type="hidden" id="validator" value="<?php echo rtrim($validator, '|'); ?>" /> 

        <script>

            function settips(tips, content)
            {
                regedittip(tips, content);
                tips.poshytip('show');
                tips.poshytip('hideDelayed', 2000);
            }

            function chknull(isnull, val, tips)
            {
                if (isnull == 1 && val == '')
                {
                    settips(tips, '不能为空');
                    return false;
                }
                return true;
            }
            function chkreg(reg, val, tips)
            {
                if (reg != '' && val != '')
                {
                    var regexp = new RegExp(reg);
                    if (regexp.test(val)) {
                        return true;
                    } else {
                        settips(tips, '格式错误');
                        return false;
                    }
                }
                return true;
            }

            function chkform()
            {
                arr = $('#validator').val().split("|");
                var v_str = '';
                for (i = 0; i < arr.length; i++)
                {
                    obj_arr = arr[i].split(",");
                    objstr = '#' + obj_arr[1];
                    objstr_tip = '#' + obj_arr[1] + '_tip';

                    var chknull_val = '';
                    var chkreg_val = '';

                    //判断类型 text textarea editor 
                    if (obj_arr[0] == 'text' || obj_arr[0] == 'textarea' || obj_arr[0] == 'editor')
                    {
                        chknull_val = $(objstr).val();//验证必填
                        chkreg_val = $(objstr).val(); //验证正则
                    }
                    //判断类型 check  
                    if (obj_arr[0] == 'checkbox')
                    {
                        $("input[name='" + obj_arr[1] + "[]']").each(function () {
                            if ($(this).attr('checked') == true)
                            {
                                chknull_val += $(this).val() + ',';
                            }
                        })
                    }
                    //判断类型  radio 
                    if (obj_arr[0] == 'radio')
                    {
                        if ($('input:radio[name="' + obj_arr[1] + '"]').is(":checked"))
                        {
                            chknull_val = 1;
                        }
                    }
                    //判断上传类型
                    if (obj_arr[0] == 'thumb' || obj_arr[0] == 'singleupload' || obj_arr[0] == 'moreupload')
                    {
                        chknull_val = $(objstr).val();//验证必填 
                    }
                    var n = chknull(obj_arr[2], chknull_val, $(objstr_tip));//验证是否必填
                    var r = chkreg(obj_arr[3], chkreg_val, $(objstr_tip));//验证正则
                    if (n == false || r == false)
                    {
                        return false;
                    }

                }
                return true;
            }
            function regedittip(obj, content)
            {
                obj.poshytip({
                    content: content,
                    showOn: 'none',
                    alignTo: 'target',
                    alignX: 'inner-left',
                    alignY: 'bottom',
                    offsetX: 0,
                    offsetY: 5
                });
            }
        </script>

    </body>
</html>