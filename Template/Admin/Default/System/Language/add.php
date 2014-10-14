<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加语言</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>language_msg.css"/>
    </head>

    <body class="marg">
        <form action="" method="post">
            <table cellpadding="3" border="0" cellspacing="1" align="center" class="t_table box">
                <tbody>
                    <tr>
                        <td class="tlt_td" colspan="3"><strong>语言设置 </strong></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0" width="80">语言：</td>
                        <td bgcolor="#FFFFFF" classid="0"><input type="text" name="title" value="" /></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">语言标识：</td>
                        <td bgcolor="#FFFFFF" classid="0"><input type="text" name="lang" value="" /></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">是否默认：</td>
                        <td bgcolor="#FFFFFF" classid="0"><input type="checkbox" name="default" value="1" /></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">选择模板：</td>
                        <td bgcolor="#FFFFFF" classid="0">
                            <select name="tmpl">
                                <?php
                                foreach ($tmpl as $t)
                                {
                                    ?>
                                    <option value="<?php echo $t ?>"><?php echo $t ?></option>
                                <?php }
                                ?>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">网站标题：</td>
                        <td bgcolor="#FFFFFF" classid="0"><input type="text" name="seotitle" value="" /></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">网站关键字：</td>
                        <td bgcolor="#FFFFFF" classid="0"><input type="text" name="seokeyword" value="" /></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">网站描述：</td>
                        <td bgcolor="#FFFFFF" classid="0"><textarea name='seodesc' style="width: 600px; height: 100px;"></textarea></td>
                    </tr>
                    <tr>
                        <td height="36" bgcolor="#FFFFFF" colspan="2">
                            <input type="submit"  value="增加" class="np coolbg">
                        </td>
                    </tr>
            </table>
        </form>
    </body>
</html>
