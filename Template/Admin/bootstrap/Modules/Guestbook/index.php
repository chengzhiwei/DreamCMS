<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                留言本
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">



            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sample-table-1">
                            <thead>
                                <tr>

                                    <th class="center"> 用户名</th>
                                    <th>联系地址</th>
                                    <th>联系电话</th>
                                    <th>传真</th>
                                    <th>邮箱</th>
                                    <th>MSN</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($result as $r)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $r['username']; ?></td>
                                        <td><?php echo $r['address']; ?></td>
                                        <td><?php echo $r['code']; ?></td>
                                        <td><?php echo $r['telephone']; ?></td>
                                        <td><?php echo $r['fax']; ?></td>
                                        <td><?php echo $r['email']; ?></td>
                                        <td><?php echo $r['msn']; ?></td>
                                        <td>
                                            <a href="<?php echo U("del", array("id" => "$id")); ?>" onclick="return confirm('确定删除吗？')">删除</a>
                                            |
                                            <a href="javascript:;" class="show_info">查看详情</a>
                                        </td>

                                        <td>
                                            <div class = "visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a class = "btn btn-xs btn-info" href = "<?php echo U('Modules/Ad/editad', array('id' => $r['id'])) ?>">
                                                    <i class = "icon-edit bigger-120"></i>
                                                </a>

                                                <a onclick="return confirm('确定要删除么？')" href = "<?php echo U('Modules/Ad/delad', array('id' => $r['id'])) ?>" class = "btn btn-xs btn-danger">
                                                    <i class = "icon-trash bigger-120"></i>
                                                </a>
                                            </div>
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