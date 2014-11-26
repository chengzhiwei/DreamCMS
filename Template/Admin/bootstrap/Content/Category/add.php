
<style>
    .modal-content{border-radius:5px;}
    .modal-body {
        max-height: 800px;
    }fieldset{ padding-bottom: 20px;}
    .form-horizontal .control-label .chk_lbl{text-align:left}
</style>

<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                添加栏目
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <form role="form" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 栏目类型 </label>

                    <div class="col-sm-9">
                        <label>
                            <input type="radio" class="ace" name="form-field-radio" checked="checked">
                            <span class="lbl"> 内部链接</span>
                        </label>

                        <label>
                            <input type="radio" class="ace" name="form-field-radio">
                            <span class="lbl"> 外部连接链接</span>
                        </label>

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 栏目模型 </label>

                    <div class="col-sm-9">

                        <select name="mid" id="modsel" class="col-sm-5">
                            <?php
                            foreach ($Modellist as $mli)
                            {
                                ?>
                                <option value="<?php echo $mli['id'] ?>"><?php echo $mli['title'] ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 栏目名 </label>

                    <div class="col-sm-9">
                        <input type="text" name="langconf" class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>
                <div class="form-group hidden">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 链接地址 </label>

                    <div class="col-sm-9">
                        <input type="text" name="langconf" value="http://" class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>


                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 父级栏目 </label>

                    <div class="col-sm-9">
                        <select name="pid" id="" class="col-sm-5">
                            <option value="0">顶级栏目</option>
                            <?php
                            foreach ($category as $ca)
                            {
                                ?>
                                <option value="<?php echo $ca['id']; ?>">
                                    <?php
                                    if ($ca['deep'] != 0)
                                    {
                                        for ($i = 0; $i <= $ca['deep']; $i++)
                                        {
                                            echo "——";
                                        }
                                    }
                                    echo $ca['title'];
                                    ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 栏目模板 </label>

                    <div class="col-sm-9">

                        <select name="catetmpl" id=""  class="col-sm-5">
                            <?php
                            foreach ($catetmpl as $t)
                            {
                                ?>
                                <option value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 列表模板 </label>

                    <div class="col-sm-9">
                        <select name="listtmpl" id="" class="col-sm-5">
                            <?php
                            foreach ($listtmpl as $t)
                            {
                                ?>
                                <option value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 文章模板 </label>

                    <div class="col-sm-9">
                        <select name="newstmpl" id="" class="col-sm-5 ">
                            <?php
                            foreach ($newstmpl as $t)
                            {
                                ?>
                                <option value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 单页面模板 </label>

                    <div class="col-sm-9">
                        <select name="pagetmpl" id=""  class="col-sm-5">
                            <?php
                            foreach ($pagetmpl as $t)
                            {
                                ?>
                                <option value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 关键字 </label>

                    <div class="col-sm-9">
                        <input type="text" name="langconf" class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> 描述 </label>

                    <div class="col-sm-9">
                        <textarea class="col-sm-5"></textarea>
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


        </div><!-- /.col -->
    </div><!-- /.row -->
</div>