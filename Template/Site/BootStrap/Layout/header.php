<div class="container">
    <div class="header row">
        <div class="span12">
            <div class="navbar">
                <div class="navbar-inner">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <h1>
                        <a class="brand" href="index.html">Andia - a super cool design agency...</a>
                    </h1>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="current-page">
                                <a href="<?php echo __ROOT__; ?>"><i class="icon-home"></i><br />首页</a>
                            </li>
                            <?php
                            foreach ($menu as $k => $m)
                            {
                                ?>
                                <li>
                                    <a href="<?php echo $m['href']; ?>"><i class="icon-camera"></i><br /><?php echo $m['title']; ?></a>
                                </li> 
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>