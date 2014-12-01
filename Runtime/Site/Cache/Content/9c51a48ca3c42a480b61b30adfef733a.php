<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/><style media="screen"></style>
        <meta name="renderer" content="webkit"/>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

        <title><?php echo ($seo['desc']); ?></title>
        <meta name="description" content="<?php echo ($seo['desc']); ?>" />
        <meta name="keywords" content="<?php echo ($seo['keyword']); ?>" />

    </head>

    <body style="height: 100%;">
        <?php $a=array( 'type'=>'Editor', 'element'=>'Ueditor', ); \Element\EmtShow::show($a); ?>
    <?php if(is_array($lang)): $i = 0; $__LIST__ = $lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><a href="<?php echo ($l['href']); ?>" ><?php echo L($l['lang']);?></a> <span>|</span><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><li class="menu01" style="width:163px;">

        <a href="<?php echo ($m['href']); ?>"><?php echo ($m['title']); ?></a>
        <dl style="width: 163px; display: none;">
            <dd>
            <?php if(is_array($m['child'])): $i = 0; $__LIST__ = $m['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><a href="<?php echo ($c['title']); ?>" title="广告技术" ><span><?php echo ($c['title']); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </dd>
        </dl>
    <li class="line"></li>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

    

    <?php $m=new \Think\Model();$data=$m->cache(3600,true)->query("select * from fl_article where cid=$cid limit 5") ?>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i; echo ($d['title']); endforeach; endif; else: echo "" ;endif; ?>
    <?php if(is_array($arr_data)): $i = 0; $__LIST__ = $arr_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;?><li>
            <a href="<?php echo ($data['href']); ?>" target="_self" title="<?php echo ($data['title']); ?>"><span class="ac"><?php echo ($data['title']); ?></span></a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>


    <?php if(is_array($arr_linkdata)): $i = 0; $__LIST__ = $arr_linkdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$linkdata): ++$i;?><li>
        <a href="<?php echo ($linkdata['href']); ?>" target="_self" title="<?php echo ($linkdata['title']); ?>"><span class="ac"><?php echo ($linkdata['title']); ?></span></a>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php echo hook('ARTICLE_AFTER');?>
</body></html>