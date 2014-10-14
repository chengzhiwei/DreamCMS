<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加语言</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>language_msg.css"/>
    </head>

    <body class="marg">
        <form id="upload" method='post' action="" enctype="multipart/form-data">
            <table cellpadding="3" border="0" cellspacing="1" align="center" class="t_table box">
                <tbody>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">名称：</td>
                        <td bgcolor="#FFFFFF" classid="0" ><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">链接地址：</td>
                        <td bgcolor="#FFFFFF" classid="0" ><input type="text" name="url"></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0" >Logo：</td>
                        <td bgcolor="#FFFFFF" classid="0" > <input name="image" id="image" type="file" /></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">排序：</td>
                        <td bgcolor="#FFFFFF" classid="0" ><input type="text" name="show_order"></td>
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
