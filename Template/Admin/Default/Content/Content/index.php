<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <script>var base_js = '<?php echo JS_PATH; ?>'</script>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>all_list.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>index.css"/>
        <script type="text/javascript" src="<?php echo JS_PATH; ?>module/seajs/2.2.1/sea.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH; ?>module/seajsConfig.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH ?>app/index.js"></script>
        <script type="text/javascript">
            seajs.config(_seajsConfing);
            seajs.use(['tools', 'jquery'], function(tools, $) {
                $(function() {
                    $("#checkAll").click(function() {
                        tools.dom.selectAll($(".js_sub_box"));
                    });
                    $("#clearAll").click(function() {
                        tools.dom.clearAll($(".js_sub_box"));
                    });

                    $(".l_column ul").show();
                    $(".l_column p").click(function() {
                        if ($(".l_column ul").is(":hidden")) {
                            $(this).next(".l_column ul").show();
                            $(this).css("background", "url(static/images/dedecontract.gif) 5px center no-repeat #dedede");
                        } else {
                            $(this).next(".l_column ul").hide();
                            $(this).css("background", "url(static/images/dedeexplode.gif) 5px center no-repeat #dedede");
                        }
                    });
                })
            })
        </script>
    </head>
    <body class="marg">
        <div class="fl l_column">
            <p>网站栏目</p>
            <ul>
                <?php
                foreach ($Category_arr as $c)
                {
                    if ($c['type'] == 1) //外部链接
                    {
                        ?><li  style=" margin-left: <?php echo $c['deep'] * 30 ?>px;">
                            <a href="<?php echo $c['link']; ?>" target="newsmain"><?php echo $c['title'] ?></a>
                        </li><?php
                    } else
                    {
                        if ($c['isleaf'] == 0) //不是终极栏目
                        {
                            ?><li  style=" margin-left: <?php echo $c['deep'] * 30 ?>px;"><?php echo $c['title'] ?></li><?php
                        } else //终极栏目
                        {
                            ?>
                            <li  style=" margin-left: <?php echo $c['deep'] * 30 ?>px;">
                                <a href="<?php echo U('Content/'.ucfirst($modlist[ $c['mid']]['table']).'/Index', array('mid' => $c['mid'], 'cid' => $c['id'], 'category' => $c['title']));?>" target="newsmain"><?php echo $c['title'] ?></a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    <?php
                }
                ?>

            </ul>
        </div>
        <div class="fr w100">
            <iframe id="main" name="newsmain" frameborder="0" src="" class="app_content"></iframe>
        </div>

    </body>
</html>
