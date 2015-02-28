<footer>
    <div class="container">
        <div class="row">
            <div class="widget span3">
                <h4>关于我们</h4>
                <p>
                    <?php
                    $AboutAs = \Org\Helper\TMP::SINGLEPAGE(10);
                    echo $aboutdesc = \Org\Util\String::msubstr(strip_tags($AboutAs['content']), 0, 100);
                    ?>
                   
                </p>
                <p><a href="<?php echo \Org\Helper\Route::CUrl('Content/Content/page', array('cid' => 10)) ?>">Read more...</a></p>
            </div>
            <div class="widget span3">
                <h4>版权声明</h4>
                <p>
                     <?php
                    $Copy = \Org\Helper\TMP::SINGLEPAGE(11);
                    echo  \Org\Util\String::msubstr(strip_tags($Copy['content']), 0, 100);
                    ?>
                </p>
                 <p><a href="<?php echo \Org\Helper\Route::CUrl('Content/Content/page', array('cid' => 11)) ?>">Read more...</a></p>
            </div>
            <div class="widget span3">
                <h4>商务合作</h4>
                <p>
                 <?php
                    $Business = \Org\Helper\TMP::SINGLEPAGE(12);
                    echo  \Org\Util\String::msubstr(strip_tags($Business['content']), 0, 100);
                    ?>
                </p>
                <p><a href="<?php echo \Org\Helper\Route::CUrl('Content/Content/page', array('cid' => 12)) ?>">Read more...</a></p>
            </div>
            <div class="widget span3">
                <h4>联系我们</h4>
                <p><i class="icon-map-marker"></i> Address: 江苏省 镇江市</p>
                <p><i class="icon-user"></i> QQ: 284909375</p>
                <p><i class="icon-envelope-alt"></i> Email: <a href="">284909375@qq.com</a></p>
                <p><i class="icon-envelope-alt"></i> Email: <a href="">hot12121212@163.com</a></p>
            </div>
        </div>
        <div class="footer-border"></div>
        <div class="row">
            <div class="copyright span4">
                <p>Copyright 2015 DreamCMS - All rights reserved. </p>
            </div>
            <div class="social span8">
                <a class="facebook" href=""></a>
                <a class="dribbble" href=""></a>
                <a class="twitter" href=""></a>
                <a class="pinterest" href=""></a>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo JS_PATH; ?>jquery-1.8.2.min.js"></script>
<script src="<?php echo JS_PATH; ?>bootstrap.min.js"></script>