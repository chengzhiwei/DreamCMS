<script>
    $(function () {
        $('#field_type').change(function () {
            if ($(this).val() == 'radio' || $(this).val() == 'checkbox')
            {
                $('#field_val').show(400);
            }
            else
            {
                $('#field_val').hide();
            }
        });
    });</script>
<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                <?php echo L('ADD_FIELD'); ?>
            </small>
        </h1>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <form role="form" class="form-horizontal" method="post">
                <input type="hidden" value="<?php echo L($fieldinfo['id']); ?>" name="id" />
                <input type="hidden" value="<?php echo L($fieldinfo['mid']); ?>" name="mid" />
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('FIELD_NAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" value="<?php echo L($fieldinfo['langconf']); ?>" name="title" class="col-xs-10 col-sm-5" placeholder="<?php echo L('FIELD_NAME'); ?> ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('FIELD'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" value="<?php echo $fieldinfo['fieldname']; ?>" disabled id="fieldname"  name="fieldname" class="col-xs-10 col-sm-5" >
                    </div>
                </div>
                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-2"  class="col-sm-3 control-label no-padding-right"> <?php echo L('LANGCONF'); ?></label>

                    <div class="col-sm-9">
                        <input type="text"   value="<?php echo $fieldinfo['langconf']; ?>" disabled id="langconf" name="langconf"  class="col-xs-10 col-sm-5">

                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('FIELD_TYPE'); ?></label>

                    <div class="col-sm-9">
                        <select id="field_type" name="type" disabled  >
                            <option  value="text" <?php echo $fieldinfo['type'] == 'text' ? 'selected="selected"' : ''; ?>><?php echo L('TEXT_BOX'); ?></option>
                            <option value="textarea" <?php echo $fieldinfo['type'] == 'textarea' ? 'selected="selected"' : ''; ?>><?php echo L('TEXTAREA_BOX'); ?></option>
                            <option value="editor" <?php echo $fieldinfo['type'] == 'editor' ? 'selected="selected"' : ''; ?>><?php echo L('EDITOR'); ?></option>
                            <option value="thumb" <?php echo $fieldinfo['type'] == 'thumb' ? 'selected="selected"' : ''; ?>><?php echo L('THUMB'); ?></option>
                            <option value="singleupload" <?php echo $fieldinfo['type'] == 'singleupload' ? 'selected="selected"' : ''; ?>><?php echo L('SINGLE_UPLOAD'); ?></option>
                            <option value="moreupload" <?php echo $fieldinfo['type'] == 'moreupload' ? 'selected="selected"' : ''; ?>><?php echo L('MORE_UPLOAD'); ?></option>
                            <option value="radio" <?php echo $fieldinfo['type'] == 'radio' ? 'selected="selected"' : ''; ?>><?php echo L('RADIO'); ?></option>
                            <option value="checkbox" <?php echo $fieldinfo['type'] == 'checkbox' ? 'selected="selected"' : ''; ?>><?php echo L('CHECKBOX'); ?></option>
                        </select>
                    </div>
                </div>
                <div id="field_val" class="form-group" <?php echo $fieldinfo['type'] == 'radio' || $fieldinfo['type'] == 'checkbox' ? '' : 'style="display: none"'; ?>>
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('FIELD_VAL') ?></label>

                    <div class="col-sm-9">
                        <textarea name="fieldvalue" class="col-xs-10 col-sm-5"><?php echo $fieldinfo['fieldvalue']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('ALLOW_NULL') ?></label>

                    <div class="col-sm-9">
                        <input type="checkbox" name="isnull" value="1" <?php echo $fieldinfo['isnull'] == 1 ? 'checked="checked"' : ''; ?>  class="chkall ace" autocomplete="off">
                        <span class="lbl"></span>

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('TACK_ATTR'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" name='tackattr' <?php echo $fieldinfo['tackattr']; ?> class="col-xs-10 col-sm-5" placeholder="">

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('COMMON_REG'); ?></label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-4" id="reg" name="reg" value='<?php echo $fieldinfo['reg'] ?>' placeholder=""> 
                        <select class="col-xs-10 col-sm-1  sel_reg">
                            <option value=""><?php echo L('PLEASE_SELECT'); ?></option>
                            <option <?php echo $fieldinfo['reg'] == '^[1-9]\d*$' ? 'selected="selected"' : '' ?> value="^[1-9]\d*$"><?php echo L('NUMBER'); ?></option>
                            <option <?php echo $fieldinfo['reg'] == '\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*' ? 'selected="selected"' : '' ?> value="\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"><?php echo L('EMAIL'); ?></option>
                            <option <?php echo $fieldinfo['reg'] == '1[0-9]{10}' ? 'selected="selected"' : '' ?> value="1[0-9]{10}"><?php echo L('MOBILE'); ?></option>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label for="form-field-2" class="col-sm-3 control-label no-padding-right"><?php echo L('CUSTOM_CONTROL'); ?></label>

                    <div class="col-sm-9">
                        <a data-toggle="modal" data-target=".bs-example-modal-lg" href="#" class=" btn btn-xs btn-info" style=" margin-top: 1px">
                            <b>选择控件</b>
                        </a>
                        <input type="hidden" value="<?php echo $fieldinfo['plugin']; ?>" name='plugin' id='plugin' />
                        <strong name='plugintxt'  id='plugintxt' class="  " placeholder="" >
                            <?php
                            if ($fieldinfo['plugin'] != '')
                            {
                                echo L($hookinfo['name']);
                            }
                            ?>
                        </strong>
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


        </div>
    </div>
</div>









<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button data-dismiss="modal" class="close close_js" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="myLargeModalLabel" class="modal-title">配置插件</h4>
            </div>
            <div class="modal-body" >
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="widget-header">
                        <h4 class="lighter smaller">
                            <i class="icon-rss orange"></i>
                            请选择控件
                        </h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-4">
                            <div class="tab-content padding-8 overflow-visible">
                                <div class="tab-pane active" >

                                    <div class="tabbable tabs-left">
                                        <ul id="myTab" class="nav nav-tabs vhooklist">
                                            <?php
                                            foreach ($pluginlist as $k => $p)
                                            {
                                                ?>
                                                <li rel="<?php echo $p['id'] ?>"  class="<?php echo $k == 0 ? 'active' : '' ?>">
                                                    <a href="#profile<?php echo $p['id'] ?>" data-toggle="tab">
                                                        <?php echo L($p['name']); ?>
                                                    </a>
                                                </li>
                                            <?php }
                                            ?>

                                        </ul>
                                        <div class="tab-content">
                                            <?php
                                            foreach ($pluginlist as $k => $p)
                                            {
                                                ?>
                                                <div class="tab-pane <?php echo $k == 0 ? 'active' : '' ?>" id="profile<?php echo $p['id'] ?>"></div>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div><!-- /widget-main -->
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button  data-dismiss="modal" class="btn btn-primary sure_js" onclick="setplugin()" type="button">确定</button>
                <button data-dismiss="modal" class="btn btn-default close_js"  type="button">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<script>
    $(function () {
        pid = $('.vhooklist').find('li').first().attr('rel');
        getvhook(pid, 'profile' + pid);
        $('.vhooklist').find('li').find('a').click(function () {
            var pid = $(this).parent().attr('rel');
            getvhook(pid, 'profile' + pid);
        });
    })
    function getvhook(pid, div)
    {

        $.ajax({
            type: "post",
            url: "<?php echo U('Content/Model/getvook'); ?>",
            data: {pid: pid},
            dataType: "json",
            success: function (data) {
                var html = '';
                $.each(data, function (i, item) {
                    html += '<lable class="col-sm-4 chk_lbl">';
                    html += '<input type="radio"  plugin="' + item.path + '/' + item.method + '" plugintxt="' + item.name + '"  class="ace " name="plugin_radio">';
                    html += '<span class = "lbl" > ' + item.name + ' </span>';
                    html += '</lable>';
                });
                $('#' + div).html(html);
            }

        });
    }

    $(function () {
        $('.sel_reg').change(function () {
            $('#reg').val($(this).val());
        });
    })

    function setplugin()
    {

        obj = $('input[name="plugin_radio"]:checked');
        $('#plugin').val(obj.attr('plugin'));
        $('#plugintxt').html(obj.attr('plugintxt'));

    }

</script>