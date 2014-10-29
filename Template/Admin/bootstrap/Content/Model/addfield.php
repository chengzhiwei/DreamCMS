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
                添加字段
            </small>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <form role="form" class="form-horizontal">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 字段名 </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" placeholder="字段名">
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"> 多语言参数</label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" placeholder="Password">

                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right">字段类型</label>

                    <div class="col-sm-9">
                        <select id="field_type">
                            <option>单行文本</option>
                            <option>多行文本</option>
                            <option>编辑器</option>
                            <option>缩略图</option>
                            <option>单文件上传</option>
                            <option>多文件上传</option>
                            <option value="radio">单选项</option>
                            <option value="checkbox">复选项</option>
                        </select>
                    </div>
                </div>
                <div id="field_val" class="form-group" style="display: none">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right">字段值</label>

                    <div class="col-sm-9">
                        <textarea class="col-xs-10 col-sm-5"></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right">允许为空</label>

                    <div class="col-sm-9">
                        <input type="checkbox" class="chkall ace" autocomplete="off">
                        <span class="lbl"></span>

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right">附加属性</label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" placeholder="">

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right">常用正则</label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-4" placeholder=""> 
                        <select class="col-xs-10 col-sm-1  ">
                            <option>数字</option>
                            <option>邮件</option>
                            <option>手机</option>
                        </select>

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