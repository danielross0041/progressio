/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.19-MariaDB : Database - progressio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `adminiy` */

DROP TABLE IF EXISTS `adminiy`;

CREATE TABLE `adminiy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `remember_token` text DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `adminiy` */

insert  into `adminiy`(`id`,`email`,`password`,`name`,`remember_token`,`is_active`,`created_at`,`updated_at`,`is_deleted`) values 
(1,'admin@project.com','$2y$10$fJwkT72wGNXCIBSqq.5JveP/rSFoSRfrSvotM2BJYPO6xgJFgSWVm','Admin','o2JZSUfWev6IQiF8r1uhtvvYriBDmXpXl4Kv3Fc77NJ5BWHks5vwjc0G3Knj',1,'2019-03-28 16:43:17','2019-04-20 15:25:01',0);

/*Table structure for table `flag_data` */

DROP TABLE IF EXISTS `flag_data`;

CREATE TABLE `flag_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flag_color` varchar(255) DEFAULT NULL,
  `flag_name` varchar(255) DEFAULT NULL,
  `flag_reminder` text DEFAULT NULL,
  `table_name` varchar(100) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `flag_data` */

/*Table structure for table `freeseminars` */

DROP TABLE IF EXISTS `freeseminars`;

CREATE TABLE `freeseminars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seminar_name` varchar(255) DEFAULT NULL,
  `seminar_slug` varchar(300) DEFAULT NULL,
  `short_description` varchar(555) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `is_deleted` tinyint(4) DEFAULT 0,
  `user_id` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `freeseminars` */

insert  into `freeseminars`(`id`,`seminar_name`,`seminar_slug`,`short_description`,`description`,`is_active`,`is_deleted`,`user_id`,`created_at`,`updated_at`) values 
(1,'Lorum Ispum Dolor','lorum-ispum-dolor','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',1,0,0,'2021-07-13 22:06:24','2021-07-13 22:06:24'),
(2,'Lorum Ispum Dolor','lorum-ispum-dolor','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',1,0,0,'2021-07-13 22:06:43','2021-07-13 22:06:43'),
(3,'Lorum Ispum Dolor','lorum-ispum-dolor','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',1,0,0,'2021-07-13 22:06:55','2021-07-13 22:06:55'),
(4,'Lorum Ispum Dolor','lorum-ispum-dolor','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',1,0,0,'2021-07-13 22:07:08','2021-07-13 22:07:08');

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(555) DEFAULT NULL,
  `imageable_id` int(11) DEFAULT NULL,
  `imageable_type` varchar(255) DEFAULT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `images` */

insert  into `images`(`id`,`url`,`imageable_id`,`imageable_type`,`table_name`,`created_at`,`updated_at`) values 
(1,'Uploads/freeseminars/a4381d54323297028a5743b3ad4d254d/1626213984-book-01.jpg',1,'App\\Model\\freeseminars','freeseminars','2021-07-13 22:06:24','2021-07-13 22:06:24'),
(2,'Uploads/freeseminars/6e7db5aa8e1a7a4a090db07f9fe1be25/1626214003-book-02.jpg',2,'App\\Model\\freeseminars','freeseminars','2021-07-13 22:06:43','2021-07-13 22:06:43'),
(3,'Uploads/freeseminars/4e83d5ec9330301196c8c918369f4f47/1626214015-book-03.jpg',3,'App\\Model\\freeseminars','freeseminars','2021-07-13 22:06:55','2021-07-13 22:06:55'),
(4,'Uploads/freeseminars/fdd0dd7612797657ff859f47ca66190e/1626214028-book-04.jpg',4,'App\\Model\\freeseminars','freeseminars','2021-07-13 22:07:08','2021-07-13 22:07:08');

/*Table structure for table `imagetable` */

DROP TABLE IF EXISTS `imagetable`;

CREATE TABLE `imagetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(50) NOT NULL,
  `img_path` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ref_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT 1,
  `is_active_img` varchar(1) DEFAULT '1',
  `additional_attributes` text DEFAULT NULL,
  `img_href` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_name` (`table_name`,`ref_id`,`type`),
  FULLTEXT KEY `imgp` (`img_path`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `imagetable` */

insert  into `imagetable`(`id`,`table_name`,`img_path`,`created_at`,`updated_at`,`ref_id`,`type`,`is_active_img`,`additional_attributes`,`img_href`) values 
(1,'logo','Uploads/imagetable/c7c6661cbd1303827513af2a60765333/1626212578-logo.png','2021-07-14 02:42:58','2021-07-13 21:42:58',0,1,'1',NULL,NULL),
(2,'favicon','Uploads/imagetable/6a435b24f27099a8e5bf49a3dbfdcd1a/1626212589-arrow_select.jpg','2021-07-14 02:43:09','2021-07-13 21:43:09',0,1,'1',NULL,NULL),
(52,'freeseminars','Uploads/freeseminars/a4381d54323297028a5743b3ad4d254d/1626213984-book-01.jpg','2021-07-13 22:06:24','2021-07-13 22:06:24',1,1,'1',NULL,NULL),
(53,'freeseminars','Uploads/freeseminars/6e7db5aa8e1a7a4a090db07f9fe1be25/1626214003-book-02.jpg','2021-07-13 22:06:43','2021-07-13 22:06:43',2,1,'1',NULL,NULL),
(54,'freeseminars','Uploads/freeseminars/4e83d5ec9330301196c8c918369f4f47/1626214015-book-03.jpg','2021-07-13 22:06:55','2021-07-13 22:06:55',3,1,'1',NULL,NULL),
(55,'freeseminars','Uploads/freeseminars/fdd0dd7612797657ff859f47ca66190e/1626214028-book-04.jpg','2021-07-13 22:07:08','2021-07-13 22:07:08',4,1,'1',NULL,NULL);

/*Table structure for table `inquiry` */

DROP TABLE IF EXISTS `inquiry`;

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inquiries_name` varchar(255) NOT NULL,
  `inquiries_email` text NOT NULL,
  `inquiries_phone` varchar(255) NOT NULL,
  `extra_content` text NOT NULL,
  `is_read` char(1) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `inquiries_lname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `inquiry` */

/*Table structure for table `m_flag` */

DROP TABLE IF EXISTS `m_flag`;

CREATE TABLE `m_flag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flag_type` varchar(100) NOT NULL,
  `flag_value` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `flag_additionalText` text DEFAULT NULL,
  `has_image` varchar(1) DEFAULT '0',
  `is_active` varchar(1) DEFAULT '1',
  `is_config` varchar(1) DEFAULT '0',
  `flag_show_text` text DEFAULT NULL,
  `is_featured` int(11) DEFAULT 0,
  `is_deleted` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2091 DEFAULT CHARSET=utf8;

/*Data for the table `m_flag` */

insert  into `m_flag`(`id`,`flag_type`,`flag_value`,`created_at`,`updated_at`,`flag_additionalText`,`has_image`,`is_active`,`is_config`,`flag_show_text`,`is_featured`,`is_deleted`,`user_id`) values 
(59,'COMPANYPHONE','000-000-0000','2019-04-19 11:33:45','0000-00-00 00:00:00','000-000-0000','0','1','1','Company Phone',0,0,0),
(123,'COMPANY','Progressio','2021-07-14 03:38:37','0000-00-00 00:00:00','Progressio','0','1','1','Company',0,0,0),
(218,'COMPANYEMAIL','info@demo.com','2019-04-19 11:33:45','0000-00-00 00:00:00','info@demo.com','0','1','1','Company Email',0,0,0),
(499,'CURRENTHEME','red','2019-04-23 03:16:09','0000-00-00 00:00:00','red','0','1','1','Theme Option',0,0,0),
(519,'ADDRESS','Dummy address','2019-04-29 23:54:53','0000-00-00 00:00:00','107 Silver Circle','0','1','1','Address',0,0,0),
(682,'FACEBOOK','https://facebook.com/sdd','2019-04-23 23:56:03','0000-00-00 00:00:00','https://facebook.com/sdd','0','1','1','Facebook',0,0,0),
(1960,'TWITTER','https://twitter.com/','2019-04-19 11:34:21','0000-00-00 00:00:00','https://twitter.com/','0','1','1','Twitter',0,0,0),
(1961,'INSTAGRAM','https://instagram.com/','2019-04-19 11:34:53','0000-00-00 00:00:00','https://instagram.com/','0','1','1','Instagram',0,0,0),
(1962,'GOOGLEPLUS','https://googleplus.com/','2019-04-19 11:35:03','0000-00-00 00:00:00','https://googleplus.com/','0','1','1','Google+',0,0,0),
(1963,'TUTORUNIVERSITIES','Aberdeen','2021-07-13 22:21:38','2021-07-13 22:21:38',NULL,'0','1','0',NULL,0,0,0),
(1964,'TUTORUNIVERSITIES','Anglia Ruskin','2021-07-13 22:21:44','2021-07-13 22:21:44',NULL,'0','1','0',NULL,0,0,0),
(1965,'TUTORUNIVERSITIES','Bath','2021-07-13 22:22:00','2021-07-13 22:22:00',NULL,'0','1','0',NULL,0,0,0),
(1966,'TUTORUNIVERSITIES','Birkbeck (University Of London)','2021-07-13 22:22:05','2021-07-13 22:22:05',NULL,'0','1','0',NULL,0,0,0),
(1967,'TUTORUNIVERSITIES','Birmingham','2021-07-13 22:22:09','2021-07-13 22:22:09',NULL,'0','1','0',NULL,0,0,0),
(1968,'TUTORUNIVERSITIES','Birmingham City','2021-07-13 22:22:14','2021-07-13 22:22:14',NULL,'0','1','0',NULL,0,0,0),
(1969,'TUTORUNIVERSITIES','Bournemouth','2021-07-13 22:22:17','2021-07-13 22:22:17',NULL,'0','1','0',NULL,0,0,0),
(1970,'TUTORUNIVERSITIES','Brighton','2021-07-13 22:22:21','2021-07-13 22:22:21',NULL,'0','1','0',NULL,0,0,0),
(1971,'TUTORUNIVERSITIES','Brighton & Sussex Medical School','2021-07-13 22:22:24','2021-07-13 22:22:24',NULL,'0','1','0',NULL,0,0,0),
(1972,'TUTORUNIVERSITIES','Bristol','2021-07-13 22:22:28','2021-07-13 22:22:28',NULL,'0','1','0',NULL,0,0,0),
(1973,'TUTORUNIVERSITIES','Cambridge','2021-07-13 22:22:31','2021-07-13 22:22:31',NULL,'0','1','0',NULL,0,0,0),
(1974,'TUTORUNIVERSITIES','Cardiff','2021-07-13 22:22:35','2021-07-13 22:22:35',NULL,'0','1','0',NULL,0,0,0),
(1975,'TUTORUNIVERSITIES','City (University Of London)','2021-07-13 22:22:39','2021-07-13 22:22:39',NULL,'0','1','0',NULL,0,0,0),
(1976,'TUTORUNIVERSITIES','Courtauld Institute Of Art','2021-07-13 22:22:44','2021-07-13 22:22:44',NULL,'0','1','0',NULL,0,0,0),
(1977,'TUTORUNIVERSITIES','Coventry','2021-07-13 22:22:47','2021-07-13 22:22:47',NULL,'0','1','0',NULL,0,0,0),
(1978,'TUTORUNIVERSITIES','De Montfort','2021-07-13 22:22:51','2021-07-13 22:22:51',NULL,'0','1','0',NULL,0,0,0),
(1979,'TUTORUNIVERSITIES','Derby','2021-07-13 22:22:54','2021-07-13 22:22:54',NULL,'0','1','0',NULL,0,0,0),
(1980,'TUTORUNIVERSITIES','Dundee','2021-07-13 22:22:58','2021-07-13 22:22:58',NULL,'0','1','0',NULL,0,0,0),
(1981,'TUTORUNIVERSITIES','Durham','2021-07-13 22:23:01','2021-07-13 22:23:01',NULL,'0','1','0',NULL,0,0,0),
(1982,'TUTORUNIVERSITIES','East Anglia','2021-07-13 22:23:06','2021-07-13 22:23:06',NULL,'0','1','0',NULL,0,0,0),
(1983,'TUTORUNIVERSITIES','Edinburgh','2021-07-13 22:23:09','2021-07-13 22:23:09',NULL,'0','1','0',NULL,0,0,0),
(1984,'TUTORUNIVERSITIES','Exeter','2021-07-13 22:23:13','2021-07-13 22:23:13',NULL,'0','1','0',NULL,0,0,0),
(1985,'TUTORUNIVERSITIES','Glasgow','2021-07-13 22:23:17','2021-07-13 22:23:17',NULL,'0','1','0',NULL,0,0,0),
(1986,'TUTORUNIVERSITIES','Greenwich','2021-07-13 22:23:20','2021-07-13 22:23:20',NULL,'0','1','0',NULL,0,0,0),
(1987,'TUTORUNIVERSITIES','Herriot-Watt','2021-07-13 22:23:24','2021-07-13 22:23:24',NULL,'0','1','0',NULL,0,0,0),
(1988,'TUTORUNIVERSITIES','Hertfordshire','2021-07-13 22:23:29','2021-07-13 22:23:29',NULL,'0','1','0',NULL,0,0,0),
(1989,'TUTORUNIVERSITIES','Huddersfield','2021-07-13 22:23:34','2021-07-13 22:23:34',NULL,'0','1','0',NULL,0,0,0),
(1990,'TUTORUNIVERSITIES','Hull','2021-07-13 22:23:38','2021-07-13 22:23:38',NULL,'0','1','0',NULL,0,0,0),
(1991,'TUTORUNIVERSITIES','Imperial College London','2021-07-13 22:23:42','2021-07-13 22:23:42',NULL,'0','1','0',NULL,0,0,0),
(1992,'TUTORUNIVERSITIES','Keeps','2021-07-13 22:23:46','2021-07-13 22:23:46',NULL,'0','1','0',NULL,0,0,0),
(1993,'TUTORUNIVERSITIES','Kent','2021-07-13 22:23:50','2021-07-13 22:23:50',NULL,'0','1','0',NULL,0,0,0),
(1994,'TUTORUNIVERSITIES','King’S College London','2021-07-13 22:23:53','2021-07-13 22:23:53',NULL,'0','1','0',NULL,0,0,0),
(1995,'TUTORUNIVERSITIES','Kingston','2021-07-13 22:23:57','2021-07-13 22:23:57',NULL,'0','1','0',NULL,0,0,0),
(1996,'TUTORUNIVERSITIES','Lancaster','2021-07-13 22:24:01','2021-07-13 22:24:01',NULL,'0','1','0',NULL,0,0,0),
(1997,'TUTORUNIVERSITIES','Leeds','2021-07-13 22:24:05','2021-07-13 22:24:05',NULL,'0','1','0',NULL,0,0,0),
(1998,'TUTORUNIVERSITIES','Leeds Beckett','2021-07-13 22:24:09','2021-07-13 22:24:09',NULL,'0','1','0',NULL,0,0,0),
(1999,'TUTORUNIVERSITIES','Leicester','2021-07-13 22:24:13','2021-07-13 22:24:13',NULL,'0','1','0',NULL,0,0,0),
(2000,'TUTORUNIVERSITIES','Lincoln','2021-07-13 22:24:17','2021-07-13 22:24:17',NULL,'0','1','0',NULL,0,0,0),
(2001,'TUTORUNIVERSITIES','Liverpool','2021-07-13 22:24:20','2021-07-13 22:24:20',NULL,'0','1','0',NULL,0,0,0),
(2002,'TUTORUNIVERSITIES','Liverpool John Moores','2021-07-13 22:24:29','2021-07-13 22:24:29',NULL,'0','1','0',NULL,0,0,0),
(2003,'TUTORUNIVERSITIES','London South Bank','2021-07-13 22:24:32','2021-07-13 22:24:32',NULL,'0','1','0',NULL,0,0,0),
(2004,'TUTORUNIVERSITIES','Loughborough','2021-07-13 22:24:37','2021-07-13 22:24:37',NULL,'0','1','0',NULL,0,0,0),
(2005,'TUTORUNIVERSITIES','London School Of Economics (Lse)','2021-07-13 22:24:42','2021-07-13 22:24:42',NULL,'0','1','0',NULL,0,0,0),
(2006,'TUTORUNIVERSITIES','Manchester','2021-07-13 22:24:46','2021-07-13 22:24:46',NULL,'0','1','0',NULL,0,0,0),
(2007,'TUTORUNIVERSITIES','Middlesex','2021-07-13 22:24:49','2021-07-13 22:24:49',NULL,'0','1','0',NULL,0,0,0),
(2008,'TUTORUNIVERSITIES','Newcastle','2021-07-13 22:24:53','2021-07-13 22:24:53',NULL,'0','1','0',NULL,0,0,0),
(2009,'TUTORUNIVERSITIES','Northumbria','2021-07-13 22:24:57','2021-07-13 22:24:57',NULL,'0','1','0',NULL,0,0,0),
(2010,'TUTORUNIVERSITIES','Nottingham','2021-07-13 22:25:00','2021-07-13 22:25:00',NULL,'0','1','0',NULL,0,0,0),
(2011,'TUTORUNIVERSITIES','Nottingham Trent','2021-07-13 22:25:04','2021-07-13 22:25:04',NULL,'0','1','0',NULL,0,0,0),
(2012,'TUTORUNIVERSITIES','Oxford','2021-07-13 22:25:07','2021-07-13 22:25:07',NULL,'0','1','0',NULL,0,0,0),
(2013,'TUTORUNIVERSITIES','Oxford Brookes','2021-07-13 22:25:11','2021-07-13 22:25:11',NULL,'0','1','0',NULL,0,0,0),
(2014,'TUTORUNIVERSITIES','Plymouth','2021-07-13 22:25:14','2021-07-13 22:25:14',NULL,'0','1','0',NULL,0,0,0),
(2015,'TUTORUNIVERSITIES','Portsmouth','2021-07-13 22:25:17','2021-07-13 22:25:17',NULL,'0','1','0',NULL,0,0,0),
(2016,'TUTORUNIVERSITIES','Queen Mary','2021-07-13 22:25:21','2021-07-13 22:25:21',NULL,'0','1','0',NULL,0,0,0),
(2017,'TUTORUNIVERSITIES','Queen’S (Belfast)','2021-07-13 22:25:26','2021-07-13 22:25:26',NULL,'0','1','0',NULL,0,0,0),
(2018,'TUTORUNIVERSITIES','Reading','2021-07-13 22:25:30','2021-07-13 22:25:30',NULL,'0','1','0',NULL,0,0,0),
(2019,'TUTORUNIVERSITIES','Royal Veterinary College','2021-07-13 22:25:34','2021-07-13 22:25:34',NULL,'0','1','0',NULL,0,0,0),
(2020,'TUTORUNIVERSITIES','Salford','2021-07-13 22:25:37','2021-07-13 22:25:37',NULL,'0','1','0',NULL,0,0,0),
(2021,'TUTORUNIVERSITIES','Sheffield','2021-07-13 22:25:41','2021-07-13 22:25:41',NULL,'0','1','0',NULL,0,0,0),
(2022,'TUTORUNIVERSITIES','Soas (University Of London)','2021-07-13 22:25:45','2021-07-13 22:25:45',NULL,'0','1','0',NULL,0,0,0),
(2023,'TUTORUNIVERSITIES','Southampton','2021-07-13 22:25:48','2021-07-13 22:25:48',NULL,'0','1','0',NULL,0,0,0),
(2024,'TUTORUNIVERSITIES','St. Andrews','2021-07-13 22:25:51','2021-07-13 22:25:51',NULL,'0','1','0',NULL,0,0,0),
(2025,'TUTORUNIVERSITIES','St. George’S','2021-07-13 22:25:54','2021-07-13 22:25:54',NULL,'0','1','0',NULL,0,0,0),
(2026,'TUTORUNIVERSITIES','Surrey','2021-07-13 22:25:57','2021-07-13 22:25:57',NULL,'0','1','0',NULL,0,0,0),
(2027,'TUTORUNIVERSITIES','Sussex','2021-07-13 22:26:01','2021-07-13 22:26:01',NULL,'0','1','0',NULL,0,0,0),
(2028,'TUTORUNIVERSITIES','Swansea','2021-07-13 22:26:05','2021-07-13 22:26:05',NULL,'0','1','0',NULL,0,0,0),
(2029,'TUTORUNIVERSITIES','Teeside','2021-07-13 22:26:07','2021-07-13 22:26:07',NULL,'0','1','0',NULL,0,0,0),
(2030,'TUTORUNIVERSITIES','Trinity College Dublin','2021-07-13 22:26:10','2021-07-13 22:26:10',NULL,'0','1','0',NULL,0,0,0),
(2031,'TUTORUNIVERSITIES','University College London (Ucl)','2021-07-13 22:26:17','2021-07-13 22:26:17',NULL,'0','1','0',NULL,0,0,0),
(2032,'TUTORUNIVERSITIES','University Of The Arts London','2021-07-13 22:26:20','2021-07-13 22:26:20',NULL,'0','1','0',NULL,0,0,0),
(2033,'TUTORUNIVERSITIES','University Of The West Of England (Uwe)','2021-07-13 22:26:23','2021-07-13 22:26:23',NULL,'0','1','0',NULL,0,0,0),
(2034,'TUTORUNIVERSITIES','Warwick','2021-07-13 22:26:26','2021-07-13 22:26:26',NULL,'0','1','0',NULL,0,0,0),
(2035,'TUTORUNIVERSITIES','Westminster','2021-07-13 22:26:30','2021-07-13 22:26:30',NULL,'0','1','0',NULL,0,0,0),
(2036,'TUTORUNIVERSITIES','Wolverhampton','2021-07-13 22:26:34','2021-07-13 22:26:34',NULL,'0','1','0',NULL,0,0,0),
(2037,'TUTORUNIVERSITIES','York','2021-07-13 22:26:37','2021-07-13 22:26:37',NULL,'0','1','0',NULL,0,0,0),
(2038,'SUBJECTS','English','2021-07-13 22:33:10','2021-07-13 22:33:10',NULL,'0','1','0',NULL,0,0,0),
(2039,'SUBJECTS','Maths','2021-07-13 22:33:13','2021-07-13 22:33:13',NULL,'0','1','0',NULL,0,0,0),
(2040,'SUBJECTS','Physics','2021-07-13 22:33:18','2021-07-13 22:33:18',NULL,'0','1','0',NULL,0,0,0),
(2041,'SUBJECTS','Chemistry','2021-07-13 22:33:20','2021-07-13 22:33:20',NULL,'0','1','0',NULL,0,0,0),
(2042,'SUBJECTS','Biology','2021-07-13 22:33:23','2021-07-13 22:33:23',NULL,'0','1','0',NULL,0,0,0),
(2043,'SUBJECTS','Accounting','2021-07-13 22:33:26','2021-07-13 22:33:26',NULL,'0','1','0',NULL,0,0,0),
(2044,'SUBJECTS','Art','2021-07-13 22:33:28','2021-07-13 22:33:28',NULL,'0','1','0',NULL,0,0,0),
(2045,'SUBJECTS','Biology','2021-07-13 22:33:32','2021-07-13 22:33:32',NULL,'0','1','0',NULL,0,0,0),
(2046,'SUBJECTS','Bmat','2021-07-13 22:33:34','2021-07-13 22:33:34',NULL,'0','1','0',NULL,0,0,0),
(2047,'SUBJECTS','Business Studies','2021-07-13 22:33:37','2021-07-13 22:33:37',NULL,'0','1','0',NULL,0,0,0),
(2048,'SUBJECTS','Chemical Engineering','2021-07-13 22:33:39','2021-07-13 22:33:39',NULL,'0','1','0',NULL,0,0,0),
(2049,'SUBJECTS','Computing','2021-07-13 22:33:42','2021-07-13 22:33:42',NULL,'0','1','0',NULL,0,0,0),
(2050,'SUBJECTS','Design & Technology','2021-07-13 22:33:46','2021-07-13 22:33:46',NULL,'0','1','0',NULL,0,0,0),
(2051,'SUBJECTS','Drama','2021-07-14 03:34:02','2021-07-13 22:34:02',NULL,'0','1','0',NULL,0,0,0),
(2052,'SUBJECTS','Economics','2021-07-13 22:34:04','2021-07-13 22:34:04',NULL,'0','1','0',NULL,0,0,0),
(2053,'SUBJECTS','Elat','2021-07-13 22:34:08','2021-07-13 22:34:08',NULL,'0','1','0',NULL,0,0,0),
(2054,'SUBJECTS','Electronics','2021-07-13 22:34:10','2021-07-13 22:34:10',NULL,'0','1','0',NULL,0,0,0),
(2055,'SUBJECTS','French','2021-07-13 22:34:15','2021-07-13 22:34:15',NULL,'0','1','0',NULL,0,0,0),
(2056,'SUBJECTS','Further Maths','2021-07-13 22:34:18','2021-07-13 22:34:18',NULL,'0','1','0',NULL,0,0,0),
(2057,'SUBJECTS','Gamsat','2021-07-13 22:34:21','2021-07-13 22:34:21',NULL,'0','1','0',NULL,0,0,0),
(2058,'SUBJECTS','Geography','2021-07-13 22:34:24','2021-07-13 22:34:24',NULL,'0','1','0',NULL,0,0,0),
(2059,'SUBJECTS','Geology','2021-07-13 22:34:26','2021-07-13 22:34:26',NULL,'0','1','0',NULL,0,0,0),
(2060,'SUBJECTS','German','2021-07-13 22:34:29','2021-07-13 22:34:29',NULL,'0','1','0',NULL,0,0,0),
(2061,'SUBJECTS','Government & Politics','2021-07-13 22:34:34','2021-07-13 22:34:34',NULL,'0','1','0',NULL,0,0,0),
(2062,'SUBJECTS','Graphic Design','2021-07-13 22:34:38','2021-07-13 22:34:38',NULL,'0','1','0',NULL,0,0,0),
(2063,'SUBJECTS','Hat','2021-07-13 22:34:40','2021-07-13 22:34:40',NULL,'0','1','0',NULL,0,0,0),
(2064,'SUBJECTS','History','2021-07-13 22:34:43','2021-07-13 22:34:43',NULL,'0','1','0',NULL,0,0,0),
(2065,'SUBJECTS','History Of Art','2021-07-13 22:34:46','2021-07-13 22:34:46',NULL,'0','1','0',NULL,0,0,0),
(2066,'SUBJECTS','Ict','2021-07-13 22:34:49','2021-07-13 22:34:49',NULL,'0','1','0',NULL,0,0,0),
(2067,'SUBJECTS','Italian','2021-07-13 22:34:51','2021-07-13 22:34:51',NULL,'0','1','0',NULL,0,0,0),
(2068,'SUBJECTS','Latin','2021-07-13 22:34:54','2021-07-13 22:34:54',NULL,'0','1','0',NULL,0,0,0),
(2069,'SUBJECTS','Law','2021-07-13 22:34:57','2021-07-13 22:34:57',NULL,'0','1','0',NULL,0,0,0),
(2070,'SUBJECTS','Lnat','2021-07-13 22:34:59','2021-07-13 22:34:59',NULL,'0','1','0',NULL,0,0,0),
(2071,'SUBJECTS','Management','2021-07-13 22:35:03','2021-07-13 22:35:03',NULL,'0','1','0',NULL,0,0,0),
(2072,'SUBJECTS','Mandarin','2021-07-13 22:35:06','2021-07-13 22:35:06',NULL,'0','1','0',NULL,0,0,0),
(2073,'SUBJECTS','Mat','2021-07-13 22:35:09','2021-07-13 22:35:09',NULL,'0','1','0',NULL,0,0,0),
(2074,'SUBJECTS','Media Studies','2021-07-13 22:35:12','2021-07-13 22:35:12',NULL,'0','1','0',NULL,0,0,0),
(2075,'SUBJECTS','Medicine','2021-07-13 22:35:15','2021-07-13 22:35:15',NULL,'0','1','0',NULL,0,0,0),
(2076,'SUBJECTS','Mlat','2021-07-13 22:35:20','2021-07-13 22:35:20',NULL,'0','1','0',NULL,0,0,0),
(2077,'SUBJECTS','Music','2021-07-13 22:35:25','2021-07-13 22:35:25',NULL,'0','1','0',NULL,0,0,0),
(2078,'SUBJECTS','Pat','2021-07-13 22:35:29','2021-07-13 22:35:29',NULL,'0','1','0',NULL,0,0,0),
(2079,'SUBJECTS','Philosophy','2021-07-13 22:35:32','2021-07-13 22:35:32',NULL,'0','1','0',NULL,0,0,0),
(2080,'SUBJECTS','Pe','2021-07-13 22:35:36','2021-07-13 22:35:36',NULL,'0','1','0',NULL,0,0,0),
(2081,'SUBJECTS','Politics','2021-07-13 22:35:44','2021-07-13 22:35:44',NULL,'0','1','0',NULL,0,0,0),
(2082,'SUBJECTS','Psychology','2021-07-13 22:35:47','2021-07-13 22:35:47',NULL,'0','1','0',NULL,0,0,0),
(2083,'SUBJECTS','Religious Studies','2021-07-13 22:35:51','2021-07-13 22:35:51',NULL,'0','1','0',NULL,0,0,0),
(2084,'SUBJECTS','Sociology','2021-07-13 22:35:54','2021-07-13 22:35:54',NULL,'0','1','0',NULL,0,0,0),
(2085,'SUBJECTS','Spanish','2021-07-13 22:35:57','2021-07-13 22:35:57',NULL,'0','1','0',NULL,0,0,0),
(2086,'SUBJECTS','Step','2021-07-13 22:36:01','2021-07-13 22:36:01',NULL,'0','1','0',NULL,0,0,0),
(2087,'SUBJECTS','Tsa (Oxford)','2021-07-13 22:36:04','2021-07-13 22:36:04',NULL,'0','1','0',NULL,0,0,0),
(2088,'SUBJECTS','Ucat','2021-07-13 22:36:07','2021-07-13 22:36:07',NULL,'0','1','0',NULL,0,0,0),
(2089,'SUBJECTS','Welsh','2021-07-14 03:36:22','2021-07-13 22:36:22',NULL,'0','1','0',NULL,0,0,0),
(2090,'SUBJECTS','Zoology','2021-07-13 22:36:25','2021-07-13 22:36:25',NULL,'0','1','0',NULL,0,0,0);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `password_resets` */

/*Table structure for table `table_notes` */

DROP TABLE IF EXISTS `table_notes`;

CREATE TABLE `table_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(250) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `note_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0,
  `is_active` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `table_notes` */

/*Table structure for table `tracking_users` */

DROP TABLE IF EXISTS `tracking_users`;

CREATE TABLE `tracking_users` (
  `request_uri` varchar(500) DEFAULT NULL,
  `request_data_exist` char(1) DEFAULT NULL,
  `request_data` text DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `user_logged_in` char(1) DEFAULT NULL,
  `session_id` text DEFAULT NULL,
  `request_lasturi` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id` int(11) NOT NULL,
  `time_to` timestamp NULL DEFAULT NULL,
  `time_start` timestamp NULL DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `user_country` varchar(100) DEFAULT NULL,
  `user_countrycode` varchar(10) DEFAULT NULL,
  `user_city` varchar(100) DEFAULT NULL,
  `user_state` varchar(100) DEFAULT NULL,
  `user_continent` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tracking_users` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` text NOT NULL,
  `remember_token` text DEFAULT NULL,
  `is_active` int(11) DEFAULT 0,
  `email_verified_at` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0,
  `user_type` tinyint(4) DEFAULT 0 COMMENT '0=school, 1=teacher, 2=student, 3=tutor,4=parent',
  `school_id` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`name`,`created_at`,`updated_at`,`password`,`remember_token`,`is_active`,`email_verified_at`,`is_deleted`,`user_type`,`school_id`) values 
(5,'test@school.com','School','2021-07-13 23:28:04','2021-07-14 04:33:59','$2y$10$7DE79fujSjHTWu0N5PirGe5eQOPXzRTZn8bnkOwMjjxPVEBV4KEkS','kP0xDaODtidSHsONiaBs2CoWdPi9DYC0Ca1u1oO5LJyJ2xYykZVkSHxLNUH7',1,NULL,0,0,0),
(6,'test@school1.com','123123','2021-07-14 00:33:51','2021-07-14 00:33:51','$2y$10$aXaDbHUvUcgbVij2qeUWSu5Voss70w0CsQGU3yrhXiuTEUydtJ7Tu',NULL,0,NULL,0,1,0),
(7,'teacher@gmail.com','teacher','2021-07-14 00:34:13','2021-07-14 00:34:13','$2y$10$HGZlzDccpoZqXBqTXVoX7OUfG2fnK9IsjqZwXdtAW5SL94mU1pr/G',NULL,0,NULL,0,1,5),
(8,'pupil@gmail.com','1234123','2021-07-14 00:39:25','2021-07-14 00:39:25','$2y$10$b1OV2GTcObJhs9l7dPdjuuF0X107GPtfjH7J/gNqI4GuvNm6AHIiy',NULL,0,NULL,0,1,5),
(9,'pupilt@gmail.com','123123','2021-07-14 00:39:43','2021-07-14 00:39:43','$2y$10$pzinp.A3U3SfIMUvNe7xCu4EvvjXB7heGq4MjRt4PsbxEMJ8kdMAW',NULL,0,NULL,0,2,5);

/*Table structure for table `ytables` */

DROP TABLE IF EXISTS `ytables`;

CREATE TABLE `ytables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `js_file` text DEFAULT NULL,
  `page_heading` varchar(500) DEFAULT NULL,
  `page_message` text DEFAULT NULL,
  `new_url` varchar(500) DEFAULT NULL COMMENT 'write urls after base',
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `page_limit` enum('10','25','50','100') DEFAULT '10',
  `fast_crud` int(11) DEFAULT 1,
  `model_name` varchar(255) DEFAULT NULL COMMENT 'laravel model name, Fill this when you have different model name and different table name',
  `table_name` varchar(255) DEFAULT NULL COMMENT 'database table name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `ytables` */

insert  into `ytables`(`id`,`js_file`,`page_heading`,`page_message`,`new_url`,`is_deleted`,`created_at`,`updated_at`,`page_limit`,`fast_crud`,`model_name`,`table_name`) values 
(6,'admin/listings/adminiy-listing.js','Adminiy Listing','','adminiy/crud/adminiy',0,'2019-04-03 17:21:50','2019-04-05 16:35:04','',1,'Adminiy','adminiy'),
(7,'admin/listings/table_notes-listing.js','Table Notes','','adminiy.tablename.form',0,'2019-04-05 12:17:58','2019-04-07 02:05:38','',1,'table_notes','table_notes'),
(15,'admin/listings/imagetable-listing.js','Imagetable','','adminiy/crud/imagetable',0,'2019-04-17 19:28:31','2019-04-17 19:28:31','',1,'','imagetable'),
(16,'admin/listings/inquiry-listing.js','Inquiry','','adminiy/crud/inquiry',0,'2019-04-18 17:49:24','2019-04-19 19:42:01','',1,'','inquiry'),
(17,'admin/listings/m_flag-listing.js','Flag','','adminiy/crud/m_flag',0,'2019-04-19 06:51:33','2019-04-19 11:58:07','',1,'','m_flag'),
(18,'admin/listings/freeseminars-listing.js','Free seminars','','adminiy/crud/freeseminars',0,'2021-07-13 22:03:49','2021-07-14 03:05:25','',1,'','freeseminars'),
(19,'admin/listings/users-listing.js','Users','','adminiy/crud/users',0,'2021-07-13 23:06:34','2021-07-14 04:06:47','',1,'User','users');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
