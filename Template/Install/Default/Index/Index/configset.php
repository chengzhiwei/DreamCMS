<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>参数配置</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>install.css"/>
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
                            <li class="succeed">环境检测</li>
                            <li class="now">参数配置</li>
                            <li>安装完成</li>
                        </ul>
                    </dd>
                </dl>
            </div>
            <form method="post">
                <div class="pright">
                    <div class="pr-title"><h3>数据库设定</h3></div>
                    <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                        <tbody><tr>
                                <td class="onetd"><strong>数据库主机：</strong></td>
                                <td><input name="DB_HOST" id="DB_HOST" type="text" value="localhost" class="input_txt">
                                        <small>一般为localhost</small></td>
                            </tr>
                            <tr>
                                <td class="onetd"><strong>数据库用户：</strong></td>
                                <td><input name="DB_USER" id="DB_USER" type="text" value="root" class="input_txt"></td>
                            </tr>
                            <tr>
                                <td class="onetd"><strong>数据库密码：</strong></td>
                                <td>
                                    <div style="float:left;margin-right:3px;"><input name="DB_PWD" id="DB_PWD" type="text" class="input_txt"></div>
                                    <div style="float:left" id="dbpwdsta"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="onetd"><strong>数据表前缀：</strong></td>
                                <td><input name="DB_PREFIX" id="DB_PREFIX" type="text" value="<?php echo $pex; ?>_" class="input_txt">
                                        <small>如无特殊需要,请不要修改</small></td>
                            </tr>
                            <tr>
                                <td class="onetd"><strong>数据库名称：</strong></td>
                                <td>
                                    <div style="float:left;margin-right:3px;"><input name="DB_NAME" id="DB_NAME" type="text" value="<?php echo $db; ?>" class="input_txt" ></div>
                                    <div style="float:left" id="havedbsta"></div>
                                </td>
                            </tr>
                        </tbody></table>

                    

                    <div class="pr-title"><h3>网站设置</h3></div>
                    <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                        <tbody><tr>
                                <td class="onetd"><strong>网站名称：</strong></td>
                                <td>
                                    <input name="webname" type="text" value="我的网站" class="input_txt">
                                </td>
                            </tr>

                            <tr>
                                <td class="onetd"><strong> 网站域名：</strong></td>
                                <?php
                                $protocol = strpos(strtolower($_server['server_protocol']), 'https') === false ? 'http' : 'https';
                                ?>
                                <td><input name="DOMAIN" type="text" value="<?php echo $protocol . '://' . $_SERVER['HTTP_HOST']  ?>" class="input_txt"></td>
                            </tr>

                        </tbody></table>


                    <div class="pr-title"><h3>接口配置</h3></div>
                    <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                        <tbody><tr>
                                <td class="onetd"><strong>APP KEY：</strong></td>
                                <td>
                                    <input name="API_APP_KEY" type="text" value="10001" class="input_txt">
                                </td>
                            </tr>
                            <tr>
                                <td class="onetd"><strong> APP_SECRET：</strong></td>
                                <td><input name="API_APP_SECRET" type="text" value="af883983220e68d46fb68e711eeafcb6" class="input_txt"></td>
                            </tr>
                            <tr>
                                <td class="onetd"><strong> 单点登录地址：</strong></td>
                                <td><input name="SSO_LOGIN" type="text" value="http://192.168.0.189/sso" class="input_txt"></td>
                            </tr>
                            <tr>
                                <td class="onetd"><strong> 飞龙网接口地址：</strong></td>
                                <td><input name="API_PATH" type="text" value="http://192.168.0.189/api/" class="input_txt"></td>
                            </tr>
                            <tr>
                                <td class="onetd"><strong> 飞龙网域名：</strong></td>
                                <td><input name="FEILONG_DOMAIN" type="text" value="http://www.192.168.0.188" class="input_txt"></td>
                            </tr>


                        </tbody></table>

                    <div class="btn-box">
                        <input type="button" class="btn_back" value="后退" />
                        <input type="submit" class="btn_next" value="开始安装" />
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
