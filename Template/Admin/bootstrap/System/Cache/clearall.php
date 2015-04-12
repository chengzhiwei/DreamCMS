<div class="page-content">
    <?php
//更新后台缓存
    echo '正在更新后台缓存...<br />';
    delDirAndFile('Runtime/' . C('ADMIN_APP_NAME'));
    echo '更新后台缓存完成...<br />';
//更新前台缓存
    echo '正在更新前台缓存...<br />';
    delDirAndFile('Runtime/' . C('SITE_APP_NAME'));
    echo '更新前台缓存完成...<br />';
//更新插件缓存
    echo '正在更新插件缓存...<br />';
    delDirAndFile('Runtime/' . C('PLG_APP_NAME'));
    echo '更新插件缓存完成...<br />';
    ?>
</div>