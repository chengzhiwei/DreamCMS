<div class="page-content">
    <div class="page-header">
        <h1>
            添加权限

        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <form role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right">所属分组 </label>

                    <div class="col-sm-3">
                        <select id="form-field-select-1" class="form-control">
                            <option value="">&nbsp;</option>
                            <option value="AL">Alabama</option>
                        </select>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 所属模块 </label>

                    <div class="col-sm-3">
                        <select id="form-field-select-1" class="form-control">
                            <option value="">&nbsp;</option>
                            <option value="AL">Alabama</option>
                        </select>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('LANGCONF'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="langconf" class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
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