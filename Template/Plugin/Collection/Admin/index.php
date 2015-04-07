<div class="page-content">

    <div class="row">


        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th>采集标题</th>
                                    <th>栏目</th>
                                    <th>操作</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($colList as $k => $cl)
                                {
                                    ?>
                                    <tr>



                                        <td>
                                            <a href="#"><?php echo $cl['title']; ?></a>
                                        </td>

                                        <td><?php echo $cl['cateinfo']['title']; ?></td>

                                        <td>
                                            <a class=" pop  btn btn-xs btn-info " rel="<?php echo $cl['id']; ?>"  href="javascript:void(0)" >
                                                <b>采集</b>
                                            </a>

                                            <a class=" btn btn-xs btn-danger" href="<?php echo U('Content/Content/add', array('cid' => I('get.cid'))); ?>">
                                                <b>删除</b>
                                            </a>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            tmp = '<div id="popcontent">\n\
                    <div>\n\
                        选择<select id="coltype"><option value=0>采集所有</option><option value=1>按页数采集</option> </select>\n\
                     </div>\n\
                      <div style=" height: 10px"></div>\n\
                        <div>\n\
                            开始<input type="text" id="startpage" style="width: 40px;">-截止<input type="text"  id="stoppage" style="width: 40px;"></div><div style=" height: 10px">\n\
                        </div><div ><a class="btn btn-xs btn-info" onclick="startCJ()">确定</a>\n\
                    </div>\n\
                </div>\n\
                <input type="hidden" value="" name="cid" id="cid"/>';
            $(".pop").popover({
                html: true,
                content: tmp
            });
            $('.pop').on('shown.bs.popover', function () {
                $('#cid').val($(this).attr('rel'));
            });

        });

        function startCJ()
        {
            CType = $('#coltype').val();
            SP = $('#startpage').val();
            TP = $('#stoppage').val();
            Cid = $('#cid').val();
            window.location.href = '<?php echo __APP__?>/Collection/Admin/startcollection?cid='+Cid+'&ctype='+CType+'sp='+SP+'&tp='+TP;
        }
    </script>



