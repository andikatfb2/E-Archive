/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.34-MariaDB : Database - earsip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`earsip` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `earsip`;

/*Table structure for table `admin_preferences` */

DROP TABLE IF EXISTS `admin_preferences`;

CREATE TABLE `admin_preferences` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `user_panel` tinyint(1) NOT NULL DEFAULT '0',
  `sidebar_form` tinyint(1) NOT NULL DEFAULT '0',
  `messages_menu` tinyint(1) NOT NULL DEFAULT '0',
  `notifications_menu` tinyint(1) NOT NULL DEFAULT '0',
  `tasks_menu` tinyint(1) NOT NULL DEFAULT '0',
  `user_menu` tinyint(1) NOT NULL DEFAULT '1',
  `ctrl_sidebar` tinyint(1) NOT NULL DEFAULT '0',
  `transition_page` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `admin_preferences` */

insert  into `admin_preferences`(`id`,`user_panel`,`sidebar_form`,`messages_menu`,`notifications_menu`,`tasks_menu`,`user_menu`,`ctrl_sidebar`,`transition_page`) values (1,1,0,0,0,0,1,0,0);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `bgcolor` char(7) NOT NULL DEFAULT '#607D8B',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`,`bgcolor`) values (1,'admin','Administrator','#F44336'),(2,'members','General User','#ff5722'),(3,'PEMILU','pemilu 2019','#607D8B');

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `public_preferences` */

DROP TABLE IF EXISTS `public_preferences`;

CREATE TABLE `public_preferences` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `transition_page` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `public_preferences` */

insert  into `public_preferences`(`id`,`transition_page`) values (1,0);

/*Table structure for table `tm_file_uploads` */

DROP TABLE IF EXISTS `tm_file_uploads`;

CREATE TABLE `tm_file_uploads` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `file_name` varchar(40) DEFAULT NULL,
  `file_number` varchar(40) DEFAULT NULL,
  `file_path` text,
  `create_date` date DEFAULT NULL,
  `file_upload` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`file_id`),
  KEY `FK_tm_file_uploads` (`jenis_id`),
  KEY `FK_tm_file_uploads2` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tm_file_uploads` */

insert  into `tm_file_uploads`(`file_id`,`user_name`,`jenis_id`,`tahun`,`divisi_id`,`file_name`,`file_number`,`file_path`,`create_date`,`file_upload`) values (14,'admin',1,'2019',1,'SURAT PERNYATAAN kesepakatan new.pdf','1','C:/xampp/htdocs/e-arsip/upload/','0000-00-00','SURAT_PERNYATAAN_kesepakatan_new.pdf');

/*Table structure for table `tm_user` */

DROP TABLE IF EXISTS `tm_user`;

CREATE TABLE `tm_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tm_user` */

insert  into `tm_user`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,'rQER6T67Mvg2Hkij4UabF.',1571481011,1571616630,1,'Admin','istrator','ADMIN','0');

/*Table structure for table `tm_user_groups` */

DROP TABLE IF EXISTS `tm_user_groups`;

CREATE TABLE `tm_user_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tm_user_groups` */

insert  into `tm_user_groups`(`id`,`user_id`,`group_id`) values (1,1,1),(2,2,2),(3,3,2),(4,4,2);

/*Table structure for table `tr_divisi` */

DROP TABLE IF EXISTS `tr_divisi`;

CREATE TABLE `tr_divisi` (
  `divisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `divisi_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tr_divisi` */

insert  into `tr_divisi`(`divisi_id`,`divisi_name`) values (1,'PILKADA'),(2,'PEMILU'),(3,'PERJANJIAN');

/*Table structure for table `tr_jenis` */

DROP TABLE IF EXISTS `tr_jenis`;

CREATE TABLE `tr_jenis` (
  `jenis_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_name` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tr_jenis` */

insert  into `tr_jenis`(`jenis_id`,`jenis_name`,`description`) values (1,'SK',NULL),(2,'BA',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
