
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>语言列表</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>all_list.css"/>
    </head>
    <body class="marg">
        <table class="t_table txt_list box">
<!--            <col width="30%"/>
            <col width="30%"/>
            <col width="40%"/>-->
            <thead>
                <tr height="25" align="center">
                    <td>ID</td>
                    <td>友情连接名称</td>
                    <td>友情连接地址</td>
                    <td>友情连接图片</td>
                    <td>排序</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $r)
                {
                    ?>
                    <tr>
                        <td><?php echo $r['id']; ?></td>
                        <td><?php echo $r['name']; ?></td>
                        <td><a href="<?php echo $r['url']; ?>" target="_blank"><?php echo $r['url']; ?></a></td>
                        <td>
                            <?php
                            if ($r['image_url'] != '')
                            {
                                ?>
                                <img src="<?php echo __ROOT__ . '/' . $r['image_url']; ?>" style="width: 200px;height: 100px">
                                    <?php
                                }
                                ?>
                        </td>
                        <td><?php echo $r['show_order']; ?></td>
                        <td>
                            <a href="<?php echo U("update", array("id" => $r['id'])); ?>">修改</a>
                            <a onclick="return confirm('确定要删除？')" href="<?php echo U("delete", array("id" => $r['id'])); ?>">删除</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
