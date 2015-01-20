<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>DreamCMS - php版多语言CMS 安全 高效 易扩展</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php include (TMPL_PATH . 'Layout/head.php'); ?>
    </head>

    <body> 
        <!-- Header -->
        <?php include (TMPL_PATH . 'Layout/header.php'); ?>


        <div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <i class="icon-user page-title-icon"></i>
                        <h2>二次开发/</h2>
                        <p>DreamCMS二次开发教程</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-us container">
            <div class="row">
                <?php $cates = Org\Helper\TMP::CATE(2); ?>
                <?php
                foreach ($cates as $c)
                {
                    ?>
                    <div class="about-us-text span4">
                        <h4><?php echo $c['title']; ?></h4>
                        <ul style="padding-left: 50px;">
                            <?php $arcs = \Org\Helper\TMP::SIMPLEARTICLES($c['id'], 100); ?>
                            <?php
                            foreach ($arcs as $k => $a)
                            {
                                ?>
                                <li><a href="<?php echo $a['href'] ?>"><?php echo $a['title']; ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                <?php }
                ?>
            </div>
        </div>

        <!-- Footer -->
        <?php include (TMPL_PATH . 'Layout/footer.php'); ?>
    </body>
</html>