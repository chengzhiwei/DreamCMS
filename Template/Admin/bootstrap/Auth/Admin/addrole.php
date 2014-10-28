<script>
    $(function () {
        $('.chkall').change(function () {
            if ($(this).is(":checked"))
            {
                $(this).parent().parent().parent().find('.authlist').prop('checked', true);
            }
            else
            {
                $(this).parent().parent().parent().find('.authlist').prop('checked', false);
            }

        });

        $('.close_js').click(function () {
            $('.chkall').prop('checked', false);
            $('.authlist').prop('checked', false);
        });
        $('.sure_js').click(function () {
            var str = '';
            var i = 0;
            $('.authlist').each(function () {
                if ($(this).is(":checked"))
                {
                    str += $(this).attr('txtval') + ' ';
                    i++;
                }
                if (i == 3)
                {
                    return false;
                }
            });
            $('#sel_auth').text(str + '...');
        });
    });

</script>

<style>
    .modal-content{border-radius:5px;}
    .modal-body {
        max-height: 800px;
    }
    .form-horizontal .control-label .chk_lbl{text-align:left}
</style>

<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                添加角色
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <form role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 角色名 </label>

                    <div class="col-sm-9">
                        <input type="text" name="title" class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 多语言标识 </label>

                    <div class="col-sm-9">
                        <input type="text" name="langconf" class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>
                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 设置权限 </label>

                    <div class="col-sm-9">
                        <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">设置</button>
                        <span id="sel_auth"></span>
                    </div>
                </div>



                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button data-dismiss="modal" class="close close_js" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 id="myLargeModalLabel" class="modal-title">选择权限</h4>
                            </div>
                            <div class="modal-body" >
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php
                                    foreach ($grouplist as $key => $g)
                                    {
                                        ?>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <input autocomplete="off" type="checkbox" class="chkall ace"/><span class="lbl"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" aria-expanded="true" aria-controls="collapse<?php echo $key; ?>">
                                                        <?php echo L($g['langconf']); ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse<?php echo $key; ?>" class="panel-collapse collapse <?php
                                            if ($key == 0)
                                            {
                                                echo 'in';
                                            }
                                            ?>" role="tabpanel">
                                                <div class="panel-body">
                                                    <?php
                                                    foreach ($ctllist[$g['id']] as $ct)
                                                    {
                                                        ?>
                                                        <fieldset class="control-label">
                                                            <legend></legend>
                                                            <?php
                                                            foreach ($actlist[$ct['id']] as $al)
                                                            {
                                                                ?>
                                                                <lable class="col-sm-3 chk_lbl">
                                                                    <input type="checkbox" name="authlist[]" value="<?php echo $al['id']; ?>" class="ace authlist" txtval="<?php echo L($al['langconf']); ?>" />
                                                                    <span class="lbl"><?php echo L($al['langconf']); ?> </span>
                                                                </lable>
                                                            <?php }
                                                            ?>
                                                        </fieldset>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button  data-dismiss="modal" class="btn btn-primary sure_js" type="button">确定</button>
                                <button data-dismiss="modal" class="btn btn-default close_js"  type="button">取消</button>
                            </div>
                        </div><!-- /.modal-content -->
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