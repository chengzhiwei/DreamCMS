<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                分组管理
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="row">

                <div class="col-xs-12 op_btn" style="padding-bottom: 10px;">

                    <a href="<?php echo U('Auth/Permissions/addgroup'); ?>" class=" pull-right btn btn-xs btn-info ">
                        <b>添加分组</b>
                    </a>

                </div>


                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th><?php echo L('SORT'); ?></th>
                                    <th><?php echo L('GROUPNAME'); ?></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($grouplist as $li)
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="text" rel="<?php echo $li['id']; ?>" value="<?php echo $li['sort']; ?>" class="sort" style=" width: 40px;" />
                                        </td>

                                        <td><?php echo L($li['title']); ?></td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <button class="btn btn-xs btn-info">
                                                    <i class="icon-edit bigger-120"></i>
                                                </button>

                                                <button class="btn btn-xs btn-danger">
                                                    <i class="icon-trash bigger-120"></i>
                                                </button>


                                            </div>

                                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                <div class="inline position-relative">
                                                    <button data-toggle="dropdown" class="btn btn-minier btn-primary dropdown-toggle">
                                                        <i class="icon-cog icon-only bigger-110"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <a title="" data-rel="tooltip" class="tooltip-info" href="#" data-original-title="View">
                                                                <span class="blue">
                                                                    <i class="icon-zoom-in bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a title="" data-rel="tooltip" class="tooltip-success" href="#" data-original-title="Edit">
                                                                <span class="green">
                                                                    <i class="icon-edit bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a title="" data-rel="tooltip" class="tooltip-error" href="#" data-original-title="Delete">
                                                                <span class="red">
                                                                    <i class="icon-trash bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
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
                url: '<?php echo U('Auth/Permissions/sortgroup'); ?>',
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