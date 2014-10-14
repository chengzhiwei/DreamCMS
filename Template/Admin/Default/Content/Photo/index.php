<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>

        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>all_list.css"/>
        <script type="text/javascript" src="<?php echo JS_PATH_PATH ?>module/seajs/2.2.1/sea.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH_PATH ?>module/seajsConfig.js"></script>
    </head>
    <body class="marg">

        <div class=" ">
            <table class="top_btn t_table" >
                <tr>
                    <td align="center" height="30">
                        <a href="<?php echo U('Content/photo/add', array('mid' => $_GET['mid'], 'cid' => $_GET['cid'], 'category' => I('get.category'))); ?>" class="np coolbg">添加文档</a>                   
                    </td>
                </tr>
            </table>
            <table class="t_table tlt_td txt_current">
                <tr>
                    <td>◆ <?php echo $category_name; ?>>文档列表  </td>
                </tr>
            </table>
            <table class="t_table txt_list box">
                <col width="6%"/>

                <col width="28%"/>
                <col width="10%"/>
                <col width="10%"/>
                <col width="8%"/>
                <col width="10%"/>
                <thead>
                    <tr height="25" align="center">
                        <td>ID</td>

                        <td>文章标题</td>
                        <td>更新时间</td>
                        <td>类目</td>

                        <td>发布人</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $r)
                    {
                        ?>
                        <tr align="center">
                            <td><?php echo $r['id']; ?></td>
                            <td align="left"><a href=""><?php echo $r['title']; ?></a></td>
                            <td><?php echo date('Y-m-d H:i:s', $r['addtime']); ?></td>
                            <td><?php echo $category_name; ?></td>
                            <td><?php echo $r['author']; ?></td>
                            <td>
                                <a href="<?php echo U('Content/Photo/edit', array('id' => $r['id'])); ?>">编辑</a>
                                <a  onclick="return confirm('删除后无法恢复,确定要删除吗')" href="<?php echo U('Content/Photo/delete', array('id' => $r['id'])); ?>">删除</a>
    <!--                            <img src="static/images/part-list.gif" alt="预览"/>-->
                            </td>
                        </tr>
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="10" align="center" height="36" bgcolor="#F9FCEF">
                            <span><?php echo $page; ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </body>
</html>
