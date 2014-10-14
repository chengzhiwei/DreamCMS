<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>登录</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>base.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>login.css"/>
        <script>
            function getverify()
            {
                var randomnumber = Math.random();
                var validateimg = document.getElementById("verify");
                validateimg.src = "<?php echo __ROOT__ ?>/admin.php?s=Auth/Login/verify&t=" + randomnumber;
            }
        </script>
    </head>
    <body class="login">
        <div class="login_block">
            <div class="top_title auto">
                <h1>中国飞龙网单点登录系统</h1>
                <a href="">返回网站主页</a>
            </div>

            <div class="login_main auto">
                <form action="" class="fl" method="post">
                    <p class="auto">
                        <label for=""><?php echo L('USERNAME'); ?>：</label>
                        <input type="text" name="username" id="userName"/>
                    </p>
                    <p class="auto">
                        <label for=""><?php echo L('PASSWORD'); ?>：</label>
                        <input type="password" name="pwd" id="passWord"/>
                    </p>
                    <p class="code auto">
                        <label for=""><?php echo L('VERIFY'); ?>：</label>
                        <input type="text" name="code" id="code"/>
                        <img id="verify" src="<?php echo U('Auth/Login/verify') ?>" alt=""/>
                        <span><a href="javascript:getverify()" ><?php echo L('SEE') ?></a></span>
                    </p>
                    <p class="login_btn auto">
                        <input type="submit" value="<?php echo L('LOGIN'); ?>"/>
                    </p>
                    <input type="hidden" value="<?php echo $callback ?>" name="callback" />
                </form>
                <div class="fr login_img">
                    <img src="<?php echo __ROOT__; ?>/Public/images/flimg.gif" alt=""/>
                </div>
            </div>
            <p class="copy_right">
                Powered by <span class="green fw">Share CMS</span> @214-2016 <span class="blue">Share</span> Inc.
            </p>
        </div>
    </body>
</html>
