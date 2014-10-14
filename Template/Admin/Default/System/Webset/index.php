<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>基本设置</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>language_msg.css"/>
    </head>

    <body class="marg">
        <form action="" method="post">
            <table cellpadding="3" border="0" cellspacing="1" align="center" class="t_table box">
                <tbody>
                    <tr>
                        <td class="tlt_td" colspan="3"><strong>基本设置 </strong></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0" width="80">网站标题：</td>
                        <td bgcolor="#FFFFFF" classid="0"><input type="text" name="SITE_TITLE" value="<?php echo C('SITE_TITLE'); ?>" /></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">关键字：</td>
                        <td bgcolor="#FFFFFF" classid="0"><input type="text" name="SITE_KEYWORD" value="<?php echo C('SITE_KEYWORD'); ?>" /></td>
                    </tr>

                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">网站描述：</td>
                        <td bgcolor="#FFFFFF" classid="0"><textarea name="SITE_DESC"  style="height:80px;width: 400px" rows="5"><?php echo C('SITE_DESC'); ?></textarea></td>
                    </tr>
                    
                    <tr>
                        <td height="36" bgcolor="#FFFFFF" colspan="2">
                            <input type="submit" name="sb1" value="保存" class="np coolbg">
                        </td>
                    </tr>
            </table>
        </form>
    </body>
</html>
