/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : lushang

 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 03/12/2017 16:14:55 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `ls_activity`
-- ----------------------------
DROP TABLE IF EXISTS `ls_activity`;
CREATE TABLE `ls_activity` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `rank` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ls_activity`
-- ----------------------------
BEGIN;
INSERT INTO `ls_activity` VALUES ('1', '南康公司', '1'), ('2', '南康公司2', '2');
COMMIT;

-- ----------------------------
--  Table structure for `ls_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ls_admin`;
CREATE TABLE `ls_admin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `pawd` varchar(200) DEFAULT NULL,
  `realname` varchar(200) NOT NULL,
  `gender` tinyint(2) NOT NULL DEFAULT '0',
  `works` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `company_id` int(8) NOT NULL DEFAULT '0',
  `remark` varchar(200) NOT NULL,
  `role` int(8) NOT NULL DEFAULT '0',
  `lastlogin` int(4) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ls_admin`
-- ----------------------------
BEGIN;
INSERT INTO `ls_admin` VALUES ('4', 'admin', 'c33367701511b4f6020ec61ded352059', '兰总1', '1', '经理', '15814073940', 'lanlibin23@163.com', '0', 'beizhu', '0', '0', '0', '1484898960');
COMMIT;

-- ----------------------------
--  Table structure for `ls_trade`
-- ----------------------------
DROP TABLE IF EXISTS `ls_trade`;
CREATE TABLE `ls_trade` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `act_id` int(8) NOT NULL DEFAULT '0',
  `order_no` varchar(100) NOT NULL,
  `realname` varchar(60) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `addtime` int(4) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ls_trade`
-- ----------------------------
BEGIN;
INSERT INTO `ls_trade` VALUES ('1', '0', '2017030821001004610281069608', '林海旺', '张家界路上汽车酒店2元住店优惠，赢香格里拉大环线7天游 ', '15889724231', '278', '0', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
