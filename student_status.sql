/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : student_status

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-08 14:18:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for grade_info
-- ----------------------------
DROP TABLE IF EXISTS `grade_info`;
CREATE TABLE `grade_info` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `sno` int(12) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `term` int(4) DEFAULT NULL,
  `grade` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sno` (`sno`),
  CONSTRAINT `grade_info_ibfk_1` FOREIGN KEY (`sno`) REFERENCES `student_info` (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grade_info
-- ----------------------------
INSERT INTO `grade_info` VALUES ('10', '95007', '1', '1', '99');
INSERT INTO `grade_info` VALUES ('11', '95002', '1', '1', '80');
INSERT INTO `grade_info` VALUES ('12', '95003', '1', '2', '70');
INSERT INTO `grade_info` VALUES ('13', '95004', '1', '2', '99');
INSERT INTO `grade_info` VALUES ('14', '95005', '1', '2', '88');
INSERT INTO `grade_info` VALUES ('15', '95006', '1', '2', '77');
INSERT INTO `grade_info` VALUES ('16', '95008', '1', '1', '11');
INSERT INTO `grade_info` VALUES ('17', '95006', '2', '2', '50');
INSERT INTO `grade_info` VALUES ('20', '95011', '1', '1', '99');
INSERT INTO `grade_info` VALUES ('21', '95010', '1', '1', '80');
INSERT INTO `grade_info` VALUES ('22', '95022', '1', '2', '80');
INSERT INTO `grade_info` VALUES ('23', '95001', '1', '1', '90');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `logintime` varchar(32) NOT NULL,
  `state` int(2) NOT NULL,
  `ip` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('26', 'admin', '2018/12/05 12:14:50', '1', '127.0.0.1');
INSERT INTO `log` VALUES ('27', 'admin', '2018/12/05 12:34:00', '1', '127.0.0.1');
INSERT INTO `log` VALUES ('28', 'admin', '2018/12/05 01:07:34', '1', '127.0.0.1');
INSERT INTO `log` VALUES ('29', 'admin', '2018/12/05 02:23:38', '1', '127.0.0.1');
INSERT INTO `log` VALUES ('30', 'admin', '2018/12/05 03:01:22', '1', '127.0.0.1');
INSERT INTO `log` VALUES ('31', 'inaeqnus', '2018/12/05 03:11:54', '0', '127.0.0.1');
INSERT INTO `log` VALUES ('32', 'admin', '2018/12/05 03:12:01', '1', '127.0.0.1');
INSERT INTO `log` VALUES ('33', 'admin', '2018/12/06 02:41:02', '1', '127.0.0.1');
INSERT INTO `log` VALUES ('34', 'admin', '2018/12/07 12:24:04', '1', '127.0.0.1');
INSERT INTO `log` VALUES ('35', 'admin', '2018/12/07 03:46:43', '1', '127.0.0.1');

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `password` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manager
-- ----------------------------
INSERT INTO `manager` VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for student_info
-- ----------------------------
DROP TABLE IF EXISTS `student_info`;
CREATE TABLE `student_info` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `sno` int(12) DEFAULT NULL,
  `sclass` int(12) DEFAULT NULL,
  `sname` varchar(32) DEFAULT NULL,
  `sage` int(4) DEFAULT NULL,
  `ssex` varchar(8) DEFAULT NULL,
  `saddr` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sno_only` (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student_info
-- ----------------------------
INSERT INTO `student_info` VALUES ('5', '95005', '1604202', '汪洋', '20', '男', '山西');
INSERT INTO `student_info` VALUES ('6', '95006', '1604202', '陈昊', '22', '男', '浙江');
INSERT INTO `student_info` VALUES ('7', '95007', '1604201', '陈皮', '19', '男', '哈尔滨');
INSERT INTO `student_info` VALUES ('8', '95011', '1604201', '扶摇', '21', '男', '哈尔滨');
INSERT INTO `student_info` VALUES ('9', '95010', '1604201', '刘亮', '21', '女', '山西');
INSERT INTO `student_info` VALUES ('11', '95002', '1604201', '林俊杰', '23', '男', '上海');
INSERT INTO `student_info` VALUES ('12', '95003', '1604202', '刘洋', '22', '女', '上海');
INSERT INTO `student_info` VALUES ('13', '95004', '1604201', '张萌', '21', '女', '上海');
INSERT INTO `student_info` VALUES ('14', '95008', '1604202', '李明', '19', '男', '河北');
INSERT INTO `student_info` VALUES ('15', '95022', '1604202', '杨洋', '25', '男', '哈尔滨');
INSERT INTO `student_info` VALUES ('17', '95001', '1604202', '李明明', '21', '男', '石家庄');
INSERT INTO `student_info` VALUES ('18', '95024', '1604202', '李想', '19', '女', '哈尔滨');
