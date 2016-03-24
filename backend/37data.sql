/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 5.5.38 : Database - w37_survey_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`w37_survey_system` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `w37_survey_system`;

/*Table structure for table `answer` */

CREATE TABLE `answer` (
  `ANSWER_ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '序号',
  `ANSWER_VALUE` varchar(2000) NOT NULL DEFAULT '' COMMENT '问卷回答内容',
  PRIMARY KEY (`ANSWER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8;

/*Data for the table `answer` */

insert  into `answer`(`ANSWER_ID`,`ANSWER_VALUE`) values (75,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(76,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(77,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(78,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(79,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(80,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(81,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(82,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(83,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(84,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(85,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(86,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(87,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(88,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(89,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(90,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(91,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(92,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(93,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(94,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(95,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(96,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(97,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(98,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(99,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(100,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(101,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(102,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(103,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(104,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(105,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(106,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(107,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(108,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(109,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(110,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(111,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(112,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(113,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(114,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(115,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(116,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(117,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(118,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(119,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(120,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(121,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(122,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(123,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(124,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(125,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(126,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(127,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(128,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(129,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(130,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(131,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(132,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(133,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(134,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(135,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(136,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(137,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(138,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(139,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(140,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(141,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(142,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(143,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"A\\\",\\\"istips\\\":0}}}'),(144,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"B\\\",\\\"istips\\\":0}}}'),(145,'{\\\"survey_id\\\":1,\\\"answers\\\":{\\\"1\\\":{\\\"qtype\\\":1,\\\"option\\\":\\\"B\\\",\\\"istips\\\":0}}}'),(146,'{\"survey_id\":1,\"answers\":{\"1\":{\"qtype\":2,\"option\":{\"1\":\"A\",\"2\":\"C\",\"3\":\"D\"},\"istips\":0}}}'),(147,'{\"survey_id\":1,\"answers\":{\"1\":{\"qtype\":2,\"option\":{\"1\":\"A\",\"2\":\"C\",\"3\":\"D\"},\"istips\":0}}}'),(148,'{\"survey_id\":1,\"answers\":{\"1\":{\"qtype\":2,\"option\":{\"1\":\"A\",\"2\":\"C\",\"3\":\"D\"},\"istips\":0}}}'),(149,'{\"survey_id\":1,\"answers\":{\"2\":{\"qtype\":2,\"option\":{\"1\":\"A\",\"2\":\"C\",\"3\":\"D\"},\"istips\":0}}}'),(150,'{\"survey_id\":1,\"answers\":{\"2\":{\"qtype\":2,\"option\":{\"1\":\"A\",\"2\":\"C\",\"3\":\"D\"},\"istips\":0}}}'),(151,'{\"survey_id\":1,\"answers\":{\"2\":{\"qtype\":2,\"option\":{\"1\":\"A\",\"2\":\"C\",\"3\":\"D\"},\"istips\":0}}}');

/*Table structure for table `servey` */

CREATE TABLE `servey` (
  `SERVEY_ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '问卷编号',
  `VALUE` varchar(2000) NOT NULL DEFAULT '' COMMENT '问卷内容',
  PRIMARY KEY (`SERVEY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `servey` */

/*Table structure for table `survey` */

CREATE TABLE `survey` (
  `SURVEY_ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '问卷编号',
  `VALUE` varchar(2000) NOT NULL DEFAULT '' COMMENT '问卷内容',
  PRIMARY KEY (`SURVEY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `survey` */

insert  into `survey`(`SURVEY_ID`,`VALUE`) values (1,'{abc:1231,dhuash:\\&quot;dadas\\&quot;}'),(2,'{abc:1231,dhuash:\\&quot;dadas\\&quot;}'),(3,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(4,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(5,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(6,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(7,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(8,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(9,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(10,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(11,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(12,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(13,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(14,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(15,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(16,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(17,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(18,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(19,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(20,'{abc:1231,dhuash:\\&quot;dadas\\&quot;,hhdjsa:\\&quot;dsajkdjak\\&quot;}'),(21,'{abc:1231,dhuash:\\\"dadas\\\",hhdjsa:\\\"dsajkdjak\\\"}'),(22,'{abc:1231,dhuash:\"dadas\",hhdjsa:\"dsajkdjak\"}'),(23,'{\\\"dsa\\\":\\\"dsa\\\",\\\"dasdsa\\\":\\\"123\\\"}');

/*Table structure for table `user` */

CREATE TABLE `user` (
  `USER_ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `WORK_ID` char(10) NOT NULL DEFAULT '' COMMENT '工号',
  `PASSWORD` varchar(64) NOT NULL DEFAULT '' COMMENT '用户密码',
  `SEX` enum('女','男') DEFAULT NULL COMMENT '性别',
  `ADDRESS` varchar(100) DEFAULT '' COMMENT '地址',
  `ZIP` int(8) unsigned DEFAULT NULL COMMENT '邮编',
  `TEL` varchar(12) DEFAULT '' COMMENT '电话',
  `BIRTHDAY` date DEFAULT NULL COMMENT '生日',
  `REGISTER_TIME` datetime NOT NULL COMMENT '注册时间',
  `LAST_MODIFIED_TIME` datetime NOT NULL COMMENT '上次修改时间',
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `WORK_ID` (`WORK_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
