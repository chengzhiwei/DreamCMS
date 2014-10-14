
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <script>var base_js = '<?php echo JS_PATH; ?>';</script>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>all_list.css"/>
        <script type="text/javascript" src="<?php echo JS_PATH; ?>jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH; ?>module/layer/layer.js"></script>

    </head>

    <body class="marg">
        <table class="top_btn t_table" >
            <tr>
                <td align="center" height="30">
                    <a href="#" class="np coolbg"><?php echo L('ADD_ADMIN'); ?></a>                   
                </td>
            </tr>
        </table>
        <table class="t_table txt_list box">

            <thead>
                <tr height="25" align="center">
                    <td>插件</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($files as $f)
                {
                    if ($f == 'Base' || $f == 'Common')
                    {
                        continue;
                    }
                    ?>
                    <tr height="25" align="center">
                        <td><?php echo $f; ?></td>
                        <td><a target="_blank" href='<?php echo U('Plugin/Plugin/installplugin', array('plugin' => $f)) ?>'>安装</a></td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </body>
</html>
