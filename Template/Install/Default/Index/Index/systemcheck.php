<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>环境检测</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>install.css"/>
        <script src="<?php echo JS_PATH; ?>jquery-1.4.2.min.js" ></script>
    </head>

    <body>
        <div class="top_head">
            <div class="top">
                <div class="top-logo">
                   
                </div>
                <div class="top-link">
                   
                </div>
                <div class="top-version">
                    <!-- 版本信息 -->
                    <h2>FEILONG CMS</h2>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="pleft">
                <dl class="setpbox t1">
                    <dt>安装步骤</dt>
                    <dd>
                        <ul>
                            <li class="succeed">许可协议</li>
                            <li class="now">环境检测</li>
                            <li>参数配置</li>
                            <li>安装完成</li>
                        </ul>
                    </dd>
                </dl>
            </div>
            <div class="pright">
                <div class="pr-title"><h3>服务器信息</h3></div>
                <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                    <tbody><tr>
                            <th width="300" align="center"><strong>参数</strong></th>
                            <th width="424"><strong>值</strong></th>
                        </tr>
                        <tr>
                            <td><strong>服务器域名</strong></td>
                            <?php
                            $protocol = strpos(strtolower($_server['server_protocol']), 'https') === false ? 'http' : 'https';
                            ?>
                            <td><?php echo $protocol . '://' . $_SERVER['HTTP_HOST'] . __ROOT__ ?></td>
                        </tr>
                        <tr>
                            <td><strong>服务器操作系统</strong></td>
                            <td><?php echo php_uname('s'); ?></td>
                        </tr>
                        <tr>
                            <td><strong>服务器解译引擎</strong></td>
                            <td><?php echo php_sapi_name(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>PHP版本</strong></td>
                            <td><?php echo PHP_VERSION; ?></td>
                        </tr>
                        <tr>
                            <td><strong>系统安装目录</strong></td>
                            <td><?php echo getcwd(); ?></td>
                        </tr>
                    </tbody></table>
                <div class="pr-title"><h3>系统环境检测</h3></div>
                <div style="padding:2px 8px 0px; line-height:33px; height:23px; overflow:hidden; color:#666;">
                    系统环境要求必须满足下列所有条件，否则系统或系统部份功能将无法使用。
                </div>
                <?php $isok=1;?>
                <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                    <tbody><tr>
                            <th width="200" align="center"><strong>需开启的变量或函数</strong></th>
                            <th width="80"><strong>要求</strong></th>
                            <th width="400"><strong>实际状态及建议</strong></th>
                        </tr>
                        <tr>
                            <td>curl</td>
                            <td align="center">On </td>
                            <td>
                                <?php
                                if (function_exists('curl_init'))
                                {
                                    ?>
                                    <font color="green">[√]On</font>
                                    <?php
                                } else
                                {
                                     $isok=0;
                                    ?>
                                    <font color="red">[×]Off</font>
                                    <?php
                                }
                                ?>

                                <small>(不符合要求将无法实现单点登录和飞龙网数据同步)</small></td>
                        </tr>
                        <tr>
                            <td>file_get_contents</td>
                            <td align="center">On</td>
                            <td>

                                <?php
                                if (function_exists('file_get_contents'))
                                {
                                    ?>
                                    <font color="green">[√]On</font>
                                    <?php
                                } else
                                {
                                    $isok=0;
                                    ?>
                                    <font color="red">[×]Off</font>
                                    <?php
                                }
                                ?>

                                <small>(不符合要求将无法实现单点登录和飞龙网数据同步)</small></td>
                        </tr>

                        <tr>
                            <td>GD 支持 </td>
                            <td align="center">On</td>
                            <td>
                                <?php
                                if (function_exists('imagecreate'))
                                {
                                    ?>
                                    <font color="green">[√]On</font>
                                    <?php
                                } else
                                {
                                    $isok=0;
                                    ?>
                                    <font color="red">[×]Off</font>
                                    <?php
                                }
                                ?>


                                <small>(不支持将导致与图片相关的大多数功能无法使用或引发警告)</small></td>
                        </tr>
                        <tr>
                            <td>MySQL 支持</td>
                            <td align="center">On</td>
                            <td>
                                <?php
                                if (function_exists('mysql_connect'))
                                {
                                    ?>
                                    <font color="green">[√]On  </font>
                                    <?php
                                } else
                                {
                                    $isok=0;
                                    ?>
                                    <font color="red">[×]Off</font>
                                    <?php
                                }
                                ?>    

                                <small>(不支持无法使用本系统)</small></td>
                        </tr>
                    </tbody></table>


                <div class="pr-title"><h3>目录权限检测</h3></div>
                <div style="padding:2px 8px 0px; line-height:33px; height:23px; overflow:hidden; color:#666;">
                    系统要求必须满足下列所有的目录权限全部可读写的需求才能使用，其它应用目录可安装后在管理后台检测。
                </div>
                <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                    <tbody><tr>
                            <th width="300" align="center"><strong>目录名</strong></th>
                            <th width="212"><strong>读取权限</strong></th>
                            <th width="212"><strong>写入权限</strong></th>
                        </tr>
                        <tr>
                            <td>/Runtime/*</td>
                            <td>
                                <?php
                                if (is_readable('Runtime'))
                                {
                                    ?><font color="green">[√]读</font><?php
                                } else
                                {
                                    $isok=0;
                                    ?>
                                    <font color="red">[×]读</font>
                                    <?php
                                }
                                ?>
                            </td><td>

                                <?php
                                if (TestWrite('Runtime'))
                                {
                                    ?>
                                    <font color="green">[√]写</font>
                                    <?php
                                } else
                                {
                                    $isok=0;
                                    ?>
                                    <font color="red">[×]写</font>
                                <?php }
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <td>/Config/*</td>
                            <td>
                                <?php
                                if (is_readable('Config'))
                                {
                                    ?><font color="green">[√]读</font><?php
                                } else
                                {
                                    $isok=0;
                                    ?>
                                    <font color="red">[×]读</font>
                                    <?php
                                }
                                ?>
                            </td><td>

                                <?php
                                if (TestWrite('Runtime'))
                                {
                                    ?>
                                    <font color="green">[√]写</font>
                                    <?php
                                } else
                                {
                                    $isok=0;
                                    ?>
                                    <font color="red">[×]写</font>
                                <?php }
                                ?>

                            </td>
                        </tr>
                    </tbody></table>

                <div class = "btn-box">
                    <input type = "button" class = "btn_back" value = "后退"  onclick = "prestep();" />
                    <input type = "button" class = "btn_next" value = "继续" onclick = "nextstep();" />
                </div>
            </div>
        </div>
        <input type="hidden" id="isok" value="<?php echo $isok?>" />
        <script>
            function prestep()
            {
                window.location.href = '<?php echo U('Index/Index/index') ?>';
            }

            function nextstep()
            {
                if($('#isok').val()==1)
                {
                     window.location.href = '<?php echo U('Index/Index/configset') ?>';
                }
                else
                {
                    alert('环境部符合要求');
                }
               
            }

        </script>
    </body>
</html>
