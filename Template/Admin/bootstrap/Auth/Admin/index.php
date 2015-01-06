<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                管理员列表
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="row">
                <div class="col-xs-12 " style="padding-bottom: 10px;"><a href="<?php echo U('Auth/Admin/addadmin'); ?>" class="  pull-right btn btn-xs btn-info" ><?php echo L('ADD_ADMIN'); ?></a></div>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <input type="checkbox" class="ace">
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th><?php echo L('USERNAME'); ?></th>
                                    <th><?php echo L('ROLE'); ?></th>


                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($list as $li)
                                {
                                    ?>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#"><?php echo $li['username']; ?></a>
                                        </td>

                                        <td><?php echo L($admingroup[$li['group']]['langconf']); ?></td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a class="btn btn-xs btn-danger" href="javascript:deladmin(<?php echo$li['id']; ?>)">
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
    function deladmin(id)
    {
        if (confirm('<?php echo L('IS_TRUE_ADMIN'); ?>'))
        {
            window.location.href = '<?php echo __APP__; ?>?s=Auth/Admin/deladmin&id=' + id;
        }
    }
</script>