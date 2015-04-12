<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>登录页面 </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->

        <link href="<?php echo ADMIN_CSS_PATH; ?>bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH; ?>font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH; ?>font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->

        <!-- fonts -->



        <!-- ace styles -->

        <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH; ?>ace.min.css" />
        <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH; ?>ace-rtl.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH; ?>ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo ADMIN_JS_PATH; ?>html5shiv.js"></script>
        <script src="<?php echo ADMIN_JS_PATH; ?>respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="icon-leaf green"></i>
                                    <span class="red">Dream </span>
                                    <span class="white">CMS</span>
                                </h1>
                                <h4 class="blue">&copy; Dream Development team</h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="icon-coffee green"></i>
                                                <?php echo L('INNER_LOGIN_INFO'); ?>
                                            </h4>

                                            <div class="space-6"></div>

                                            <form method="post">
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" name="username" class="form-control" placeholder="Username" />
                                                            <i class="icon-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" name="pwd" class="form-control" placeholder="Password" />
                                                            <i class="icon-lock"></i>
                                                        </span>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <label class="inline">
                                                          
                                                            <span class="lbl"> <input type="text" name="code" value="" placeholder="<?php echo L('VERIFY')?>" style="width: 100px;" /></span>
                                                            <span class="lbl"><img src="<?php echo U('Auth/Login/verify')?>" /></span>
                                                        </label>

                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="icon-key"></i>
                                                            <?php echo L('LOGIN'); ?>
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>

                                            <div class="social-or-login center">
                                                <span class="bigger-110">Or Login Using</span>
                                            </div>

                                            
                                        </div><!-- /widget-main -->

                                        <div class="toolbar clearfix">
                                            <div>
                                                <a href="#" onClick="show_box('forgot-box');
                                                        return false;" class="forgot-password-link">
                                                    <i class="icon-arrow-left"></i>
                                                    I forgot my password
                                                </a>
                                            </div>

                                            <div>
                                                <a href="#" onClick="show_box('signup-box');
                                                        return false;" class="user-signup-link">
                                                    I want to register
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /widget-body -->
                                </div><!-- /login-box -->




                            </div><!-- /position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->

        <script src="<?php echo ADMIN_JS_PATH; ?>jquery.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="<?php echo ADMIN_JS_PATH; ?>jquery.min.js"></script>
<![endif]-->

        <!--[if !IE]> -->

        <script type="text/javascript">
                                                    window.jQuery || document.write("<script src='<?php echo ADMIN_JS_PATH; ?>jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php echo ADMIN_JS_PATH; ?>jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo ADMIN_JS_PATH; ?>jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>

        <!-- inline scripts related to this page -->

        <script type="text/javascript">
            function show_box(id) {
                jQuery('.widget-box.visible').removeClass('visible');
                jQuery('#' + id).addClass('visible');
            }
        </script>

    </body>
</html>
