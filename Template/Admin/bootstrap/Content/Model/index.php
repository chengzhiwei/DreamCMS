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

                                    <th><?php echo L('MODEL_NAME'); ?></th>


                                    <th class="center"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($modellist as $li)
                                {
                                    ?>
                                    <tr>

                                        <td>
                                            <a href="<?php echo U('Content/Model/fields', array('mid' => $li['id'])) ?>"><?php echo L($li['langconf']); ?></a>
                                        </td>

                                        <td class="center">
                                            <a href="<?php echo U('Content/Model/fields', array('mid' => $li['id'])) ?>">字段管理</a>
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