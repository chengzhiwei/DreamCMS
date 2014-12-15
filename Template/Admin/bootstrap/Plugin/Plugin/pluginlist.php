<style>
    .profile-activity .tools{display:block;}

    .modal-content{border-radius:5px;}
    .modal-body {
        max-height: 800px;
    }fieldset{ padding-bottom: 20px;}
    .form-horizontal .control-label .chk_lbl{text-align:left}
</style>
<script>
    $(function () {
        $('#install_plugin').on('click', function () {
            $(this).html('loading');
        });
    });

</script>
<div class="page-content">
    <div class="page-header">
        <h1>

            <small>
                <i class="icon-double-angle-right"></i>
                插件列表
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->


            <div class="widget-body">
                <div class="widget-main padding-8">
                    <div  >
                        <div class="profile-feed" id="profile-feed-1" >

                            <?php
                            foreach ($plugin_arr as $k => $p)
                            {
                                ?>
                                <div class="profile-activity clearfix">
                                    <div>
                                        <i class="pull-left thumbicon icon-ok btn-success no-hover"></i>
                                        <a href="#" class="user"> <?php echo L((String) $p->name); ?> </a>
                                        作者：<?php echo $p_arr['author'] ?> EMAIL：<a href="mailto"><?php echo $p_arr['contact'] ?></a>


                                        <div class="time">
                                            <?php echo L((String) $p->desc); ?>
                                        </div>
                                    </div>

                                    <div class="tools action-buttons">
                                        <a class="btn btn-xs btn-success" id="install_plugin" href="<?php echo U('Plugin/Plugin/install', array('plugin' => (String) $p->plugin)) ?>" >
                                            安装
                                        </a>
                                        <a class="btn btn-xs btn-danger" href="#">
                                            删除
                                        </a>

                                    </div>
                                </div>
                            <?php }
                            ?>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon icon-ok btn-success no-hover"></i>
                                    <a href="#" class="user"> 百度编辑器UEditor </a>
                                    作者：DreamCMS EMAIL：<a href="mailto">hot12121212@163.com</a>


                                    <div class="time">
                                        UEditor 是一套开源的在线HTML编辑器,主要用于让用户在网站上获得所见即所得编辑效果

                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a class="btn btn-xs btn-success" id="install_plugin" href="#" >
                                        安装
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="#">
                                        删除
                                    </a>

                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon icon-picture btn-info no-hover"></i>
                                    <a href="#" class="user"> WebUploader 文件上传插件 </a>
                                    作者：DreamCMS EMAIL：<a href="mailto">hot12121212@163.com</a>

                                    <div class="time">

                                        WebUploader是由Baidu WebFE(FEX)团队开发的一个简单的以HTML5为主,FLASH为辅的现代文件上传组件
                                    </div>
                                </div>

                                <div class="tools action-buttons" >
                                    <a class="btn btn-xs btn-yellow" href="#"  data-toggle="modal" data-target=".bs-example-modal-lg">
                                        配置
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="#">
                                        卸载
                                    </a>
                                </div>
                            </div>


                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon icon-ok btn-success no-hover"></i>
                                    <a href="#" class="user"> 百度编辑器UEditor </a>
                                    作者：DreamCMS EMAIL：<a href="mailto">hot12121212@163.com</a>


                                    <div class="time">
                                        UEditor 是一套开源的在线HTML编辑器,主要用于让用户在网站上获得所见即所得编辑效果

                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a class="btn btn-xs btn-success" href="#">
                                        安装
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="#">
                                        删除
                                    </a>

                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon icon-picture btn-info no-hover"></i>
                                    <a href="#" class="user"> WebUploader 文件上传插件 </a>
                                    作者：DreamCMS EMAIL：<a href="mailto">hot12121212@163.com</a>

                                    <div class="time">

                                        WebUploader是由Baidu WebFE(FEX)团队开发的一个简单的以HTML5为主,FLASH为辅的现代文件上传组件
                                    </div>
                                </div>

                                <div class="tools action-buttons" >
                                    <a class="btn btn-xs btn-yellow" href="#">
                                        配置
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="#">
                                        卸载
                                    </a>
                                </div>
                            </div>


                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon icon-ok btn-success no-hover"></i>
                                    <a href="#" class="user"> 百度编辑器UEditor </a>
                                    作者：DreamCMS EMAIL：<a href="mailto">hot12121212@163.com</a>


                                    <div class="time">
                                        UEditor 是一套开源的在线HTML编辑器,主要用于让用户在网站上获得所见即所得编辑效果

                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a class="btn btn-xs btn-success" href="#">
                                        安装
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="#">
                                        删除
                                    </a>

                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon icon-picture btn-info no-hover"></i>
                                    <a href="#" class="user"> WebUploader 文件上传插件 </a>
                                    作者：DreamCMS EMAIL：<a href="mailto">hot12121212@163.com</a>

                                    <div class="time">

                                        WebUploader是由Baidu WebFE(FEX)团队开发的一个简单的以HTML5为主,FLASH为辅的现代文件上传组件
                                    </div>
                                </div>

                                <div class="tools action-buttons" >
                                    <a class="btn btn-xs btn-yellow" href="#">
                                        配置
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="#">
                                        卸载
                                    </a>
                                </div>
                            </div>


                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon icon-ok btn-success no-hover"></i>
                                    <a href="#" class="user"> 百度编辑器UEditor </a>
                                    作者：DreamCMS EMAIL：<a href="mailto">hot12121212@163.com</a>


                                    <div class="time">
                                        UEditor 是一套开源的在线HTML编辑器,主要用于让用户在网站上获得所见即所得编辑效果

                                    </div>
                                </div>

                                <div class="tools action-buttons">
                                    <a class="btn btn-xs btn-success" href="#">
                                        安装
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="#">
                                        删除
                                    </a>

                                </div>
                            </div>

                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon icon-picture btn-info no-hover"></i>
                                    <a href="#" class="user"> WebUploader 文件上传插件 </a>
                                    作者：DreamCMS EMAIL：<a href="mailto">hot12121212@163.com</a>

                                    <div class="time">

                                        WebUploader是由Baidu WebFE(FEX)团队开发的一个简单的以HTML5为主,FLASH为辅的现代文件上传组件
                                    </div>
                                </div>

                                <div class="tools action-buttons" >
                                    <a class="btn btn-xs btn-yellow" href="#">
                                        配置
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="#">
                                        卸载
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button data-dismiss="modal" class="close close_js" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="myLargeModalLabel" class="modal-title">配置插件</h4>
            </div>
            <div class="modal-body" >
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="widget-header">
                        <h4 class="lighter smaller">
                            <i class="icon-rss orange"></i>
                            百度编辑器
                        </h4>

                        <div class="widget-toolbar no-border">
                            <ul id="recent-tab" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#task-tab" data-toggle="tab">插件前台</a>
                                </li>

                                <li class="">
                                    <a href="#member-tab" data-toggle="tab">插件后台</a>
                                </li>

                                <li class="">
                                    <a href="#comment-tab" data-toggle="tab">视图钩子</a>
                                </li>
                                <li class="">
                                    <a href="#bessions-tab" data-toggle="tab">业务钩子</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="widget-body">
                        <div class="widget-main padding-4">
                            <div class="tab-content padding-8 overflow-visible">
                                <div class="tab-pane active" id="task-tab">
                                    <h4 class="smaller lighter green">
                                        <i class="icon-double-angle-right"></i>
                                        可拖拽排序列表
                                    </h4>

                                    <ul class="item-list ui-sortable" id="tasks">
                                        <li class="item-orange clearfix">
                                            <label class="inline">
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"> 问答</span>
                                            </label>

                                            <div data-percent="42" data-color="#ECCB71" data-size="30" class="pull-right easy-pie-chart percentage easyPieChart" style="width: 30px; height: 30px; line-height: 30px;">
                                                <span class="percent">42</span>%
                                                <canvas height="30" width="30"></canvas></div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-pane" id="member-tab">
                                    <div class="clearfix">
                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img src="assets/avatars/user.jpg" alt="Bob Doe's avatar">
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Bob Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="icon-time"></i>
                                                    <span class="green">20 min</span>
                                                </div>

                                                <div>
                                                    <span class="label label-warning label-sm">pending</span>

                                                    <div class="inline position-relative">
                                                        <button data-toggle="dropdown" class="btn btn-minier bigger btn-yellow btn-no-border dropdown-toggle">
                                                            <i class="icon-angle-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-success" href="#" data-original-title="Approve">
                                                                    <span class="green">
                                                                        <i class="icon-ok bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-warning" href="#" data-original-title="Reject">
                                                                    <span class="orange">
                                                                        <i class="icon-remove bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-error" href="#" data-original-title="Delete">
                                                                    <span class="red">
                                                                        <i class="icon-trash bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img src="assets/avatars/avatar2.png" alt="Joe Doe's avatar">
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Joe Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="icon-time"></i>
                                                    <span class="green">1 hour</span>
                                                </div>

                                                <div>
                                                    <span class="label label-warning label-sm">pending</span>

                                                    <div class="inline position-relative">
                                                        <button data-toggle="dropdown" class="btn btn-minier bigger btn-yellow btn-no-border dropdown-toggle">
                                                            <i class="icon-angle-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-success" href="#" data-original-title="Approve">
                                                                    <span class="green">
                                                                        <i class="icon-ok bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-warning" href="#" data-original-title="Reject">
                                                                    <span class="orange">
                                                                        <i class="icon-remove bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-error" href="#" data-original-title="Delete">
                                                                    <span class="red">
                                                                        <i class="icon-trash bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img src="assets/avatars/avatar.png" alt="Jim Doe's avatar">
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Jim Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="icon-time"></i>
                                                    <span class="green">2 hour</span>
                                                </div>

                                                <div>
                                                    <span class="label label-warning label-sm">pending</span>

                                                    <div class="inline position-relative">
                                                        <button data-toggle="dropdown" class="btn btn-minier bigger btn-yellow btn-no-border dropdown-toggle">
                                                            <i class="icon-angle-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-success" href="#" data-original-title="Approve">
                                                                    <span class="green">
                                                                        <i class="icon-ok bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-warning" href="#" data-original-title="Reject">
                                                                    <span class="orange">
                                                                        <i class="icon-remove bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-error" href="#" data-original-title="Delete">
                                                                    <span class="red">
                                                                        <i class="icon-trash bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img src="assets/avatars/avatar5.png" alt="Alex Doe's avatar">
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Alex Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="icon-time"></i>
                                                    <span class="green">3 hour</span>
                                                </div>

                                                <div>
                                                    <span class="label label-danger label-sm">blocked</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img src="assets/avatars/avatar2.png" alt="Bob Doe's avatar">
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Bob Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="icon-time"></i>
                                                    <span class="green">6 hour</span>
                                                </div>

                                                <div>
                                                    <span class="label label-success label-sm arrowed-in">approved</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img src="assets/avatars/avatar3.png" alt="Susan's avatar">
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Susan</a>
                                                </div>

                                                <div class="time">
                                                    <i class="icon-time"></i>
                                                    <span class="green">yesterday</span>
                                                </div>

                                                <div>
                                                    <span class="label label-success label-sm arrowed-in">approved</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img src="assets/avatars/avatar4.png" alt="Phil Doe's avatar">
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Phil Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="icon-time"></i>
                                                    <span class="green">2 days ago</span>
                                                </div>

                                                <div>
                                                    <span class="label label-info label-sm arrowed-in arrowed-in-right">online</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img src="assets/avatars/avatar1.png" alt="Alexa Doe's avatar">
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Alexa Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="icon-time"></i>
                                                    <span class="green">3天以前</span>
                                                </div>

                                                <div>
                                                    <span class="label label-success label-sm arrowed-in">approved</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="center">
                                        <i class="icon-group icon-2x green"></i>

                                        &nbsp;
                                        <a href="#">
                                            查看所有会员 &nbsp;
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>

                                    <div class="hr hr-double hr8"></div>
                                </div><!-- member-tab -->

                                <div class="tab-pane" id="comment-tab">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="comments" style="overflow: hidden; width: auto; height: 300px;">
                                            <div class="itemdiv commentdiv">
                                                <div class="user">
                                                    <img src="assets/avatars/avatar.png" alt="Bob Doe's Avatar">
                                                </div>

                                                <div class="body">
                                                    <div class="name">
                                                        <a href="#">Bob Doe</a>
                                                    </div>

                                                    <div class="time">
                                                        <i class="icon-time"></i>
                                                        <span class="green">6 min</span>
                                                    </div>

                                                    <div class="text">
                                                        <i class="icon-quote-left"></i>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis …
                                                    </div>
                                                </div>

                                                <div class="tools">
                                                    <div class="inline position-relative">
                                                        <button data-toggle="dropdown" class="btn btn-minier bigger btn-yellow dropdown-toggle">
                                                            <i class="icon-angle-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-success" href="#" data-original-title="Approve">
                                                                    <span class="green">
                                                                        <i class="icon-ok bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-warning" href="#" data-original-title="Reject">
                                                                    <span class="orange">
                                                                        <i class="icon-remove bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a title="" data-rel="tooltip" class="tooltip-error" href="#" data-original-title="Delete">
                                                                    <span class="red">
                                                                        <i class="icon-trash bigger-110"></i>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="itemdiv commentdiv">
                                                <div class="user">
                                                    <img src="assets/avatars/avatar1.png" alt="Jennifer's Avatar">
                                                </div>

                                                <div class="body">
                                                    <div class="name">
                                                        <a href="#">Jennifer</a>
                                                    </div>

                                                    <div class="time">
                                                        <i class="icon-time"></i>
                                                        <span class="blue">15 min</span>
                                                    </div>

                                                    <div class="text">
                                                        <i class="icon-quote-left"></i>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis …
                                                    </div>
                                                </div>

                                                <div class="tools">
                                                    <div class="action-buttons bigger-125">
                                                        <a href="#">
                                                            <i class="icon-pencil blue"></i>
                                                        </a>

                                                        <a href="#">
                                                            <i class="icon-trash red"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="itemdiv commentdiv">
                                                <div class="user">
                                                    <img src="assets/avatars/avatar2.png" alt="Joe's Avatar">
                                                </div>

                                                <div class="body">
                                                    <div class="name">
                                                        <a href="#">Joe</a>
                                                    </div>

                                                    <div class="time">
                                                        <i class="icon-time"></i>
                                                        <span class="orange">22 min</span>
                                                    </div>

                                                    <div class="text">
                                                        <i class="icon-quote-left"></i>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis …
                                                    </div>
                                                </div>

                                                <div class="tools">
                                                    <div class="action-buttons bigger-125">
                                                        <a href="#">
                                                            <i class="icon-pencil blue"></i>
                                                        </a>

                                                        <a href="#">
                                                            <i class="icon-trash red"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="itemdiv commentdiv">
                                                <div class="user">
                                                    <img src="assets/avatars/avatar3.png" alt="Rita's Avatar">
                                                </div>

                                                <div class="body">
                                                    <div class="name">
                                                        <a href="#">Rita</a>
                                                    </div>

                                                    <div class="time">
                                                        <i class="icon-time"></i>
                                                        <span class="red">50 min</span>
                                                    </div>

                                                    <div class="text">
                                                        <i class="icon-quote-left"></i>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis …
                                                    </div>
                                                </div>

                                                <div class="tools">
                                                    <div class="action-buttons bigger-125">
                                                        <a href="#">
                                                            <i class="icon-pencil blue"></i>
                                                        </a>

                                                        <a href="#">
                                                            <i class="icon-trash red"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><div class="slimScrollBar ui-draggable" style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>

                                    <div class="hr hr8"></div>

                                    <div class="center">
                                        <i class="icon-comments-alt icon-2x green"></i>

                                        &nbsp;
                                        <a href="#">
                                            See all comments &nbsp;
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>

                                    <div class="hr hr-double hr8"></div>
                                </div>
                            </div>
                        </div><!-- /widget-main -->
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button  data-dismiss="modal" class="btn btn-primary sure_js" type="button">确定</button>
                <button data-dismiss="modal" class="btn btn-default close_js"  type="button">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>