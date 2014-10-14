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
                        <td class="tlt_td" colspan="3"><strong>路由设置 </strong></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0" width="80">栏目页路由：</td>
                        <td bgcolor="#FFFFFF" classid="0">
                            <input style="width: 400px;" type="text" name="Content/category?cid=:1" value="<?php echo isset($router['Content/category?cid=:1']) ? $router['Content/category?cid=:1'] : '' ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">列表页路由：</td>
                        <td bgcolor="#FFFFFF" classid="0">
                            <input style="width: 400px;" type="text" name="Content/newslist?cid=:1" value="<?php echo isset($router['Content/newslist?cid=:1']) ? $router['Content/newslist?cid=:1'] : '' ?>" /></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" classid="0">文章页路由：</td>
                        <td bgcolor="#FFFFFF" classid="0">
                            <input style="width: 400px;" type="text" name="Content/news?id=:1" value="<?php echo isset($router['Content/news?id=:1']) ? $router['Content/news?id=:1'] : '' ?>" /></td>

                    </tr>
                     <tr>
                        <td bgcolor="#FFFFFF" classid="0">单页面路由：</td>
                        <td bgcolor="#FFFFFF" classid="0">
                            <input style="width: 400px;" type="text" name="Content/page?id=:1" value="<?php echo isset($router['Content/page?id=:1']) ? $router['Content/page?id=:1'] : '' ?>" /></td>

                    </tr>
                    <tr>
                        <td height="36" bgcolor="#FFFFFF" colspan="2">
                            <input type="submit" value="保存" class="np coolbg">
                        </td>
                    </tr>
            </table>
        </form>
    </body>
</html>
