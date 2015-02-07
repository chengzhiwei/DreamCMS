<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                模块管理
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="row">

                <div class="col-xs-12 op_btn" style="padding-bottom: 10px;">

                    <a href="<?php echo U('Auth/Permissions/addmodule'); ?>" class=" pull-right btn btn-xs btn-info ">
                        <b>添加模块</b>
                    </a>

                </div>


                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th><?php echo L('MODULENAME'); ?></th>
                                    <th><?php echo L('GROUPNAME'); ?></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($modulelist as $ml)
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo L($ml['title']); ?>
                                        </td>

                                        <td><?php echo L($grouplist[$ml['gid']]['title']); ?></td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a onclick="return confirm('<?php echo L('SUREDELETE')?>')" href="<?php echo U('Auth/Permissions/delgroup',array('id'=>$li['id']))?>" class="btn btn-xs btn-info">
                                                    <i class="icon-edit bigger-120"></i>
                                                </a>

                                                <a  href="<?php echo U('Auth/Permissions/editgroup',array('id'=>$li['id']))?>" class="btn btn-xs btn-danger">
                                                    <i class="icon-trash bigger-120"></i>
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