
SET FOREIGN_KEY_CHECKS=0;
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

