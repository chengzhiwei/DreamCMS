<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                添加语言
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 语言 </label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 是否默认 </label>
                    <div class="col-sm-9">
                        <label>
                            <input type="checkbox" class="ace" name="type" value="1">
                            <span class="lbl"> </span>
                        </label>
                    </div>
                </div>
                <div class="form-group in_link_div" >
                    <label  class="col-sm-3 control-label no-padding-right"> 选择模板 </label>
                    <div class="col-sm-9">
                        <select name="mid" id="modsel" class="col-sm-5">
                            <?php
                            foreach ($Modellist as $mli)
                            {
                                ?>
                                <option value="<?php echo $mli['id'] ?>"><?php echo $mli['title'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 多语言参数 </label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="" />
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info">
                            <i class="icon-ok bigger-110"></i>
                            <?php echo L('ADD');?>
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button type="reset" class="btn">
                            <i class="icon-undo bigger-110"></i>
                            <?php echo L('RESET');?>
                        </button>
                    </div>
                </div>
                <div class="hr hr-24"></div>
            </form>
        </div>
    </div>
</div>