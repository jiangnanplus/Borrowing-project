/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : xiaomi

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-08-12 22:29:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `address`
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户地址ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `consignee` varchar(255) NOT NULL COMMENT '收货人姓名',
  `telephone` char(11) NOT NULL COMMENT '手机号',
  `province` varchar(255) NOT NULL COMMENT '省',
  `site` varchar(255) NOT NULL COMMENT '村镇街道(详细地址)',
  `zipcode` int(11) NOT NULL COMMENT '邮编',
  `tag` varchar(255) NOT NULL COMMENT '标签(公司名,学校名等)',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户地址状态',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('1', '15', 'gg', '15110796618', '0', 'sdfsf', '0', '', '1');
INSERT INTO `address` VALUES ('2', '1', '陈培平', '18032165097', '2', '胡建测试', '0', '', '1');
INSERT INTO `address` VALUES ('3', '3', '小川恶搞色鬼', '15125636548', '2', '胡建测试', '0', '', '1');
INSERT INTO `address` VALUES ('4', '4', '徐大川', '13672067933', '2', '胡建测试', '100001', '收获', '1');
INSERT INTO `address` VALUES ('5', '6', 'hupeng', '1312345667', '14', '胡建测试', '123456', '这是详细地址', '1');

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `username` varchar(255) NOT NULL COMMENT '管理员名',
  `password` varchar(255) NOT NULL COMMENT '管理员密码',
  `mid` int(11) NOT NULL COMMENT '员工编号',
  `auth` tinyint(1) NOT NULL DEFAULT '1' COMMENT '管理员权限',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '管理员状态',
  `rtime` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2147483647', '1', '1', '1437273432');

-- ----------------------------
-- Table structure for `ask`
-- ----------------------------
DROP TABLE IF EXISTS `ask`;
CREATE TABLE `ask` (
  `askid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '提问表主键',
  `mgid` int(11) NOT NULL COMMENT '商品id',
  `uid` int(11) NOT NULL,
  `mssid` varchar(255) NOT NULL,
  `a_content` varchar(255) DEFAULT NULL COMMENT '用户提问内容',
  `r_content` varchar(255) DEFAULT NULL COMMENT '官方回复内容',
  `title` varchar(255) DEFAULT NULL,
  `zhupic` varchar(255) DEFAULT NULL,
  `isok` tinyint(1) NOT NULL DEFAULT '0',
  `atime` int(11) NOT NULL COMMENT '提问时间',
  `rtime` int(11) NOT NULL COMMENT '回复时间',
  PRIMARY KEY (`askid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ask
-- ----------------------------
INSERT INTO `ask` VALUES ('1', '44', '3', '143721994393', '包邮吗', '是的亲！', '小米T恤 MI生活', 's_img55a9ce8494997.jpg', '1', '1437222993', '1437223022');
INSERT INTO `ask` VALUES ('2', '44', '3', '143721994393', '可以货到付款吗?', '是的，多谢支持', '小米T恤 MI生活', 's_img55a9ce8494997.jpg', '1', '1437223230', '1437223268');
INSERT INTO `ask` VALUES ('3', '45', '3', '143721994393', '你好', '大概豆腐干', '小米足球米兔T恤', 's_img55a9cfbcb0a41.jpg', '1', '1437225398', '1437225441');
INSERT INTO `ask` VALUES ('4', '45', '3', '143721994393', '咋米', '但个别地方官', '小米足球米兔T恤', 's_img55a9cfbcb0a41.jpg', '1', '1437225404', '1437225450');
INSERT INTO `ask` VALUES ('5', '45', '3', '143721994393', '合家福', '地方官北方大国', '小米足球米兔T恤', 's_img55a9cfbcb0a41.jpg', '1', '1437225409', '1437225461');
INSERT INTO `ask` VALUES ('6', '45', '3', '143721994393', '郭德纲可怜的卡', '把对方改变', '小米足球米兔T恤', 's_img55a9cfbcb0a41.jpg', '1', '1437225413', '1437225475');
INSERT INTO `ask` VALUES ('7', '45', '3', '143721994393', '大哥大', '对方改变德国', '小米足球米兔T恤', 's_img55a9cfbcb0a41.jpg', '1', '1437225417', '1437225487');
INSERT INTO `ask` VALUES ('8', '45', '3', '143721994393', '郭德纲', '打不过德国', '小米足球米兔T恤', 's_img55a9cfbcb0a41.jpg', '1', '1437225421', '1437225499');
INSERT INTO `ask` VALUES ('9', '45', '3', '143721994393', '放烟花突然', '大哥大个', '小米足球米兔T恤', 's_img55a9cfbcb0a41.jpg', '1', '1437225425', '1437225511');

-- ----------------------------
-- Table structure for `bankcard`
-- ----------------------------
DROP TABLE IF EXISTS `bankcard`;
CREATE TABLE `bankcard` (
  `bid` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(12) unsigned NOT NULL,
  `realname` varchar(32) NOT NULL,
  `idNumber` int(18) unsigned NOT NULL,
  `bankNumber` int(19) unsigned NOT NULL,
  `phoneNumber` int(11) unsigned NOT NULL,
  PRIMARY KEY (`bid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bankcard
-- ----------------------------
INSERT INTO `bankcard` VALUES ('1', '4', 'sfgds', '2147483647', '2147483647', '43254');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `gid` int(11) NOT NULL COMMENT '商品id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `com_star` int(11) NOT NULL COMMENT '评论星数',
  `label` varchar(255) NOT NULL COMMENT '短签',
  `content` text NOT NULL COMMENT '评论内容',
  `comment_time` int(11) NOT NULL COMMENT '评论时间',
  `recontent` text COMMENT '回复评论',
  `recontent_time` int(11) DEFAULT NULL COMMENT '回复评论时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '回复状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '4', '5', '[&quot;\\u505a\\u5de5\\u7cbe\\u826f&quot;,&quot;\\u65b9\\u4fbf\\u64cd\\u4f5c&quot;,&quot;\\u5b9e\\u60e0\\u5b9e\\u7528&quot;]', 'dsagfdsgdsfg', '1437270730', null, null, '0');
INSERT INTO `comment` VALUES ('2', '2', '6', '4', '[&quot;\\u6027\\u4ef7\\u6bd4\\u9ad8&quot;]', 'tttt', '1439306593', null, null, '0');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `mcid` int(11) NOT NULL COMMENT '分类ID',
  `title` varchar(255) NOT NULL COMMENT '商品标题',
  `nowprice` int(11) NOT NULL COMMENT '商品现价',
  `price` int(11) NOT NULL COMMENT '商品原价',
  `s_img` text NOT NULL COMMENT '商品原图',
  `b_img` varchar(255) NOT NULL COMMENT '商品详图',
  `num` int(11) NOT NULL DEFAULT '50' COMMENT '商品库存',
  `discount` int(11) NOT NULL DEFAULT '10' COMMENT '商品打折',
  `comment` int(11) NOT NULL COMMENT '评论数量',
  `com_num` int(11) NOT NULL COMMENT '评论等级',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '商品状态(上架下架)',
  `recomend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐',
  `colortit` varchar(255) NOT NULL,
  `colorimg` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '9', '小米Note', '1999', '1999', '[[\"s_img55a9c64096ebf.jpg\"],[\"s_img55a9c64098216.jpg\"],[\"s_img55a9c64098ed0.jpg\"]]', '', '500', '10', '1', '1', '1', '0', '[\"\\u7c89\\u8272\",\"\\u9ed1\\u8272\",\"\\u767d\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8c574c613d.jpg\",\"1\":\"intro55a8c574c730c.jpg\",\"2\":\"intro55a8c574c80d4.jpg\",\"3\":\"intro55a8c574c94b7.jpg\",\"5\":\"intro55a8c574ca399.jpg\",\"6\":\"intro55a8c574cb91c.jpg\",\"7\":\"intro55a8c574cd4f4.jpg\",\"8\":\"intro55a8c574ceafd.png\"}');
INSERT INTO `goods` VALUES ('2', '10', '小米手机4', '1499', '1499', '[[\"s_img55a8ca5c1ca2e.jpg\"],[\"s_img55a8ca5c1dbdd.jpg\"]]', '', '0', '10', '1', '0', '1', '0', '[\"\\u767d\\u8272\",\"\\u9ed1\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8c7aac79be.jpg\",\"1\":\"intro55a8c7aac8f42.png\",\"2\":\"intro55a8c7aacb882.png\",\"3\":\"intro55a8c7aacc1c4.png\",\"5\":\"intro55a8c7aaccd54.jpg\",\"6\":\"intro55a8c7aace0d6.jpg\",\"7\":\"intro55a8c7aad08ce.png\",\"8\":\"intro55a8c7aad11d3.png\"}');
INSERT INTO `goods` VALUES ('3', '11', '红米手机2A', '249', '499', '[[\"s_img55a9c676403d0.jpg\"]]', '', '500', '5', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8c8d4577e4.jpg\",\"1\":\"intro55a8c8d4583b4.jpg\",\"2\":\"intro55a8c8d459054.jpg\",\"3\":\"intro55a8c8d459c8e.jpg\",\"5\":\"intro55a8c8d45b86d.jpg\",\"6\":\"intro55a8c8d45c7ed.jpg\",\"7\":\"intro55a8c8d45d954.jpg\",\"8\":\"intro55a8c8d45e89c.jpg\"}');
INSERT INTO `goods` VALUES ('4', '11', '红米手机2', '599', '599', '[[\"s_img55a9c69e6ea13.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8c9bf227fd.jpg\",\"1\":\"intro55a8c9bf2351a.jpg\",\"2\":\"intro55a8c9bf246c0.jpg\",\"3\":\"intro55a8c9bf255c2.jpg\",\"5\":\"intro55a8c9bf26c58.jpg\",\"6\":\"intro55a8c9bf282c9.jpg\",\"7\":\"intro55a8c9bf291a0.jpg\"}');
INSERT INTO `goods` VALUES ('5', '12', ' 红米Note', '419', '699', '[[\"s_img55a9c793b2e67.jpg\"]]', '', '0', '6', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8cb52d498a.jpg\",\"1\":\"intro55a8cb52d55d3.jpg\",\"2\":\"intro55a8cb52d638d.jpg\",\"3\":\"intro55a8cb52d6d5c.jpg\",\"5\":\"intro55a8cb52d772d.jpg\",\"6\":\"intro55a8cb52d80c2.jpg\",\"7\":\"intro55a8cb52d90b2.jpg\",\"8\":\"intro55a8cb52da0bd.png\"}');
INSERT INTO `goods` VALUES ('6', '13', '小米电视2 40英寸', '1999', '1999', '[[\"s_img55a9c7da805b9.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8cc69bed1e.jpg\",\"1\":\"intro55a8cc69c0601.jpg\",\"2\":\"intro55a8cc69c1b14.jpg\",\"3\":\"intro55a8cc69c2d25.jpg\",\"5\":\"intro55a8cc69c4ee7.jpg\",\"6\":\"intro55a8cc69c742b.jpg\",\"7\":\"intro55a8cc69c8e67.jpg\",\"8\":\"intro55a8cc69cab95.jpg\"}');
INSERT INTO `goods` VALUES ('7', '13', '小米电视2 49英寸', '3399', '3399', '[[\"s_img55a9c830e4b28.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '[\"intro55a8ce08c0607.jpg\",\"intro55a8ce08c1c79.jpg\",\"intro55a8ce08c2be8.jpg\",\"intro55a8ce08c3991.jpg\"]');
INSERT INTO `goods` VALUES ('8', '13', '小米电视2 55英寸', '4499', '4499', '[[\"s_img55a9c91aeb041.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\\u91d1\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8ce8b286d2.jpg\",\"1\":\"intro55a8ce8b297cc.jpg\",\"2\":\"intro55a8ce8b2b1a6.jpg\",\"3\":\"intro55a8ce8b2c563.jpg\",\"5\":\"intro55a8ce8b2ddd9.png\",\"6\":\"intro55a8ce8b2e970.jpg\",\"7\":\"intro55a8ce8b30747.jpg\",\"8\":\"intro55a8ce8b3196b.png\"}');
INSERT INTO `goods` VALUES ('9', '14', '小米盒子mini版', '199', '199', '[[\"s_img55a8e0c0b4da4.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '[\"intro55a8e0c0b6ecb.jpg\",\"intro55a8e0c0b7a4b.jpg\",\"intro55a8e0c0b89ec.jpg\",\"intro55a8e0c0b947b.jpg\"]');
INSERT INTO `goods` VALUES ('10', '14', '小米盒子增强版', '89', '299', '[[\"s_img55a8e15612d9f.jpg\"]]', '', '1000', '3', '0', '0', '1', '0', '\"\"', '', '\"\"', '[\"intro55a8e156146aa.png\",\"intro55a8e15615013.jpg\",\"intro55a8e156163b2.jpg\",\"intro55a8e156177e9.jpg\"]');
INSERT INTO `goods` VALUES ('11', '15', '小米平板', '1299', '1299', '[[\"s_img55a9d07c18c8c.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8e4c1c8376.jpg\",\"1\":\"intro55a8e4c1c9351.jpg\",\"2\":\"intro55a8e4c1ca952.jpg\",\"3\":\"intro55a8e4c1cb730.jpg\",\"5\":\"intro55a8e4c1cc863.jpg\",\"6\":\"intro55a8e4c1cdcbc.jpg\",\"7\":\"intro55a8e4c1cf244.jpg\",\"8\":\"intro55a8e4c1d06af.jpg\"}');
INSERT INTO `goods` VALUES ('12', '16', '全新小米路由器', '699', '699', '[[\"s_img55a8e80720419.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8e8072198f.jpg\",\"1\":\"intro55a8e807225b7.jpg\",\"2\":\"intro55a8e807235c6.jpg\",\"3\":\"intro55a8e80724eec.jpg\",\"5\":\"intro55a8e80726312.jpg\",\"6\":\"intro55a8e8072733d.jpg\",\"7\":\"intro55a8e80729110.jpg\",\"8\":\"intro55a8e8072a387.jpg\"}');
INSERT INTO `goods` VALUES ('13', '16', '小米路由器 mini', '129', '129', '[[\"s_img55a8e92509524.jpg\"],[\"s_img55a8e9250a3ad.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\\u9ed1\\u8272\",\"\\u767d\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8e9250b2c4.jpg\",\"1\":\"intro55a8e9250bdee.jpg\",\"2\":\"intro55a8e9250e859.png\",\"3\":\"intro55a8e9250fa7b.jpg\",\"5\":\"intro55a8e92511a2d.jpg\",\"6\":\"intro55a8e925128f4.jpg\",\"7\":\"intro55a8e925137d7.jpg\",\"8\":\"intro55a8e925154cc.jpg\"}');
INSERT INTO `goods` VALUES ('14', '17', '小米体重秤', '99', '99', '[[\"s_img55a8eabc77ba6.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8ea71e992b.jpg\",\"1\":\"intro55a8ea71ec299.jpg\",\"2\":\"intro55a8ea71eceef.jpg\",\"3\":\"intro55a8ea71ed99b.jpg\",\"5\":\"intro55a8ea71eebe0.png\",\"6\":\"intro55a8ea71ef5c6.jpg\",\"7\":\"intro55a8ea71f1188.jpg\",\"8\":\"intro55a8ea71f25ad.jpg\"}');
INSERT INTO `goods` VALUES ('15', '18', '小米空气净化器', '719', '899', '[[\"s_img55a8eb4d677c3.jpg\"]]', '', '500', '8', '0', '0', '1', '0', '\"\"', '', '\"\"', '{\"0\":\"intro55a8eb4d68e44.jpg\",\"1\":\"intro55a8eb4d69f03.jpg\",\"2\":\"intro55a8eb4d6adce.jpg\",\"3\":\"intro55a8eb4d6c31b.jpg\",\"5\":\"intro55a8eb4d6cedb.jpg\",\"6\":\"intro55a8eb4d6dd9c.jpg\"}');
INSERT INTO `goods` VALUES ('16', '18', '小米空气净化器滤芯', '149', '149', '[[\"s_img55a8ebbadc4a7.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8ebbadddc5.jpg\",\"1\":\"intro55a8ebbadf88c.jpg\",\"2\":\"intro55a8ebbae0e5a.jpg\",\"3\":\"intro55a8ebbae1e62.jpg\",\"5\":\"intro55a8ebbae2f0f.jpg\",\"6\":\"intro55a8ebbae471f.jpg\",\"7\":\"intro55a8ebbae65a2.jpg\",\"8\":\"intro55a8ebbae7e67.jpg\"}');
INSERT INTO `goods` VALUES ('17', '19', '小米移动电源16000mAh', '129', '129', '[[\"s_img55a8ec6e54446.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8ec6e556e4.jpg\",\"1\":\"intro55a8ec6e567f7.jpg\",\"2\":\"intro55a8ec6e57dcb.jpg\",\"3\":\"intro55a8ec6e58e44.png\",\"5\":\"intro55a8ec6e596c7.jpg\",\"6\":\"intro55a8ec6e5a4c4.jpg\"}');
INSERT INTO `goods` VALUES ('18', '19', '小米移动电源10000mAh', '48', '69', '[[\"s_img55a9caa523582.jpg\"],[\"s_img55a9caa5243bd.jpg\"],[\"s_img55a9caa524fd2.jpg\"]]', '', '0', '7', '0', '0', '1', '0', '[\"\\u94f6\\u8272\",\"\\u7ea2\\u8272\",\"\\u91d1\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8ed3394a22.jpg\",\"1\":\"intro55a8ed3395732.jpg\",\"2\":\"intro55a8ed33963a1.jpg\",\"3\":\"intro55a8ed3396fca.jpg\",\"5\":\"intro55a8ed3397a69.jpg\",\"6\":\"intro55a8ed3398a32.jpg\",\"7\":\"intro55a8ed3399a56.jpg\",\"8\":\"intro55a8ed339ad83.jpg\"}');
INSERT INTO `goods` VALUES ('19', '19', '小米移动电源超薄5000mAh ', '39', '49', '[[\"s_img55a8ed9b83b66.jpg\"]]', '', '0', '8', '0', '0', '1', '0', '\"\"', '', '\"\"', '{\"0\":\"intro55a8ed9b8488d.jpg\",\"1\":\"intro55a8ed9b8701b.jpg\",\"2\":\"intro55a8ed9b87b68.jpg\",\"3\":\"intro55a8ed9b88a15.jpg\",\"5\":\"intro55a8ed9b896f6.jpg\",\"6\":\"intro55a8ed9b8a86c.jpg\"}');
INSERT INTO `goods` VALUES ('20', '20', 'CR2032纽扣电池（5粒装）', '49', '49', '[[\"s_img55a8f5ee5bf74.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '[\"intro55a8f5ee5d088.gif\",\"intro55a8f5ee750a1.gif\",\"intro55a8f5ee76207.gif\"]');
INSERT INTO `goods` VALUES ('21', '20', '红米2/2A原装电池', '49', '49', '[[\"s_img55a8f691e9bb1.jpg\"],[\"s_img55a8f691eae50.jpg\"],[\"s_img55a8f691eb9fa.jpg\"],[\"s_img55a8f691ec4ac.jpg\"]]', '', '500', '10', '0', '0', '1', '0', '[\"\\u6a59\\u8272\",\"\\u73ab\\u7ea2\\u8272\",\"\\u84dd\\u8272\",\"\\u94f6\\u8272\"]', '', '\"\"', '[\"intro55a8f691ed11a.jpg\",\"intro55a8f691edc5e.jpg\",\"intro55a8f691ee78a.jpg\"]');
INSERT INTO `goods` VALUES ('22', '20', '红米Note电池', '49', '49', '[[\"s_img55a8f7195c501.jpg\",\"s_img55a8f7195d301.jpg\"],[\"s_img55a8f7195df07.jpg\",\"s_img55a8f7195e9da.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\\u6a59\\u8272\",\"\\u91d1\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8f7195fda8.jpg\",\"1\":\"intro55a8f71960f3d.jpg\",\"2\":\"intro55a8f71962471.jpg\",\"3\":\"intro55a8f7196392c.jpg\",\"5\":\"intro55a8f71965283.jpg\"}');
INSERT INTO `goods` VALUES ('23', '20', '小米2S原装电池', '39', '49', '[[\"s_img55a9cb5dcbfd5.jpg\"],[\"s_img55a9cb5dccc7f.jpg\"],[\"s_img55a9cb5dcd797.jpg\"]]', '', '1000', '8', '0', '0', '1', '0', '[\"\\u7d2b\\u8272\",\"\\u7eff\\u8272\",\"\\u767d\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8f78de61d8.jpg\",\"1\":\"intro55a8f78de7731.jpg\",\"2\":\"intro55a8f78de8649.jpg\",\"3\":\"intro55a8f78de9273.jpg\",\"5\":\"intro55a8f78dea46a.jpg\",\"6\":\"intro55a8f78deb935.jpg\",\"7\":\"intro55a8f78decaae.jpg\"}');
INSERT INTO `goods` VALUES ('24', '21', '多彩电源适配器', '19', '19', '[[\"s_img55a8fbee75b0a.jpg\",\"s_img55a8fbee76a6b.jpg\",\"s_img55a8fbee77b86.jpg\"],[\"s_img55a8fbee78738.jpg\",\"s_img55a8fbee79326.jpg\",\"s_img55a8fbee79e7d.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\\u6a59\\u8272\",\"\\u9ed1\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8fbee7ae5d.jpg\",\"1\":\"intro55a8fbee7bd10.jpg\",\"2\":\"intro55a8fbee7cd48.jpg\",\"3\":\"intro55a8fbee7da8f.jpg\",\"5\":\"intro55a8fbee7edeb.jpg\",\"6\":\"intro55a8fbee8033e.jpg\"}');
INSERT INTO `goods` VALUES ('25', '21', '红米2/2A/小米手机2A电池座充', '49', '49', '[[\"s_img55a8fc7f23239.jpg\",\"s_img55a8fc7f23dce.jpg\"]]', '', '500', '10', '0', '0', '1', '0', '[\"\\u9ed1\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8fc7f24c24.jpg\",\"1\":\"intro55a8fc7f25ab7.jpg\",\"2\":\"intro55a8fc7f26664.jpg\",\"3\":\"intro55a8fc7f2764c.jpg\",\"5\":\"intro55a8fc7f28497.jpg\"}');
INSERT INTO `goods` VALUES ('26', '21', '小米快充套装', '47', '59', '[[\"s_img55a8fd4a57d91.jpg\"]]', '', '0', '8', '0', '0', '1', '0', '\"\"', '', '\"\"', '{\"0\":\"intro55a8fd4a58fd6.jpg\",\"1\":\"intro55a8fd4a5a3c8.jpg\",\"2\":\"intro55a8fd4a5b9b4.jpg\",\"3\":\"intro55a8fd4a5c88d.jpg\",\"5\":\"intro55a8fd4a5de8d.jpg\",\"6\":\"intro55a8fd4a5f0da.jpg\"}');
INSERT INTO `goods` VALUES ('27', '22', '小米头戴式耳机', '499', '499', '[[\"s_img55a8fe11abcff.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8fe11ad2a3.jpg\",\"1\":\"intro55a8fe11ae011.jpg\",\"2\":\"intro55a8fe11af224.jpg\",\"3\":\"intro55a8fe11b025c.jpg\",\"5\":\"intro55a8fe11b14ca.jpg\",\"6\":\"intro55a8fe11b3d56.jpg\",\"7\":\"intro55a8fe11b666f.jpg\",\"8\":\"intro55a8fe11b7271.png\"}');
INSERT INTO `goods` VALUES ('28', '23', '小米活塞耳机标准版', '89', '89', '[[\"s_img55a8fef45acca.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a8fef45bb09.jpg\",\"1\":\"intro55a8fef45ca60.jpg\",\"2\":\"intro55a8fef45d63e.jpg\",\"3\":\"intro55a8fef45e3d7.jpg\",\"5\":\"intro55a8fef45ef8e.png\",\"6\":\"intro55a8fef45f9b5.jpg\",\"7\":\"intro55a8fef460d7c.jpg\",\"8\":\"intro55a8fef462290.jpg\"}');
INSERT INTO `goods` VALUES ('29', '23', '小米活塞耳机青春版', '19', '39', '[[\"s_img55a9cbfd3ad29.jpg\"],[\"s_img55a9cbfd3be97.jpg\"]]', '', '0', '5', '0', '0', '1', '0', '[\"\\u9ed1\\u8272\",\"\\u767d\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a8ff88c7ed1.jpg\",\"1\":\"intro55a8ff88c8b80.jpg\",\"2\":\"intro55a8ff88c9b3d.jpg\",\"3\":\"intro55a8ff88cb388.jpg\",\"5\":\"intro55a8ff88cc047.jpg\",\"6\":\"intro55a8ff88cd132.jpg\",\"7\":\"intro55a8ff88cddcf.jpg\",\"8\":\"intro55a8ff88cfd41.jpg\"}');
INSERT INTO `goods` VALUES ('30', '23', '小米活塞耳机炫彩版', '31', '39', '[[\"s_img55a9cc79df078.jpg\",\"s_img55a9cc79dfd9c.jpg\",\"s_img55a9cc79e0897.jpg\"],[\"s_img55a9cc79e1367.jpg\",\"s_img55a9cc79e1e12.jpg\"],[\"s_img55a9cc79e2905.jpg\",\"s_img55a9cc79e3441.jpg\"]]', '', '0', '8', '0', '0', '1', '0', '[\"\\u4e01\\u9999\\u7d2b\",\"\\u51b0\\u5ddd\\u84dd\",\"\\u6a31\\u82b1\\u7c89\"]', '', '\"\"', '{\"0\":\"intro55a90092dd502.jpg\",\"1\":\"intro55a90092de2d2.jpg\",\"2\":\"intro55a90092deff3.jpg\",\"3\":\"intro55a90092dfb99.jpg\",\"5\":\"intro55a90092e0c57.jpg\",\"6\":\"intro55a90092e1c25.jpg\",\"7\":\"intro55a90092e37bd.jpg\",\"8\":\"intro55a90092e4c69.jpg\"}');
INSERT INTO `goods` VALUES ('31', '24', '清水软胶保护套', '9', '9', '[[\"s_img55a9030d9702a.jpg\",\"s_img55a9030d97d43.jpg\",\"s_img55a9030d98c8e.jpg\"],[\"s_img55a9030d997ed.jpg\",\"s_img55a9030d9a280.jpg\",\"s_img55a9030d9ac30.jpg\"],[\"s_img55a9030d9b64f.jpg\",\"s_img55a9030d9bff3.jpg\",\"s_img55a9030d9cb0f.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\\u9ec4\\u8272\",\"\\u84dd\\u8272\",\"\\u767d\\u8272\"]', '', '\"\"', '[\"intro55a9030d9db37.jpg\",\"intro55a9030d9e8b6.jpg\",\"intro55a9030d9f6dc.jpg\",\"intro55a9030db4db8.jpg\"]');
INSERT INTO `goods` VALUES ('32', '24', '多彩半透保护壳', '29', '29', '[[\"s_img55a9041d5e1a2.jpg\",\"s_img55a9041d5f45e.jpg\",\"s_img55a9041d5ff8b.jpg\"],[\"s_img55a9041d60f21.jpg\",\"s_img55a9041d61fd4.jpg\",\"s_img55a9041d62f92.jpg\"],[\"s_img55a9041d63b45.jpg\",\"s_img55a9041d648a5.jpg\",\"s_img55a9041d65af7.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\\u73ab\\u7ea2\",\"\\u84dd\\u8272\",\"\\u767d\\u8272\"]', '', '\"\"', '[\"intro55a9041d66c35.jpg\",\"intro55a9041d68809.jpg\",\"intro55a9041d6a1c4.jpg\",\"intro55a9041d6bc0d.jpg\"]');
INSERT INTO `goods` VALUES ('33', '25', '极薄防蓝光玻璃膜', '49', '49', '[[\"s_img55a90540831c2.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '\"\"', '', '\"\"', '{\"0\":\"intro55a905ddd9a5e.jpg\",\"1\":\"intro55a905dddaf06.jpg\",\"2\":\"intro55a905dddc524.jpg\",\"3\":\"intro55a905dddd67f.jpg\",\"5\":\"intro55a905dddeb58.jpg\",\"6\":\"intro55a905dde025f.jpg\"}');
INSERT INTO `goods` VALUES ('34', '25', '钻石贴膜', '23', '29', '[[\"s_img55a907877652c.jpg\",\"s_img55a90787778dc.jpg\",\"s_img55a90787783fd.jpg\"]]', '', '1000', '8', '0', '0', '1', '0', '\"\"', '', '\"\"', '{\"0\":\"intro55a90787790de.jpg\",\"1\":\"intro55a9078779cd3.jpg\",\"2\":\"intro55a907877ad2c.jpg\",\"3\":\"intro55a907877ba19.jpg\",\"5\":\"intro55a907877c3c1.jpg\",\"6\":\"intro55a907877ce2f.jpg\",\"7\":\"intro55a907877d9b8.jpg\"}');
INSERT INTO `goods` VALUES ('35', '26', '手机防尘塞套件', '2', '2', '[[\"s_img55a9083613a02.jpg\",\"s_img55a9083614691.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '[\"intro55a90836150d8.jpg\",\"intro55a9083615b2b.jpg\",\"intro55a90836165a1.jpg\"]');
INSERT INTO `goods` VALUES ('36', '26', '趣味防尘塞', '4', '4', '[[\"s_img55a9092217387.jpg\"],[\"s_img55a9092218089.jpg\"],[\"s_img55a9092218b67.jpg\"],[\"s_img55a90922199fc.jpg\"]]', '', '500', '10', '0', '0', '1', '0', '[\"\\u7eff\\u8c46\",\"\\u5496\\u5561\\u8c46\",\"\\u4ed9\\u4eba\\u638c\",\"WIFI\"]', '', '\"\"', '[\"intro55a909221ae65.jpg\",\"intro55a909221ba7b.jpg\",\"intro55a909221c5ee.jpg\",\"intro55a909221dd13.jpg\"]');
INSERT INTO `goods` VALUES ('37', '27', '米键', '4', '4', '[[\"s_img55a909d29c5ad.jpg\",\"s_img55a909d29d133.jpg\"],[\"s_img55a909d29dbf2.jpg\"],[\"s_img55a909d29ec70.jpg\"]]', '', '500', '10', '0', '0', '1', '0', '[\"\\u767d\\u8272\",\"\\u84dd\\u8272\",\"\\u6a59\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a909d2a04f1.jpg\",\"1\":\"intro55a909d2a169d.jpg\",\"2\":\"intro55a909d2a25b1.jpg\",\"3\":\"intro55a909d2a4644.jpg\",\"5\":\"intro55a909d2a680a.jpg\",\"6\":\"intro55a909d2a8092.jpg\",\"7\":\"intro55a909d2a96b5.jpg\"}');
INSERT INTO `goods` VALUES ('38', '28', '变形金刚后盖', '11', '39', '[[\"s_img55a9cd2203ef2.jpg\",\"s_img55a9cd22052e9.jpg\",\"s_img55a9cd2206115.jpg\"],[\"s_img55a9cd2206e18.jpg\",\"s_img55a9cd2207d97.jpg\",\"s_img55a9cd2208c08.jpg\"],[\"s_img55a9cd2209864.jpg\",\"s_img55a9cd220a7ff.jpg\",\"s_img55a9cd220b4f1.jpg\"]]', '', '1000', '3', '0', '0', '1', '0', '[\"\\u5927\\u9ec4\\u8702\",\"\\u5a01\\u9707\\u5929\",\"\\u72c2\\u6d3e\"]', '', '\"\"', '{\"0\":\"intro55a90aa38f52f.jpg\",\"1\":\"intro55a90aa390a37.jpg\",\"2\":\"intro55a90aa391616.jpg\",\"3\":\"intro55a90aa392425.jpg\",\"5\":\"intro55a90aa393645.jpg\",\"6\":\"intro55a90aa394607.jpg\",\"7\":\"intro55a90aa3954bf.jpg\"}');
INSERT INTO `goods` VALUES ('39', '28', '米兔3D系列后盖', '39', '39', '[[\"s_img55a90b43e6278.jpg\",\"s_img55a90b43e6f00.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a90b43e7c76.jpg\",\"1\":\"intro55a90b43e90b1.jpg\",\"2\":\"intro55a90b43ea5e1.jpg\",\"3\":\"intro55a90b43eb02f.jpg\",\"5\":\"intro55a90b43ebe20.jpg\",\"6\":\"intro55a90b43edb3a.jpg\",\"7\":\"intro55a90b43ef0dd.jpg\",\"8\":\"intro55a90b43f1158.jpg\"}');
INSERT INTO `goods` VALUES ('40', '29', '卡通主题背贴', '19', '19', '[[\"s_img55a90c03e51f1.jpg\"],[\"s_img55a90c03e666f.jpg\"],[\"s_img55a90c03e74ba.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\\u8c61\\u56fe\\u817e\",\"\\u732b\\u5934\\u9e70\\u82b1\\u6811\",\"\\u5fc3\\u789f\"]', '', '\"\"', '{\"0\":\"intro55a90c03e80d1.jpg\",\"1\":\"intro55a90c03e8ce8.jpg\",\"2\":\"intro55a90c03ea439.jpg\",\"3\":\"intro55a90c03eb615.jpg\",\"5\":\"intro55a90c03eca1d.jpg\"}');
INSERT INTO `goods` VALUES ('41', '29', '缤纷系列背贴', '29', '29', '[[\"s_img55a90c708de5d.jpg\"],[\"s_img55a90c708f275.jpg\"],[\"s_img55a90c708feff.jpg\"]]', '', '500', '10', '0', '0', '1', '0', '[\"\\u827e\\u529b\\u65af\\u591a\\u4e3d\",\"\\u82b1\\u6247\\u821e\",\"\\u55b5\\u55b5\"]', '', '\"\"', '{\"0\":\"intro55a90c7090f18.jpg\",\"1\":\"intro55a90c7091d2f.jpg\",\"2\":\"intro55a90c7092dad.jpg\",\"3\":\"intro55a90c709441e.jpg\",\"5\":\"intro55a90c7096402.jpg\",\"6\":\"intro55a90c7098c85.jpg\",\"7\":\"intro55a90c709a1d0.jpg\"}');
INSERT INTO `goods` VALUES ('42', '30', 'fotopro八爪鱼相机支架', '48', '48', '[[\"s_img55a90cd78b0cf.jpg\",\"s_img55a90cd78c107.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '[\"intro55a90cd78d1c3.jpg\",\"intro55a90cd78eb0b.jpg\",\"intro55a90cd78f824.jpg\",\"intro55a90cd79033a.jpg\"]');
INSERT INTO `goods` VALUES ('43', '30', '手机支架', '19', '19', '[[\"s_img55a90d3eaa310.jpg\",\"s_img55a90d3eab53c.jpg\",\"s_img55a90d3eac066.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a90d3eaccef.jpg\",\"1\":\"intro55a90d3ead8d8.jpg\",\"2\":\"intro55a90d3eae985.jpg\",\"3\":\"intro55a90d3eaf5dd.jpg\",\"5\":\"intro55a90d3eb018c.jpg\"}');
INSERT INTO `goods` VALUES ('44', '31', '小米T恤 MI生活', '29', '29', '[[\"s_img55a9ce8494997.jpg\",\"s_img55a9ce84959c4.jpg\",\"s_img55a9ce84968e7.jpg\",\"s_img55a9ce8498107.jpg\"],[\"s_img55a9ce8498daa.jpg\",\"s_img55a9ce849a3d3.jpg\",\"s_img55a9ce849c114.jpg\",\"s_img55a9ce849dcab.jpg\"],[\"s_img55a9ce849ebf0.jpg\",\"s_img55a9ce849fa7b.jpg\",\"s_img55a9ce84a0f59.jpg\",\"s_img55a9ce84a3053.jpg\"]]', '', '500', '10', '0', '0', '1', '0', '[\"\\u767d\\u8272\",\"\\u84dd\\u8272\",\"\\u7ea2\\u8272\"]', '', '[\"0\",\"1\",\"2\",\"3\",\"4\"]', '{\"0\":\"intro55a90e0b3e188.jpg\",\"1\":\"intro55a90e0b3f82a.jpg\",\"2\":\"intro55a90e0b4106b.jpg\",\"3\":\"intro55a90e0b42848.jpg\",\"5\":\"intro55a90e0b43f3f.jpg\",\"6\":\"intro55a90e0b45fbd.jpg\",\"7\":\"intro55a90e0b46d0b.jpg\",\"8\":\"intro55a90e0b47734.jpg\"}');
INSERT INTO `goods` VALUES ('45', '31', '小米足球米兔T恤', '29', '29', '[[\"s_img55a9cfbcb0a41.jpg\",\"s_img55a9cfbcb19f8.jpg\"],[\"s_img55a9cfbcb2cb4.jpg\",\"s_img55a9cfbcb3a65.jpg\"],[\"s_img55a9cfbcb4680.jpg\",\"s_img55a9cfbcb52e7.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\\u5df4\\u897f\\u98ce\",\"\\u5fb7\\u56fd\\u98ce\",\"\\u610f\\u5927\\u5229\\u98ce\"]', '', '[\"0\",\"1\",\"2\"]', '{\"0\":\"intro55a90f16671b1.jpg\",\"1\":\"intro55a90f1668efd.jpg\",\"2\":\"intro55a90f166a12b.jpg\",\"3\":\"intro55a90f166b27b.jpg\",\"5\":\"intro55a90f166c35a.jpg\",\"6\":\"intro55a90f166e0d6.jpg\",\"7\":\"intro55a90f166f902.jpg\",\"8\":\"intro55a90f1670d69.jpg\"}');
INSERT INTO `goods` VALUES ('46', '32', '泰迪版情侣米兔', '39', '39', '[[\"s_img55a90fcb6b336.jpg\",\"s_img55a90fcb6c291.jpg\",\"s_img55a90fcb6d040.jpg\"],[\"s_img55a90fcb6dbde.jpg\",\"s_img55a90fcb6ef78.jpg\",\"s_img55a90fcb70685.jpg\"]]', '', '1000', '10', '0', '0', '1', '0', '[\"\\u7c89\\u8272\",\"\\u68d5\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a90fcb717a7.jpg\",\"1\":\"intro55a90fcb72d9a.jpg\",\"2\":\"intro55a90fcb740bd.jpg\",\"3\":\"intro55a90fcb751d2.jpg\",\"5\":\"intro55a90fcb7670b.jpg\",\"6\":\"intro55a90fcb77c7c.jpg\",\"7\":\"intro55a90fcb78c0b.jpg\",\"8\":\"intro55a90fcb79fbc.jpg\"}');
INSERT INTO `goods` VALUES ('47', '32', '60cm柔软抱枕米兔', '99', '99', '[[\"s_img55a910233316c.jpg\",\"s_img55a9102334266.jpg\"]]', '', '500', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a9102335680.jpg\",\"1\":\"intro55a9102336518.jpg\",\"2\":\"intro55a910233736d.jpg\",\"3\":\"intro55a9102338dca.jpg\",\"5\":\"intro55a9102339d08.jpg\"}');
INSERT INTO `goods` VALUES ('48', '33', '新学院风帆布双肩包', '79', '79', '[[\"s_img55a910a630436.jpg\",\"s_img55a910a6319c4.jpg\",\"s_img55a910a632d0d.jpg\"],[\"s_img55a910a633947.jpg\",\"s_img55a910a634beb.jpg\",\"s_img55a910a63576c.jpg\"]]', '', '0', '10', '0', '0', '1', '0', '[\"\\u5361\\u5176\\u8272\",\"\\u9ed1\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a910a6377ea.jpg\",\"1\":\"intro55a910a639e2b.jpg\",\"2\":\"intro55a910a63caee.jpg\",\"3\":\"intro55a910a63e8bd.jpg\",\"5\":\"intro55a910a6409f3.jpg\",\"6\":\"intro55a910a641b76.jpg\",\"7\":\"intro55a910a642e30.jpg\"}');
INSERT INTO `goods` VALUES ('49', '33', '小米简约帆布腰包', '59', '59', '[[\"s_img55a91118e1ecc.jpg\",\"s_img55a91118e31fc.jpg\",\"s_img55a91118e407b.jpg\",\"s_img55a91118e4f52.jpg\"],[\"s_img55a91118e5a8d.jpg\",\"s_img55a91118e69af.jpg\",\"s_img55a91118e797e.jpg\"]]', '', '500', '10', '0', '0', '1', '0', '[\"\\u5361\\u5176\\u8272\",\"\\u9ed1\\u8272\"]', '', '\"\"', '{\"0\":\"intro55a91118e96b9.jpg\",\"1\":\"intro55a91118ebcbb.jpg\",\"2\":\"intro55a91118ed779.jpg\",\"3\":\"intro55a91118f089c.jpg\",\"5\":\"intro55a91119015b0.jpg\"}');
INSERT INTO `goods` VALUES ('50', '34', '飞天小猪存钱罐', '39', '39', '[[\"s_img55a9118fb0360.jpg\",\"s_img55a9118fb1513.jpg\",\"s_img55a9118fb24b3.jpg\",\"s_img55a9118fb3472.jpg\"]]', '', '500', '10', '0', '0', '1', '0', '[\"\"]', '', '\"\"', '{\"0\":\"intro55a9118fb43be.jpg\",\"1\":\"intro55a9118fb5148.jpg\",\"2\":\"intro55a9118fb5dad.jpg\",\"3\":\"intro55a9118fb6bef.jpg\",\"5\":\"intro55a9118fb7c92.jpg\",\"6\":\"intro55a9118fb9025.jpg\",\"7\":\"intro55a9118fba094.jpg\",\"8\":\"intro55a9118fbb7a5.jpg\"}');
INSERT INTO `goods` VALUES ('51', '34', '小米随身风扇', '7', '19', '[[\"s_img55ab008309454.jpg\",\"s_img55ab008309ee8.jpg\"],[\"s_img55ab00830a921.jpg\",\"s_img55ab00830b060.jpg\"],[\"s_img55ab00830b724.jpg\",\"s_img55ab00830bfe8.jpg\"]]', '', '0', '4', '0', '0', '1', '0', '[\"ddd\",\"ddd\",\"fff\"]', '', '\"\"', '[\"intro55ab00830d8c4.jpg\",\"intro55ab00830e952.jpg\",\"intro55ab0083116d4.jpg\",\"intro55ab008311e84.jpg\"]');

-- ----------------------------
-- Table structure for `goodsclass`
-- ----------------------------
DROP TABLE IF EXISTS `goodsclass`;
CREATE TABLE `goodsclass` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品分类ID',
  `name` varchar(255) NOT NULL COMMENT '商品分类名称',
  `paid` int(11) NOT NULL COMMENT 'f',
  `path` varchar(255) NOT NULL COMMENT '分类级别(目录)',
  `image` varchar(255) DEFAULT NULL COMMENT '小图像',
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '分类状态',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goodsclass
-- ----------------------------
INSERT INTO `goodsclass` VALUES ('1', '购买手机', '0', '0', null, '1');
INSERT INTO `goodsclass` VALUES ('2', '购买电视与平板', '0', '0', null, '1');
INSERT INTO `goodsclass` VALUES ('3', '路由器与智能硬件', '0', '0', null, '1');
INSERT INTO `goodsclass` VALUES ('4', '插线板、移动电源与电池', '0', '0', null, '1');
INSERT INTO `goodsclass` VALUES ('5', '耳机音箱与存储卡', '0', '0', null, '1');
INSERT INTO `goodsclass` VALUES ('6', '保护套与贴膜', '0', '0', null, '1');
INSERT INTO `goodsclass` VALUES ('7', '后盖与个性化配件', '0', '0', null, '1');
INSERT INTO `goodsclass` VALUES ('8', '小米生活方式', '0', '0', null, '1');
INSERT INTO `goodsclass` VALUES ('9', '小米Note', '1', '0,1', 'minote.jpg', '1');
INSERT INTO `goodsclass` VALUES ('10', '小米4', '1', '0,1', 'mi4.jpg', '1');
INSERT INTO `goodsclass` VALUES ('11', '红米', '1', '0,1', 'redmi2.jpg', '1');
INSERT INTO `goodsclass` VALUES ('12', '红米Note', '1', '0,1', 'redminote.jpg', '1');
INSERT INTO `goodsclass` VALUES ('13', '小米电视', '2', '0,2', 'mitv.jpg', '1');
INSERT INTO `goodsclass` VALUES ('14', '小米盒子', '2', '0,2', 'mibox.jpg', '1');
INSERT INTO `goodsclass` VALUES ('15', '小米平板', '2', '0,2', 'mipad.jpg', '1');
INSERT INTO `goodsclass` VALUES ('16', '路由器', '3', '0,3', 'T1bjCTBy_v1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('17', '体重秤', '3', '0,3', 'T1NUYvBCEv1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('18', '净化器与滤芯', '3', '0,3', 'T1iIhvB7WT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('19', '小米移动电源', '4', '0,4', 'T17DxvB4_T1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('20', '电池', '4', '0,4', 'T1QJKvBvJT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('21', '充电器', '4', '0,4', 'T1DUEvBKxT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('22', '小米头戴式耳机', '5', '0,5', 'T1CfKTBQZT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('23', '小米活塞耳机', '5', '0,5', 'T1DM__B4dT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('24', '保护套/保护壳', '6', '0,6', 'T1.qETBXAv1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('25', '贴膜', '6', '0,6', 'T1uGJvBCdT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('26', '防尘塞', '6', '0,6', 'T1UrhvBjKT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('27', '米健', '7', '0,7', 'T1BrhvBbDT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('28', '后盖', '7', '0,7', 'T1d3bvBbKT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('29', '贴纸', '7', '0,7', 'T14CZgB5hT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('30', '手机支架', '7', '0,7', 'T13rCvBjhT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('31', '服装', '8', '0,8', 'T1OaD_BTET1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('32', '米兔', '8', '0,8', 'T14DJvBXK_1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('33', '背包', '8', '0,8', 'T1hlEvB5AT1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('34', '生活周边', '8', '0,8', 'T15SZvB4Av1RXrhCrK!40x40.jpg', '1');
INSERT INTO `goodsclass` VALUES ('37', '爱情', '8', '0,8', null, '1');

-- ----------------------------
-- Table structure for `like`
-- ----------------------------
DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `kid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `mssid` int(11) DEFAULT NULL,
  `mgid` int(11) DEFAULT NULL COMMENT '商品ID',
  `title` varchar(255) DEFAULT NULL,
  `zhupic` varchar(255) DEFAULT NULL,
  `colortit` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `nowprice` int(11) DEFAULT NULL,
  `comment` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of like
-- ----------------------------
INSERT INTO `like` VALUES ('2', '4', '2147483647', '8', '小米电视2 55英寸', 's_img55a9c91aeb041.jpg', '', '4499', '4499', '0', '1437268421');
INSERT INTO `like` VALUES ('3', '3', '2147483647', '2', '小米手机4', 's_img55a8ca5c1ca2e.jpg', '', '1499', '1499', '0', '1437270497');
INSERT INTO `like` VALUES ('4', '6', '2147483647', '10', '小米盒子增强版', 's_img55a8e15612d9f.jpg', '', '299', '89', '0', '1439306686');
INSERT INTO `like` VALUES ('5', '6', '2147483647', '3', '红米手机2A', 's_img55a9c676403d0.jpg', '', '499', '249', '0', '1439388947');

-- ----------------------------
-- Table structure for `ordering`
-- ----------------------------
DROP TABLE IF EXISTS `ordering`;
CREATE TABLE `ordering` (
  `oid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `onumber` varchar(255) NOT NULL COMMENT '订单号',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `ginfo` text NOT NULL COMMENT '订单商品信息',
  `money` int(11) NOT NULL COMMENT '商品价格',
  `aid` int(11) NOT NULL DEFAULT '2' COMMENT '村镇街道',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `otime` int(11) NOT NULL COMMENT '下单时间',
  `paymethod` tinyint(1) NOT NULL DEFAULT '1',
  `postmethod` tinyint(1) NOT NULL DEFAULT '1',
  `posttime` tinyint(1) NOT NULL DEFAULT '1',
  `invoice` tinyint(1) NOT NULL DEFAULT '2',
  `invoicetype` tinyint(1) NOT NULL DEFAULT '2',
  `invoicetitle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ordering
-- ----------------------------
INSERT INTO `ordering` VALUES ('1', '981437268393700', '4', '{\"1\":{\"gid\":\"1\",\"mcid\":\"9\",\"title\":\"\\u5c0f\\u7c73Note\",\"nowprice\":\"1999\",\"price\":\"1999\",\"s_img\":\"s_img55a9c64096ebf.jpg\",\"b_img\":\"\",\"num\":\"500\",\"discount\":\"10\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u7c89\\\\u8272&quot;,&quot;\\\\u9ed1\\\\u8272&quot;,&quot;\\\\u767d\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8c574c613d.jpg&quot;,&quot;1&quot;:&quot;intro55a8c574c730c.jpg&quot;,&quot;2&quot;:&quot;intro55a8c574c80d4.jpg&quot;,&quot;3&quot;:&quot;intro55a8c574c94b7.jpg&quot;,&quot;5&quot;:&quot;intro55a8c574ca399.jpg&quot;,&quot;6&quot;:&quot;intro55a8c574cb91c.jpg&quot;,&quot;7&quot;:&quot;intro55a8c574cd4f4.jpg&quot;,&quot;8&quot;:&quot;intro55a8c574ceafd.png&quot;}\",\"number\":\"1\",\"xiaoji\":\"1999\"},\"18\":{\"gid\":\"18\",\"mcid\":\"19\",\"title\":\"\\u5c0f\\u7c73\\u79fb\\u52a8\\u7535\\u6e9010000mAh\",\"nowprice\":\"48\",\"price\":\"69\",\"s_img\":\"s_img55a9caa523582.jpg\",\"b_img\":\"\",\"num\":\"0\",\"discount\":\"7\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u94f6\\\\u8272&quot;,&quot;\\\\u7ea2\\\\u8272&quot;,&quot;\\\\u91d1\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8ed3394a22.jpg&quot;,&quot;1&quot;:&quot;intro55a8ed3395732.jpg&quot;,&quot;2&quot;:&quot;intro55a8ed33963a1.jpg&quot;,&quot;3&quot;:&quot;intro55a8ed3396fca.jpg&quot;,&quot;5&quot;:&quot;intro55a8ed3397a69.jpg&quot;,&quot;6&quot;:&quot;intro55a8ed3398a32.jpg&quot;,&quot;7&quot;:&quot;intro55a8ed3399a56.jpg&quot;,&quot;8&quot;:&quot;intro55a8ed339ad83.jpg&quot;}\",\"number\":\"1\",\"xiaoji\":\"69\"}}', '2047', '4', '3', '1437268393', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('2', '981437268472855', '4', '{\"8\":{\"gid\":\"8\",\"mcid\":\"13\",\"title\":\"\\u5c0f\\u7c73\\u7535\\u89c62 55\\u82f1\\u5bf8\",\"nowprice\":\"4499\",\"price\":\"4499\",\"s_img\":\"s_img55a9c91aeb041.jpg\",\"b_img\":\"\",\"num\":\"0\",\"discount\":\"10\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u91d1\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8ce8b286d2.jpg&quot;,&quot;1&quot;:&quot;intro55a8ce8b297cc.jpg&quot;,&quot;2&quot;:&quot;intro55a8ce8b2b1a6.jpg&quot;,&quot;3&quot;:&quot;intro55a8ce8b2c563.jpg&quot;,&quot;5&quot;:&quot;intro55a8ce8b2ddd9.png&quot;,&quot;6&quot;:&quot;intro55a8ce8b2e970.jpg&quot;,&quot;7&quot;:&quot;intro55a8ce8b30747.jpg&quot;,&quot;8&quot;:&quot;intro55a8ce8b3196b.png&quot;}\",\"number\":\"1\",\"xiaoji\":\"4499\"},\"13\":{\"gid\":\"13\",\"mcid\":\"16\",\"title\":\"\\u5c0f\\u7c73\\u8def\\u7531\\u5668 mini\",\"nowprice\":\"129\",\"price\":\"129\",\"s_img\":\"s_img55a8e92509524.jpg\",\"b_img\":\"\",\"num\":\"0\",\"discount\":\"10\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u9ed1\\\\u8272&quot;,&quot;\\\\u767d\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8e9250b2c4.jpg&quot;,&quot;1&quot;:&quot;intro55a8e9250bdee.jpg&quot;,&quot;2&quot;:&quot;intro55a8e9250e859.png&quot;,&quot;3&quot;:&quot;intro55a8e9250fa7b.jpg&quot;,&quot;5&quot;:&quot;intro55a8e92511a2d.jpg&quot;,&quot;6&quot;:&quot;intro55a8e925128f4.jpg&quot;,&quot;7&quot;:&quot;intro55a8e925137d7.jpg&quot;,&quot;8&quot;:&quot;intro55a8e925154cc.jpg&quot;}\",\"number\":\"1\",\"xiaoji\":\"129\"}}', '4628', '4', '0', '1437268472', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('3', '981437268546348', '4', '{\"31\":{\"gid\":\"31\",\"mcid\":\"24\",\"title\":\"\\u6e05\\u6c34\\u8f6f\\u80f6\\u4fdd\\u62a4\\u5957\",\"nowprice\":\"9\",\"price\":\"9\",\"s_img\":\"s_img55a9030d9702a.jpg\",\"b_img\":\"\",\"num\":\"1000\",\"discount\":\"10\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u9ec4\\\\u8272&quot;,&quot;\\\\u84dd\\\\u8272&quot;,&quot;\\\\u767d\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"[&quot;intro55a9030d9db37.jpg&quot;,&quot;intro55a9030d9e8b6.jpg&quot;,&quot;intro55a9030d9f6dc.jpg&quot;,&quot;intro55a9030db4db8.jpg&quot;]\",\"number\":\"1\",\"xiaoji\":\"9\"},\"10\":{\"gid\":\"10\",\"mcid\":\"14\",\"title\":\"\\u5c0f\\u7c73\\u76d2\\u5b50\\u589e\\u5f3a\\u7248\",\"nowprice\":\"89\",\"price\":\"299\",\"s_img\":\"s_img55a8e15612d9f.jpg\",\"b_img\":\"\",\"num\":\"1000\",\"discount\":\"3\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"&quot;&quot;\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"[&quot;intro55a8e156146aa.png&quot;,&quot;intro55a8e15615013.jpg&quot;,&quot;intro55a8e156163b2.jpg&quot;,&quot;intro55a8e156177e9.jpg&quot;]\",\"number\":\"1\",\"xiaoji\":\"299\"}}', '108', '4', '1', '1437268546', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('4', '981437370192731', '3', '{\"45\":{\"gid\":\"45\",\"mcid\":\"31\",\"title\":\"\\u5c0f\\u7c73\\u8db3\\u7403\\u7c73\\u5154T\\u6064\",\"nowprice\":\"29\",\"price\":\"29\",\"s_img\":\"s_img55a9cfbcb0a41.jpg\",\"b_img\":\"\",\"num\":\"0\",\"discount\":\"10\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u5df4\\\\u897f\\\\u98ce&quot;,&quot;\\\\u5fb7\\\\u56fd\\\\u98ce&quot;,&quot;\\\\u610f\\\\u5927\\\\u5229\\\\u98ce&quot;]\",\"colorimg\":\"\",\"size\":\"[&quot;0&quot;,&quot;1&quot;,&quot;2&quot;]\",\"intro\":\"{&quot;0&quot;:&quot;intro55a90f16671b1.jpg&quot;,&quot;1&quot;:&quot;intro55a90f1668efd.jpg&quot;,&quot;2&quot;:&quot;intro55a90f166a12b.jpg&quot;,&quot;3&quot;:&quot;intro55a90f166b27b.jpg&quot;,&quot;5&quot;:&quot;intro55a90f166c35a.jpg&quot;,&quot;6&quot;:&quot;intro55a90f166e0d6.jpg&quot;,&quot;7&quot;:&quot;intro55a90f166f902.jpg&quot;,&quot;8&quot;:&quot;intro55a90f1670d69.jpg&quot;}\",\"number\":\"1\",\"xiaoji\":\"29\"}}', '39', '3', '1', '1437370192', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('5', '981437370303778', '3', '{\"44\":{\"gid\":\"44\",\"mcid\":\"31\",\"title\":\"\\u5c0f\\u7c73T\\u6064 MI\\u751f\\u6d3b\",\"nowprice\":\"29\",\"price\":\"29\",\"s_img\":\"s_img55a9ce8494997.jpg\",\"b_img\":\"\",\"num\":\"500\",\"discount\":\"10\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u767d\\\\u8272&quot;,&quot;\\\\u84dd\\\\u8272&quot;,&quot;\\\\u7ea2\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"[&quot;0&quot;,&quot;1&quot;,&quot;2&quot;,&quot;3&quot;,&quot;4&quot;]\",\"intro\":\"{&quot;0&quot;:&quot;intro55a90e0b3e188.jpg&quot;,&quot;1&quot;:&quot;intro55a90e0b3f82a.jpg&quot;,&quot;2&quot;:&quot;intro55a90e0b4106b.jpg&quot;,&quot;3&quot;:&quot;intro55a90e0b42848.jpg&quot;,&quot;5&quot;:&quot;intro55a90e0b43f3f.jpg&quot;,&quot;6&quot;:&quot;intro55a90e0b45fbd.jpg&quot;,&quot;7&quot;:&quot;intro55a90e0b46d0b.jpg&quot;,&quot;8&quot;:&quot;intro55a90e0b47734.jpg&quot;}\",\"number\":\"1\",\"xiaoji\":\"29\"}}', '39', '3', '1', '1437370303', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('6', '981439306445880', '6', '{\"1\":{\"gid\":\"1\",\"mcid\":\"9\",\"title\":\"\\u5c0f\\u7c73Note\",\"nowprice\":\"1999\",\"price\":\"1999\",\"s_img\":\"s_img55a9c64096ebf.jpg\",\"b_img\":\"\",\"num\":\"500\",\"discount\":\"10\",\"comment\":\"1\",\"com_num\":\"1\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u7c89\\\\u8272&quot;,&quot;\\\\u9ed1\\\\u8272&quot;,&quot;\\\\u767d\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8c574c613d.jpg&quot;,&quot;1&quot;:&quot;intro55a8c574c730c.jpg&quot;,&quot;2&quot;:&quot;intro55a8c574c80d4.jpg&quot;,&quot;3&quot;:&quot;intro55a8c574c94b7.jpg&quot;,&quot;5&quot;:&quot;intro55a8c574ca399.jpg&quot;,&quot;6&quot;:&quot;intro55a8c574cb91c.jpg&quot;,&quot;7&quot;:&quot;intro55a8c574cd4f4.jpg&quot;,&quot;8&quot;:&quot;intro55a8c574ceafd.png&quot;}\",\"number\":\"1\",\"xiaoji\":\"1999\"},\"2\":{\"gid\":\"2\",\"mcid\":\"10\",\"title\":\"\\u5c0f\\u7c73\\u624b\\u673a4\",\"nowprice\":\"1499\",\"price\":\"1499\",\"s_img\":\"s_img55a8ca5c1ca2e.jpg\",\"b_img\":\"\",\"num\":\"0\",\"discount\":\"10\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u767d\\\\u8272&quot;,&quot;\\\\u9ed1\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8c7aac79be.jpg&quot;,&quot;1&quot;:&quot;intro55a8c7aac8f42.png&quot;,&quot;2&quot;:&quot;intro55a8c7aacb882.png&quot;,&quot;3&quot;:&quot;intro55a8c7aacc1c4.png&quot;,&quot;5&quot;:&quot;intro55a8c7aaccd54.jpg&quot;,&quot;6&quot;:&quot;intro55a8c7aace0d6.jpg&quot;,&quot;7&quot;:&quot;intro55a8c7aad08ce.png&quot;,&quot;8&quot;:&quot;intro55a8c7aad11d3.png&quot;}\",\"number\":\"1\",\"xiaoji\":\"1499\"}}', '3498', '2', '3', '1439306445', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('7', '981439306867917', '6', '{\"10\":{\"gid\":\"10\",\"mcid\":\"14\",\"title\":\"\\u5c0f\\u7c73\\u76d2\\u5b50\\u589e\\u5f3a\\u7248\",\"nowprice\":\"89\",\"price\":\"299\",\"s_img\":\"s_img55a8e15612d9f.jpg\",\"b_img\":\"\",\"num\":\"1000\",\"discount\":\"3\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"&quot;&quot;\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"[&quot;intro55a8e156146aa.png&quot;,&quot;intro55a8e15615013.jpg&quot;,&quot;intro55a8e156163b2.jpg&quot;,&quot;intro55a8e156177e9.jpg&quot;]\",\"number\":\"1\",\"xiaoji\":\"299\"}}', '99', '5', '0', '1439306867', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('8', '981439386490360', '6', '{\"2\":{\"gid\":\"2\",\"mcid\":\"10\",\"title\":\"\\u5c0f\\u7c73\\u624b\\u673a4\",\"nowprice\":\"1499\",\"price\":\"1499\",\"s_img\":\"s_img55a8ca5c1ca2e.jpg\",\"b_img\":\"\",\"num\":\"0\",\"discount\":\"10\",\"comment\":\"1\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u767d\\\\u8272&quot;,&quot;\\\\u9ed1\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8c7aac79be.jpg&quot;,&quot;1&quot;:&quot;intro55a8c7aac8f42.png&quot;,&quot;2&quot;:&quot;intro55a8c7aacb882.png&quot;,&quot;3&quot;:&quot;intro55a8c7aacc1c4.png&quot;,&quot;5&quot;:&quot;intro55a8c7aaccd54.jpg&quot;,&quot;6&quot;:&quot;intro55a8c7aace0d6.jpg&quot;,&quot;7&quot;:&quot;intro55a8c7aad08ce.png&quot;,&quot;8&quot;:&quot;intro55a8c7aad11d3.png&quot;}\",\"number\":\"1\",\"xiaoji\":\"1499\"}}', '1499', '5', '1', '1439386490', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('9', '981439386608697', '6', '{\"3\":{\"gid\":\"3\",\"mcid\":\"11\",\"title\":\"\\u7ea2\\u7c73\\u624b\\u673a2A\",\"nowprice\":\"249\",\"price\":\"499\",\"s_img\":\"s_img55a9c676403d0.jpg\",\"b_img\":\"\",\"num\":\"500\",\"discount\":\"5\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8c8d4577e4.jpg&quot;,&quot;1&quot;:&quot;intro55a8c8d4583b4.jpg&quot;,&quot;2&quot;:&quot;intro55a8c8d459054.jpg&quot;,&quot;3&quot;:&quot;intro55a8c8d459c8e.jpg&quot;,&quot;5&quot;:&quot;intro55a8c8d45b86d.jpg&quot;,&quot;6&quot;:&quot;intro55a8c8d45c7ed.jpg&quot;,&quot;7&quot;:&quot;intro55a8c8d45d954.jpg&quot;,&quot;8&quot;:&quot;intro55a8c8d45e89c.jpg&quot;}\",\"number\":\"1\",\"xiaoji\":\"499\"}}', '249', '5', '1', '1439386608', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('10', '981439386642973', '6', '{\"2\":{\"gid\":\"2\",\"mcid\":\"10\",\"title\":\"\\u5c0f\\u7c73\\u624b\\u673a4\",\"nowprice\":\"1499\",\"price\":\"1499\",\"s_img\":\"s_img55a8ca5c1ca2e.jpg\",\"b_img\":\"\",\"num\":\"0\",\"discount\":\"10\",\"comment\":\"1\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;\\\\u767d\\\\u8272&quot;,&quot;\\\\u9ed1\\\\u8272&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8c7aac79be.jpg&quot;,&quot;1&quot;:&quot;intro55a8c7aac8f42.png&quot;,&quot;2&quot;:&quot;intro55a8c7aacb882.png&quot;,&quot;3&quot;:&quot;intro55a8c7aacc1c4.png&quot;,&quot;5&quot;:&quot;intro55a8c7aaccd54.jpg&quot;,&quot;6&quot;:&quot;intro55a8c7aace0d6.jpg&quot;,&quot;7&quot;:&quot;intro55a8c7aad08ce.png&quot;,&quot;8&quot;:&quot;intro55a8c7aad11d3.png&quot;}\",\"number\":\"1\",\"xiaoji\":\"1499\"}}', '1499', '5', '0', '1439386642', '1', '1', '1', '1', '1', '');
INSERT INTO `ordering` VALUES ('11', '981439389025603', '6', '{\"3\":{\"gid\":\"3\",\"mcid\":\"11\",\"title\":\"\\u7ea2\\u7c73\\u624b\\u673a2A\",\"nowprice\":\"249\",\"price\":\"499\",\"s_img\":\"s_img55a9c676403d0.jpg\",\"b_img\":\"\",\"num\":\"500\",\"discount\":\"5\",\"comment\":\"0\",\"com_num\":\"0\",\"status\":\"1\",\"recomend\":\"0\",\"colortit\":\"[&quot;&quot;]\",\"colorimg\":\"\",\"size\":\"&quot;&quot;\",\"intro\":\"{&quot;0&quot;:&quot;intro55a8c8d4577e4.jpg&quot;,&quot;1&quot;:&quot;intro55a8c8d4583b4.jpg&quot;,&quot;2&quot;:&quot;intro55a8c8d459054.jpg&quot;,&quot;3&quot;:&quot;intro55a8c8d459c8e.jpg&quot;,&quot;5&quot;:&quot;intro55a8c8d45b86d.jpg&quot;,&quot;6&quot;:&quot;intro55a8c8d45c7ed.jpg&quot;,&quot;7&quot;:&quot;intro55a8c8d45d954.jpg&quot;,&quot;8&quot;:&quot;intro55a8c8d45e89c.jpg&quot;}\",\"number\":\"1\",\"xiaoji\":\"499\"}}', '249', '5', '0', '1439389025', '1', '1', '1', '1', '1', '');

-- ----------------------------
-- Table structure for `think_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group`;
CREATE TABLE `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_auth_group
-- ----------------------------
INSERT INTO `think_auth_group` VALUES ('1', '超级管理员组', '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54');
INSERT INTO `think_auth_group` VALUES ('2', '管理员管理组', '1', '1,2,3,4,5,6,7');
INSERT INTO `think_auth_group` VALUES ('3', '管理员权限管理组', '1', '1,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23');
INSERT INTO `think_auth_group` VALUES ('4', '用户管理组', '1', '1,24,25,26,27,28,29');
INSERT INTO `think_auth_group` VALUES ('5', '分类管理组', '1', '1,30,31,32,33,34,35');
INSERT INTO `think_auth_group` VALUES ('6', '商品管理组', '1', '1,36,37,38,39,40,41,42');
INSERT INTO `think_auth_group` VALUES ('7', '订单管理组', '1', '1,43,44,45');
INSERT INTO `think_auth_group` VALUES ('8', '评价管理组', '1', '1,46,47,48,49');
INSERT INTO `think_auth_group` VALUES ('9', '提问管理组', '1', '1,50,51,52,53,54');

-- ----------------------------
-- Table structure for `think_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group_access`;
CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_auth_group_access
-- ----------------------------
INSERT INTO `think_auth_group_access` VALUES ('1', '1');

-- ----------------------------
-- Table structure for `think_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_rule`;
CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_auth_rule
-- ----------------------------
INSERT INTO `think_auth_rule` VALUES ('1', 'Admin/Index/index', '小米后台主页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('2', 'Admin/Admin/index', '管理员_列表页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('3', 'Admin/Admin/add', '管理员_添加页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('4', 'Admin/Admin/insert', '管理员_添加方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('5', 'Admin/Admin/edit', '管理员_修改页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('6', 'Admin/Admin/update', '管理员_修改方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('7', 'Admin/Admin/delete', '管理员_删除方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('8', 'Admin/AdminAuth/index_rule', '管理员权限_规则页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('9', 'Admin/AdminAuth/index_group', '管理员权限_组页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('10', 'Admin/AdminAuth/index_group_access', '管理员权限_属组页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('11', 'Admin/AdminAuth/add', '管理员权限_规则、组、属组添加页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('12', 'Admin/AdminAuth/insert_rule', '管理员权限_规则添加方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('13', 'Admin/AdminAuth/insert_group', '管理员权限_组添加方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('14', 'Admin/AdminAuth/insert_group_access', '管理员权限_属组添加方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('15', 'Admin/AdminAuth/edit_rule', '管理员权限_规则修改页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('16', 'Admin/AdminAuth/update_rule', '管理员权限_规则修改方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('17', 'Admin/AdminAuth/edit_group', '管理员权限_组修改页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('18', 'Admin/AdminAuth/update_group', '管理员权限_组修改方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('19', 'Admin/AdminAuth/edit_group_access', '管理员权限_属组修改页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('20', 'Admin/AdminAuth/update_group_access', '管理员权限_属组修改方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('21', 'Admin/AdminAuth/delete_rule', '管理员权限_规则删除方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('22', 'Admin/AdminAuth/delete_group', '管理员权限_组删除方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('23', 'Admin/AdminAuth/delete_group_access', '管理员权限_属组删除方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('24', 'Admin/User/index', '用户_列表页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('25', 'Admin/User/add', '用户_添加页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('26', 'Admin/User/insert', '用户_添加方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('27', 'Admin/User/edit', '用户_修改页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('28', 'Admin/User/update', '用户_修改方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('29', 'Admin/User/delete', '用户_删除方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('30', 'Admin/Goodsclass/index', '分类_列表页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('31', 'Admin/Goodsclass/add', '分类_添加页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('32', 'Admin/Goodsclass/insert', '分类_添加方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('33', 'Admin/Goodsclass/delete', '分类_删除方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('34', 'Admin/Goodsclass/edit', '分类_修改页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('35', 'Admin/Goodsclass/update', '分类_修改方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('36', 'Admin/Goods/index', '商品_列表页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('37', 'Admin/Goods/add', '商品_添加页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('38', 'Admin/Goods/insert', '商品_添加方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('39', 'Admin/Goods/edit', '商品_修改页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('40', 'Admin/Goods/save', '商品_修改方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('41', 'Admin/Goods/delete', '商品_删除方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('42', 'Admin/Goods/suofang', '商品_图片缩放方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('43', 'Admin/Order/index', '订单_列表页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('44', 'Admin/Order/edit', '订单_详情页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('45', 'Admin/Order/post', '订单_发货方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('46', 'Admin/Comment/index', '评价_列表页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('47', 'Admin/Comment/edit', '评价_修改页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('48', 'Admin/Comment/update', '评价_修改方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('49', 'Admin/Comment/delete', '评价_删除方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('50', 'Admin/Ask/index', '提问_列表页面', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('51', 'Admin/Ask/insert', '提问_添加方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('52', 'Admin/Ask/deal', '提问_审核方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('53', 'Admin/Ask/save', '提问_修改方法', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('54', 'Admin/Ask/delete', '提问_删除方法', '1', '1', '');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `phone` varchar(32) NOT NULL COMMENT '用户手机号(注册,登录)',
  `email` varchar(255) NOT NULL COMMENT '用户邮箱(可以用来登录)',
  `ssid` varchar(32) NOT NULL COMMENT '用户编号(可以用来登录)',
  `password` varchar(32) NOT NULL COMMENT '用户密码',
  `rtime` int(11) NOT NULL COMMENT '注册时间',
  `rip` varchar(255) NOT NULL COMMENT '注册IP',
  `ctime` int(11) NOT NULL COMMENT '登录时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户状态',
  `img` varchar(255) NOT NULL DEFAULT 'Upload/UserPortrait/UserPortraits.jpg',
  `money` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '18032165097', 'chenpeiping@qq.com', '143719060567', 'a008aa83f9f52700237f9ecb93159a5b', '1437190605', '-1062676680', '1437236128', '1', 'Upload/UserPortrait/UserPortraits.jpg', '0');
INSERT INTO `user` VALUES ('2', '13676678998', 'test05@qq.com', '143720270524', '1c43424ab7320959839b7385fb9a20c5', '1437202705', '-1062676671', '1437202741', '1', 'Upload/UserPortrait/2015-07-18/55a9f95483e09.jpg', '100000');
INSERT INTO `user` VALUES ('3', '15110796618', 'tjk@qq.com', '143721994393', '202cb962ac59075b964b07152d234b70', '1437219943', '2130706433', '1437370139', '1', 'Upload/UserPortrait/UserPortraits.jpg', '97356');
INSERT INTO `user` VALUES ('4', '16677886655', 'Gently@163.com', '143723744961', '1c43424ab7320959839b7385fb9a20c5', '1437237449', '-1062676671', '1437270670', '1', 'Upload/UserPortrait/2015-07-19/55ab032638266.jpg', '95846');
INSERT INTO `user` VALUES ('5', '18700000000', '1212121@qq.com', '143726999586', '698d51a19d8a121ce581499d7b701668', '1437269995', '-1062676677', '0', '1', 'Upload/UserPortrait/UserPortraits.jpg', '100000');
INSERT INTO `user` VALUES ('6', '15136175245', '61@qq.com', '143930281162', 'e10adc3949ba59abbe56e057f20f883e', '1439302811', '2130706433', '1439386415', '1', 'Upload/UserPortrait/UserPortraits.jpg', '94754');

-- ----------------------------
-- Table structure for `userdetail`
-- ----------------------------
DROP TABLE IF EXISTS `userdetail`;
CREATE TABLE `userdetail` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户详情ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `name` varchar(255) NOT NULL COMMENT '用户名字',
  `birthday` varchar(10) NOT NULL COMMENT '用户生日',
  `sex` tinyint(1) NOT NULL COMMENT '用户性别',
  `bankcard` char(19) NOT NULL DEFAULT '0' COMMENT '银行卡号',
  PRIMARY KEY (`did`),
  UNIQUE KEY `u` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userdetail
-- ----------------------------
INSERT INTO `userdetail` VALUES ('1', '4', '徐大川fdgfd', '2013-03-03', '0', '0');
