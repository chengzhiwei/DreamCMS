
<style>
    .modal-content{border-radius:5px;}
    .modal-body {
        max-height: 800px;
    }fieldset{ padding-bottom: 20px;}
    .form-horizontal .control-label .chk_lbl{text-align:left}
</style>
<script>
    $(function () {
        $("input[name='type']").change(function () {
            val = $("input[name='type']:checked").val();
            if (val == 0)
            {
                $('.out_link_div').hide();
                $('.in_link_div').show();
            }
            else
            {
                $('.out_link_div').show();
                $('.in_link_div').hide();
            }
        });

    });
</script>
<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                修改栏目
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <form role="form" class="form-horizontal" method="post">
                <input type="hidden" value="<?php echo $cateinfo['id'];?>" name="id" />
                <div class="form-group">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('CATE_TYPE'); ?> </label>

                    <div class="col-sm-9">
                        <label>
                            <input type="radio" disabled="disabled" <?php echo $cateinfo['type']==0?"checked='checked'":""?> class="ace disabled" value="0" name="type">
                            <span class="lbl"> <?php echo L('IN_LINK'); ?></span>
                        </label>

                        <label>
                            <input type="radio" <?php echo $cateinfo['type']==1?"checked='checked'":""?> disabled="disabled" class="ace disabled" name="type" value="1">
                            <span class="lbl"> <?php echo L('OUT_LINK'); ?></span>
                        </label>

                    </div>
                </div>
                <div class="form-group in_link_div" >
                    <label  class="col-sm-3 control-label no-padding-right"> <?php echo L('CATE_MODEL'); ?> </label>

                    <div class="col-sm-9">

                        <select disabled="disabled"  name="mid" id="modsel" class="col-sm-5 disabled">
                            <?php
                            foreach ($Modellist as $mli)
                            {
                                ?>
                            <option <?php echo $cateinfo['mid']==$mli['id']?"selected='selected'":""?> value="<?php echo $mli['id'] ?>"><?php echo $mli['title'] ?></option>
                                <?php
                            }
                            ?>
                                <option value="-1" <?php echo $cateinfo['mid']==-1?"selected='selected'":""?>><?php echo L('MDL_PAGE'); ?></option>
                        </select>

                    </div>
                </div>
                <div class="form-group in_link_div">
                    <label class="col-sm-3 control-label no-padding-right"> <?php echo L('PARENT_CATE'); ?> </label>

                    <div class="col-sm-9">
                        <select name="pid"  class="col-sm-5">
                            <option value="0"><?php echo L('FIRST_CATE'); ?></option>
                            <?php
                            foreach ($category as $ca)
                            {
                                ?>
                                <option <?php echo $cateinfo['pid']==$ca['id']?"selected='selected'":""?>  value="<?php echo $ca['id']; ?>">
                                    <?php
                                    if ($ca['deep'] != 0)
                                    {
                                        for ($i = 0; $i <= $ca['deep']; $i++)
                                        {
                                            echo "　　";
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
                
                <div class="form-group ">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('CATE_NAME'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" value="<?php echo $cateinfo['title']?>" name="title" class="col-xs-10 col-sm-5"  id="form-field-1">
                    </div>
                </div>
                
                
                <div class="form-group out_link_div" style=" display: none">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('LINK_URL'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="link" value="http://" class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>


                

                <div class="form-group in_link_div">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('CATE_TMPL'); ?> </label>

                    <div class="col-sm-9">

                        <select name="catetmpl" id=""  class="col-sm-5">
                            <?php
                            foreach ($tmpl['catetmpl'] as $t)
                            {
                                ?>
                                <option <?php echo $cateinfo['catetmpl']==$t?"selected='selected'":""?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                    </div>
                </div>

                <div class="form-group in_link_div">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('LIST_TMPL'); ?> </label>

                    <div class="col-sm-9">
                        <select name="listtmpl" id="" class="col-sm-5">
                            <?php
                            foreach ($tmpl['listtmpl'] as $t)
                            {
                                ?>
                                <option <?php echo $cateinfo['listtmpl']==$t?"selected='selected'":""?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                    </div>
                </div>


                <div class="form-group in_link_div">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('VIEW_TMPL'); ?> </label>

                    <div class="col-sm-9">
                        <select name="newstmpl" id="" class="col-sm-5 ">
                            <?php
                            foreach ($tmpl['newstmpl'] as $t)
                            {
                                ?>
                                <option  <?php echo $cateinfo['newstmpl']==$t?"selected='selected'":""?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>
                </div>

                <div class="form-group in_link_div">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('PAGE_TMPL'); ?> </label>

                    <div class="col-sm-9">
                        <select name="pagetmpl" id=""  class="col-sm-5">
                            <?php
                            foreach ($tmpl['pagetmpl'] as $t)
                            {
                                ?>
                                <option <?php echo $cateinfo['pagetmpl']==$t?"selected='selected'":""?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group in_link_div ">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('MENUSHOW'); ?> </label>

                    <div class="col-sm-9">
                        <input type="checkbox" <?php echo $cateinfo['menushow']==1?"checked='checked'":""?> value="1" name="menushow"  class="chkall ace  ace-checkbox-2"  />
                            <label class="lbl" for="ace-settings-breadcrumbs"></label>
                    </div>
                </div>
                  
                <div class="form-group in_link_div ">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('KEYWORD'); ?> </label>

                    <div class="col-sm-9">
                        <input type="text" name="keyword" class="col-xs-10 col-sm-5" placeholder="" id="form-field-1">
                    </div>
                </div>

                <div class="form-group in_link_div">
                    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> <?php echo L('DESC'); ?> </label>

                    <div class="col-sm-9">
                        <textarea class="col-sm-5" name="desc"></textarea>
                    </div>
                </div>

                <div class="space-4"></div>



                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-info">
                            <i class="icon-ok bigger-110"></i>
                            <?php echo L('ADD');?>
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button type="reset" class="btn">
                            <i class="icon-undo bigger-110"></i>
                            <?php echo L('RESET');?>
                        </button>
                    </div>
                </div>

                <div class="hr hr-24"></div>

            </form>


        </div><!-- /.col -->
    </div><!-- /.row -->
</div>