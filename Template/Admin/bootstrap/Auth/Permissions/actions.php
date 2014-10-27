<style>
    legend{font-size: 13px; font-weight: bolder}
    fieldset{ padding-bottom: 20px;}
    fieldset  lable{ line-height: 34px;}
</style>
<div class="page-content">
    <div class="page-header">
        <h1>
            权限列表
        </h1>
    </div><!-- /.page-header -->

    <div class="row">

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            foreach ($grouplist as $key => $g)
            {
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" aria-expanded="true" aria-controls="collapse<?php echo $key; ?>">
                                <?php echo L($g['langconf']); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $key; ?>" class="panel-collapse collapse <?php
                    if ($key == 0)
                    {
                        echo 'in';
                    }
                    ?>" role="tabpanel">
                        <div class="panel-body">
                            <?php
                            foreach ($ctllist[$g['id']] as $ct)
                            {
                                ?>
                                <fieldset class="control-label">
                                    <legend><?php echo L($ct['langconf']); ?></legend>
                                    <?php
                                    foreach ($actlist[$ct['id']] as $al)
                                    {
                                        ?>
                                        <lable class="col-sm-2 "><?php echo L($al['langconf']); ?> <a href="#" class="icon-remove"></a> <a href="#" class="icon-edit"></a></lable>
                                        <?php }
                                        ?>
                                </fieldset>
                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            <?php }
            ?>

        </div>

    </div>

</div>

