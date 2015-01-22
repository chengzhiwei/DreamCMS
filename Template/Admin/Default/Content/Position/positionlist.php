
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>推荐位列表</title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>all_list.css"/>
</head>
<body class="marg">
    <table class="t_table txt_list box">
        <col width="30%"/>
        <col width="30%"/>
        <col width="40%"/>
        <thead>
            <tr height="25" align="center">
                <td>ID</td>
                <td>推荐位名称</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
           <?php 
           foreach($list as $v){
           ?>
            <tr align="center">
                <td><?php echo $v['id'];?></td>
                <td><?php echo $v['title'];?></td>
                <td>
                    <a href="<?php echo U("Content/Position/del",array("id"=>$v['id']));?>" onclick="return confirm('确定删除吗？')">删除</a>
                    |
                    <a href="<?php echo U("Content/Position/edit",array("id"=>$v['id']));?>">编辑</a>
                </td>
            </tr>
           <?php }?>
        </tbody>
    </table>
</body>
</html>
