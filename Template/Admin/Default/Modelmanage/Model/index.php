
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>all_list.css"/>
    </head>
    <body class="marg">
        <table class="t_table txt_list box">
            <col width="20%"/>
            <col width="50%"/>
            <col width="30%"/>
            <thead>
                <tr height="25" align="center">
                    <td><?php echo L('ID'); ?></td>
                    <td><?php echo L('MODELNAME'); ?></td>
                    <td><?php echo L('OPERATE'); ?></td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($modellist as $v)
                {
                    ?>
                    <tr align="center">
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['title']; ?></td>
                        <td>
                            <?php
                            if ($v['id'] > 3)
                            {
                                ?>
                                <a href="<?php echo U("del", array("id" => "$id")); ?>" onclick="return confirm('确定删除吗？')">删除</a>
                                |
                                <?php }
                            ?>

                            <a href="<?php echo U("edit", array("id" => "$id")); ?>">编辑</a>
                        </td>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </body>
</html>
