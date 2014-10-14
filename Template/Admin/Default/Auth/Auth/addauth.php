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
            function addgroup()
            {
                $.layer({
                    type: 2,
                    shadeClose: true,
                    shade: [0.2, '#000'],
                    fix: true,
                    title: '<?php echo L('ADDGROUP') ?>',
                    maxmin: true,
                    iframe: {src: '<?php echo __ROOT__ ?>/admin.php?s=Auth/Auth/addgroup'},
                    area: ['600px', '340px'],
                });
            }
        </script>
    </head>
    <body class="marg add_txt">
        <form>
            <table class="t_table box add_box">
                <col width="20%"/>
                <col width="80%"/>
                <tr>
                    <td > <?php echo L('GROUP'); ?>：</td>
                    <td>
                        <select>
                            <option>权限</option>
                        </select>
                        <a href="javascript:addgroup()" >添加分组</a></td>

                </tr>
                <tr>
                    <td > <?php echo L('MODULE'); ?>：</td>
                    <td><input name="repwd" id='repwd' type="password" id="title" value="" style="width: 420px" />
                        添加模块</td>

                </tr
                <tr>
                    <td > <?php echo L('ACTION'); ?>：</td>
                    <td><input name="repwd" id='repwd' type="password" id="title" value="" style="width: 420px" /></td>
                </tr>
                <tr>
                    <td > <?php echo L('AUTHNAME'); ?>：</td>
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
        </form>
    </body>
</html>
