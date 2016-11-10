/*
Navicat MySQL Data Transfer

Source Server         : 1
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : newsreport

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-11-10 14:36:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'hao0661', '616968');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL,
  `author` varchar(20) NOT NULL,
  `fromto` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `dateline` int(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('2', '123', '123', '123', '123', '1478749492');
INSERT INTO `news` VALUES ('6', '使用PHP password_hash()加密，再也不怕被拖库了', '', '', '你还在用md5+salt方式加密密码吗？PHP5.5引入了Password Hashing函数，内核自带无需安装扩展。在PHP5.4下测试了下也可是可以的，使用前最好确认一下你当前的环境是否支持这些函数。\r\nPassword Hashing主要提供了4个函数\r\n\r\n//查看哈希值的相关信息\r\narray password_get_info (string $hash)\r\n//创建hash密码\r\nstring password_hash(string $password , integer $algo [, array $options ])\r\n//判断hash密码是否特定选项、算法所创建\r\nboolean password_needs_rehash (string $hash , integer $algo [, array $options ] \r\nboolean password_verify (string $password , string $hash)\r\n//验证密码\r\n$password = \'password123456\';//原始密码\r\n$hash_password = password_hash($password, PASSWORD_BCRYPT);//使用BCRYPT算法加密密码\r\nif (password_verify($password , $hash_password)){\r\n   echo \"密码匹配\";\r\n}else{  \r\n   echo \"密码错误\";\r\n}\r\n通过password_hash加密后的密码，使用字典方式很难破解，因为每次生成的密码都是不一样的,破解这种加密只能采用暴力破解。加密方法再好，原始密码设置的过于简单都容易被破解，设置复杂的密码才是王道。', '1478759633');
INSERT INTO `news` VALUES ('5', '标题测试', '恩恩', '', '测试标题', '1478753776');
INSERT INTO `news` VALUES ('7', '使用PHP password_hash()加密，再也不怕被拖库了', '', '', '你还在用md5+salt方式加密密码吗？PHP5.5引入了Password Hashing函数，内核自带无需安装扩展。在PHP5.4下测试了下也可是可以的，使用前最好确认一下你当前的环境是否支持这些函数。\r\nPassword Hashing主要提供了4个函数\r\n\r\n//查看哈希值的相关信息\r\narray password_get_info (string $hash)\r\n//创建hash密码\r\nstring password_hash(string $password , integer $algo [, array $options ])\r\n//判断hash密码是否特定选项、算法所创建\r\nboolean password_needs_rehash (string $hash , integer $algo [, array $options ] \r\nboolean password_verify (string $password , string $hash)\r\n//验证密码\r\n$password = \'password123456\';//原始密码\r\n$hash_password = password_hash($password, PASSWORD_BCRYPT);//使用BCRYPT算法加密密码\r\nif (password_verify($password , $hash_password)){\r\n   echo \"密码匹配\";\r\n}else{  \r\n   echo \"密码错误\";\r\n}\r\n通过password_hash加密后的密码，使用字典方式很难破解，因为每次生成的密码都是不一样的,破解这种加密只能采用暴力破解。加密方法再好，原始密码设置的过于简单都容易被破解，设置复杂的密码才是王道。', '1478759704');
