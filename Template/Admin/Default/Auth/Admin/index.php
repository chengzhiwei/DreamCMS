
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
        <script type="text/javascript">
            function changepwd(id, username)
            {
                $.layer({
                    type: 2,
                    shadeClose: true,
                    shade: [0.2, '#000'],
                    fix: true,
                    title: '<?php echo L('CHANGE_PWD')?>(' + username + ')',
                    maxmin: true,
                    iframe: {src: '<?php echo __ROOT__ ?>/admin.php?s=Auth/Admin/changepwd&id='+id},
                    area: ['600px', '340px'],
                });
            }
        </script>
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
            <col width="20%"/>
            <col width="30%"/>
            <col width="20%"/>
            <col width="30%"/>
            <thead>
                <tr height="25" align="center">
                    <td><?php echo L('NO'); ?></td>
                    <td><?php echo L('USERNAME') ?></td>
                    <td><?php echo L('ROLE'); ?></td>
                    <td><?php echo L('OPTER') ?></td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $li)
                {
                    ?>
                    <tr height="25" align="center">
                        <td><?php echo $li['id']; ?></td>
                        <td><?php echo $li['username']; ?></td>
                        <td><?php echo $admingroup[$li['group']]['title']; ?></td>
                        <td>
                            <a href="javascript:changepwd(<?php echo $li['id']; ?>,'<?php echo $li['username']; ?>')" class="a"> <?php echo L('CHANGE_PWD'); ?> </a>
                            <?php echo L('SET_ROLE'); ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </body>
</html>
