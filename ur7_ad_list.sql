/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : 127001

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-12-15 17:21:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ur7_ad_list`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_ad_list`;
CREATE TABLE `ur7_ad_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `href` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `tid` int(11) NOT NULL,
  `langid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_ad_list
-- ----------------------------

-- ----------------------------
-- Table structure for `ur7_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_ad_type`;
CREATE TABLE `ur7_ad_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `langid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_ad_type
-- ----------------------------
INSERT INTO `ur7_ad_type` VALUES ('3', '333333', '1');
INSERT INTO `ur7_ad_type` VALUES ('4', '44444', '1');
INSERT INTO `ur7_ad_type` VALUES ('5', '55555', '1');
INSERT INTO `ur7_ad_type` VALUES ('6', '566666', '1');
INSERT INTO `ur7_ad_type` VALUES ('7', '7777711111', '1');
INSERT INTO `ur7_ad_type` VALUES ('9', 'xxxxxx', '1');

-- ----------------------------
-- Table structure for `ur7_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_admin`;
CREATE TABLE `ur7_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_admin
-- ----------------------------
INSERT INTO `ur7_admin` VALUES ('1', 'admin', 'b160b3469d42967abe6619d443f5d1fa', '12');

-- ----------------------------
-- Table structure for `ur7_admin_auth_action`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_admin_auth_action`;
CREATE TABLE `ur7_admin_auth_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `app` varchar(50) NOT NULL DEFAULT 'admin.php',
  `gid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `group` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `langconf` varchar(50) NOT NULL,
  `isshow` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_admin_auth_action
-- ----------------------------
INSERT INTO `ur7_admin_auth_action` VALUES ('1', '文章列表', 'admin.php', '2', '1', 'Content', 'Content', 'index', 'ACT_CONTENT_CONTENT_INDEX', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('2', '添加语言', 'admin.php', '3', '2', 'System', 'Language', 'add', 'ACT_SYSTEM_LANGUAGE_ADD', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('3', '语言列表', 'admin.php', '3', '2', 'System', 'Language', 'langlist', 'ACT_SYSTEM_LANGUAGE_LANGLIST', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('4', '推荐位列表', 'admin.php', '2', '3', 'Content', 'Position', 'positionlist', 'ACT_CONTENT_POSITION_POSITIONLIST', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('5', '添加推荐位', 'admin.php', '2', '3', 'Content', 'Position', 'add', 'ACT_CONTENT_POSITION_ADD', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('7', '删除语言', 'admin.php', '3', '2', 'System', 'Language', 'del', 'ACT_SYSTEM_LANGUAGE_DEL', '0');
INSERT INTO `ur7_admin_auth_action` VALUES ('8', '编辑语言', 'admin.php', '3', '2', 'System', 'Language', 'edit', 'ACT_SYSTEM_LANGUAGE_EDIT', '0');
INSERT INTO `ur7_admin_auth_action` VALUES ('9', '添加栏目', 'admin.php', '2', '5', 'Content', 'Category', 'add', 'ACT_CONTENT_CATEGORY_ADD', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('11', '编辑推荐位', 'admin.php', '2', '3', 'Content', 'Position', 'edit', 'ACT_CONTENT_POSITION_EDIT', '0');
INSERT INTO `ur7_admin_auth_action` VALUES ('12', '删除推荐位', 'admin.php', '2', '3', 'Content', 'Position', 'del', 'ACT_CONTENT_POSITION_DEL', '0');
INSERT INTO `ur7_admin_auth_action` VALUES ('13', '添加文章', 'admin.php', '2', '1', 'Content', 'Content', 'add', 'ACT_CONTENT_CONTENT_ADD', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('14', '管理员列表', 'admin.php', '4', '6', 'Auth', 'Admin', 'Index', 'ACT_AUTH_ADMIN_INDEX', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('15', '管理栏目', 'admin.php', '2', '5', 'Content', 'Category', 'index', 'ACT_CONTENT_CATEGORY_INDEX', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('16', '友情连接管理', 'admin.php', '5', '7', 'Modules', 'Link', 'index', 'ACT_MODULES_LINK_INDEX', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('17', '添加友情连接', 'admin.php', '5', '7', 'Modules', 'Link', 'add', 'ACT_MODULES_LINK_ADD', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('19', '更新全站缓存', 'admin.php', '3', '9', 'System', 'Cache', 'clearall', 'ACT_SYSTEM_CACHE_CLEARALL', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('20', '留言列表', 'admin.php', '5', '8', 'Modules', 'Guestbook', 'index', 'ACT_MODULES_GURSTBOOK_INDEX', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('21', '分类管理', 'admin.php', '5', '10', 'Modules', 'Ad', 'typelist', 'ACT_MODULES_AD_TYPELIST', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('22', '广告管理', 'admin.php', '5', '10', 'Modules', 'Ad', 'adlist', 'ACT_MODULES_AD_ADLIST', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('23', '模型列表', 'admin.php', '2', '14', 'Content', 'Model', 'index', 'ACT_CONTENT_MODEL_INDEX', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('24', '权限管理', 'admin.php', '4', '6', 'Auth', 'Auth', 'index', 'ACT_AUTH_AUTH_INDEX', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('25', ' 插件列表', 'admin.php', '6', '12', 'Plugin', 'Plugin', 'pluginlist', 'ACT_PLUGIN_PLUGIN_PLUGINLIST', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('26', ' 添加分组', 'admin.php', '4', '13', 'Auth', 'Permissions', 'addgroup', 'ACT_AUTH_PERMISSION_ADDGROUP', '0');
INSERT INTO `ur7_admin_auth_action` VALUES ('27', '添加模块', 'admin.php', '4', '13', 'Auth', 'Permissions', 'addmodule', 'ACT_AUTH_PERMISSION_ADDMODULE', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('28', '添加权限', 'admin.php', '4', '13', 'Auth', 'Permissions', 'addaction', 'ACT_AUTH_PERMISSION_ADDACTION', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('30', '权限列表', 'admin.php', '4', '13', 'Auth', 'Permissions', 'actions', 'ACT_AUTH_PERMISSIONS_ACTIONS', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('31', '角色管理', 'admin.php', '4', '6', 'Auth', 'Admin', 'rolelist', 'ACT_AUTH_ADMIN_ROLELIST', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('32', '添加角色', 'admin.php', '4', '6', 'Auth', 'Admin', 'addrole', 'ACT_AUTH_ADMIN_ADDROLE', '0');
INSERT INTO `ur7_admin_auth_action` VALUES ('33', '添加模型', 'admin.php', '2', '14', 'Content', 'Model', 'addmodel', 'ACT_CONTENT_MODEL_ADDMODEL', '1');
INSERT INTO `ur7_admin_auth_action` VALUES ('34', '字段管理', 'admin.php', '2', '14', 'Content', 'Model', 'fields', 'ACT_CONTENT_MODEL_FIELDS', '0');
INSERT INTO `ur7_admin_auth_action` VALUES ('35', ' 修改权限', 'admin.php', '4', '13', 'Auth', 'Permissions', 'editaction', 'ACT_AUTH_PERMISSIONS_EDITACTION', '0');
INSERT INTO `ur7_admin_auth_action` VALUES ('36', '分组管理', 'admin.php', '4', '13', 'Auth', 'Permissions', 'grouplist', 'ACT_AUTH_PERMISSIONS_GROUPLIST', '1');

-- ----------------------------
-- Table structure for `ur7_admin_auth_controller`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_admin_auth_controller`;
CREATE TABLE `ur7_admin_auth_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `gid` int(11) NOT NULL,
  `langconf` varchar(50) NOT NULL,
  `cls` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_admin_auth_controller
-- ----------------------------
INSERT INTO `ur7_admin_auth_controller` VALUES ('1', '内容管理', 'Content', '2', 'CTL_CONTENT', 'icon-pencil');
INSERT INTO `ur7_admin_auth_controller` VALUES ('2', '语言管理', 'Language', '3', 'CTL_LANGUAGE', 'icon-flag');
INSERT INTO `ur7_admin_auth_controller` VALUES ('3', '推荐位管理', 'Position', '2', 'CTL_POSITION', 'icon-tag');
INSERT INTO `ur7_admin_auth_controller` VALUES ('5', '栏目管理', 'Category', '2', 'CTL_CATEGORY', 'icon-align-justify');
INSERT INTO `ur7_admin_auth_controller` VALUES ('6', '管理员管理', 'Admin', '4', 'CTL_ADMIN', ' icon-user');
INSERT INTO `ur7_admin_auth_controller` VALUES ('7', '友情链接', 'Link', '5', 'CTL_LINK', 'icon-link');
INSERT INTO `ur7_admin_auth_controller` VALUES ('8', '留言板', 'Gustbook', '5', 'CTL_GUSTBOOK', 'icon-comment');
INSERT INTO `ur7_admin_auth_controller` VALUES ('9', '缓存管理', 'Cache', '3', 'CTL_CACHE', 'icon-trash');
INSERT INTO `ur7_admin_auth_controller` VALUES ('10', '广告管理', 'Ad', '5', 'CTL_AD', 'icon-bullhorn');
INSERT INTO `ur7_admin_auth_controller` VALUES ('12', '插件管理', 'Plugin', '6', 'CTL_PLUGIN', 'icon-resize-full');
INSERT INTO `ur7_admin_auth_controller` VALUES ('13', '权限管理', 'Permissions', '4', 'CTL_PERMISSIONS', 'icon-eye-close');
INSERT INTO `ur7_admin_auth_controller` VALUES ('14', '模型管理', 'Model', '2', 'CTL_MODEL', 'icon-hdd');

-- ----------------------------
-- Table structure for `ur7_admin_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_admin_auth_group`;
CREATE TABLE `ur7_admin_auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `langconf` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_admin_auth_group
-- ----------------------------
INSERT INTO `ur7_admin_auth_group` VALUES ('2', '内容管理', 'Content', 'GROUP_CONTENT', '0');
INSERT INTO `ur7_admin_auth_group` VALUES ('3', '系统设置', 'System', 'GROUP_SYSTEM', '2');
INSERT INTO `ur7_admin_auth_group` VALUES ('4', '权限分配', 'Auth', 'GROUP_AUTH', '1');
INSERT INTO `ur7_admin_auth_group` VALUES ('5', '模块组件', 'Component', 'GROUP_COMPONENT', '3');
INSERT INTO `ur7_admin_auth_group` VALUES ('6', '插件钩子', 'Plugin', 'GROUP_PLUGIN', '4');

-- ----------------------------
-- Table structure for `ur7_admin_group`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_admin_group`;
CREATE TABLE `ur7_admin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `langconf` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_admin_group
-- ----------------------------
INSERT INTO `ur7_admin_group` VALUES ('11', '文章编辑员', 'ARTICLE_AUTHOR');
INSERT INTO `ur7_admin_group` VALUES ('12', '超级管理员', 'SUPER_MANAGER');

-- ----------------------------
-- Table structure for `ur7_admin_language`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_admin_language`;
CREATE TABLE `ur7_admin_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `default` int(11) NOT NULL DEFAULT '0',
  `tmpl` varchar(50) NOT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `seokeyword` varchar(200) DEFAULT NULL,
  `seodesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_admin_language
-- ----------------------------
INSERT INTO `ur7_admin_language` VALUES ('1', '中文', 'zh-cn', '1', '', null, null, null);

-- ----------------------------
-- Table structure for `ur7_admin_role`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_admin_role`;
CREATE TABLE `ur7_admin_role` (
  `gid` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_admin_role
-- ----------------------------
INSERT INTO `ur7_admin_role` VALUES ('11', '1');
INSERT INTO `ur7_admin_role` VALUES ('11', '13');
INSERT INTO `ur7_admin_role` VALUES ('12', '1');
INSERT INTO `ur7_admin_role` VALUES ('12', '13');
INSERT INTO `ur7_admin_role` VALUES ('12', '4');
INSERT INTO `ur7_admin_role` VALUES ('12', '5');
INSERT INTO `ur7_admin_role` VALUES ('12', '11');
INSERT INTO `ur7_admin_role` VALUES ('12', '12');
INSERT INTO `ur7_admin_role` VALUES ('12', '9');
INSERT INTO `ur7_admin_role` VALUES ('12', '15');
INSERT INTO `ur7_admin_role` VALUES ('12', '23');
INSERT INTO `ur7_admin_role` VALUES ('12', '14');
INSERT INTO `ur7_admin_role` VALUES ('12', '24');
INSERT INTO `ur7_admin_role` VALUES ('12', '31');
INSERT INTO `ur7_admin_role` VALUES ('12', '32');
INSERT INTO `ur7_admin_role` VALUES ('12', '26');
INSERT INTO `ur7_admin_role` VALUES ('12', '27');
INSERT INTO `ur7_admin_role` VALUES ('12', '28');
INSERT INTO `ur7_admin_role` VALUES ('12', '30');
INSERT INTO `ur7_admin_role` VALUES ('12', '2');
INSERT INTO `ur7_admin_role` VALUES ('12', '3');
INSERT INTO `ur7_admin_role` VALUES ('12', '7');
INSERT INTO `ur7_admin_role` VALUES ('12', '8');
INSERT INTO `ur7_admin_role` VALUES ('12', '19');
INSERT INTO `ur7_admin_role` VALUES ('12', '16');
INSERT INTO `ur7_admin_role` VALUES ('12', '17');
INSERT INTO `ur7_admin_role` VALUES ('12', '20');
INSERT INTO `ur7_admin_role` VALUES ('12', '21');
INSERT INTO `ur7_admin_role` VALUES ('12', '22');
INSERT INTO `ur7_admin_role` VALUES ('12', '25');

-- ----------------------------
-- Table structure for `ur7_article`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_article`;
CREATE TABLE `ur7_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(11) DEFAULT NULL COMMENT '栏目ID',
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  `clicks` int(11) DEFAULT '0' COMMENT '点击次数',
  `state` varchar(255) DEFAULT NULL COMMENT '状态',
  `addtime` int(11) DEFAULT NULL,
  `lid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_article
-- ----------------------------

-- ----------------------------
-- Table structure for `ur7_category`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_category`;
CREATE TABLE `ur7_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `langid` int(11) DEFAULT '1',
  `listtmpl` varchar(50) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT '类型',
  `link` varchar(255) DEFAULT NULL COMMENT '连接地址',
  `sort` int(11) NOT NULL DEFAULT '0',
  `isleaf` int(11) NOT NULL DEFAULT '1',
  `catetmpl` varchar(50) NOT NULL,
  `newstmpl` varchar(50) NOT NULL,
  `pagetmpl` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_category
-- ----------------------------
INSERT INTO `ur7_category` VALUES ('1', '图片文章', '', '', '0', '2', '1', 'list', '0', '', '0', '1', 'Category', 'news_photo', 'page');
INSERT INTO `ur7_category` VALUES ('2', '国际新闻', '', '', '0', '1', '1', 'list', '0', 'http://', '0', '1', 'Category', 'news', 'page');
INSERT INTO `ur7_category` VALUES ('3', '美洲新闻', '', '', '2', '1', '1', 'list', '0', 'http://', '0', '1', 'Category', 'news', 'page');
INSERT INTO `ur7_category` VALUES ('4', '美国新闻', '', '', '3', '1', '1', 'list', '0', 'http://', '0', '1', 'Category', 'news', 'page');
INSERT INTO `ur7_category` VALUES ('5', '国内新闻', '', '', '0', '1', '1', 'list', '0', 'http://', '0', '1', 'Category', 'news', 'page');
INSERT INTO `ur7_category` VALUES ('6', '江苏新闻', '', '', '5', '1', '1', 'list', '0', 'http://', '0', '1', 'Category', 'news', 'page');
INSERT INTO `ur7_category` VALUES ('7', '上海新闻', '', '', '5', '1', '1', 'list', '0', 'http://', '0', '1', 'Category', 'news', 'page');
INSERT INTO `ur7_category` VALUES ('8', '镇江新闻', '', '', '6', '1', '1', 'list', '0', 'http://', '0', '1', 'Category', 'news', 'page');
INSERT INTO `ur7_category` VALUES ('9', '关于我们', '', '', '0', '3', '1', 'list', '0', 'http://', '0', '1', 'Category', 'news', 'page');
INSERT INTO `ur7_category` VALUES ('10', '公司简介', '', '', '9', '1', '1', 'list', '0', 'http://', '0', '1', 'Category', 'news', 'page');

-- ----------------------------
-- Table structure for `ur7_friend_link`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_friend_link`;
CREATE TABLE `ur7_friend_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '友情链接名称',
  `url` varchar(200) DEFAULT NULL COMMENT '友情连接地址',
  `image_url` varchar(200) DEFAULT NULL COMMENT '友情连接图片地址',
  `show_order` varchar(255) DEFAULT NULL COMMENT '排序',
  `lid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_friend_link
-- ----------------------------

-- ----------------------------
-- Table structure for `ur7_guestbook`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_guestbook`;
CREATE TABLE `ur7_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `msn` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_guestbook
-- ----------------------------

-- ----------------------------
-- Table structure for `ur7_hook`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_hook`;
CREATE TABLE `ur7_hook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hookname` varchar(50) NOT NULL,
  `hookvalue` varchar(100) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0 视图钩子 1业务钩子',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_hook
-- ----------------------------
INSERT INTO `ur7_hook` VALUES ('1', '前台文章结尾', 'ARTICLE_AFTER', '0');

-- ----------------------------
-- Table structure for `ur7_hook_list`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_hook_list`;
CREATE TABLE `ur7_hook_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ur7_hook_list
-- ----------------------------
INSERT INTO `ur7_hook_list` VALUES ('1', '1', '1', 'test/Hook/Vhook', ' show', '1', '1', '1');

-- ----------------------------
-- Table structure for `ur7_language`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_language`;
CREATE TABLE `ur7_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `default` int(11) NOT NULL DEFAULT '0',
  `tmpl` varchar(50) NOT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `seokeyword` varchar(200) DEFAULT NULL,
  `seodesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_language
-- ----------------------------
INSERT INTO `ur7_language` VALUES ('1', '中文', 'zh-cn', '1', 'BootStrap', '', '', '');

-- ----------------------------
-- Table structure for `ur7_model`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_model`;
CREATE TABLE `ur7_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `table` varchar(50) NOT NULL,
  `langconf` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_model
-- ----------------------------
INSERT INTO `ur7_model` VALUES ('1', '文章', 'article', 'MDL_ARTICLE');
INSERT INTO `ur7_model` VALUES ('2', '图片', 'photo', 'MDL_PHOTO');
INSERT INTO `ur7_model` VALUES ('3', '单页面', 'page', 'MDL_PAGE');

-- ----------------------------
-- Table structure for `ur7_model_field`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_model_field`;
CREATE TABLE `ur7_model_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `fieldname` varchar(50) NOT NULL,
  `langconf` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `reg` varchar(200) NOT NULL,
  `fieldvalue` varchar(255) NOT NULL,
  `isnull` tinyint(1) NOT NULL DEFAULT '0',
  `tackattr` varchar(255) NOT NULL,
  `mid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_model_field
-- ----------------------------
INSERT INTO `ur7_model_field` VALUES ('1', '标题', 'title', 'TITLE', 'text', '', '', '0', '', '1');
INSERT INTO `ur7_model_field` VALUES ('2', '栏目', 'cid', 'CATE', 'cate', '', '', '0', '', '1');
INSERT INTO `ur7_model_field` VALUES ('3', '关键字', 'keyword', 'KEYWORD', 'textrea', '', '', '0', '', '1');
INSERT INTO `ur7_model_field` VALUES ('4', '摘要', 'desc', 'DESC', 'textrea', '', '', '0', '', '1');
INSERT INTO `ur7_model_field` VALUES ('5', '缩略图', 'thumb', 'THUMB', 'thumb', '', '', '0', '', '1');
INSERT INTO `ur7_model_field` VALUES ('6', '内容', 'content', 'CONTENT', 'editor', '', '', '0', '', '1');
INSERT INTO `ur7_model_field` VALUES ('7', '推荐位', 'position', 'POSITION', 'position', '', '', '0', '', '1');

-- ----------------------------
-- Table structure for `ur7_page`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_page`;
CREATE TABLE `ur7_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_page
-- ----------------------------

-- ----------------------------
-- Table structure for `ur7_photo`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_photo`;
CREATE TABLE `ur7_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `keyword` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL,
  `lid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_photo
-- ----------------------------

-- ----------------------------
-- Table structure for `ur7_photo_data`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_photo_data`;
CREATE TABLE `ur7_photo_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` text NOT NULL,
  `title` text NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_photo_data
-- ----------------------------

-- ----------------------------
-- Table structure for `ur7_plugin`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_plugin`;
CREATE TABLE `ur7_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `filetitle` varchar(50) NOT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ur7_plugin
-- ----------------------------
INSERT INTO `ur7_plugin` VALUES ('1', '?????', 'Phoneapi', '?????????', '1');

-- ----------------------------
-- Table structure for `ur7_plugin_res`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_plugin_res`;
CREATE TABLE `ur7_plugin_res` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `js` varchar(200) NOT NULL,
  `css` varchar(200) NOT NULL,
  `acname` varchar(100) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ur7_plugin_res
-- ----------------------------

-- ----------------------------
-- Table structure for `ur7_position`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_position`;
CREATE TABLE `ur7_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_position
-- ----------------------------
INSERT INTO `ur7_position` VALUES ('1', '首页推荐');
INSERT INTO `ur7_position` VALUES ('2', '首页幻灯');
INSERT INTO `ur7_position` VALUES ('4', '热点头条');

-- ----------------------------
-- Table structure for `ur7_position_data`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_position_data`;
CREATE TABLE `ur7_position_data` (
  `aid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `posid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ur7_position_data
-- ----------------------------
