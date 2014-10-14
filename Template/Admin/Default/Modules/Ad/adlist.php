<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>广告列表</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>all_list.css"/>
    </head>
    <body class="marg">

        <table class="top_btn t_table" >
            <tr>
                <td align="center" height="30">
                    <a href="<?php echo U('addad') ?>" class="np coolbg">添加广告</a>                   
                </td>
            </tr>
        </table>
        <table class="t_table txt_list box">
            <thead>
                <tr height="25" align="center">
                    <td>ID</td>
                    <td>广告分类</td>
                    <td>广告名称</td>
                    <td>广告地址</td>
                    <td>广告图片</td>
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
                        <td><?php echo $r['fenlei']; ?></td>
                        <td><?php echo $r['title']; ?></td>
                        <td><a href="<?php echo $r['href']; ?>" target="_blank"><?php echo $r['href']; ?></a></td>

                        <td><img src="<?php echo __ROOT__ . '/' . $r['img']; ?>" style="width: 200px;height: 100px"></td>                        

                        <td>
                            <a href="<?php echo U("editad", array("id" => $r['id'])); ?>">修改</a>
                            <a onclick='return confirm("确定要删除么？")' href="<?php echo U("delad", array("id" => $r['id'])); ?>">删除</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>

