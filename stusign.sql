-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2016 年 10 月 17 日 23:17
-- 服务器版本: 5.6.26
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `stusign`
-- 
create database stusign;
use stusign;
-- --------------------------------------------------------

-- 
-- 表的结构 `gamehero`
-- 

CREATE TABLE `gamehero` (
  `heroname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `herograde` int(5) NOT NULL,
  `gamename` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- 导出表中的数据 `gamehero`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `studata`
-- 

CREATE TABLE `studata` (
  `stuID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stuName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stuTel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stuQQ` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- 导出表中的数据 `studata`
-- 

INSERT INTO `studata` VALUES ('13051066', '张恒', NULL, NULL);
INSERT INTO `studata` VALUES ('13051088', '宗家冰', NULL, NULL);
INSERT INTO `studata` VALUES ('13051110', '乔淑凤', NULL, NULL);
INSERT INTO `studata` VALUES ('13051117', '李胜男', NULL, NULL);
INSERT INTO `studata` VALUES ('13051120', '赵丹妮', NULL, NULL);
INSERT INTO `studata` VALUES ('13051121', '(Z)程馨', NULL, NULL);
INSERT INTO `studata` VALUES ('13052010', '代兵', NULL, NULL);
INSERT INTO `studata` VALUES ('13052053', '程警', NULL, NULL);
INSERT INTO `studata` VALUES ('13301002', '孔祥镔', NULL, NULL);
INSERT INTO `studata` VALUES ('13301003', '王兆晟', NULL, NULL);
INSERT INTO `studata` VALUES ('13301004', '刘俭俭', NULL, NULL);
INSERT INTO `studata` VALUES ('13301005', '张志强', NULL, NULL);
INSERT INTO `studata` VALUES ('13301012', '雷俊业', NULL, NULL);
INSERT INTO `studata` VALUES ('13301015', '王倩文', NULL, NULL);
INSERT INTO `studata` VALUES ('13301020', '刘莉', NULL, NULL);
INSERT INTO `studata` VALUES ('13301026', '唐莹', NULL, NULL);
INSERT INTO `studata` VALUES ('13301074', '燕飞宇', NULL, NULL);
INSERT INTO `studata` VALUES ('13301084', '徐小惠', NULL, NULL);
INSERT INTO `studata` VALUES ('13301112', '张明欣', NULL, NULL);
INSERT INTO `studata` VALUES ('13301173', '李俐卓', NULL, NULL);
INSERT INTO `studata` VALUES ('13301176', '李想', NULL, NULL);
INSERT INTO `studata` VALUES ('13301181', '王鸿彬', NULL, NULL);
INSERT INTO `studata` VALUES ('13301188', '林兴东', NULL, NULL);
INSERT INTO `studata` VALUES ('13301191', '黄骐骥', NULL, NULL);
INSERT INTO `studata` VALUES ('13301200', '宋雪绒', NULL, NULL);
INSERT INTO `studata` VALUES ('13301203', '徐新鑫', NULL, NULL);
INSERT INTO `studata` VALUES ('13301219', '(R)袁贺', NULL, NULL);
INSERT INTO `studata` VALUES ('14301037', '(R)王先武', NULL, NULL);
INSERT INTO `studata` VALUES ('14301056', '陆宇', NULL, NULL);
INSERT INTO `studata` VALUES ('14301058', '(R)魏雪松', NULL, NULL);
INSERT INTO `studata` VALUES ('14301059', '吴佳惠', NULL, NULL);
INSERT INTO `studata` VALUES ('14301061', '杨媛媛', NULL, NULL);
INSERT INTO `studata` VALUES ('14301070', '石丛硕', NULL, NULL);
INSERT INTO `studata` VALUES ('14301073', '王哲唯', NULL, NULL);
INSERT INTO `studata` VALUES ('14301074', '武仲元', NULL, NULL);
INSERT INTO `studata` VALUES ('14301077', '张鑫', NULL, NULL);
INSERT INTO `studata` VALUES ('14301078', '赵强', NULL, NULL);
INSERT INTO `studata` VALUES ('14301080', '张广程', NULL, NULL);
INSERT INTO `studata` VALUES ('14301086', '徐梓桐', NULL, NULL);
INSERT INTO `studata` VALUES ('14301091', '庄玉莹', NULL, NULL);
INSERT INTO `studata` VALUES ('14301096', '高熙洋', NULL, NULL);
INSERT INTO `studata` VALUES ('14301104', '阮佳豪', NULL, NULL);
INSERT INTO `studata` VALUES ('14301105', '司广强', NULL, NULL);
INSERT INTO `studata` VALUES ('14301108', '杨曜华', NULL, NULL);
INSERT INTO `studata` VALUES ('14301109', '杨永煜', NULL, NULL);
INSERT INTO `studata` VALUES ('14301111', '卞浩', NULL, NULL);
INSERT INTO `studata` VALUES ('14301115', '贺长娇', NULL, NULL);
INSERT INTO `studata` VALUES ('14301138', '徐涛', NULL, NULL);
INSERT INTO `studata` VALUES ('14301144', '(R)孟欢', NULL, NULL);
INSERT INTO `studata` VALUES ('14301205', '郝夕茜', NULL, NULL);
INSERT INTO `studata` VALUES ('14301211', '张红艳', NULL, NULL);
INSERT INTO `studata` VALUES ('14301212', '张圆', NULL, NULL);
INSERT INTO `studata` VALUES ('14301217', '宫保文', NULL, NULL);
INSERT INTO `studata` VALUES ('14301218', '郭刚川', NULL, NULL);
INSERT INTO `studata` VALUES ('14301219', '韩铮辉', NULL, NULL);
INSERT INTO `studata` VALUES ('14301221', '李兴超', NULL, NULL);
INSERT INTO `studata` VALUES ('14301224', '孟沛函', NULL, NULL);
INSERT INTO `studata` VALUES ('14301232', '冯雪', NULL, NULL);
INSERT INTO `studata` VALUES ('14301233', '付泽宇', NULL, NULL);
INSERT INTO `studata` VALUES ('14301236', '李航', NULL, NULL);
INSERT INTO `studata` VALUES ('14301237', '刘羽佳', NULL, NULL);
INSERT INTO `studata` VALUES ('14301239', '吕淑静', NULL, NULL);
INSERT INTO `studata` VALUES ('14301241', '闫瑾', NULL, NULL);
INSERT INTO `studata` VALUES ('14302022', '张永鹏', NULL, NULL);
INSERT INTO `studata` VALUES ('14302025', '周福豪', NULL, NULL);
INSERT INTO `studata` VALUES ('14302034', '任冰', NULL, NULL);
INSERT INTO `studata` VALUES ('14302046', '李冠铮', NULL, NULL);
INSERT INTO `studata` VALUES ('14302057', '梅向阳', NULL, NULL);
INSERT INTO `studata` VALUES ('14302062', '徐泰彭', NULL, NULL);
INSERT INTO `studata` VALUES ('14302066', '张志佳', NULL, NULL);
INSERT INTO `studata` VALUES ('14302072', '齐娜娜', NULL, NULL);
INSERT INTO `studata` VALUES ('14302076', '王岩', NULL, NULL);
INSERT INTO `studata` VALUES ('14302078', '臧婧如', NULL, NULL);
INSERT INTO `studata` VALUES ('14302081', '王霖生', NULL, NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `stusigndata`
-- 

CREATE TABLE `stusigndata` (
  `stuID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stuName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stuTel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `stuQQ` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `stuSignIP` int(10) NOT NULL,
  `stuSignDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- 导出表中的数据 `stusigndata`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `teadata`
-- 

CREATE TABLE `teadata` (
  `teaID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `teaPassword` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- 导出表中的数据 `teadata`
-- 

INSERT INTO `teadata` VALUES ('zxh', '123456');
