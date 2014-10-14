<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>add_txt.css"/>
    </head>
    <body class="marg add_txt">
        <form action="" method="post" enctype="multipart/form-data" id="upload">
            <table class="t_table add_now">
                <tr>
                    <td> <a href="javascript:void(0)" class="switch current"><span>常规信息</span></a></td>
                </tr>
            </table>
            <table class="t_table box add_box">
                <col width="8%"/>
                <col width="38%"/>
                <col width="6%"/>
                <col width="48%"/>
                <tr>
                    <td>当前栏目：</td>
                    <td colspan="3">
                        <input type="hidden" name="cid" value="<?php echo $result['cid']; ?>" /><?php echo $category_name; ?>
                        <input type="hidden" name="mid" value="1" />
                    </td>
                </tr>
                <tr>
                    <td > 文章标题：</td>
                    <td><input name="title" type="text" id="title" value="<?php echo $result['title']; ?>" style="width: 420px" /></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="90">推荐位：</td>
                    <td align="left" colspan="3">
                        <?php
                        foreach ($position as $p)
                        {
                            ?>
                            <input class="np" type="checkbox" name="flags[]" id="flagsh" value="<?php echo $p['id'] ?>" <?php if (in_array($p['id'], $posids))
                        {
                                ?> checked<?php } ?>/><?php echo $p['title'] ?>
                               <?php }
                               ?>

                    </td>
                </tr>
                <tr>
                    <td>TAG标签：</td>
                    <td>
                        <input name="tags" type="text" id="tags" value="<?php echo $result['tags']; ?>" style="width:300px" />
                        (','号分开，单个标签小于12字节)
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="90">缩 略 图：</td>
                    <td colspan="3">
                        <img src="<?php echo C('DOMAIN') . '/Uploads/' . $result['picname']; ?>" style="width: 200px;height: 100px">
                            <input name="picname" id="picname" type="file" />
                    </td>
                </tr>

                <tr>
                    <td>关键字：</td>
                    <td colspan="3"><input name="keyword" type="text" value="<?php echo $result['keyword']; ?>" style="width: 320px"/></td>
                </tr>
                <tr>
                    <td>内容摘要：</td>
                    <td colspan="3">
                        <textarea name="description" rows="5" id="description" style="height:50px;width: 400px"><?php echo $result['description']; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <script id="container" name="content" type="text/plain"><?php echo $result['content']; ?></script>
                        <!-- 配置文件 -->
                        <script type="text/javascript" src="<?php echo JS_PATH; ?>module/ueditor/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="<?php echo JS_PATH; ?>module/ueditor/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container', {initialFrameHeight: 420});
                        </script>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="submit" value="保存"/>
                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
                        <input type="reset" value="重置"/>
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>
