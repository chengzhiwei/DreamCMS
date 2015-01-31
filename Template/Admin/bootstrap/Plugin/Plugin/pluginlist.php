<style>
    .profile-activity .tools{display:block;}

    .modal-content{border-radius:5px;}
    .modal-body {
        max-height: 800px;
    }fieldset{ padding-bottom: 20px;}
    .form-horizontal .control-label .chk_lbl{text-align:left}
</style>
<script>
    $(function () {
        $('#install_plugin').on('click', function () {
            $(this).html('loading');
        });
    });

</script>
<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                插件列表
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="widget-body">
                <div class="widget-main padding-8">
                    <div  >
                        <div class="profile-feed" id="profile-feed-1" >

                            <?php
                            foreach ($plugin_arr as $k => $p)
                            {
                                ?>
                                <div class="profile-activity clearfix">
                                    <div>

                                        <img class="pull-left   no-hover" src="<?php echo __ROOT__ ?>/Template/Plugin/<?php echo (string) $p->plugin ?>/Res/thumb.png" />
                                        <a href="#" class="user"> <?php echo L((String) $p->name); ?> </a>
                                        作者：<?php echo $p_arr['author'] ?> EMAIL：<a href="mailto"><?php echo $p_arr['contact'] ?></a>


                                        <div class="time">
                                            <?php echo L((String) $p->desc); ?>
                                        </div>
                                    </div>

                                    <div class="tools action-buttons">
                                        <?php
                                        if (key_exists((string) $p->plugin, $plugin_install))
                                        {
                                            ?>
                                            <a  class="btn btn-xs btn-warning modal_btn" href="javascript:void(0)" rel="<?php echo $plugin_install[(string) $p->plugin]['id'] ?>"  >
                                                配置
                                            </a>
                                            <a class="btn btn-xs btn-danger" href="javascript:uninstall('<?php echo (string) $p->plugin ?>')">
                                                卸载
                                            </a>
                                            <?php
                                        } else
                                        {
                                            ?>
                                            <a class="btn btn-xs btn-success" id="install_plugin" href="<?php echo U('Plugin/Plugin/install', array('plugin' => (String) $p->plugin)) ?>" >
                                                安装
                                            </a>
                                            <a class="btn btn-xs btn-danger" href="#">
                                                删除
                                            </a>
                                            <?php
                                        }
                                        ?>



                                    </div>
                                </div>
                            <?php }
                            ?>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<form id="configform">
    <div class="modal fade bs-example-modal-lg" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button data-dismiss="modal" class="close close_js" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 id="myLargeModalLabel" class="modal-title">配置插件</h4>
                </div>
                <div style=" padding: 10px 20px 0 20px;color: green" >选中状态为启用</div>
                <div class="modal-body" >
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="widget-header">
                            <h4 class="lighter smaller">
                                <i class="icon-rss orange"></i>
                                百度编辑器
                            </h4>

                            <div class="widget-toolbar no-border">
                                <ul id="recent-tab" class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#task-tab" data-toggle="tab">插件前台</a>
                                    </li>

                                    <li class="">
                                        <a href="#member-tab" data-toggle="tab">插件后台</a>
                                    </li>

                                    <li class="">
                                        <a href="#vhookpane" data-toggle="tab">视图钩子</a>
                                    </li>
                                    <li class="">
                                        <a href="#bhookpane" data-toggle="tab">业务钩子</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main padding-4">
                                <div class="tab-content padding-8 overflow-visible">
                                    <div class="tab-pane active" id="task-tab">



                                        <div class="tabbable tabs-left">
                                            <ul id="myTab3" class="nav nav-tabs">
                                                <li  class="active">
                                                    <a href="#home3" data-toggle="tab">
                                                        插件首页
                                                    </a>
                                                </li>

                                                <li class="">
                                                    <a href="#profile3" data-toggle="tab">
                                                        插件列表
                                                    </a>
                                                </li>


                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="home3">
                                                    <div><u>JS</u></div>
                                                    <div>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace " value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace " value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>

                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>

                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>

                                                    </div>

                                                    <div style="clear:both"></div>

                                                    <div><u>CSS</u></div>
                                                    <div>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>

                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>

                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                        <lable class="col-sm-4 chk_lbl">
                                                            <input type="checkbox" txtval="添加文章" class="ace authlist" value="13" name="authlist[]">
                                                            <span class="lbl">jquery.min.js </span>
                                                        </lable>
                                                    </div>



                                                </div>

                                                <div class="tab-pane" id="profile3">
                                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
                                                </div>


                                            </div>
                                        </div>




                                    </div>

                                    <div class="tab-pane" id="member-tab">

                                    </div><!-- member-tab -->

                                    <div class="tab-pane" id="vhookpane">

                                        <div class="tabbable ">

                                        </div>


                                    </div>

                                    <div class="tab-pane" id="bhookpane">

                                        <div class="tabbable ">

                                        </div>
                                    </div>
                                </div>
                            </div><!-- /widget-main -->
                        </div>

                    </div>
                </div>
                <input type="hidden" value="" name="pid" id="configpid" />
                <div class="modal-footer">
                    <button   class="btn btn-primary sure_js" type="button">确定</button>
                    <button data-dismiss="modal" class="btn btn-default close_js"  type="button">取消</button>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
</form>
<script>

    $(function () {
        $('.modal_btn').click(function () {
            pid = $(this).attr('rel');
            $('#configpid').val(pid);
            $.ajax({
                type: 'POST',
                url: '<?php echo U('Plugin/Plugin/getconfigure'); ?>',
                data: {pid: pid},
                dataType: 'json',
                success: function (data) {
                    $('#myModal').modal('show');
                    var str = '<div class="tab-content">';
                    $.each(data.vhooklist, function (i, item) {
                        ischk = '';
                        if (item.status == 1)
                        {
                            ischk = 'checked="checked"';
                        }
                        str += '<lable class="col-sm-4 chk_lbl">\n\
                                <input type="checkbox"  ' + ischk + ' value="' + item.id + '"  class="ace ace-checkbox-2" name="vhookids[]">\n\
                                <span class="lbl">' + item.name + ' </span>\n\
                                </lable>';
                    });
                    str += '</div>';
                    $('#vhookpane').find('.tabbable').html(str);
                }

            });
        });
        $('.sure_js').click(function () {
            data = $("#configform").serialize()
            $.ajax({
                type: 'POST',
                url: '<?php echo U('Plugin/Plugin/doconfigure'); ?>',
                data: data,
                dataType: 'json',
                success: function (result) {

                }
            });
        });
    });



    function uninstall(file)
    {
        if (confirm('<?php echo L('IS_TRUE_UNINSTALL') ?>'))
        {
            window.location.href = '<?php echo __APP__ ?>?s=Plugin/Plugin/uninstall&file=' + file;
        }
    }

</script>