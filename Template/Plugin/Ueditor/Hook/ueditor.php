<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__;?>/Template/Plugin/Ueditor/js/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__;?>/Template/Plugin/Ueditor/js/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src=" <?php echo __ROOT__;?>/Template/Plugin/Ueditor/js/lang/zh-cn/zh-cn.js"></script>
<script id="editor" type="text/plain" style="width:100%;height:500px;"></script>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>