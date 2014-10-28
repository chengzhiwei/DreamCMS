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
                                foreach ($modellist as $li)
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
                                            <a href="#"><?php echo L($li['langconf']); ?></a>
                                        </td>

                                        <td><?php echo L($admingroup[$li['group']]['langconf']); ?></td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="<?php echo U('Content/Model/fields', array('mid' => $li['id'])) ?>">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>



                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /span -->
            </div><!-- /row -->








        </div><!-- /.col -->
    </div><!-- /.row -->
</div>