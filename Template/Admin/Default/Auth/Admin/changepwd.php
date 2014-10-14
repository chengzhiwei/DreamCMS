<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <script>var base_js = '<?php echo JS_PATH; ?>'</script>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>add_txt.css"/>
        <script type="text/javascript" src="<?php echo JS_PATH; ?>jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH; ?>module/layer/layer.js"></script>
        <script>
            $(function () {
                var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
                $('#cancel').on('click', function () {
                    parent.layer.close(index); //执行关闭

                });
                $('#update').on('click', function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo U('Auth/Admin/changepwd') ?>",
                        data: {id: $('#uid').val(), newpwd: $("#newpwd").val(), repwd: $("#repwd").val()},
                        dataType: "json",
                        success: function (data)
                        {
                            if (data.status != 'success')
                            {
                                parent.layer.msg(data.msg, 2, 0);
                            }
                            else
                            {
                                parent.layer.msg('<?php echo L('PWD_UPDATE_OK'); ?>', 1, 1);
                                parent.layer.close(index); //执行关闭
                            }
                        }
                    });
                });
            });
        </script>
    </head>
    <body class="marg add_txt">
        <table class="t_table box add_box">
            <input type="hidden" name="uid" id='uid' value="<?php echo $id ?>" />
            <col width="30%"/>
            <col width="70%"/>
            <tr>
                <td > <?php echo L('NEWPWD'); ?>：</td>
                <td><input name="newpwd" id='newpwd' type="password" id="title" value="" style="width: 420px" /></td>
            </tr>
            <tr>
                <td > <?php echo L('REPWD'); ?>：</td>
                <td><input name="repwd" id='repwd' type="password" id="title" value="" style="width: 420px" /></td>
            </tr>
            <tr >
                <td ></td>
                <td>
                    <input type="button" id='update' value="<?php echo L('UPDATE'); ?>" />
                    <input type="button" id='cancel' value="<?php echo L('CANCEL'); ?>"/>
                </td>
            </tr>
        </table>
    </body>
</html>
