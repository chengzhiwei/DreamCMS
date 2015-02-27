
<script src="<?php echo __ROOT__ ?>/Template/Plugin/Collection/js/fuelux.wizard.min.js" ></script>
<div class="page-content">
    <div class="page-header">
        <h1>
            采集管理
            <small>
                <i class="icon-double-angle-right"></i>
                添加采集
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-header widget-header-blue widget-header-flat">
                            <h4 class="lighter">向导</h4>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div data-target="#step-container" class="row-fluid" id="fuelux-wizard">
                                    <ul class="wizard-steps">
                                        <li class="active" data-target="#step1">
                                            <span class="step">1</span>
                                            <span class="title">设置列表页规则</span>
                                        </li>

                                        <li data-target="#step2">
                                            <span class="step">2</span>
                                            <span class="title">设置内容页规则</span>
                                        </li>

                                        <li data-target="#step3">
                                            <span class="step">3</span>
                                            <span class="title">设置完成 </span>
                                        </li>
                                    </ul>
                                </div>

                                <hr>
                                <div id="step-container" class="step-content row-fluid position-relative">
                                    <div id="step1" class="step-pane active">

                                        <form id="sample-form" class="form-horizontal">



                                            <div class="form-group has-warning">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">内容模型</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <select>
                                                            <?php
                                                            foreach ($modellist as $li)
                                                            {
                                                                ?>
                                                                <option><?php echo L($li['title']);?></option>
                                                                <?php }
                                                            ?>

                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">

                                                </div>
                                            </div>

                                            <div class="form-group has-warning">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">采集名称</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="width-100" id="inputWarning">
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">

                                                </div>
                                            </div>

                                            <div class="form-group has-warning">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">列表页地址</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="width-100" id="inputWarning">
                                                        <i class="icon-leaf"></i>
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">
                                                    页码用{$page}代替
                                                </div>
                                            </div>

                                            <div class="form-group has-error">
                                                <label class="col-xs-12 col-sm-3 col-md-3 control-label no-padding-right" for="inputWarning">内容页规则</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <label class="col-xs-2 col-sm-2 control-label " for="inputWarning">对象</label>
                                                    <span class="block input-icon pull-left col-sm-4">
                                                        <input type="text" class="width-100 " id="inputWarning">
                                                    </span>
                                                    <label class="col-xs-2 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                                                    <span class="block input-icon pull-right col-sm-4">
                                                        <select class=" width-100 ">
                                                            <option>href</option>
                                                            <option>html</option>
                                                            <option>text</option>

                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline"> 获取内容页地址规则 </div>
                                            </div>

                                        </form>


                                    </div>

                                    <div id="step2" class="step-pane">
                                        <form id="sample-form" class="form-horizontal ">
                                            <div class="pull-left  col-xs-12 col-sm-3 ">
                                                <ul class="list-unstyled spaced2 col-xs-12 col-sm-12 control-label no-padding-right">
                                                    <a href="javascript:void(0)" rel="title"  class="fieldlist"><li>标题 </li></a>
                                                    <li>内容</li>
                                                    <li>缩略图</li>
                                                    <li>标题</li>
                                                    <li>标题</li>
                                                    <li>标题</li>
                                                    <li>标题</li>
                                                </ul>
                                            </div>
                                            <div class="pull-left  col-xs-9  has-warning">

                                                <div class="col-xs-12 col-sm-12 form-group">
                                                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning"  id="setwho">设置规则</label>
                                                    <div class="col-xs-12 col-sm-8">
                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">对象</label>
                                                            <span class="block input-icon pull-left col-sm-4">
                                                                <select class="datatype" autocomplete="off">
                                                                    <option value="0">单条数据</option>
                                                                    <option value="1">多条数据</option>
                                                                </select>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 form-group singlediv">
                                                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">设置规则</label>
                                                    <div class="col-xs-12 col-sm-8">
                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">对象</label>
                                                            <span class="block input-icon pull-left col-sm-4">
                                                                <input type="text" class="width-100 " id="inputWarning">
                                                            </span>
                                                        </span>

                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                                                            <span class="block input-icon pull-left col-sm-4">
                                                                <input type="text" class="width-100 " id="inputWarning">
                                                            </span>
                                                        </span>

                                                    </div>
                                                </div>


                                                <div class="col-xs-12 col-sm-12 form-group muiltdiv">
                                                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">设置规则</label>
                                                    <div class="col-xs-12 col-sm-8">
                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">列表对象</label>
                                                            <span class="block input-icon pull-left col-sm-4">
                                                                <input type="text" class="width-100 " id="inputWarning">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>



                                                <div class="col-xs-12 col-sm-12 form-group muiltdiv">
                                                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning"></label>
                                                    <div class="col-xs-12 col-sm-8">

                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">数据名</label>
                                                            <span class="block input-icon pull-left col-sm-2">
                                                                <input type="text" class="width-100 " id="inputWarning">
                                                            </span>
                                                        </span>

                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-1 control-label no-padding-right" for="inputWarning">对象</label>
                                                            <span class="block input-icon pull-left col-sm-3">
                                                                <input type="text" class="width-100 " id="inputWarning">
                                                            </span>
                                                        </span>

                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                                                            <span class="block input-icon pull-left col-sm-2">
                                                                <input type="text" class="width-100 " id="inputWarning">
                                                            </span>
                                                        </span>

                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 form-group ">
                                                    <button type="button" id="setrulebtn"  class="pull-right btn btn-success" >确定</button>

                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                    <div id="step3" class="step-pane">
                                        <div class="center">
                                            <h3 class="blue lighter">This is step 3</h3>
                                        </div>
                                    </div>


                                </div>

                                <hr>
                                <div class="row-fluid wizard-actions">
                                    <button class="btn btn-prev" disabled="disabled">
                                        <i class="icon-arrow-left"></i>
                                        Prev
                                    </button>

                                    <button data-last="Finish " class="btn btn-success btn-next">
                                        Next
                                        <i class="icon-arrow-right icon-on-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="hids">
        <input type="hidden" value="" id="nowsetfield" />
        <input type="hidden" value="" id="title_type" name="title_type" />
        <input type="hidden" value="" id="title_value" name="title_value" />
    </div>

    <script src="http://www.daimajiayuan.com/download/201312/yulan/ace/assets/js/ace-elements.min.js"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $('#fuelux-wizard').ace_wizard();
        })
        $(function () {
            $('.muiltdiv').hide();
            $('.singlediv').show();
            $('.datatype').change(function () {
                if ($(this).val() == 1)
                {
                    $('.muiltdiv').show();
                    $('.singlediv').hide();
                }
                else
                {
                    $('.muiltdiv').hide();
                    $('.singlediv').show();
                }
            });

        });
        $(function () {
            $('.fieldlist').click(function () {
                $('#setwho').html('设置' + $(this).text());

            });
            $('#setrulebtn').click(function () {
                nowsetfield = $('#nowsetfield').val();
                if ($('#' + nowsetfield + '_type').length > 0)
                {
                    $('#' + nowsetfield + '_type').val('');
                }
                else
                {
                    $('#hids').append('<input type="hidden" value="" id="' + nowsetfield + '_type" name="' + nowsetfield + '_type" />')
                }
            });
        })
    </script>