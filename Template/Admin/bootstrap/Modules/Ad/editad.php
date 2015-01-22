<div class="page-content">
    <div class="page-header">
        <h1>
            <small>
                <i class="icon-double-angle-right"></i>
                添加广告
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $adinfo['id']?>" />
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('ADTYPE'); ?> </label>

                    <div class="col-sm-9">
                        <select name="tid">
                            <?php
                            foreach ($adtype as $t)
                            {
                                ?>
                                <option <?php if ($t['id'] == $info['tid'])
                            { ?> selected <?php } ?> value="<?php echo $t['id']; ?>"><?php echo $t['title']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('ADNAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php echo $adinfo['title'] ?>" class="col-xs-10 col-sm-5" placeholder="<?php echo L('ADNAME'); ?>" id="form-field-1">
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('LINK'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" value="<?php echo $adinfo['href'] ?>" name="href" class="col-xs-10 col-sm-5" placeholder="<?php echo L('LINK'); ?>" id="form-field-1">
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('IMAGE'); ?> </label>

                    <div class="col-sm-9">
                        <input name="img" id="image" type="file" />
                        <?php
                        if ($adinfo['img'] != '')
                        {
                            ?>
                            <img src="<?php echo __ROOT__ . '/' . $adinfo['img']; ?>" style="width: 200px;height: 100px">
                        <?php }
                        ?>
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info">
                            <i class="icon-ok bigger-110"></i>
                            Submit
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button type="reset" class="btn">
                            <i class="icon-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>

                <div class="hr hr-24"></div>

            </form>
        </div>
    </div>
</div>

