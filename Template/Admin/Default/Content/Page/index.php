<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>add_txt.css"/>
    </head>
    <body class="marg add_txt">
        <form  method="post" action="<?php echo U('Content/Page/index', array('cid' => $cid)) ?>">
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
                    <td > 文章标题：</td>
                    <td><input name="title" type="text" id="title" value="<?php echo $info['title']; ?>" style="width: 420px" /></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="4">
                        <script id="container" name="content" type="text/plain"><?php echo $info['content']; ?></script>
                        <!-- 配置文件 -->
                        <script type="text/javascript" src="<?php echo JS_PATH; ?>module/ueditor/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="<?php echo JS_PATH; ?>module/ueditor/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container', {initialFrameHeight: 420});
                            var ue_upload='<?php echo __ROOT__?>/Uploads/ueditor'
                        </script>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="submit" value="保存"/>
                        <input type="reset" value="重置"/>
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>
