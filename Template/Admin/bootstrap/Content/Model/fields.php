<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                字段管理
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12 " style="padding-bottom: 10px;">  
            <a href="<?php echo U('Content/Model/addfield', array('mid' => I('mid'))); ?>" class="  pull-right btn btn-xs btn-info" >
                添加字段
            </a>
        </div>
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
                                    <th class="center">排序</th>
                                    <th>字段名</th>


                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($fields as $f)
                                {
                                    ?>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td class="center">
                                            <input type="text" fid='<?php echo $f['id']; ?>' value='<?php echo $f['sort']; ?>' class='fieldsort' style=" width: 40px;" />
                                        </td>
                                        <td> <?php echo l($f['langconf']); ?></td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                <a class="btn btn-xs btn-info" href= '<?php echo U('Content/Model/editfield', array('id' => $f['id'])) ?>'>
                                                    <i class="icon-edit bigger-120"></i>
                                                </a>

                                                <a class="btn btn-xs btn-danger" onclick='return confirm("<?php echo L('SURE_DELETE');?>")' href="<?php echo U('Content/Model/delfield', array('id' => $f['id'])) ?>">
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
                    </div><!-- /.table-responsive -->
                </div><!-- /span -->
            </div><!-- /row -->


        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
<script>
    $(function () {
        $('.fieldsort').blur(function () {
            var fid = $(this).attr('fid');
            var sort = $(this).val();
            $obj = $(this);
            $.ajax({
                type: 'POST',
                url: '<?php echo U('Content/Model/fieldsort'); ?>',
                data: {fid: fid, sort: sort},
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