
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>留言列表</title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>all_list.css"/>
    <script type="text/javascript" src="<?php echo JS_PATH ?>jquery.min.js"></script>
<script>
    $('.show_info').live('click', function () {
	$(this).parent().parent().next().slideToggle();
    });
    </script>
</head>
<body class="marg">
    <table class="t_table txt_list box">
        <col width="10%"/>
        <col width="20%"/>
        <col width="10%"/>
        <col width="10%"/>
        <col width="10%"/>
        <col width="15%"/>
        <col width="15%"/>
        <col width="10%"/>
        <thead>
            <tr height="25" align="center">
                <td>用户名</td>
                <td>联系地址</td>
                <td>邮编</td>
                <td>联系电话</td>
                <td>传真</td>
                <td>邮箱</td>
                <td>MSN</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
           <?php 
           foreach($result as $v){
               $id=$v['id'];
           ?>
            <tr align="center">
                <td><?php echo $v['username'];?></td>
                <td><?php echo $v['address'];?></td>
                <td><?php echo $v['code'];?></td>
                <td><?php echo $v['telephone'];?></td>
                <td><?php echo $v['fax'];?></td>
                <td><?php echo $v['email'];?></td>
                <td><?php echo $v['msn'];?></td>
                <td>
                    <a href="<?php echo U("del",array("id"=>"$id"));?>" onclick="return confirm('确定删除吗？')">删除</a>
                    |
                    <a href="javascript:;" class="show_info">查看详情</a>
                </td>
            </tr>
            <tr align="center" style="display: none; color: #F00;" class="js_show_info">
                <td>内容</td>
                <td colspan="7"><?php echo $v['content'];?></td>
            </tr>
           <?php }?>
        </tbody>
    </table>
</body>
</html>
