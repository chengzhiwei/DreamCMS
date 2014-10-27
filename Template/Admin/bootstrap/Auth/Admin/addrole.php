<script>
    $(function () {
        $('.chkall').change(function () {

            if ($(this).is(":checked"))
            {
                $(this).parent().parent().parent().find('.authlist').attr('checked',true);
            }
            else
            {
                $(this).parent().parent().parent().find('.authlist').attr('checked',false);
            }

        });
    });

</script>

<style>
    .modal-content{border-radius:5px;}
    .modal-body {
        max-height: 800px;
    }
    .form-horizontal .control-label{text-align:left}
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

            <form role="form" class="form-horizontal">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('USERNAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" placeholder="<?php echo L('USERNAME'); ?>" id="form-field-1">
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 设置权限 </label>

                    <div class="col-sm-9">
                        <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">设置</button>
                    </div>
                </div>



                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
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
                                                    <input type="checkbox" class="chkall"/><a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" aria-expanded="true" aria-controls="collapse<?php echo $key; ?>">
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
                                                                <lable class="col-sm-3 "><input type="checkbox" class="authlist" /><?php echo L($al['langconf']); ?> </lable>
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
                        </div><!-- /.modal-content -->
                    </div>
                </div>



                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Password Field </label>

                    <div class="col-sm-9">
                        <input type="password" class="col-xs-10 col-sm-5" placeholder="Password" id="form-field-2">
                        <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle">Inline help text</span>
                        </span>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-tags" class="col-sm-3 control-label no-padding-right">Tag input</label>

                    <div class="col-sm-9"><div class="tags"><input type="text" placeholder="Enter tags ..." value="Tag Input Control" id="form-field-tags" name="tags" style="display: none;"><input type="text" placeholder="Enter tags ..."><ul class="typeahead dropdown-menu" style="top: 84.75px; left: 19px; display: none;"><li data-value="Rhode Island" class="active"><a href="#"><strong>R</strong>hode Island</a></li><li data-value="Arizona"><a href="#">A<strong>r</strong>izona</a></li><li data-value="Arkansas"><a href="#">A<strong>r</strong>kansas</a></li><li data-value="California"><a href="#">Califo<strong>r</strong>nia</a></li><li data-value="Colorado"><a href="#">Colo<strong>r</strong>ado</a></li><li data-value="Delaware"><a href="#">Delawa<strong>r</strong>e</a></li><li data-value="Florida"><a href="#">Flo<strong>r</strong>ida</a></li><li data-value="Georgia"><a href="#">Geo<strong>r</strong>gia</a></li></ul></div>

                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="button" class="btn btn-info">
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