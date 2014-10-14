<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>网站栏目管理</title>
        <script>var base_js = '<?php echo JS_PATH; ?>'</script>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>website_msg.css"/>
        <script type="text/javascript" src="<?php echo JS_PATH ?>module/seajs/2.2.1/sea.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH ?>module/seajsConfig.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH ?>app/websiteMsg.js"></script>
        <script>
            seajs.use(['jquery'], function($) {
                $('.sort').blur(function() {
                    $.ajax({
                        type: "post",
                        url: "<?php echo U('Content/Category/updatesort') ?>",
                        data: {sort: $(this).val(), id: $(this).attr('atrid')},
                        success: function(data) {
                            if (data == '1')
                            {
                                alert('排序成功');
                            }
                            else
                            {
                                alert('发生错误');
                            }
                        }
                    });
                });
            });

        </script>
    </head>

    <body class="marg">
        <!--网站栏目管理-->
        <table cellpadding="3" border="0" cellspacing="1" align="center" class="t_table box">
            <tbody>
                <tr>
                    <td class="tlt_td"><div class="fl"> <strong>网站栏目管理 </strong> </div>

                    </td>
                </tr>


                <?php
                foreach ($category as $ca)
                {
                    ?>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">
                            <div class="tlt_con auto">
                                <div class="fl">

                                    <a href="" class="tlt" style="margin-left: <?php echo $ca['deep'] * 30; ?>px"> 
                                        <?php
                                        echo $ca['title'];
                                        ?>[ID:<?php echo $ca['id']; ?>]
                                    </a>
                                </div>
                                <div class="fr">
                                    <a href="<?php echo U("update", array("id" => $ca['id'], "type" => "add")); ?>">增加子类</a>|
                                    <a href="<?php echo U("update", array("id" => $ca['id'], "type" => "update")); ?>">更改</a>|
                                    <a href="<?php echo U("delete", array("id" => $ca['id'])); ?>" class="js_delete">删除</a>
                                    <input type="text" class="t_input sort" atrid="<?php echo $ca['id']; ?>" value="<?php echo $ca['sort']; ?>" />
                                </div>
                            </div>

                        </td>
                    </tr>
                    <?php
                }
                ?>


            </tbody>
        </table>
        <!--END--> 
    </body>
</html>
