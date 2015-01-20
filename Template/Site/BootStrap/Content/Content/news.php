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
                        <h2><?php echo $title?>/</h2>
                        <p><?php echo $desc;?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-us container">
            <div class="row">
                <div class="about-us-text span12">
                    <?php echo $content; ?>    
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include (TMPL_PATH . 'Layout/footer.php'); ?>
    </body>
</html>