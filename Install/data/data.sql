

DROP TABLE IF EXISTS `{pre}admin`;
CREATE TABLE `{pre}admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `{pre}admin_auth_action`;
CREATE TABLE `{pre}admin_auth_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `app` varchar(50) NOT NULL,
  `gid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `group` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `isshow` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;


INSERT INTO `{pre}admin_auth_action` VALUES ('1', '文章列表', 'admin.php', '2', '1', 'Content', 'Content', '', '1');
INSERT INTO `{pre}admin_auth_action` VALUES ('2', '添加语言', 'admin.php', '3', '2', 'System', 'Language', 'add', '1');
INSERT INTO `{pre}admin_auth_action` VALUES ('3', '语言列表', 'admin.php', '3', '2', 'System', 'Language', 'langlist', '1');
INSERT INTO `{pre}admin_auth_action` VALUES ('4', '推荐位列表', 'admin.php', '2', '3', 'Content', 'Position', 'positionlist', '1');
INSERT INTO `{pre}admin_auth_action` VALUES ('5', '添加推荐位', 'admin.php', '2', '3', 'Content', 'Position', 'add', '1');
INSERT INTO `{pre}admin_auth_action` VALUES ('6', '基本设置', 'admin.php', '3', '4', 'System', 'Webset', 'index', '1');
INSERT INTO `{pre}admin_auth_action` VALUES ('7', '删除语言', 'admin.php', '3', '2', 'System', 'Language', 'del', '0');
INSERT INTO `{pre}admin_auth_action` VALUES ('8', '编辑语言', 'admin.php', '3', '2', 'System', 'Language', 'edit', '0');
INSERT INTO `{pre}admin_auth_action` VALUES ('9', '添加栏目', 'admin.php', '2', '5', 'Content', 'Category', 'add', '1');
INSERT INTO `{pre}admin_auth_action` VALUES ('11', '编辑推荐位', 'admin.php', '2', '3', 'Content', 'Position', 'edit', '0');
INSERT INTO `{pre}admin_auth_action` VALUES ('12', '删除推荐位', 'admin.php', '2', '3', 'Content', 'Position', 'del', '0');
INSERT INTO `{pre}admin_auth_action` VALUES ('13', '添加文章', 'admin.php', '2', '1', 'Content', 'Content', 'add', '1');
INSERT INTO `{pre}admin_auth_action` VALUES ('14', '供应列表', 'admin.php', '4', '6', 'Spldem', 'Supply', 'supplylist', '1');
INSERT INTO `{pre}admin_auth_action` VALUES ('15', '管理栏目', 'admin.php', '2', '5', 'Content', 'Category', 'index', '1');


DROP TABLE IF EXISTS `{pre}admin_auth_controller`;
CREATE TABLE `{pre}admin_auth_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `gid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `{pre}admin_auth_controller` VALUES ('1', '内容管理', 'Content', '2');
INSERT INTO `{pre}admin_auth_controller` VALUES ('2', '语言管理', 'Language', '3');
INSERT INTO `{pre}admin_auth_controller` VALUES ('3', '推荐位管理', 'Position', '2');
INSERT INTO `{pre}admin_auth_controller` VALUES ('4', '网站设置', 'WebSet', '3');
INSERT INTO `{pre}admin_auth_controller` VALUES ('5', '栏目管理', 'Category', '2');
INSERT INTO `{pre}admin_auth_controller` VALUES ('6', '供应管理', 'Supply', '4');


DROP TABLE IF EXISTS `{pre}admin_auth_group`;
CREATE TABLE `{pre}admin_auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


INSERT INTO `{pre}admin_auth_group` VALUES ('1', '权限', 'Auth', '3');
INSERT INTO `{pre}admin_auth_group` VALUES ('2', '内容', 'Content', '0');
INSERT INTO `{pre}admin_auth_group` VALUES ('3', '系统', 'System', '2');
INSERT INTO `{pre}admin_auth_group` VALUES ('4', '供求', 'Spldem', '1');


DROP TABLE IF EXISTS `{pre}admin_group`;
CREATE TABLE `{pre}admin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `{pre}admin_group` VALUES ('1', '核心');
INSERT INTO `{pre}admin_group` VALUES ('2', '模块');


DROP TABLE IF EXISTS `{pre}admin_role`;
CREATE TABLE `{pre}admin_role` (
  `id` int(11) NOT NULL,
  `admingroupid` int(11) NOT NULL,
  `authid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `{pre}article`;
CREATE TABLE `{pre}article` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `{pre}category`;
CREATE TABLE `{pre}category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `pid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `langid` int(11) NOT NULL DEFAULT '1',
  `tmpl` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;


INSERT INTO `{pre}category` VALUES ('1', 'xxxxxx', 'xxxxx', 'xxxxx', '0', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('2', 'werwrwre', 'werwer', 'werwer', '0', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('3', '第二级A', '第二级A', '第二级A', '1', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('4', '第二级B', '第二级B', '第二级B', '1', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('5', '第二级C', '第二级C', '第二级C', '1', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('6', '第3级A', '33级A', '第3级A', '3', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('7', '第3级B', '第3级B', '第3级B', '3', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('8', '第3级C', '第3级C', '第3级C', '3', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('9', 'zxczxczxcczxcaszxcz', 'zxczx', 'zxc', '2', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('10', 'asdasd', 'asdas', 'asd', '9', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('11', 'asdasd', 'asdas', 'asd', '9', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('12', 'saasdaa', 'dasdas', 'asdasd', '2', '1', '1', 'Category.php');
INSERT INTO `{pre}category` VALUES ('13', '中国飞龙网ddddd', '宿舍', '是', '4', '2', '1', 'Category.php');


DROP TABLE IF EXISTS `{pre}language`;
CREATE TABLE `{pre}language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `lang` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `{pre}language` VALUES ('1', '中文', 'zh-cn');
INSERT INTO `{pre}language` VALUES ('2', '英文', 'en-us');
INSERT INTO `{pre}language` VALUES ('5', '德语', 'de-de');


DROP TABLE IF EXISTS `{pre}module`;
CREATE TABLE `{pre}module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `table` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `{pre}module` VALUES ('1', '文章', 'article');
INSERT INTO `{pre}module` VALUES ('2', '图片', 'photo');
INSERT INTO `{pre}module` VALUES ('3', '单页面', 'page');


DROP TABLE IF EXISTS `{pre}photo`;
CREATE TABLE `{pre}photo` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `thumb` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `{pre}photo_data`;
CREATE TABLE `{pre}photo_data` (
  `id` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `{pre}position`;
CREATE TABLE `{pre}position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


INSERT INTO `{pre}position` VALUES ('1', '首页推荐');
INSERT INTO `{pre}position` VALUES ('2', '首页幻灯');
INSERT INTO `{pre}position` VALUES ('4', '热点头条');


DROP TABLE IF EXISTS `{pre}web_config`;
CREATE TABLE `{pre}web_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parent_id` int(11) DEFAULT NULL COMMENT '父节点id，取值于该表id字段的值',
  `code` varchar(200) DEFAULT NULL COMMENT '变量名',
  `value` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `{pre}web_config` VALUES ('1', '0', 'webset', null);
INSERT INTO `{pre}web_config` VALUES ('2', '1', 'title', '中国飞龙网123');
INSERT INTO `{pre}web_config` VALUES ('3', '1', 'keyword', '飞龙,中国,江苏,镇江');
INSERT INTO `{pre}web_config` VALUES ('5', '1', 'description', '金陵晚报讯（记者 张楠） 昨天，南京市网上房地产公布8月份的退房名单，50套的退房量也创下今年退房市场的新高。\r\n\r\n从公布的数据来看，8月份江宁和江北成为退房量最大的区域，其中江北24套的退房量成为第一，江宁以22套的退房量排名次之，剩余楼盘分别来自河西、高淳和溧水。\r\n\r\n本月江北被退的房源主要来自东方熙龙山院、朗诗未来街区、荣盛龙湖半岛、骋望七里楠花园、亚泰梧桐世家、新城香溢紫郡，其中，东方熙龙山院退房最多有7套。从被退房源的户型来看，不少房源都是100平方米以下的小户型。朗诗未来街区有三套退房，都是66-82平米之间的小户型房源。');
INSERT INTO `{pre}web_config` VALUES ('6', '1', 'default_template', 'Default');
