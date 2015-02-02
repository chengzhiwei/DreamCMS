<div class="page-content">
    <div class="page-header">
        <h1>
            添加分组
            
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <form role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('GROUPNAME');?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="titlename" class="col-xs-10 col-sm-5" placeholder="" id="titlename">
                    </div>
                </div>

                <div class="space-4"></div>

                
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('FLODERNAME');?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="groupname" id="groupname" class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('LANGCONF');?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="title" class="col-xs-10 col-sm-5" placeholder="" id="title">
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
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#groupname').blur(function(){
            title=$(this).val().toUpperCase();
                $('#title').val('GROUP_'+title);
        });
    });
</script>