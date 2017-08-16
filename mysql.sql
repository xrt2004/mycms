/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : demos_core

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-08-14 19:55:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `pass` varchar(100) NOT NULL DEFAULT '',
  `uptime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin', '2011-11-29 12:52:49');

-- ----------------------------
-- Table structure for `blog`
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL DEFAULT '0',
  `desc` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(1000) NOT NULL DEFAULT '',
  `picture` varchar(255) NOT NULL DEFAULT '',
  `comment` varchar(11) NOT NULL DEFAULT '0',
  `uptime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `face` varchar(100) NOT NULL DEFAULT '',
  `author` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`face`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES ('1', '1', '1', 'my  title', '这里是博客的内容', 'http://192.168.31.208/mycms/Upload/Home/image/1.jpg', 'cc', '2017-08-10 11:27:01', 'http://192.168.31.208/mycms/Upload/Home/image/1.jpg', 'aa');
INSERT INTO `blog` VALUES ('2', '2', '2', 'two title', 'contertwo', 'http://192.168.31.208/mycms/Upload/Home/image/1.jpg', 'gg', '2017-08-10 11:26:24', 'http://192.168.31.208/mycms/Upload/Home/image/2.jpg', 'bb');
INSERT INTO `blog` VALUES ('29', '1', '0', 'title 科技局', '科技局', 'http://192.168.31.208/mycms/Upload/2017-08-10/598c588cbdc29.jpg', '0', '2017-08-10 20:58:53', 'http://192.168.31.208/mycms/Upload/2017-08-10/598c588cbdc29.jpg', null);
INSERT INTO `blog` VALUES ('30', '1', '0', 'title 麻辣女兵器限责', '麻辣女兵器限责', 'http://192.168.31.208/mycms/Upload/2017-08-10/598c592d7972a.jpg', '0', '2017-08-10 21:01:34', 'http://192.168.31.208/mycms/Upload/2017-08-10/598c592d7972a.jpg', null);
INSERT INTO `blog` VALUES ('31', '1', '0', 'title 雷蒙磨', '雷蒙磨', 'http://192.168.31.208/mycms/Upload/2017-08-10/598c606ec3b92.jpg', '0', '2017-08-10 21:32:31', 'http://192.168.31.208/mycms/Upload/2017-08-10/598c606ec3b92.jpg', null);
INSERT INTO `blog` VALUES ('32', '1', '0', 'title 客服卡路里', '客服卡路里', 'http://192.168.31.208/mycms/Upload/2017-08-10/598c61661e79c.jpg', '0', '2017-08-10 21:36:39', 'http://192.168.31.208/mycms/Upload/2017-08-10/598c61661e79c.jpg', null);

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogid` int(11) NOT NULL DEFAULT '0',
  `customerid` int(11) NOT NULL DEFAULT '0',
  `content` varchar(1000) NOT NULL DEFAULT '',
  `uptime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '1', 'gooodfd', '2017-08-09 18:48:04');
INSERT INTO `comment` VALUES ('2', '1', '2', 'fdasfdas', '2017-08-10 11:52:56');
INSERT INTO `comment` VALUES ('3', '1', '1', 'fdsfsdfds', '2017-08-10 11:51:38');
INSERT INTO `comment` VALUES ('4', '1', '0', ' 来说就会', '2017-08-10 12:23:43');
INSERT INTO `comment` VALUES ('5', '2', '0', '可能导致', '2017-08-10 12:24:12');
INSERT INTO `comment` VALUES ('6', '1', '2', '挖掘', '2017-08-10 14:58:10');
INSERT INTO `comment` VALUES ('7', '24', '2', 'tyg', '2017-08-10 20:12:14');
INSERT INTO `comment` VALUES ('8', '24', '2', '科技', '2017-08-10 20:13:27');
INSERT INTO `comment` VALUES ('9', '2', '2', '统计局', '2017-08-10 21:03:50');
INSERT INTO `comment` VALUES ('10', '29', '2', '卡鲁TCL', '2017-08-10 21:42:04');

-- ----------------------------
-- Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `cid` (`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `pass` varchar(100) NOT NULL DEFAULT '',
  `sign` varchar(100) NOT NULL DEFAULT '',
  `face` varchar(100) NOT NULL DEFAULT '',
  `blogcount` int(11) NOT NULL DEFAULT '0',
  `fanscount` int(11) NOT NULL DEFAULT '0',
  `uptime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'james', 'james', 'Happying', 'http://192.168.31.208/mycms/Upload/Home/image/1.jpg', '0', '17', '2017-08-10 21:38:00');
INSERT INTO `customer` VALUES ('2', 'huang', 'huang', 'Unhappy', 'http://192.168.31.208/mycms/Upload/Home/image/1.jpg', '0', '6', '2017-08-10 21:03:40');

-- ----------------------------
-- Table structure for `customer_fans`
-- ----------------------------
DROP TABLE IF EXISTS `customer_fans`;
CREATE TABLE `customer_fans` (
  `customerid` int(11) NOT NULL DEFAULT '0',
  `fansid` int(11) NOT NULL DEFAULT '0',
  `uptime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_fans
-- ----------------------------
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '6', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('1', '7', '2017-08-10 21:38:00');
INSERT INTO `customer_fans` VALUES ('2', '6', '2017-08-10 21:03:40');

-- ----------------------------
-- Table structure for `notice`
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL DEFAULT '0',
  `fanscount` int(11) NOT NULL DEFAULT '0',
  `message` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `uptime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES ('1', '1', '17', 'vcxvx', '0', '2017-08-10 21:38:00');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `encrypted_password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
