<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>编辑推荐位</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>language_msg.css"/>
    </head>

    <body class="marg">
        <form action="" method="post">
            <table cellpadding="3" border="0" cellspacing="1" align="center" class="t_table box">
                <tbody>
                    <tr>
                        <td class="tlt_td" colspan="3"><strong>推荐位设置 </strong></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0" width="80">推荐位名称：</td>
                        <td bgcolor="#FFFFFF" classid="0"><input type="text" name="title" value="<?php echo $info['title'];?>" /></td>
                    </tr>
                    <tr>
                        <td height="36" bgcolor="#FFFFFF" colspan="2">
                            <input type="submit" name="sb1" value="编辑" class="np coolbg">
                        </td>
                    </tr>
            </table>
        </form>
    </body>
</html>
