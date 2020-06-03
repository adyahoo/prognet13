/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - db_paktikum_prognet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_paktikum_prognet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_paktikum_prognet`;

/*Table structure for table `admin_notifications` */

DROP TABLE IF EXISTS `admin_notifications`;

CREATE TABLE `admin_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifiable_id` (`notifiable_id`),
  CONSTRAINT `admin_notifications_ibfk_1` FOREIGN KEY (`notifiable_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_notifications` */

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`name`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values 
(0,'root','root','root','','',NULL,NULL,NULL),
(2,'adyahoo','$2y$10$FkjfdcajyybbTPBNodI.SuoY/A.PkYrO1EmF8Vk53iXBIGR18xjA6','mikael',NULL,NULL,NULL,'2020-03-14 05:33:27','2020-03-14 05:33:27'),
(3,'pakde','$2y$10$KRIAiZqIujBBkG/Z8OFuueE5y/crLxD9mmrpJJr8AvovQF1Ya/n/a','dede',NULL,NULL,NULL,'2020-03-14 11:09:52','2020-03-14 11:09:52'),
(4,'mamank','$2y$10$es6H1LTwuEDpiL3ZNXuBpOO1AGoi6pXqgby9yGOJGPn7HaDHT2xL2','mamank',NULL,NULL,NULL,'2020-03-14 12:29:44','2020-03-14 12:29:44'),
(6,'lisa','$2y$10$8qTK.jy66vKd.0SDTXBaDu60A8ehmRmuQPRyjtbfeJnP11gN2L4LK','lisa',NULL,NULL,NULL,'2020-03-14 13:01:07','2020-03-14 13:01:07'),
(7,'wadaw','$2y$10$fnpfo87pjq.zRLOm77APaOVM52J3z/KSdOKJtU8o4KZtxb2B/bbZK','wadaw',NULL,NULL,NULL,'2020-03-14 13:06:13','2020-03-14 13:06:13'),
(8,'dadank','$2y$10$eodOzSDOMSKWdHNoLkEd8uir6JSH9hdHjXt0G2hP0j7lFl23NpQf.','dadank','402897.jpg',NULL,NULL,'2020-03-28 05:43:45','2020-03-28 05:43:45'),
(9,'yayaw','$2y$10$LMALLx.kgwW2V8qV3rJ0fexM9Y5iihAT.QoTHBkJmuAUd.pxWoS7O','yayaw','user.jpg',NULL,NULL,'2020-03-28 05:51:01','2020-03-28 05:51:01'),
(10,'waduh','$2y$10$JauSDObYAe088cIduL4wFOjSS.kZymnYBAl2NGkz1sBnjeu9b1VBa','waduh','user.jpg','089999999999',NULL,'2020-03-28 05:52:41','2020-03-28 05:52:41'),
(11,'yaudah','$2y$10$gW/jh6pwCvuV6j6ymHQmGO/GXIUp7lF5zTNHZ3c.D7JZetMw5Ck3.','yaudah','402897.jpg','0899898989',NULL,'2020-04-01 15:58:19','2020-04-01 15:58:19'),
(12,'kampank','$2y$10$XVasC4BeLHrbQJGefq6RSeHmEg3FOwynu.edKb4adgcAzO79JHeOO','kampank','idcamp.jpg_kampank_1587910876','098908989',NULL,'2020-04-26 14:21:16','2020-04-26 14:21:16'),
(13,'wajan','$2y$10$F9VCrmFAzkzsA9DE3S49xeGFBoYhAL5aqfOItK8Nz23atMIyhUIcG','wajan','cyber.jpg_wajan_1587910958','0989898',NULL,'2020-04-26 14:22:38','2020-04-26 14:22:38');

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('checkedout','notyet','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

insert  into `carts`(`id`,`user_id`,`product_id`,`qty`,`created_at`,`updated_at`,`status`) values 
(2,5,7,1,'2020-05-25 23:43:10','2020-05-26 14:26:57','checkedout'),
(3,5,6,3,'2020-05-25 23:52:03','2020-05-26 14:26:57','checkedout'),
(4,3,6,2,'2020-05-27 12:26:38','2020-05-27 12:27:38','checkedout'),
(5,3,6,3,'2020-05-27 12:26:47','2020-05-27 12:27:38','checkedout');

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` bigint(20) unsigned NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=502 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cities` */

insert  into `cities`(`id`,`province_id`,`city_name`,`postal_code`,`created_at`,`updated_at`) values 
(1,21,'Aceh Barat','23681',NULL,NULL),
(2,21,'Aceh Barat Daya','23764',NULL,NULL),
(3,21,'Aceh Besar','23951',NULL,NULL),
(4,21,'Aceh Jaya','23654',NULL,NULL),
(5,21,'Aceh Selatan','23719',NULL,NULL),
(6,21,'Aceh Singkil','24785',NULL,NULL),
(7,21,'Aceh Tamiang','24476',NULL,NULL),
(8,21,'Aceh Tengah','24511',NULL,NULL),
(9,21,'Aceh Tenggara','24611',NULL,NULL),
(10,21,'Aceh Timur','24454',NULL,NULL),
(11,21,'Aceh Utara','24382',NULL,NULL),
(12,32,'Agam','26411',NULL,NULL),
(13,23,'Alor','85811',NULL,NULL),
(14,19,'Ambon','97222',NULL,NULL),
(15,34,'Asahan','21214',NULL,NULL),
(16,24,'Asmat','99777',NULL,NULL),
(17,1,'Badung','80351',NULL,NULL),
(18,13,'Balangan','71611',NULL,NULL),
(19,15,'Balikpapan','76111',NULL,NULL),
(20,21,'Banda Aceh','23238',NULL,NULL),
(21,18,'Bandar Lampung','35139',NULL,NULL),
(22,9,'Bandung','40311',NULL,NULL),
(23,9,'Bandung','40111',NULL,NULL),
(24,9,'Bandung Barat','40721',NULL,NULL),
(25,29,'Banggai','94711',NULL,NULL),
(26,29,'Banggai Kepulauan','94881',NULL,NULL),
(27,2,'Bangka','33212',NULL,NULL),
(28,2,'Bangka Barat','33315',NULL,NULL),
(29,2,'Bangka Selatan','33719',NULL,NULL),
(30,2,'Bangka Tengah','33613',NULL,NULL),
(31,11,'Bangkalan','69118',NULL,NULL),
(32,1,'Bangli','80619',NULL,NULL),
(33,13,'Banjar','70619',NULL,NULL),
(34,9,'Banjar','46311',NULL,NULL),
(35,13,'Banjarbaru','70712',NULL,NULL),
(36,13,'Banjarmasin','70117',NULL,NULL),
(37,10,'Banjarnegara','53419',NULL,NULL),
(38,28,'Bantaeng','92411',NULL,NULL),
(39,5,'Bantul','55715',NULL,NULL),
(40,33,'Banyuasin','30911',NULL,NULL),
(41,10,'Banyumas','53114',NULL,NULL),
(42,11,'Banyuwangi','68416',NULL,NULL),
(43,13,'Barito Kuala','70511',NULL,NULL),
(44,14,'Barito Selatan','73711',NULL,NULL),
(45,14,'Barito Timur','73671',NULL,NULL),
(46,14,'Barito Utara','73881',NULL,NULL),
(47,28,'Barru','90719',NULL,NULL),
(48,17,'Batam','29413',NULL,NULL),
(49,10,'Batang','51211',NULL,NULL),
(50,8,'Batang Hari','36613',NULL,NULL),
(51,11,'Batu','65311',NULL,NULL),
(52,34,'Batu Bara','21655',NULL,NULL),
(53,30,'Bau-Bau','93719',NULL,NULL),
(54,9,'Bekasi','17837',NULL,NULL),
(55,9,'Bekasi','17121',NULL,NULL),
(56,2,'Belitung','33419',NULL,NULL),
(57,2,'Belitung Timur','33519',NULL,NULL),
(58,23,'Belu','85711',NULL,NULL),
(59,21,'Bener Meriah','24581',NULL,NULL),
(60,26,'Bengkalis','28719',NULL,NULL),
(61,12,'Bengkayang','79213',NULL,NULL),
(62,4,'Bengkulu','38229',NULL,NULL),
(63,4,'Bengkulu Selatan','38519',NULL,NULL),
(64,4,'Bengkulu Tengah','38319',NULL,NULL),
(65,4,'Bengkulu Utara','38619',NULL,NULL),
(66,15,'Berau','77311',NULL,NULL),
(67,24,'Biak Numfor','98119',NULL,NULL),
(68,22,'Bima','84171',NULL,NULL),
(69,22,'Bima','84139',NULL,NULL),
(70,34,'Binjai','20712',NULL,NULL),
(71,17,'Bintan','29135',NULL,NULL),
(72,21,'Bireuen','24219',NULL,NULL),
(73,31,'Bitung','95512',NULL,NULL),
(74,11,'Blitar','66171',NULL,NULL),
(75,11,'Blitar','66124',NULL,NULL),
(76,10,'Blora','58219',NULL,NULL),
(77,7,'Boalemo','96319',NULL,NULL),
(78,9,'Bogor','16911',NULL,NULL),
(79,9,'Bogor','16119',NULL,NULL),
(80,11,'Bojonegoro','62119',NULL,NULL),
(81,31,'Bolaang Mongondow (Bolmong)','95755',NULL,NULL),
(82,31,'Bolaang Mongondow Selatan','95774',NULL,NULL),
(83,31,'Bolaang Mongondow Timur','95783',NULL,NULL),
(84,31,'Bolaang Mongondow Utara','95765',NULL,NULL),
(85,30,'Bombana','93771',NULL,NULL),
(86,11,'Bondowoso','68219',NULL,NULL),
(87,28,'Bone','92713',NULL,NULL),
(88,7,'Bone Bolango','96511',NULL,NULL),
(89,15,'Bontang','75313',NULL,NULL),
(90,24,'Boven Digoel','99662',NULL,NULL),
(91,10,'Boyolali','57312',NULL,NULL),
(92,10,'Brebes','52212',NULL,NULL),
(93,32,'Bukittinggi','26115',NULL,NULL),
(94,1,'Buleleng','81111',NULL,NULL),
(95,28,'Bulukumba','92511',NULL,NULL),
(96,16,'Bulungan (Bulongan)','77211',NULL,NULL),
(97,8,'Bungo','37216',NULL,NULL),
(98,29,'Buol','94564',NULL,NULL),
(99,19,'Buru','97371',NULL,NULL),
(100,19,'Buru Selatan','97351',NULL,NULL),
(101,30,'Buton','93754',NULL,NULL),
(102,30,'Buton Utara','93745',NULL,NULL),
(103,9,'Ciamis','46211',NULL,NULL),
(104,9,'Cianjur','43217',NULL,NULL),
(105,10,'Cilacap','53211',NULL,NULL),
(106,3,'Cilegon','42417',NULL,NULL),
(107,9,'Cimahi','40512',NULL,NULL),
(108,9,'Cirebon','45611',NULL,NULL),
(109,9,'Cirebon','45116',NULL,NULL),
(110,34,'Dairi','22211',NULL,NULL),
(111,24,'Deiyai (Deliyai)','98784',NULL,NULL),
(112,34,'Deli Serdang','20511',NULL,NULL),
(113,10,'Demak','59519',NULL,NULL),
(114,1,'Denpasar','80227',NULL,NULL),
(115,9,'Depok','16416',NULL,NULL),
(116,32,'Dharmasraya','27612',NULL,NULL),
(117,24,'Dogiyai','98866',NULL,NULL),
(118,22,'Dompu','84217',NULL,NULL),
(119,29,'Donggala','94341',NULL,NULL),
(120,26,'Dumai','28811',NULL,NULL),
(121,33,'Empat Lawang','31811',NULL,NULL),
(122,23,'Ende','86351',NULL,NULL),
(123,28,'Enrekang','91719',NULL,NULL),
(124,25,'Fakfak','98651',NULL,NULL),
(125,23,'Flores Timur','86213',NULL,NULL),
(126,9,'Garut','44126',NULL,NULL),
(127,21,'Gayo Lues','24653',NULL,NULL),
(128,1,'Gianyar','80519',NULL,NULL),
(129,7,'Gorontalo','96218',NULL,NULL),
(130,7,'Gorontalo','96115',NULL,NULL),
(131,7,'Gorontalo Utara','96611',NULL,NULL),
(132,28,'Gowa','92111',NULL,NULL),
(133,11,'Gresik','61115',NULL,NULL),
(134,10,'Grobogan','58111',NULL,NULL),
(135,5,'Gunung Kidul','55812',NULL,NULL),
(136,14,'Gunung Mas','74511',NULL,NULL),
(137,34,'Gunungsitoli','22813',NULL,NULL),
(138,20,'Halmahera Barat','97757',NULL,NULL),
(139,20,'Halmahera Selatan','97911',NULL,NULL),
(140,20,'Halmahera Tengah','97853',NULL,NULL),
(141,20,'Halmahera Timur','97862',NULL,NULL),
(142,20,'Halmahera Utara','97762',NULL,NULL),
(143,13,'Hulu Sungai Selatan','71212',NULL,NULL),
(144,13,'Hulu Sungai Tengah','71313',NULL,NULL),
(145,13,'Hulu Sungai Utara','71419',NULL,NULL),
(146,34,'Humbang Hasundutan','22457',NULL,NULL),
(147,26,'Indragiri Hilir','29212',NULL,NULL),
(148,26,'Indragiri Hulu','29319',NULL,NULL),
(149,9,'Indramayu','45214',NULL,NULL),
(150,24,'Intan Jaya','98771',NULL,NULL),
(151,6,'Jakarta Barat','11220',NULL,NULL),
(152,6,'Jakarta Pusat','10540',NULL,NULL),
(153,6,'Jakarta Selatan','12230',NULL,NULL),
(154,6,'Jakarta Timur','13330',NULL,NULL),
(155,6,'Jakarta Utara','14140',NULL,NULL),
(156,8,'Jambi','36111',NULL,NULL),
(157,24,'Jayapura','99352',NULL,NULL),
(158,24,'Jayapura','99114',NULL,NULL),
(159,24,'Jayawijaya','99511',NULL,NULL),
(160,11,'Jember','68113',NULL,NULL),
(161,1,'Jembrana','82251',NULL,NULL),
(162,28,'Jeneponto','92319',NULL,NULL),
(163,10,'Jepara','59419',NULL,NULL),
(164,11,'Jombang','61415',NULL,NULL),
(165,25,'Kaimana','98671',NULL,NULL),
(166,26,'Kampar','28411',NULL,NULL),
(167,14,'Kapuas','73583',NULL,NULL),
(168,12,'Kapuas Hulu','78719',NULL,NULL),
(169,10,'Karanganyar','57718',NULL,NULL),
(170,1,'Karangasem','80819',NULL,NULL),
(171,9,'Karawang','41311',NULL,NULL),
(172,17,'Karimun','29611',NULL,NULL),
(173,34,'Karo','22119',NULL,NULL),
(174,14,'Katingan','74411',NULL,NULL),
(175,4,'Kaur','38911',NULL,NULL),
(176,12,'Kayong Utara','78852',NULL,NULL),
(177,10,'Kebumen','54319',NULL,NULL),
(178,11,'Kediri','64184',NULL,NULL),
(179,11,'Kediri','64125',NULL,NULL),
(180,24,'Keerom','99461',NULL,NULL),
(181,10,'Kendal','51314',NULL,NULL),
(182,30,'Kendari','93126',NULL,NULL),
(183,4,'Kepahiang','39319',NULL,NULL),
(184,17,'Kepulauan Anambas','29991',NULL,NULL),
(185,19,'Kepulauan Aru','97681',NULL,NULL),
(186,32,'Kepulauan Mentawai','25771',NULL,NULL),
(187,26,'Kepulauan Meranti','28791',NULL,NULL),
(188,31,'Kepulauan Sangihe','95819',NULL,NULL),
(189,6,'Kepulauan Seribu','14550',NULL,NULL),
(190,31,'Kepulauan Siau Tagulandang Biaro (Sitaro)','95862',NULL,NULL),
(191,20,'Kepulauan Sula','97995',NULL,NULL),
(192,31,'Kepulauan Talaud','95885',NULL,NULL),
(193,24,'Kepulauan Yapen (Yapen Waropen)','98211',NULL,NULL),
(194,8,'Kerinci','37167',NULL,NULL),
(195,12,'Ketapang','78874',NULL,NULL),
(196,10,'Klaten','57411',NULL,NULL),
(197,1,'Klungkung','80719',NULL,NULL),
(198,30,'Kolaka','93511',NULL,NULL),
(199,30,'Kolaka Utara','93911',NULL,NULL),
(200,30,'Konawe','93411',NULL,NULL),
(201,30,'Konawe Selatan','93811',NULL,NULL),
(202,30,'Konawe Utara','93311',NULL,NULL),
(203,13,'Kotabaru','72119',NULL,NULL),
(204,31,'Kotamobagu','95711',NULL,NULL),
(205,14,'Kotawaringin Barat','74119',NULL,NULL),
(206,14,'Kotawaringin Timur','74364',NULL,NULL),
(207,26,'Kuantan Singingi','29519',NULL,NULL),
(208,12,'Kubu Raya','78311',NULL,NULL),
(209,10,'Kudus','59311',NULL,NULL),
(210,5,'Kulon Progo','55611',NULL,NULL),
(211,9,'Kuningan','45511',NULL,NULL),
(212,23,'Kupang','85362',NULL,NULL),
(213,23,'Kupang','85119',NULL,NULL),
(214,15,'Kutai Barat','75711',NULL,NULL),
(215,15,'Kutai Kartanegara','75511',NULL,NULL),
(216,15,'Kutai Timur','75611',NULL,NULL),
(217,34,'Labuhan Batu','21412',NULL,NULL),
(218,34,'Labuhan Batu Selatan','21511',NULL,NULL),
(219,34,'Labuhan Batu Utara','21711',NULL,NULL),
(220,33,'Lahat','31419',NULL,NULL),
(221,14,'Lamandau','74611',NULL,NULL),
(222,11,'Lamongan','64125',NULL,NULL),
(223,18,'Lampung Barat','34814',NULL,NULL),
(224,18,'Lampung Selatan','35511',NULL,NULL),
(225,18,'Lampung Tengah','34212',NULL,NULL),
(226,18,'Lampung Timur','34319',NULL,NULL),
(227,18,'Lampung Utara','34516',NULL,NULL),
(228,12,'Landak','78319',NULL,NULL),
(229,34,'Langkat','20811',NULL,NULL),
(230,21,'Langsa','24412',NULL,NULL),
(231,24,'Lanny Jaya','99531',NULL,NULL),
(232,3,'Lebak','42319',NULL,NULL),
(233,4,'Lebong','39264',NULL,NULL),
(234,23,'Lembata','86611',NULL,NULL),
(235,21,'Lhokseumawe','24352',NULL,NULL),
(236,32,'Lima Puluh Koto/Kota','26671',NULL,NULL),
(237,17,'Lingga','29811',NULL,NULL),
(238,22,'Lombok Barat','83311',NULL,NULL),
(239,22,'Lombok Tengah','83511',NULL,NULL),
(240,22,'Lombok Timur','83612',NULL,NULL),
(241,22,'Lombok Utara','83711',NULL,NULL),
(242,33,'Lubuk Linggau','31614',NULL,NULL),
(243,11,'Lumajang','67319',NULL,NULL),
(244,28,'Luwu','91994',NULL,NULL),
(245,28,'Luwu Timur','92981',NULL,NULL),
(246,28,'Luwu Utara','92911',NULL,NULL),
(247,11,'Madiun','63153',NULL,NULL),
(248,11,'Madiun','63122',NULL,NULL),
(249,10,'Magelang','56519',NULL,NULL),
(250,10,'Magelang','56133',NULL,NULL),
(251,11,'Magetan','63314',NULL,NULL),
(252,9,'Majalengka','45412',NULL,NULL),
(253,27,'Majene','91411',NULL,NULL),
(254,28,'Makassar','90111',NULL,NULL),
(255,11,'Malang','65163',NULL,NULL),
(256,11,'Malang','65112',NULL,NULL),
(257,16,'Malinau','77511',NULL,NULL),
(258,19,'Maluku Barat Daya','97451',NULL,NULL),
(259,19,'Maluku Tengah','97513',NULL,NULL),
(260,19,'Maluku Tenggara','97651',NULL,NULL),
(261,19,'Maluku Tenggara Barat','97465',NULL,NULL),
(262,27,'Mamasa','91362',NULL,NULL),
(263,24,'Mamberamo Raya','99381',NULL,NULL),
(264,24,'Mamberamo Tengah','99553',NULL,NULL),
(265,27,'Mamuju','91519',NULL,NULL),
(266,27,'Mamuju Utara','91571',NULL,NULL),
(267,31,'Manado','95247',NULL,NULL),
(268,34,'Mandailing Natal','22916',NULL,NULL),
(269,23,'Manggarai','86551',NULL,NULL),
(270,23,'Manggarai Barat','86711',NULL,NULL),
(271,23,'Manggarai Timur','86811',NULL,NULL),
(272,25,'Manokwari','98311',NULL,NULL),
(273,25,'Manokwari Selatan','98355',NULL,NULL),
(274,24,'Mappi','99853',NULL,NULL),
(275,28,'Maros','90511',NULL,NULL),
(276,22,'Mataram','83131',NULL,NULL),
(277,25,'Maybrat','98051',NULL,NULL),
(278,34,'Medan','20228',NULL,NULL),
(279,12,'Melawi','78619',NULL,NULL),
(280,8,'Merangin','37319',NULL,NULL),
(281,24,'Merauke','99613',NULL,NULL),
(282,18,'Mesuji','34911',NULL,NULL),
(283,18,'Metro','34111',NULL,NULL),
(284,24,'Mimika','99962',NULL,NULL),
(285,31,'Minahasa','95614',NULL,NULL),
(286,31,'Minahasa Selatan','95914',NULL,NULL),
(287,31,'Minahasa Tenggara','95995',NULL,NULL),
(288,31,'Minahasa Utara','95316',NULL,NULL),
(289,11,'Mojokerto','61382',NULL,NULL),
(290,11,'Mojokerto','61316',NULL,NULL),
(291,29,'Morowali','94911',NULL,NULL),
(292,33,'Muara Enim','31315',NULL,NULL),
(293,8,'Muaro Jambi','36311',NULL,NULL),
(294,4,'Muko Muko','38715',NULL,NULL),
(295,30,'Muna','93611',NULL,NULL),
(296,14,'Murung Raya','73911',NULL,NULL),
(297,33,'Musi Banyuasin','30719',NULL,NULL),
(298,33,'Musi Rawas','31661',NULL,NULL),
(299,24,'Nabire','98816',NULL,NULL),
(300,21,'Nagan Raya','23674',NULL,NULL),
(301,23,'Nagekeo','86911',NULL,NULL),
(302,17,'Natuna','29711',NULL,NULL),
(303,24,'Nduga','99541',NULL,NULL),
(304,23,'Ngada','86413',NULL,NULL),
(305,11,'Nganjuk','64414',NULL,NULL),
(306,11,'Ngawi','63219',NULL,NULL),
(307,34,'Nias','22876',NULL,NULL),
(308,34,'Nias Barat','22895',NULL,NULL),
(309,34,'Nias Selatan','22865',NULL,NULL),
(310,34,'Nias Utara','22856',NULL,NULL),
(311,16,'Nunukan','77421',NULL,NULL),
(312,33,'Ogan Ilir','30811',NULL,NULL),
(313,33,'Ogan Komering Ilir','30618',NULL,NULL),
(314,33,'Ogan Komering Ulu','32112',NULL,NULL),
(315,33,'Ogan Komering Ulu Selatan','32211',NULL,NULL),
(316,33,'Ogan Komering Ulu Timur','32312',NULL,NULL),
(317,11,'Pacitan','63512',NULL,NULL),
(318,32,'Padang','25112',NULL,NULL),
(319,34,'Padang Lawas','22763',NULL,NULL),
(320,34,'Padang Lawas Utara','22753',NULL,NULL),
(321,32,'Padang Panjang','27122',NULL,NULL),
(322,32,'Padang Pariaman','25583',NULL,NULL),
(323,34,'Padang Sidempuan','22727',NULL,NULL),
(324,33,'Pagar Alam','31512',NULL,NULL),
(325,34,'Pakpak Bharat','22272',NULL,NULL),
(326,14,'Palangka Raya','73112',NULL,NULL),
(327,33,'Palembang','30111',NULL,NULL),
(328,28,'Palopo','91911',NULL,NULL),
(329,29,'Palu','94111',NULL,NULL),
(330,11,'Pamekasan','69319',NULL,NULL),
(331,3,'Pandeglang','42212',NULL,NULL),
(332,9,'Pangandaran','46511',NULL,NULL),
(333,28,'Pangkajene Kepulauan','90611',NULL,NULL),
(334,2,'Pangkal Pinang','33115',NULL,NULL),
(335,24,'Paniai','98765',NULL,NULL),
(336,28,'Parepare','91123',NULL,NULL),
(337,32,'Pariaman','25511',NULL,NULL),
(338,29,'Parigi Moutong','94411',NULL,NULL),
(339,32,'Pasaman','26318',NULL,NULL),
(340,32,'Pasaman Barat','26511',NULL,NULL),
(341,15,'Paser','76211',NULL,NULL),
(342,11,'Pasuruan','67153',NULL,NULL),
(343,11,'Pasuruan','67118',NULL,NULL),
(344,10,'Pati','59114',NULL,NULL),
(345,32,'Payakumbuh','26213',NULL,NULL),
(346,25,'Pegunungan Arfak','98354',NULL,NULL),
(347,24,'Pegunungan Bintang','99573',NULL,NULL),
(348,10,'Pekalongan','51161',NULL,NULL),
(349,10,'Pekalongan','51122',NULL,NULL),
(350,26,'Pekanbaru','28112',NULL,NULL),
(351,26,'Pelalawan','28311',NULL,NULL),
(352,10,'Pemalang','52319',NULL,NULL),
(353,34,'Pematang Siantar','21126',NULL,NULL),
(354,15,'Penajam Paser Utara','76311',NULL,NULL),
(355,18,'Pesawaran','35312',NULL,NULL),
(356,18,'Pesisir Barat','35974',NULL,NULL),
(357,32,'Pesisir Selatan','25611',NULL,NULL),
(358,21,'Pidie','24116',NULL,NULL),
(359,21,'Pidie Jaya','24186',NULL,NULL),
(360,28,'Pinrang','91251',NULL,NULL),
(361,7,'Pohuwato','96419',NULL,NULL),
(362,27,'Polewali Mandar','91311',NULL,NULL),
(363,11,'Ponorogo','63411',NULL,NULL),
(364,12,'Pontianak','78971',NULL,NULL),
(365,12,'Pontianak','78112',NULL,NULL),
(366,29,'Poso','94615',NULL,NULL),
(367,33,'Prabumulih','31121',NULL,NULL),
(368,18,'Pringsewu','35719',NULL,NULL),
(369,11,'Probolinggo','67282',NULL,NULL),
(370,11,'Probolinggo','67215',NULL,NULL),
(371,14,'Pulang Pisau','74811',NULL,NULL),
(372,20,'Pulau Morotai','97771',NULL,NULL),
(373,24,'Puncak','98981',NULL,NULL),
(374,24,'Puncak Jaya','98979',NULL,NULL),
(375,10,'Purbalingga','53312',NULL,NULL),
(376,9,'Purwakarta','41119',NULL,NULL),
(377,10,'Purworejo','54111',NULL,NULL),
(378,25,'Raja Ampat','98489',NULL,NULL),
(379,4,'Rejang Lebong','39112',NULL,NULL),
(380,10,'Rembang','59219',NULL,NULL),
(381,26,'Rokan Hilir','28992',NULL,NULL),
(382,26,'Rokan Hulu','28511',NULL,NULL),
(383,23,'Rote Ndao','85982',NULL,NULL),
(384,21,'Sabang','23512',NULL,NULL),
(385,23,'Sabu Raijua','85391',NULL,NULL),
(386,10,'Salatiga','50711',NULL,NULL),
(387,15,'Samarinda','75133',NULL,NULL),
(388,12,'Sambas','79453',NULL,NULL),
(389,34,'Samosir','22392',NULL,NULL),
(390,11,'Sampang','69219',NULL,NULL),
(391,12,'Sanggau','78557',NULL,NULL),
(392,24,'Sarmi','99373',NULL,NULL),
(393,8,'Sarolangun','37419',NULL,NULL),
(394,32,'Sawah Lunto','27416',NULL,NULL),
(395,12,'Sekadau','79583',NULL,NULL),
(396,28,'Selayar (Kepulauan Selayar)','92812',NULL,NULL),
(397,4,'Seluma','38811',NULL,NULL),
(398,10,'Semarang','50511',NULL,NULL),
(399,10,'Semarang','50135',NULL,NULL),
(400,19,'Seram Bagian Barat','97561',NULL,NULL),
(401,19,'Seram Bagian Timur','97581',NULL,NULL),
(402,3,'Serang','42182',NULL,NULL),
(403,3,'Serang','42111',NULL,NULL),
(404,34,'Serdang Bedagai','20915',NULL,NULL),
(405,14,'Seruyan','74211',NULL,NULL),
(406,26,'Siak','28623',NULL,NULL),
(407,34,'Sibolga','22522',NULL,NULL),
(408,28,'Sidenreng Rappang/Rapang','91613',NULL,NULL),
(409,11,'Sidoarjo','61219',NULL,NULL),
(410,29,'Sigi','94364',NULL,NULL),
(411,32,'Sijunjung (Sawah Lunto Sijunjung)','27511',NULL,NULL),
(412,23,'Sikka','86121',NULL,NULL),
(413,34,'Simalungun','21162',NULL,NULL),
(414,21,'Simeulue','23891',NULL,NULL),
(415,12,'Singkawang','79117',NULL,NULL),
(416,28,'Sinjai','92615',NULL,NULL),
(417,12,'Sintang','78619',NULL,NULL),
(418,11,'Situbondo','68316',NULL,NULL),
(419,5,'Sleman','55513',NULL,NULL),
(420,32,'Solok','27365',NULL,NULL),
(421,32,'Solok','27315',NULL,NULL),
(422,32,'Solok Selatan','27779',NULL,NULL),
(423,28,'Soppeng','90812',NULL,NULL),
(424,25,'Sorong','98431',NULL,NULL),
(425,25,'Sorong','98411',NULL,NULL),
(426,25,'Sorong Selatan','98454',NULL,NULL),
(427,10,'Sragen','57211',NULL,NULL),
(428,9,'Subang','41215',NULL,NULL),
(429,21,'Subulussalam','24882',NULL,NULL),
(430,9,'Sukabumi','43311',NULL,NULL),
(431,9,'Sukabumi','43114',NULL,NULL),
(432,14,'Sukamara','74712',NULL,NULL),
(433,10,'Sukoharjo','57514',NULL,NULL),
(434,23,'Sumba Barat','87219',NULL,NULL),
(435,23,'Sumba Barat Daya','87453',NULL,NULL),
(436,23,'Sumba Tengah','87358',NULL,NULL),
(437,23,'Sumba Timur','87112',NULL,NULL),
(438,22,'Sumbawa','84315',NULL,NULL),
(439,22,'Sumbawa Barat','84419',NULL,NULL),
(440,9,'Sumedang','45326',NULL,NULL),
(441,11,'Sumenep','69413',NULL,NULL),
(442,8,'Sungaipenuh','37113',NULL,NULL),
(443,24,'Supiori','98164',NULL,NULL),
(444,11,'Surabaya','60119',NULL,NULL),
(445,10,'Surakarta (Solo)','57113',NULL,NULL),
(446,13,'Tabalong','71513',NULL,NULL),
(447,1,'Tabanan','82119',NULL,NULL),
(448,28,'Takalar','92212',NULL,NULL),
(449,25,'Tambrauw','98475',NULL,NULL),
(450,16,'Tana Tidung','77611',NULL,NULL),
(451,28,'Tana Toraja','91819',NULL,NULL),
(452,13,'Tanah Bumbu','72211',NULL,NULL),
(453,32,'Tanah Datar','27211',NULL,NULL),
(454,13,'Tanah Laut','70811',NULL,NULL),
(455,3,'Tangerang','15914',NULL,NULL),
(456,3,'Tangerang','15111',NULL,NULL),
(457,3,'Tangerang Selatan','15332',NULL,NULL),
(458,18,'Tanggamus','35619',NULL,NULL),
(459,34,'Tanjung Balai','21321',NULL,NULL),
(460,8,'Tanjung Jabung Barat','36513',NULL,NULL),
(461,8,'Tanjung Jabung Timur','36719',NULL,NULL),
(462,17,'Tanjung Pinang','29111',NULL,NULL),
(463,34,'Tapanuli Selatan','22742',NULL,NULL),
(464,34,'Tapanuli Tengah','22611',NULL,NULL),
(465,34,'Tapanuli Utara','22414',NULL,NULL),
(466,13,'Tapin','71119',NULL,NULL),
(467,16,'Tarakan','77114',NULL,NULL),
(468,9,'Tasikmalaya','46411',NULL,NULL),
(469,9,'Tasikmalaya','46116',NULL,NULL),
(470,34,'Tebing Tinggi','20632',NULL,NULL),
(471,8,'Tebo','37519',NULL,NULL),
(472,10,'Tegal','52419',NULL,NULL),
(473,10,'Tegal','52114',NULL,NULL),
(474,25,'Teluk Bintuni','98551',NULL,NULL),
(475,25,'Teluk Wondama','98591',NULL,NULL),
(476,10,'Temanggung','56212',NULL,NULL),
(477,20,'Ternate','97714',NULL,NULL),
(478,20,'Tidore Kepulauan','97815',NULL,NULL),
(479,23,'Timor Tengah Selatan','85562',NULL,NULL),
(480,23,'Timor Tengah Utara','85612',NULL,NULL),
(481,34,'Toba Samosir','22316',NULL,NULL),
(482,29,'Tojo Una-Una','94683',NULL,NULL),
(483,29,'Toli-Toli','94542',NULL,NULL),
(484,24,'Tolikara','99411',NULL,NULL),
(485,31,'Tomohon','95416',NULL,NULL),
(486,28,'Toraja Utara','91831',NULL,NULL),
(487,11,'Trenggalek','66312',NULL,NULL),
(488,19,'Tual','97612',NULL,NULL),
(489,11,'Tuban','62319',NULL,NULL),
(490,18,'Tulang Bawang','34613',NULL,NULL),
(491,18,'Tulang Bawang Barat','34419',NULL,NULL),
(492,11,'Tulungagung','66212',NULL,NULL),
(493,28,'Wajo','90911',NULL,NULL),
(494,30,'Wakatobi','93791',NULL,NULL),
(495,24,'Waropen','98269',NULL,NULL),
(496,18,'Way Kanan','34711',NULL,NULL),
(497,10,'Wonogiri','57619',NULL,NULL),
(498,10,'Wonosobo','56311',NULL,NULL),
(499,24,'Yahukimo','99041',NULL,NULL),
(500,24,'Yalimo','99481',NULL,NULL),
(501,5,'Yogyakarta','55111',NULL,NULL);

/*Table structure for table `couriers` */

DROP TABLE IF EXISTS `couriers`;

CREATE TABLE `couriers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `couriers` */

insert  into `couriers`(`id`,`courier`,`created_at`,`updated_at`) values 
(2,'jne',NULL,NULL),
(3,'tiki',NULL,NULL);

/*Table structure for table `discounts` */

DROP TABLE IF EXISTS `discounts`;

CREATE TABLE `discounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned DEFAULT NULL,
  `percentage` int(3) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `discounts` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_02_15_123603_create_admins_table',1),
(4,'2019_02_15_123744_create_sellers_table',1),
(5,'2019_02_15_125445_create_products_table',1),
(6,'2019_02_15_130341_create_product_images_table',1),
(7,'2019_02_15_131114_create_transactions_table',1),
(8,'2019_02_15_131132_create_transaction_details_table',1),
(9,'2019_02_15_132352_create_product_categories_table',1),
(10,'2019_02_15_132701_create_carts_table',1),
(11,'2019_02_15_134220_create_wishlists_table',1),
(12,'2019_02_16_044815_create_rates_table',1),
(13,'2019_02_16_045411_create_product_reviews_table',1),
(14,'2019_02_16_062504_create_qna_products_table',1),
(15,'2019_02_16_063238_create_shopping_voucers_table',1),
(16,'2019_02_16_064643_create_couriers_table',1),
(17,'2019_02_16_102028_create_notifications_table',1),
(18,'2019_02_16_103007_create_seller_notifications_table',1),
(19,'2019_02_16_103024_create_user_notifications_table',1),
(20,'2019_08_19_000000_create_failed_jobs_table',2),
(21,'2020_05_18_222156_create_ratings_table',3),
(22,'2020_05_26_231324_create_provinces',4),
(23,'2020_05_26_231520_create_cities',4);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `product_categories` */

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_categories` */

insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values 
(1,'Soft Fruits','2020-04-26 14:56:42','2020-04-26 14:56:42');

/*Table structure for table `product_category_details` */

DROP TABLE IF EXISTS `product_category_details`;

CREATE TABLE `product_category_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_category_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_category_details_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_category_details` */

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`image_name`,`created_at`,`updated_at`) values 
(2,7,'Jeruk_1588000509_instagram-img-07.jpg','2020-04-27 15:15:09','2020-04-27 15:15:09'),
(3,6,'Apel_1588059408_apel-merah.jpg','2020-04-28 07:13:19','2020-04-28 07:36:48');

/*Table structure for table `product_revie` */

DROP TABLE IF EXISTS `product_revie`;

CREATE TABLE `product_revie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `rate` int(1) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `rate_id` (`rate`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_revie_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_revie_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_revie` */

/*Table structure for table `product_reviews` */

DROP TABLE IF EXISTS `product_reviews`;

CREATE TABLE `product_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `rating` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_user_id_foreign` (`user_id`),
  KEY `product_reviews_product_id_foreign` (`product_id`),
  CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_reviews` */

insert  into `product_reviews`(`id`,`user_id`,`product_id`,`rating`,`content`,`created_at`,`updated_at`) values 
(1,1,6,0,'mantap gan',NULL,NULL),
(2,3,7,3,'asdf','2020-05-22 07:21:58','2020-05-22 07:21:58'),
(4,3,6,2,'cool','2020-05-22 07:31:18','2020-05-22 07:31:18'),
(5,3,7,2,'anjay','2020-05-22 17:20:24','2020-05-22 17:20:24'),
(6,3,7,4,'damn','2020-05-23 23:43:55','2020-05-23 23:43:55'),
(7,3,7,5,'god damn','2020-05-23 23:44:42','2020-05-23 23:44:42'),
(8,5,7,4,'buahnya sangat segar dan sangat menyehatkan, gak lagi deh beli di tempat lain. Freshop emang penjual buah paling dabes di seluruh nusantara','2020-05-25 09:54:52','2020-05-25 09:54:52');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_rate` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`product_name`,`price`,`description`,`product_rate`,`created_at`,`updated_at`,`stock`,`weight`) values 
(6,'Apel',3000,'Apel Malang Manis beut',NULL,'2020-04-27 14:33:14','2020-04-28 07:36:48',100,1),
(7,'Jeruk',2000,'Asem',NULL,'2020-04-27 15:15:09','2020-04-27 15:15:09',10,1);

/*Table structure for table `provinces` */

DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `provinces` */

insert  into `provinces`(`id`,`province`,`created_at`,`updated_at`) values 
(1,'Bali',NULL,NULL),
(2,'Bangka Belitung',NULL,NULL),
(3,'Banten',NULL,NULL),
(4,'Bengkulu',NULL,NULL),
(5,'DI Yogyakarta',NULL,NULL),
(6,'DKI Jakarta',NULL,NULL),
(7,'Gorontalo',NULL,NULL),
(8,'Jambi',NULL,NULL),
(9,'Jawa Barat',NULL,NULL),
(10,'Jawa Tengah',NULL,NULL),
(11,'Jawa Timur',NULL,NULL),
(12,'Kalimantan Barat',NULL,NULL),
(13,'Kalimantan Selatan',NULL,NULL),
(14,'Kalimantan Tengah',NULL,NULL),
(15,'Kalimantan Timur',NULL,NULL),
(16,'Kalimantan Utara',NULL,NULL),
(17,'Kepulauan Riau',NULL,NULL),
(18,'Lampung',NULL,NULL),
(19,'Maluku',NULL,NULL),
(20,'Maluku Utara',NULL,NULL),
(21,'Nanggroe Aceh Darussalam (NAD)',NULL,NULL),
(22,'Nusa Tenggara Barat (NTB)',NULL,NULL),
(23,'Nusa Tenggara Timur (NTT)',NULL,NULL),
(24,'Papua',NULL,NULL),
(25,'Papua Barat',NULL,NULL),
(26,'Riau',NULL,NULL),
(27,'Sulawesi Barat',NULL,NULL),
(28,'Sulawesi Selatan',NULL,NULL),
(29,'Sulawesi Tengah',NULL,NULL),
(30,'Sulawesi Tenggara',NULL,NULL),
(31,'Sulawesi Utara',NULL,NULL),
(32,'Sumatera Barat',NULL,NULL),
(33,'Sumatera Selatan',NULL,NULL),
(34,'Sumatera Utara',NULL,NULL);

/*Table structure for table `response` */

DROP TABLE IF EXISTS `response`;

CREATE TABLE `response` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int(10) unsigned NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `review_id` (`review_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `response_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `product_revie` (`id`),
  CONSTRAINT `response_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `response` */

/*Table structure for table `transaction_details` */

DROP TABLE IF EXISTS `transaction_details`;

CREATE TABLE `transaction_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(3) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_transaction` (`transaction_id`),
  KEY `id_product` (`product_id`),
  CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  CONSTRAINT `transaction_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

insert  into `transaction_details`(`id`,`transaction_id`,`product_id`,`qty`,`discount`,`selling_price`,`created_at`,`updated_at`) values 
(1,4,6,1,NULL,3000,'2020-05-25 22:07:08','2020-05-25 22:07:08'),
(5,8,7,2,NULL,2000,'2020-05-25 23:30:57','2020-05-25 23:30:57'),
(6,11,7,1,NULL,2000,'2020-05-26 14:23:19','2020-05-26 14:23:19'),
(7,11,6,3,NULL,9000,'2020-05-26 14:23:19','2020-05-26 14:23:19'),
(8,12,7,2,NULL,2000,'2020-05-27 12:08:53','2020-05-27 12:08:53'),
(9,13,7,3,NULL,2000,'2020-05-27 12:13:59','2020-05-27 12:13:59'),
(10,14,6,1,NULL,3000,'2020-05-27 12:16:27','2020-05-27 12:16:27'),
(11,15,6,2,NULL,6000,'2020-05-27 12:27:29','2020-05-27 12:27:29'),
(12,15,6,3,NULL,9000,'2020-05-27 12:27:30','2020-05-27 12:27:30');

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timeout` datetime DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(12,2) NOT NULL,
  `shipping_cost` double(12,2) NOT NULL,
  `sub_total` double(12,2) NOT NULL,
  `user_id` int(20) unsigned NOT NULL,
  `courier_id` int(10) unsigned NOT NULL,
  `proof_of_payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('unverified','verified','delivered','success','expired','canceled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courier_id` (`courier_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`timeout`,`address`,`regency`,`province`,`total`,`shipping_cost`,`sub_total`,`user_id`,`courier_id`,`proof_of_payment`,`created_at`,`updated_at`,`status`) values 
(4,NULL,'jalan jalan','denpasar','bali',3000.00,10000.00,13000.00,5,2,'buchik_1590448820_2.png','2020-05-25 22:07:08','2020-05-25 23:20:20','verified'),
(8,NULL,'jalan keren','denpasar','bali',4000.00,10000.00,14000.00,5,2,NULL,'2020-05-25 23:30:56','2020-05-25 23:30:56','unverified'),
(11,NULL,'jalan waduh','denpasar','bal',11000.00,10000.00,21000.00,5,2,'buchik_1590503217_2.png','2020-05-26 14:23:19','2020-05-26 14:26:57','verified'),
(12,NULL,'Jalan Kulon Progo','210','5',4000.00,26000.00,30000.00,3,2,'dadank_1590581347_2.png','2020-05-27 12:08:52','2020-05-27 12:09:07','verified'),
(13,NULL,'Jalan WhichIs','{\"city_name\":\"Jakarta Selatan\"}','{\"province\":\"DKI Jakarta\"}',6000.00,22000.00,28000.00,3,2,'dadank_1590581652_computer.jpg','2020-05-27 12:13:59','2020-05-27 12:14:12','verified'),
(14,NULL,'Jalan Mamank','Bandung','Jawa Barat',3000.00,25000.00,28000.00,3,2,'dadank_1590581795_95f6edfb66ef42d774a5a34581f19052.jpg','2020-05-27 12:16:27','2020-05-27 12:16:35','verified'),
(15,NULL,'Jalan Bapak','Banjarmasin','Kalimantan Selatan',15000.00,40000.00,55000.00,3,2,'dadank_1590582457_index.jpg','2020-05-27 12:27:29','2020-05-27 12:27:37','verified');

/*Table structure for table `user_notifications` */

DROP TABLE IF EXISTS `user_notifications`;

CREATE TABLE `user_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(11) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifiable_id` (`notifiable_id`),
  CONSTRAINT `user_notifications_ibfk_1` FOREIGN KEY (`notifiable_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_notifications` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1:aktif; 0:pasif',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'mikael','mikael@yahoo.com',NULL,NULL,NULL,'$2y$10$RLoSZm56O7Bi8NS/bump5OPkZ3nFpOioy/pUQi7yH7Cis4vNOl47q',NULL,'2020-03-15 09:28:04','2020-03-15 09:28:04'),
(2,'wayan','wayanadi@yahoo.com',NULL,NULL,NULL,'$2y$10$GAkz3uM15kV4vkxHp.xFOuZYJfoLz/8Dq91Tv2aNv/OtHNeZymLVy',NULL,'2020-03-15 10:12:53','2020-03-15 10:12:53'),
(3,'dadank','dadank@yahoo.com','wireshark.jpg','1',NULL,'$2y$10$27Dxxl7GKHV4ypRStyS1XuVw0w/1uveyUJU437BVKSBJsYrSHIK.W',NULL,'2020-03-28 05:57:11','2020-03-28 05:57:11'),
(4,'mimic','mimic@yahoo.com','donald.png','1',NULL,'$2y$10$AuykyOWEiHxQ6vMKs65VD.QplUgR2gW50NQURRE58dmQ9UjnnZz96',NULL,'2020-04-01 16:10:52','2020-04-01 16:10:52'),
(5,'buchik','buchik@yahoo.com','spot.jpeg_buchik_1585811448','1',NULL,'$2y$10$k7pZa6u8uY5KTkZqY8/2POT0VHAW77Z2Y7diQHw046WX9ns9Lj6Sq',NULL,'2020-04-02 07:10:51','2020-04-02 07:10:51');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
