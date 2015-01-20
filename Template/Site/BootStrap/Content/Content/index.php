<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>DreamCMS - php版多语言CMS 安全 高效 易扩展</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php include (TMPL_PATH . 'Layout/head.php'); ?>
        <style>
            .what-we-do p{ margin: 0 15px; text-align: left}
            
        </style>
    </head>

    <body>
        <?php //print_r(  Org\Helper\TMP::MENU());?>
        <!-- Header -->
        <?php include (TMPL_PATH . 'Layout/header.php'); ?>
        <div class="presentation container">
            <h2> <span class="violet">DreamCMS</span>, PHP多语言CMS.</h2>
            <p>安全高效 易二次开发 前后台多语言 多模板 完善的钩子系统. <a href="#">下载(最新版本V0.8)</a></p>
        </div>

        <!-- Services -->
        <div class="what-we-do container">
            <div class="row">

                <div class="service span3">
                    <div class="icon-awesome">
                        <i class="icon-magic"></i>
                    </div>
                    <h4>安装和基本操作</h4>
                    <p>DreamCMS 的基本操作、多语言如何设置、栏目如何添加、文章如何发布、权限如何分配</p>
                    <a href="services.html">Read more</a>
                </div>

                <div class="service span3">
                    <div class="icon-awesome">
                        <i class="icon-eye-open"></i>
                    </div>
                    <h4>模板开发教程</h4>
                    <p>如何引入CSS JS 、有哪些常用标签、标签如何调用、模板目录结构是什么</p>
                    <a href="services.html">Read more</a>
                </div>
                <div class="service span3">
                    <div class="icon-awesome">
                        <i class="icon-table"></i>
                    </div>
                    <h4>多语言配置</h4>
                    <p>如何配置多语言、语言目录结构、前台如何设置多语言、后台如何设置</p>
                    <a href="services.html">Read more</a>
                </div>

                <div class="service span3">
                    <div class="icon-awesome">
                        <i class="icon-print"></i>
                    </div>
                    <h4>二次开发教程</h4>
                    <p>插件、钩子机制介绍，如何开发一个属于自己的插件</p>
                    <a href="services.html">Read more</a>
                </div>
            </div>
        </div>


        <div style="height: 60px;"></div>
        <!-- Footer -->
        <?php include (TMPL_PATH . 'Layout/footer.php'); ?>


    </body>

</html>

