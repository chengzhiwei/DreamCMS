/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : 127001

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2015-04-07 16:53:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ur7_plg_collection`
-- ----------------------------
DROP TABLE IF EXISTS `ur7_plg_collection`;
CREATE TABLE `ur7_plg_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langcode` varchar(50) NOT NULL DEFAULT 'utf-8' COMMENT '目标站编码',
  `title` varchar(100) NOT NULL,
  `cate` varchar(50) NOT NULL,
  `listrule` text NOT NULL,
  `pagerule` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

