<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>后台首页</title>
        <script>var base_js = '<?php echo JS_PATH; ?>'</script>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>index.css"/>
        <script type="text/javascript" src="<?php echo JS_PATH ?>module/seajs/2.2.1/sea.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH ?>module/seajsConfig.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH ?>app/index.js"></script>
    </head>

    <body class="showmenu">
        <div class="head">
            <div class="top">
                <div class="top_logo"></div>
                <div class="top_link">
                    <ul>

                        <li class="welcome">您好：<?php echo $admin['name'] ?> ，欢迎使用飞龙CMS！</li>
                        <li><a href="<?php echo U('Auth/login/logout'); ?>" target="_top">注销</a></li>
                        <li><a href="#" onclick="JumpFrame('catalog_menu.php', 'public_guide.php');">内容发布</a></li>
                        <li><a href="<?php echo U('System/Cache/clearall') ?>" target="main">更新缓存</a></li>
                        <li><a href="<?php echo __ROOT__ ?>/" target="_blank">网站主页</a></li>


                    </ul>
                    <?php
                    $lang = '中文';
                    if (!cookie('lang'))
                    {
                        if (isset($_GET['title']))
                        {
                            $lang = I('get.title');
                        }
                    } else
                    {
                        $lang=cookie('langtitle');
                    }
                    ?>
                    <div class="quick"><a href="javascript:void(0)" class="ac_qucikmenu" id="ac_qucikmenu">语言:<?php echo $lang; ?></a> <a href="javascript:void(0)" class="ac_qucikadd" id="ac_qucikadd"> 
                            <!--ADD--> 
                        </a> </div>
                </div>
            </div>
        </div>
        <div class="left">
            <div class="menu" id="menu">
                <table width="180" align="left" border="0" cellspacing="0" cellpadding="0" style="text-align:left;">
                    <tbody>
                        <tr>
                            <td valign="top" style="padding-top:10px" width="20">
                                <?php
                                foreach ($menu as $key => $m)
                                {
                                    ?>
                                    <a href="javascript:void(0)" class="mm <?php
                                    if ($key == 0)
                                    {
                                        echo 'mmac';
                                    }
                                    ?> js_menu_button"><div><?php echo $m['title'] ?></div></a>
                                       <?php
                                   }
                                   ?>


                                <div class="mmf"></div>
                            </td>
                            <td width="160" id="mainct" valign="top">

                                <?php
                                foreach ($menu as $key => $m)
                                {
                                    ?>
                                    <div class="js_list" <?php
                                    if ($key != 0)
                                    {
                                        echo "style='display:none'";
                                    }
                                    ?>> 
                                        <!-- Item 2 Strat -->
                                        <?php
                                        foreach ($m['clist'] as $c)
                                        {
                                            ?>
                                            <dl class="bitem">
                                                <dt class="js_bitem"><b><?php echo $c['title']; ?></b></dt>
                                                <dd class="sitem">
                                                    <ul class="sitemu js_sitemu">
                                                        <?php
                                                        foreach ($c['alist'] as $a)
                                                        {
                                                            ?>
                                                            <li><a href="javascript:void(0)" src="<?php echo URL($a['group'] . '/' . $a['controller'] . '/' . $a['action'], '', $a['app']) ?>" target="main">
                                                                    <?php echo $a['title']; ?></a></li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </dd>
                                            </dl>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="26"></td>
                            <td width="160" valign="top"><img src="<?php echo IMG_PATH ?>idnbgfoot.gif"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="main">
            <iframe id="main" name="main" frameborder="0" src="" class="app_content"></iframe>
        </div>
        <div id="qucikmenu" class="qucikmenu" style="display: none;">
            <ul>
                <?php
                foreach ($langlist as $lang)
                {
                    ?>
                    <li><a  target="_top" href="<?php echo __APP__ ?>/?lang=<?php echo $lang['lang']; ?>&langtitle=<?php echo $lang['title']; ?>&langid=<?php echo $lang['id']; ?>"><?php echo $lang['title']; ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </body>
</html>
