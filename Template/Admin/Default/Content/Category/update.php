<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加栏目</title>
        <script>
            var base_js = '<?php echo JS_PATH; ?>';
        </script>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>add_txt.css"/>
        <script type="text/javascript" src="<?php echo JS_PATH ?>jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH ?>module/seajs/2.2.1/sea.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH ?>module/seajsConfig.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH ?>app/add.js"></script>
    </head>
    <body class="marg add_txt">

        <form action="" method="post">
            <table class="t_table add_now">
                <tr>
                    <td> <a href="javascript:void(0)" class="switch current"><span>常规信息</span></a></td>
                </tr>
            </table>
            <!-- 
             <table class="t_table box add_box">
                 <col width="8%"/>
                 <col width="38%"/>
                 <col width="6%"/>
                 <col width="48%"/>
                 <tr>
                     <td>栏目模型：</td>
                     <td colspan="3">
                         <select name="mid" id="" style="width: 220px">
            <?php
            foreach ($modulelist as $mli) {
                ?>
                                             <option value="<?php echo $mli['id'] ?>" <?php if ($mli['id'] == $result['mid']) { ?> selected <?php } ?>><?php echo $mli['title'] ?></option>
                <?php
            }
            ?>
                         </select>
                     </td>
                 </tr>
                 <tr>
                     <td > 栏目名：</td>
                     <td><input name="title" type="text" id="title" value="<?php echo $result['title']; ?>" style="width: 420px" /></td>
                     <td></td>
                     <td ></td>
                 </tr>
                 <tr>
                     <td>父级栏目：</td>
                     <td colspan="3">
                         <select name="pid" id="" style="width: 220px">
                             <option value="0">顶级栏目</option>
            <?php
            foreach ($category as $ca) {
                ?>
                                             <option value="<?php echo $ca['id']; ?>"  <?php if ($ca['id'] == $result['pid']) { ?> selected <?php } ?>>
                <?php
                if ($ca['deep'] != 0) {
                    for ($i = 0; $i <= $ca['deep']; $i++) {
                        echo "——";
                    }
                }
                echo $ca['title'];
                ?></option>
                <?php
            }
            ?>
                         </select>
                     </td>
                 </tr>
 
                 <tr>
                     <td>选择模板：</td>
                     <td colspan="3">
                         <select name="tmpl" id="" style="width: 220px">
            <?php
            foreach ($tmpl as $t) {
                ?>
                                             <option value="<?php echo $t; ?>" <?php if ($t == $result['tmpl']) { ?> selected <?php } ?>><?php echo $t; ?></option>
                <?php
            }
            ?>
 
 
                         </select>
                     </td>
                 </tr>
                 <tr>
                     <td>关键字：</td>
                     <td colspan="3"><input type="text" name="keyword" style="width: 320px" value="<?php echo $result['keyword']; ?>"/></td>
                 </tr>
                 <tr>
                     <td>描述：</td>
                     <td colspan="3">
                         <textarea name="desc" rows="5" id="description" style="height:50px;width: 400px" ><?php echo $result['desc']; ?></textarea>
                     </td>
                 </tr>
                 <tr>
                     <td colspan="4">
                         <input type="hidden" name="langid" value="<?php echo $_COOKIE['lang']; ?>"/>
                         <input type="hidden" name="id" value="<?php echo $result['id']; ?>"/>
                         <input type="submit" value="保存">
                             <input type="reset" value="重置"/>
                     </td>
                 </tr>
             </table>
             
             
            -->

            <table class="t_table box add_box">
                <col width="8%"/>
                <col width="38%"/>
                <col width="6%"/>
                <col width="48%"/>
                <tr>
                    <td>栏目类型：</td>
                    <td colspan="3" id="linkType">
                        <label> <input type="radio"  name="type" value="0" <?php if ($result['type'] == '0') { ?> checked <?php } ?>/> 内部链接</label>
                        <label> <input type="radio"  name="type" value="1" <?php if ($result['type'] == '1') { ?> checked <?php } ?>/> 外部连接链接</label>
                    </td>
                </tr>
                <tr>
                    <td > 栏目名：</td>
                    <td><input name="title" type="text" id="title" style="width: 420px" value="<?php echo $result['title']; ?>" /></td>
                    <td></td>
                    <td ></td>
                </tr>
                <tr class="js_0">
                    <td>链接地址：</td>
                    <td colspan="3">
                        <input name="link" type="text" id="link" value="<?php echo $result['link']; ?>" style="width: 420px" />
                    </td>
                </tr>

                <tr  class="js_1">
                    <td>栏目模型：</td>
                    <td colspan="3">
                        <select name="mid" id="modsel" style="width: 220px">
                            <?php
                            foreach ($modulelist as $mli) {
                                ?>
                                <option value="<?php echo $mli['id'] ?>" <?php if ($mli['id'] == $result['mid']) { ?> selected <?php } ?>><?php echo $mli['title'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr class="js_1">
                    <td>父级栏目：</td>
                    <td colspan="3">
                        <select name="pid" id="" style="width: 220px">
                            <option value="0">顶级栏目</option>
                            <?php
                            foreach ($category as $ca) {
                                ?>
                                <option value="<?php echo $ca['id']; ?>"  <?php if ($ca['id'] == $result['pid']) { ?> selected <?php } ?>>
                                    <?php
                                    if ($ca['deep'] != 0) {
                                        for ($i = 0; $i <= $ca['deep']; $i++) {
                                            echo "——";
                                        }
                                    }
                                    echo $ca['title'];
                                    ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr class="js_1 list_cls">
                    <td>栏目模板：</td>
                    <td colspan="3">
                        <select name="catetmpl" id="" style="width: 220px">
                            <?php
                            foreach ($catetmpl as $t) {
                                ?>
                                <option value="<?php echo $t; ?>"  <?php if ($t == $result['catetmpl']) { ?> selected <?php } ?>><?php echo $t; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                    </td>
                </tr>
                <tr class="js_1 list_cls">
                    <td>列表模板：</td>
                    <td colspan="3">
                        <select name="listtmpl" id="" style="width: 220px">
                            <?php
                            foreach ($listtmpl as $t) {
                                ?>
                                <option value="<?php echo $t; ?>"  <?php if ($t == $result['listtmpl']) { ?> selected <?php } ?>><?php echo $t; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                    </td>
                </tr>
                <tr class="js_1 list_cls">
                    <td>文章模板：</td>
                    <td colspan="3">
                        <select name="newstmpl" id="" style="width: 220px">
                            <?php
                            foreach ($newstmpl as $t) {
                                ?>
                                <option value="<?php echo $t; ?>"  <?php if ($t == $result['newstmpl']) { ?> selected <?php } ?>><?php echo $t; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                    </td>
                </tr>
                <tr class="js_1 page_cls">
                    <td>单页面模板：</td>
                    <td colspan="3">
                        <select name="pagetmpl" id="" style="width: 220px">
                            <?php
                            foreach ($pagetmpl as $t) {
                                ?>
                                <option value="<?php echo $t; ?>" <?php if ($t == $result['newstmpl']) { ?> selected <?php } ?>><?php echo $t; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                    </td>
                </tr>
                <tr class="js_1">
                    <td>是否终极栏目：</td>
                    <td colspan="3"><input type="checkbox" name="isleaf" <?php if ($result['isleaf'] == '0') { ?> checked <?php } ?>/></td>
                </tr>
                <tr class="js_1">
                    <td>关键字：</td>
                    <td colspan="3"><input type="text" name="keyword" style="width: 320px" value="<?php echo $result['keyword']; ?>"/></td>
                </tr>
                <tr class="js_1">
                    <td>描述：</td>
                    <td colspan="3">
                        <textarea name="desc" rows="5" id="description" style="height:50px;width: 400px"><?php echo $result['desc']; ?></textarea>
                    </td>
                </tr>
                <tr >
                    <td colspan="4">
                        <input type="hidden" name="langid" value="<?php echo cookie('langid'); ?>"/>
                         <input type="hidden" name="id" value="<?php echo $result['id']; ?>"/>
                        <input type="submit" value="保存">
                            <input type="reset" value="重置"/>
                    </td>
                </tr>
            </table>


        </form>

    </body>
</html>
