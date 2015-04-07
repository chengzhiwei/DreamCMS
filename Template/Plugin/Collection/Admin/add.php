
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
                                <form id="Cform" method="post"  class="form-horizontal" action="<?php echo URL('Collection/Admin/testlist', '', 'Plugin.php') ?>">
                                    <div id="step-container" class="step-content row-fluid position-relative">
                                        <div id="step1" class="step-pane active">
                                            <div class="form-group">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">目标站编码</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="langcode" value="utf-8" autocomplete="off">
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">

                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">选择栏目</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <select id="cate" name="cate">
                                                            <?php
                                                            foreach ($category as $ca)
                                                            {
                                                                ?>
                                                                <option  value="<?php echo $ca['id']; ?>,<?php echo $ca['mid']; ?>">
                                                                    <?php
                                                                    if ($ca['deep'] != 0)
                                                                    {
                                                                        for ($i = 0; $i <= $ca['deep']; $i++)
                                                                        {
                                                                            echo "　　";
                                                                        }
                                                                    }
                                                                    echo $ca['title'];
                                                                    ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">采集名称</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="title" class="width-100" id="inputWarning">
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">列表页地址</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" name="listurl" class="width-100" id="inputWarning">
                                                        <i class="icon-leaf"></i>
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">
                                                    页码用{$page}代替
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label class="col-xs-12 col-sm-3 col-md-3 control-label no-padding-right" for="inputWarning">内容页规则</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <label class="col-xs-2 col-sm-2 control-label " for="inputWarning">对象</label>
                                                    <span class="block input-icon pull-left col-sm-4">
                                                        <input type="text" class="width-100 " name="listobj" id="inputWarning">
                                                    </span>
                                                    <label class="col-xs-2 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                                                    <span class="block input-icon pull-right col-sm-4">
                                                        <input type="text" name="listattr" class=" width-100 "/>
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline"> 获取内容页地址规则 </div>
                                            </div>




                                        </div>

                                        <div id="step2" class="step-pane">

                                            <div class="pull-left  col-xs-12 col-sm-3 ">
                                                <ul id="fieldlist" class="list-unstyled spaced2 col-xs-12 col-sm-12 control-label no-padding-right">

                                                </ul>
                                            </div>
                                            <div class="pull-left  col-xs-9  step2info">

                                                <div class="col-xs-12 col-sm-12 form-group">
                                                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning"  id="setwho">设置规则</label>
                                                    <div class="col-xs-12 col-sm-8">
                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">类型</label>
                                                            <span class="block input-icon pull-left col-sm-4">
                                                                <select class="datatype" id="fieldruletype" autocomplete="off">
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
                                                                <input type="text" class="width-100 " id="SingleObj">
                                                            </span>
                                                        </span>

                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                                                            <span class="block input-icon pull-left col-sm-4">
                                                                <input type="text" class="width-100 " id="SingleAttr">
                                                            </span>
                                                        </span>

                                                    </div>
                                                </div>


                                                <div class="muiltdiv">
                                                    <div class="col-xs-12 col-sm-12 form-group ">
                                                        <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">设置规则</label>
                                                        <div class="col-xs-12 col-sm-8">
                                                            <span class="block input-icon-right">
                                                                <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">列表对象</label>
                                                                <span class="block input-icon pull-left col-sm-4">
                                                                    <input type="text" class="width-100 " id="ListObj">
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="col-xs-12 col-sm-12 form-group ">
                                                    <button type="button" id="setrulebtn"  class=" btn-xs pull-right btn btn-success" >设置</button>

                                                </div>

                                            </div>

                                        </div>

                                        <div id="step3" class="step-pane">
                                            <div class="center">
                                                <h3 class="blue lighter">添加成功</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="hids">
                                        <input type="hidden" value="" id="nowsetfield"  />
                                    </div>
                                </form>
                                <hr />
                                <div class="row-fluid wizard-actions">
                                    <button onclick="testcollection()" class="btn " >
                                        <i class="icon-arrow-left"></i>
                                        测试采集
                                    </button>
                                    <button  class="btn btn-prev" disabled="disabled">
                                        <i class="icon-arrow-left"></i>
                                        上一步
                                    </button>

                                    <button data-last="Finish " class="btn btn-success btn-next">
                                        下一步
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


    <div id="HidListObjdata" style="display: none">
        <div class="col-xs-12 col-sm-12 form-group muiltdatadiv ">
            <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning"></label>
            <div class="col-xs-12 col-sm-8">

                <span class="block input-icon-right">
                    <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">数据名</label>
                    <span class="block pull-left col-sm-2">
                        <input type="text" name="dataname[]" class="width-100 " id="listdataname">
                    </span>
                </span>

                <span class="block input-icon-right">
                    <label class="col-xs-12 col-sm-1 control-label no-padding-right" for="inputWarning">对象</label>
                    <span class="block pull-left col-sm-3">
                        <input type="text" name="objname[]" class="width-100 " id="listdataobj">
                    </span>
                </span>

                <span class="block input-icon-right">
                    <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                    <span class="block pull-left col-sm-2">
                        <input type="text" name="attr[]" class="width-100 " id="listdataattr">
                    </span>
                </span>

            </div><a href="javascript:addrulelist()" class="icon-plus"></a>
        </div>

    </div>
    <script src="http://www.daimajiayuan.com/download/201312/yulan/ace/assets/js/ace-elements.min.js"></script>
    <script src="<?php echo __ROOT__ ?>/Template/Plugin/Collection/js/json2.js" ></script>
    <script>

                                        jQuery(function ($) {
                                            $('#fuelux-wizard').ace_wizard().on('change', function (e, info) {

                                                if (info.step == 2 && info.direction == 'previous')
                                                {
                                                    //修改表单提交地址
                                                    $('#Cform').attr('action', '<?php echo URL('Collection/Admin/testlist', '', 'Plugin.php'); ?>');
                                                    $('#Cform').attr('target', '_bank');
                                                }
                                                if (info.step == 2 && info.direction == 'next')
                                                {
                                                    var b;
                                                    $.ajax({
                                                        type: "post",
                                                        url: "<?php echo URL('Collection/Admin/add', '', 'Plugin.php'); ?>",
                                                        data: $("#Cform").serialize(),
                                                        dataType: "text",
                                                        async:false,
                                                        success: function (data) {
                                                           if(data=='OK')
                                                           {
                                                               b=true;
                                                           }
                                                           else
                                                           {
                                                               b=false;
                                                           }
                                                        }
                                                    });
                                                    if(!b)
                                                    {
                                                        alert('发生错误');
                                                        return false;
                                                    }
                                                }
                                                if (info.step == 1 && info.direction == 'next')
                                                {
                                                    $('#Cform').attr('action', '<?php echo URL('Collection/Admin/testpage', '', 'Plugin.php'); ?>');
                                                    $('#Cform').attr('target', '_bank');
                                                    var cateinfo = $('#cate').val().split(',');
                                                    $.ajax({
                                                        type: "post",
                                                        url: "<?php echo URL('Collection/Admin/getfields', '', 'Plugin.php'); ?>",
                                                        data: {mid: cateinfo[1]},
                                                        dataType: "json",
                                                        success: function (data) {
                                                            var html = '';
                                                            $.each(data, function (i, item) {
                                                                html += '<li><a href="javascript:void(0)" attr="' + item.fieldname + '" class="fieldlist">';
                                                                html += item.title;
                                                                html += '</a></li>';
                                                            });
                                                            $('#fieldlist').html(html);
                                                            BeginSetData($('#fieldlist').find('li:first').find('.fieldlist'));
                                                        }

                                                    });
                                                }
                                            });
                                        });
                                        $(function () {
                                            $('.muiltdiv').hide();
                                            $('.singlediv').show();
                                            $('.datatype').change(function () {
                                                if ($(this).val() == 1)
                                                {
                                                    setListShow();
                                                }
                                                else
                                                {
                                                    setSingleShow();
                                                }
                                            });

                                        });

                                        var Dataobj = {
                                            'type': 1,
                                            'obj': '',
                                            'val': new Array()
                                        };

                                        var singleData = {
                                            'obj': '',
                                            'attr': ''
                                        };

                                        var listData = {
                                            'data': '',
                                            'obj': '',
                                            'attr': ''
                                        };

                                        function BeginSetData(FieldObj)
                                        {
                                            $('#setwho').html('设置' + FieldObj.text());
                                            $('#nowsetfield').val(FieldObj.attr('attr'));
                                            //获取已经设置好的字段规则信息
                                            if ($('#' + FieldObj.attr('attr') + '_rule').length > 0)
                                            {
                                                ruleVal = JSON.parse($('#' + FieldObj.attr('attr') + '_rule').val());
                                                setData(ruleVal);
                                                if (ruleVal.type == 1)
                                                {
                                                    setListShow();
                                                } else
                                                {
                                                    setSingleShow();
                                                }
                                            }
                                            else
                                            {
                                                $('.muiltdiv').append($('#HidListObjdata').html());
                                                setSingleShow();
                                            }
                                        }

                                        $(function () {
                                            $(document).on('click', '.fieldlist', function () {

                                                BeginSetData($(this));

                                            });
                                            $('#setrulebtn').click(function () {
                                                Dataobj.type = $('#fieldruletype').val();
                                                nowsetfield = $('#nowsetfield').val();
                                                if ($('#fieldruletype').val() == 0)//0 单条数据 1 多条数据
                                                {
                                                    //获取对象和属性
                                                    Dataobj.obj = $('#SingleObj').val();
                                                    Dataobj.val[0] = new Array($('#SingleAttr').val())
                                                }
                                                else
                                                {
                                                    //获取多条数据名对象和属性
                                                    Dataobj.obj = $('#ListObj').val();
                                                    $('.muiltdiv').find(".muiltdatadiv").each(function (index, element) {
                                                        var data = new Array($(this).find('#listdataname').val(), $(this).find('#listdataobj').val(), $(this).find('#listdataattr').val());
                                                        Dataobj.val[index] = data;
                                                    });
                                                }
                                                var ruleJson = JSON.stringify(Dataobj);//序列化之后的值 存放到隐藏域。
                                                if ($('#' + nowsetfield + '_rule').length > 0)
                                                {
                                                    $('#' + nowsetfield + '_rule').val(ruleJson);
                                                }
                                                else
                                                {
                                                    $('#hids').append('<input type="hidden" value=\'' + ruleJson + '\' id="' + nowsetfield + '_rule" name="' + nowsetfield + '_rule" />')
                                                }
                                            });
                                        });

                                        function setSingleShow()
                                        {
                                            $('.muiltdiv').hide();
                                            $('.singlediv').show();
                                        }
                                        function setListShow()
                                        {
                                            $('.muiltdiv').show();
                                            $('.singlediv').hide();
                                        }

                                        function setData(dataobj)
                                        {
                                            $('#fieldruletype').val(dataobj.type);
                                            if (dataobj.type == 1)
                                            {
                                                //多数据
                                                $('.muiltdiv').find('.muiltdatadiv').remove();
                                                $('#ListObj').val(dataobj.obj);
                                                //不管有没有数据默认有一行
                                                if (dataobj.val.length != 0)
                                                {
                                                    objVal = dataobj.val[0];
                                                    $('.muiltdiv').append($('#HidListObjdata').html());
                                                    var HtmlObj = $('.muiltdiv').find(".muiltdatadiv:last");
                                                    HtmlObj.find('#listdataname').val(objVal[0]);
                                                    HtmlObj.find('#listdataobj').val(objVal[1]);
                                                    HtmlObj.find('#listdataattr').val(objVal[2]);

                                                }
                                                else
                                                {
                                                    $('.muiltdiv').append($('#HidListObjdata').html());
                                                }
                                                $.each(dataobj.val, function (i, v) {
                                                    if (i != 0)
                                                    {
                                                        $('.muiltdiv').append($('#HidListObjdata').html());
                                                        var HtmlObj = $('.muiltdiv').find(".muiltdatadiv:last");
                                                        HtmlObj.find('#listdataname').val(v[0]);
                                                        HtmlObj.find('#listdataobj').val(v[1]);
                                                        HtmlObj.find('#listdataattr').val(v[2]);

                                                    }
                                                });
                                            }
                                            else
                                            {
                                                $('#SingleObj').val(dataobj.obj);
                                                var vals = dataobj.val[0];
                                                $('#SingleAttr').val(vals[0]);
                                                //单条数据
                                            }
                                        }

                                        function addrulelist()
                                        {
                                            $('#HidListObjdata').find('.icon-plus').remove();
                                            $('.muiltdiv').append($('#HidListObjdata').html());
                                        }

                                        function testcollection()
                                        {
                                            $('#Cform').attr('target', '_bank');
                                            $('#Cform').submit();
                                        }
    </script>