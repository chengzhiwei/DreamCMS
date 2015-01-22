<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                推荐位列表
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">


            <div  style="padding-bottom: 10px;" class="col-xs-12 op_btn">
                <a class=" pull-right btn btn-xs btn-info" href="<?php echo U('Content/Position/add') ?>">
                    <b>添加推荐位</b>
                </a>
            </div>
            <!-- PAGE CONTENT BEGINS -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">
                                        ID
                                    </th>
                                    <th>推荐位名称</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($list as $v)
                                {
                                    $id = $v['id'];
                                    ?>
                                    <tr align="center">
                                        <td><?php echo $v['id']; ?></td>
                                        <td><?php echo $v['title']; ?></td>
                                        <td>
                                            <div class = "visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a class = "btn btn-xs btn-info" href = "<?php echo U('Content/Position/edit', array('id' => $v['id'])) ?>">
                                                    <i class = "icon-edit bigger-120"></i>
                                                </a>

                                                <a onclick="return confirm('确定要删除么？')" href = "<?php echo U('Content/Position/del', array('id' => $v['id'])) ?>" class = "btn btn-xs btn-danger">
                                                    <i class = "icon-trash bigger-120"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.sort').blur(function () {
            var id = $(this).attr('rel');
            var sort = $(this).val();
            $obj = $(this);
            $.ajax({
                type: 'POST',
                url: '<?php echo U('Content/Category/sort'); ?>',
                data: {id: id, sort: sort},
                dataType: 'text',
                success: function (data) {
                    if (data == '1')
                    {
                        $obj.css('border', 'solid 1px green');
                    }
                    else
                    {
                        $obj.css('border', 'solid 1px red');
                    }
                }

            });
        });
    })
</script>