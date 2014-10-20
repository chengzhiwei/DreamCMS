<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>DreamCMS 后台管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->
        <link href="<?php echo CSS_PATH; ?>bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>font-awesome.min.css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo CSS_PATH; ?>font-awesome-ie7.min.css" />
        <![endif]-->
        <!-- page specific plugin styles -->
        <!-- fonts -->
        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>ace.min.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>ace-skins.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo CSS_PATH; ?>ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo JS_PATH; ?>html5shiv.js"></script>
        <script src="<?php echo JS_PATH; ?>respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div class="navbar navbar-default" id="navbar">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="icon-leaf"></i>
                            Dream CMS后台管理系统
                        </small>
                    </a><!-- /.brand -->
                </div><!-- /.navbar-header -->

                <div class="navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <?php
                        if(!$group_id)
                        {
                            $group_id=2;
                        }
                        foreach ($authgrouplist as $key => $li)
                        {
                            ?>
                            <li class="<?php echo $group_id ==  $li['id'] ? "green" : "light-blue" ?> grouplist" id="grouplist<?php echo $li['id']; ?>">
                                <a rel="<?php echo $li['id']; ?>" data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <?php echo L($li['langconf']); ?>
                                </a>
                            </li>
                        <?php }
                        ?>



                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                当前语言：中文
                                <i class="icon-caret-down"></i>
                            </a>
                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="icon-flag"></i>
                                        中文
                                    </a>
                                </li>


                                <li class="divider"></li>

                                <li>
                                    <a href="#">
                                        <i class="icon-flag"></i>
                                        英文
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?php echo IMG_PATH; ?>user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>欢迎光临,</small>
                                    Admin
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="icon-cog"></i>
                                        设置
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="icon-user"></i>
                                        个人资料
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="<?php echo U('Auth/Login/logout'); ?>">
                                        <i class="icon-off"></i>
                                        退出
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul><!-- /.ace-nav -->
                </div><!-- /.navbar-header -->
            </div><!-- /.container -->
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>

                <div class="sidebar" id="sidebar">
                    <script type="text/javascript">
                        try {
                            ace.settings.check('sidebar', 'fixed')
                        } catch (e) {
                        }
                    </script>

                    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                            <button class="btn btn-success">
                                <i class="icon-signal"></i>
                            </button>

                            <button class="btn btn-info">
                                <i class="icon-pencil"></i>
                            </button>

                            <button class="btn btn-warning">
                                <i class="icon-group"></i>
                            </button>

                            <button class="btn btn-danger">
                                <i class="icon-cogs"></i>
                            </button>
                        </div>

                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                            <span class="btn btn-success"></span>

                            <span class="btn btn-info"></span>

                            <span class="btn btn-warning"></span>

                            <span class="btn btn-danger"></span>
                        </div>
                    </div><!-- #sidebar-shortcuts -->

                    <ul class="nav nav-list">
                        <li class="active" id="mod_title">
                            <a href="index.html">
                                <i class="icon-dashboard"></i>
                                <span class="menu-text" id="all_menu-text"> 控制台 </span>
                            </a>
                        </li>

                    </ul><!-- /.nav-list -->

                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                    </div>

                    <script type="text/javascript">
                        try {
                            ace.settings.check('sidebar', 'collapsed')
                        } catch (e) {
                        }
                    </script>
                </div>

                <div class="main-content">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home home-icon"></i>
                                <a href="#">首页</a>
                            </li>
                            <li class="active">控制台</li>
                        </ul><!-- .breadcrumb -->

                        <div class="nav-search" id="nav-search">
                            <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                    <i class="icon-search nav-search-icon"></i>
                                </span>
                            </form>
                        </div><!-- #nav-search -->
                    </div>

                    <?php include $view ?>

                </div>

                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="icon-cog bigger-150"></i>
                    </div>

                    <div class="ace-settings-box" id="ace-settings-box">
                        <div>
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-skin="default" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                </select>
                            </div>
                            <span>&nbsp; 选择皮肤</span>
                        </div>

                        <div>
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                            <label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
                        </div>

                        <div>
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                            <label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
                        </div>

                        <div>
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                            <label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
                        </div>

                        <div>
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                            <label class="lbl" for="ace-settings-rtl">切换到左边</label>
                        </div>

                        <div>
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                            <label class="lbl" for="ace-settings-add-container">
                                切换窄屏
                                <b></b>
                            </label>
                        </div>
                    </div>
                </div><!-- /#ace-settings-container -->
            </div><!-- /.main-container-inner -->

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="icon-double-angle-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->

        <script src="<?php echo JS_PATH ?>jquery-2.0.3.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="<?php echo JS_PATH ?>jquery-1.10.2.min.js"></script>
<![endif]-->

        <!--[if !IE]> -->

        <script type="text/javascript">
                            window.jQuery || document.write("<script src='<?php echo JS_PATH ?>jquery-2.0.3.min.js'>" + "<" + "script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php echo JS_PATH ?>jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo JS_PATH ?>jquery.mobile.custom.min.js'>" + "<" + "script>");
        </script>
        <script src="<?php echo JS_PATH ?>bootstrap.min.js"></script>
        <script src="<?php echo JS_PATH ?>typeahead-bs2.min.js"></script>

        <!-- page specific plugin scripts -->

        <!--[if lte IE 8]>
          <script src="<?php echo JS_PATH ?>excanvas.min.js"></script>
        <![endif]-->

        <!-- ace scripts -->

        <script src="<?php echo JS_PATH ?>ace-elements.min.js"></script>
        <script src="<?php echo JS_PATH ?>ace.min.js"></script>

        <!-- inline scripts related to this page -->

        <script type="text/javascript">

            $('.grouplist').find('a').click(function () {
                obj = $(this).parent().parent().find('.green');
                obj.removeClass('green');
                obj.addClass('light-blue');
                $(this).parent().removeClass('light-blue');
                $(this).parent().addClass('green');
                getleftmenu($(this).attr('rel'));
            });
            group_id = '<?php echo $group_id ?>';
            if (group_id == '')
            {
                getleftmenu($('.grouplist:first').find('a').attr('rel'));
            }
            else
            {
                getleftmenu(group_id);
            }

            function getleftmenu(gid)
            {

                $('#all_menu-text').text($('#grouplist' + gid).text());
                $.ajax({
                    type: "post",
                    url: "<?php echo U('Index/Index/getleftmenu') ?>",
                    data: {gid: $('#grouplist' + gid).find('a').attr('rel')},
                    dataType: 'json',
                    success: function (data) {
                        var menu = '';
                        var ccls = '';
                        var acls = '';
                        $.each(data, function (i, item) {
                            ccls = '';
                            if (item.id == '<?php echo $controller_id; ?>')
                            {
                                ccls = 'active open';
                            }
                            menu += '<li class="' + ccls + '">';
                            menu += '<a href="#" class="dropdown-toggle">';
                            menu += ' <i class="' + item.cls + '"></i>';
                            menu += '<span class="menu-text"> ' + item.title + ' </span>';
                            menu += '<b class="arrow icon-angle-down"></b>';
                            menu += ' </a>';
                            menu += ' <ul class="submenu">';

                            if (item.child != null)
                            {
                                $.each(item.child, function (i, subitem) {
                                     acls = '';
                                    if (subitem.id == '<?php echo $action_id; ?>')
                                    {
                                        acls = 'active ';
                                    }
                                    menu += ' <li  class="' + acls + '">';
                                    menu += ' <a href=" ' + subitem.url + '">';
                                    menu += ' <i class="icon-double-angle-right"></i>';
                                    menu += subitem.title;
                                    menu += ' </a>';
                                    menu += ' </li>';
                                });
                            }
                            menu += ' </ul>';
                            menu += '</li>';
                        });

                        $('.nav-list').find('#mod_title').nextAll().remove();
                        $('.nav-list').find('#mod_title').after(menu);
                    }
                });
            }

        </script>
    </body>
</html>

