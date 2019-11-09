# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: haversine
# Generation Time: 2019-11-08 15:29:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table attraction_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attraction_types`;

CREATE TABLE `attraction_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `attraction_types` WRITE;
/*!40000 ALTER TABLE `attraction_types` DISABLE KEYS */;

INSERT INTO `attraction_types` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Pantai',NULL,NULL),
	(2,'Museum',NULL,NULL),
	(3,'Desa Wisata',NULL,NULL),
	(4,'Sendang/Petilasan',NULL,NULL),
	(5,'Lainnya',NULL,NULL);

/*!40000 ALTER TABLE `attraction_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table attractions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attractions`;

CREATE TABLE `attractions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_type_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attractions_attraction_type_id_foreign` (`attraction_type_id`),
  KEY `attractions_city_id_foreign` (`city_id`),
  CONSTRAINT `attractions_attraction_type_id_foreign` FOREIGN KEY (`attraction_type_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attractions_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `attractions` WRITE;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;

INSERT INTO `attractions` (`id`, `attraction_type_id`, `name`, `address`, `city_id`, `phone_number`, `description`, `longitude`, `latitude`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,'Pantai Jungwook','Gunu Pendowo Jepitu Girisubo Gunung Kidul',227,'081329988000','Incidunt minima velit perspiciatis occaecati rerum voluptate rerum magnam. Nulla sint ratione nihil. Voluptates illum voluptatem quos dolorum enim harum.','110.41445','-8.19754','2019-05-21 14:01:48','2019-06-14 14:01:48',NULL),
	(2,1,'Pantai Parangtritis Yogyakarta','Jalan Parangtritis km 28 Yogyakarta 55188',227,'081329988000','In corrupti rerum mollitia fuga eius nemo. In doloribus molestias natus corporis ut quia. Impedit et non distinctio nesciunt magni. Et consectetur itaque sunt qui.','110.321277','-8.021805','2019-05-02 14:01:48','2019-06-14 14:01:48',NULL),
	(3,1,'Pantai Depok','Depok Bantul',227,'081329988000','Non dicta mollitia dolore tenetur quidem aut soluta. Qui officiis qui error. Molestiae repudiandae exercitationem qui sed sed.','110.299927','-8.015688','2019-06-11 14:01:48','2019-06-14 14:01:48',NULL),
	(4,1,'Pantai Drini','Tepus Gunungkidul',227,'081329988000','Quasi mollitia minus voluptas blanditiis laborum perferendis et eum. Rem rerum officiis consequuntur quia debitis sit beatae. Error incidunt perspiciatis harum placeat omnis et ea.','110.597316�','-8.147583','2019-03-17 14:01:48','2019-06-14 14:01:48',NULL),
	(5,1,'Pantai Parangendog','Parang Reja Girijati Purwosari Kabupaten Gunung Kidul',227,'081329988000','Enim nobis et ipsam iure rerum et. Error ut necessitatibus et neque et. Laborum modi beatae fugit molestiae quae autem. Rerum quia consequatur consequatur et velit.','110.344419','-8.030056','2019-04-10 14:01:48','2019-06-14 14:01:48',NULL),
	(6,1,'Pantai Parangkusumo','Parangkusumo Parangtritis Bantul',227,'081329988000','Non tempore aut reprehenderit et corporis velit occaecati sint. Autem eum rerum tenetur error voluptatem. Voluptatem assumenda libero et animi rerum ea.','110.328259','-8.022609','2019-05-03 14:01:48','2019-06-14 14:01:48',NULL),
	(7,1,'Pantai Samas','Bantul Gunungkidul',227,'081329988000','Sunt voluptas dolorum perspiciatis sint magnam eum. Nihil voluptatem atque aliquid omnis ut molestiae nisi. Praesentium officiis consequatur aut ut. Nulla omnis maiores rerum vel.','110.264849','-8.005926','2019-01-01 14:01:48','2019-06-14 14:01:48',NULL),
	(8,1,'Pantai Trisik','Kulon Progo',227,'081329988000','Rerum sunt odit illo necessitatibus asperiores. Deleniti quia est neque. Et distinctio modi voluptatem dolores.','110.192695','-7.975377','2019-01-24 14:01:48','2019-06-14 14:01:48',NULL),
	(9,1,'Petilasan Ambarketawang','Kulon Progo',227,'081329988000','Deserunt voluptates repellendus sunt qui. Odit iusto animi cumque. Eos omnis qui et et explicabo. Et sequi nihil et ut enim accusantium.','110.309573','-7.800533','2019-05-30 14:01:48','2019-06-14 14:01:48',NULL),
	(10,4,'Salak Turi','Kulon Progo',227,'081329988000','Vel vero laudantium et placeat. Vel neque cumque dolor blanditiis neque voluptate. Iure sed dolorum doloremque non non facilis.','110.357894','-7.650463','2019-01-17 14:01:48','2019-06-14 14:01:48',NULL),
	(11,4,'Sendang Kasihan','Jl sendang kasihan Kasihan Tamantirto Bantul',227,'081329988000','Laborum voluptas non voluptatum dolor porro blanditiis. Cupiditate earum inventore totam enim et.','110.32911','-7.826082','2019-01-16 14:01:48','2019-06-14 14:01:48',NULL),
	(12,4,'Situs Payak','Jl Wonosari Bantaran Wetan Srimulyo Piyungan Bantul�',227,'081329988000','Ipsa saepe aperiam nisi nam mollitia at. Aut tempore praesentium ut nobis praesentium rerum similique. Voluptas alias et enim possimus.','110.45771','-7.83334','2019-03-01 14:01:48','2019-06-14 14:01:48',NULL),
	(13,4,'Situs Watugudig','Jobohan Bokoharjo Prambanan Kabupaten Sleman',227,'081329988000','Maxime iure quo alias non minima aut qui. Consequatur in optio molestias corrupti molestiae eaque nam. Numquam veniam earum debitis consequatur fugit.','110.48075','-7.775','2019-02-09 14:01:48','2019-06-14 14:01:48',NULL),
	(14,2,'Tamansari','Jl Tamanan Patehan Kraton',227,'081329988000','Et ea et hic distinctio quo assumenda ut. Hic magnam corporis maxime eos qui. Occaecati assumenda corporis ipsam quia qui numquam blanditiis quas. Delectus minus molestiae repellat culpa.','110.35939','-7.80994','2019-02-24 14:01:48','2019-06-14 14:01:48',NULL),
	(15,1,'Pantai Indrayanti','Tepus Gunungkidul',227,'081329988000','Deserunt laudantium et optio autem ab. Tempore ea quod dolor. Recusandae dolore et sit aut vel aut ut doloremque. Iste voluptatem quasi odit et in cupiditate.','110.36441','-8.9122','2019-01-23 14:01:48','2019-06-14 14:01:48',NULL),
	(16,1,'Pantai Sepanjang','Desa Kemadang Tanjungsari Gunungkidul',227,'081329988000','Reprehenderit ut et iusto omnis quis. Rem ab dolor aut eaque aut autem. Nesciunt vitae qui distinctio doloribus ad sed. Qui beatae cupiditate qui consequatur officia.','110.33113','-8.802','2019-05-21 14:01:48','2019-06-14 14:01:48',NULL),
	(17,1,'Pantai Sadeng','Girisubo Gunungkidul',227,'081329988000','Ut recusandae impedit facilis mollitia qui similique enim. At dolorem ab eaque ut ut. Ut ab sequi consequatur excepturi praesentium. Delectus quam quibusdam sapiente sint et consequatur.','110.47531','-8.11266','2019-06-06 14:01:48','2019-06-14 14:01:48',NULL),
	(18,1,'Pantai Wediombo','Jepitu Girisubo Gunungkidul',227,'081329988000','Deleniti odit non voluptatem laboriosam aliquid. At maxime beatae consequatur atque. Voluptas voluptatem est repellendus sequi. Sit possimus consequatur ullam sint aliquam ipsam.','110.42314','-8.1138','2018-12-13 14:01:48','2019-06-14 14:01:48',NULL),
	(19,1,'Pantai Sundak','Desa Sidoharjo Tepus Gunungkidul',227,'081329988000','Modi unde voluptate eos. Ut quia ut eveniet fuga. Minus atque quisquam minima accusamus veritatis. Et et repudiandae vero fuga odit ipsam. Quae ipsum error expedita.','110.36273','-8.8478','2019-06-13 14:01:48','2019-06-14 14:01:48',NULL),
	(20,1,'Pantai Ngobaran','Desa Kanigoro Saptosari',227,'81329988000','Necessitatibus nisi sed impedit repellendus quia. Asperiores eum deserunt quia reprehenderit. Culpa officia magnam quod ipsum in et.','110.30204','-8.7106','2019-02-11 14:01:48','2019-06-14 14:01:48',NULL),
	(21,1,'Pantai Glagah','Kulon Progo',227,'81329988000','Autem ut et et vel veritatis eaque. Eos exercitationem perferendis ab minus voluptatem. Dolorem non nihil illo numquam dolorem. Sequi sint hic illo aut dolores voluptas distinctio.','110.3595','-7.54458','2019-05-23 14:01:48','2019-06-14 14:01:48',NULL),
	(22,1,'Pantai Congot','Kulon Progo',227,'81329988000','Vel eveniet voluptatem omnis ex quo. Reiciendis quia et commodi voluptas molestias mollitia eveniet. Provident repudiandae minus deleniti eaque natus nostrum sit.','110.234','-7.53589','2019-05-24 14:01:48','2019-06-14 14:01:48',NULL),
	(23,1,'Pantai Ngrenehan','Desa Kanigoro Saptosari',227,'81329988000','Dolorem odio non nisi aut. Ut adipisci commodi fuga deleniti at placeat. Dolorem illum et et omnis blanditiis rem sapiente.','110.3048','-8.7192','2019-01-21 14:01:48','2019-06-14 14:01:48',NULL),
	(24,1,'Pantai Siung','�Tepus Gunungkidul',227,'81329988000','Ut harum voluptatem consequatur et aut. At ut tempora aliquam similique. Velit possimus commodi velit optio delectus sequi. Culpa fugiat rem vero repudiandae.','110.40585','-8.10547','2019-02-07 14:01:48','2019-06-14 14:01:48',NULL),
	(25,1,'Pantai Trisik','kulon Progo',227,'81329988000','Earum fugit voluptatum in. Ut numquam beatae impedit ut et tempora consectetur sed. Et ipsum consequatur ipsum veritatis aliquid. Quo reiciendis quis nam. Quaerat et omnis ut. Quia et minus neque.','110.11371','-7.58262','2019-05-18 14:01:48','2019-06-14 14:01:48',NULL),
	(26,1,'Pantai Kuwaru','Desa Poncosari Kecamatan Srandakan Bantul',227,'81329988000','Dolores et vel eveniet dolores sit consequatur. Dicta in qui cum tenetur modi veniam error. Corporis beatae adipisci quo. Suscipit sit quod enim sint accusantium.','110.1343','-7.5923','2019-01-14 14:01:48','2019-06-14 14:01:48',NULL),
	(27,1,'Pantai Goa Cemara','Patihan Gadingsari Bantul',227,'81329988000','Quam corporis deleniti explicabo fuga eos non. Quia facilis tempore provident ipsum possimus. Et libero aut animi veniam.','110.1452','-7.5946','2019-04-13 14:01:48','2019-06-14 14:01:48',NULL),
	(28,1,'Pantai Gesing','Patihan Gadingsari Bantul',227,'81329988000','Enim tenetur ipsam esse impedit rerum consectetur. Et sed vel autem et distinctio. Voluptatem veniam et minima tempore similique. Voluptatibus veniam non veniam.','110.285','-8.628','2018-11-30 14:01:48','2019-06-14 14:01:48',NULL),
	(29,1,'Pantai Nguyahan','Desa Kanigoro Saptosari',227,'81329988000','Sunt mollitia quam fugiat molestiae. Rem exercitationem sint natus quae deserunt mollitia reprehenderit molestiae. Quae veniam neque ipsa.','110.3011','-8.77','2019-02-26 14:01:48','2019-06-14 14:01:48',NULL),
	(30,1,'Pantai Baron','Tepus Gunungkidul',227,'81329988000','Error deserunt qui aut hic rem. Laborum eum esse cum molestias. Cumque aliquid id provident asperiores illum. Nihil dolore beatae velit voluptatibus voluptas est.','110.3252','-8.754','2019-01-05 14:01:48','2019-06-14 14:01:48',NULL),
	(31,1,'Pantai Kukup','Tepus Gunungkidul',227,'81329988000','Corporis sint et architecto quis. Vel qui minima quos eum. Et hic quis qui ipsam doloribus repellat. Harum fugiat dolorum debitis at a asperiores.','110.3315','-8.81','2018-12-28 14:01:48','2019-06-14 14:01:48',NULL),
	(32,1,'Pantai Watu Kodok','Tepus Gunungkidul',227,'81329988000','Dolore itaque odio molestiae itaque dolor quia. Voluptatibus quae qui hic. Neque et quis eveniet voluptatibus incidunt et eveniet. Ut quo ut optio ipsa aut.','110.3427','-8.812','2018-12-01 14:01:48','2019-06-14 14:01:48',NULL),
	(33,1,'Pantai Sarangan','Tepus Gunungkidul',227,'81329988000','Quis saepe praesentium commodi molestias culpa eum. Eum sed quod et aut voluptatem nostrum.','110.3549','-8.85','2019-01-21 14:01:48','2019-06-14 14:01:48',NULL),
	(34,1,'Pantai Krakal','Tepus Gunungkidul',227,'81329988000','Ut dolor facere est animi. Quaerat reprehenderit et eligendi quasi nostrum distinctio. Quia ut aperiam fuga culpa itaque. Ut quis dignissimos illum omnis corrupti sunt sapiente.','110.3559','-8.843','2019-02-03 14:01:48','2019-06-14 14:01:48',NULL),
	(35,1,'Pantai Sadranan','Tepus Gunungkidul',227,'81329988000','Nihil sit itaque voluptatibus. Occaecati consectetur et natus ut aut. Nihil facere vitae iure officiis. Eveniet nemo fugiat quo inventore.','110.3616','-8.844','2019-01-05 14:01:48','2019-06-14 14:01:48',NULL),
	(36,1,'Pantai Ngandong','Tepus Gunungkidul',227,'81329988000','Qui quod tempora ducimus minus. Aut iste libero rerum et sed. Expedita et molestiae qui consequatur.','110.362','-8.847','2018-12-12 14:01:48','2019-06-14 14:01:48',NULL),
	(37,1,'Pantai Sundak','Tepus Gunungkidul',227,'81329988000','Soluta quam non molestias dolor. Nesciunt esse ex laboriosam vero consequatur iste. Velit veniam voluptatum et. Sed qui odit voluptatem accusantium sit officiis.','110.3628','-8.849','2018-12-31 14:01:48','2019-06-14 14:01:48',NULL),
	(38,1,'Pantai Somandeng','Tepus Gunungkidul',227,'81329988000','Pariatur dolores occaecati aut quis quis quis. Dolorum similique sint architecto similique et hic voluptas molestias. Magni enim voluptatibus autem maxime soluta. Saepe et laboriosam explicabo ut ea.','110.3635','-8.857','2019-02-27 14:01:48','2019-06-14 14:01:48',NULL),
	(39,1,'Pantai Watulawang','Tepus Gunungkidul',227,'81329988000','Vel et reprehenderit in iste. Reiciendis aut illum voluptatem excepturi accusamus.','110.376','-8.914','2018-12-11 14:01:48','2019-06-14 14:01:48',NULL),
	(40,1,'Pantai Pok Tunggal','Tepus Gunungkidul',227,'81329988000','Quo dolores voluptate delectus corporis. Aliquid ut dolore doloribus. Omnis voluptatum quis aut distinctio aspernatur vero magni.','110.3717','-8.92','2019-03-24 14:01:48','2019-06-14 14:01:48',NULL),
	(41,1,'Pantai Seruni','Tepus Gunungkidul',227,'81329988000','Dolorem aut error vel aut esse numquam nam. Laboriosam porro sed sunt. Est nemo deserunt qui voluptatum alias. Dolores officia vel inventore inventore.','110.3755','-8.937','2019-05-23 14:01:48','2019-06-14 14:01:48',NULL),
	(42,1,'Pantai Ngetun','Tepus Gunungkidul',227,'81329988000','Et optio et qui ullam magni aspernatur illum. Omnis inventore itaque nostrum voluptatem. Laudantium in excepturi nesciunt dolorem blanditiis. Libero dolores ut eos illum dicta error.','110.398','-8.1014','2019-04-29 14:01:48','2019-06-14 14:01:48',NULL),
	(43,1,'Pantai Timang','Tepus Gunungkidul',227,'81329988000','Quaerat et eos sunt nisi. Neque vel velit sit inventore molestiae. Dolor aspernatur quia sapiente laudantium. Id facilis doloremque maxime facere. Nihil quis odit qui similique.','110.3946','-8.1033','2019-03-22 14:01:48','2019-06-14 14:01:48',NULL),
	(44,1,'Pantai Jogan','Tepus Gunungkidul',227,'81329988000','Est et quibusdam ut perspiciatis ipsum in doloremque. Quo ut velit sapiente beatae dolorem vero. Est sunt qui dolor adipisci et omnis.','110.4033','-8.1049','2018-11-27 14:01:48','2019-06-14 14:01:48',NULL),
	(45,1,'Pantai Nglambor','Tepus Gunungkidul',227,'81329988000','Sed quasi est dolores aut. Quia numquam et nihil eius. Consequuntur voluptas numquam quisquam et explicabo natus.','110.4043','-8.1058','2019-04-26 14:01:48','2019-06-14 14:01:48',NULL),
	(46,1,'Pantai Siung','Tepus Gunungkidul',227,'81329988000','Assumenda provident debitis est aut vel alias. Eum qui at ipsam voluptate dignissimos quia dolor aut. Sequi et expedita ut. In voluptatem maiores voluptas libero dolore qui voluptatem.','110.4058','-8.1055','2019-06-11 14:01:48','2019-06-14 14:01:48',NULL),
	(47,1,'Pantai Sadeng','Tepus Gunungkidul',227,'81329988000','Itaque sit odio totam sint odio est. Dolorem saepe ipsum et pariatur. Porro dignissimos enim pariatur ipsam modi voluptatum deserunt. Sed labore doloremque ullam amet provident.','110.4745','-8.1131','2018-11-26 14:01:48','2019-06-14 14:01:48',NULL),
	(48,1,'Pantai Ngusalan','Tepus Gunungkidul',227,'81329988000','Quia esse distinctio sint voluptates voluptatem. Commodi qui enim explicabo vel laudantium. Aliquam voluptatem est ut exercitationem in veritatis. Et maiores modi eveniet velit.','110.4253','-8.115','2019-04-17 14:01:48','2019-06-14 14:01:48',NULL),
	(49,1,'Pantai Greweng','Tepus Gunungkidul',227,'81329988000','Quam aperiam possimus assumenda quae. Quo odit iure aperiam. Ipsam deleniti aperiam ut eos magnam.','110.437','-8.1152','2019-01-16 14:01:48','2019-06-14 14:01:48',NULL),
	(50,1,'Pantai Sedahan','Tepus Gunungkidul',227,'81329988000','Eum qui voluptatem dolor esse voluptas. Voluptatem non expedita voluptas. Inventore est incidunt sint error dolorem dolore ut.','110.4315','-8.1152','2019-03-08 14:01:48','2019-06-14 14:01:48',NULL),
	(51,2,'Museum Monumen Jogja Kembali','Jl. Ringroad Utara No 15 Sariharjo Ngaglik Kabupaten Sleman',227,'81329988000','Voluptatem iusto laboriosam sed officia voluptatem sunt. Aut distinctio quisquam id vel. Quia eaque natus minima hic eos possimus et.','110.369628','-7.749271','2019-03-15 14:01:48','2019-06-14 14:01:48',NULL),
	(52,2,'Museum Benteng Vredeburg','Jl. Margo Mulyo No 6 Ngupasan Gondomanan�',227,'81329988000','Est quaerat et dolor et qui corrupti ipsa. Corrupti itaque non eveniet dolor voluptatem dolores mollitia. Et illo eius adipisci dolore alias. Esse dolores voluptatem ea nulla eius.','110.366257','-7.7984','2019-01-19 14:01:48','2019-06-14 14:01:48',NULL),
	(53,2,'Museum SonoBudoyo','Ndalem Condrokiranan Wijilan',227,'81329988000','Numquam quis dolorem et qui. Et nisi commodi asperiores consectetur dolorem nostrum laborum. Vero odit id aliquid.','110.364041','-7.802152','2019-03-19 14:01:48','2019-06-14 14:01:48',NULL),
	(54,2,'Museum TNI AU Dirgantara','Karang Janbe Banguntapan Bantul Regency',227,'81329988000','Minus ea et dolor in. Eaque tenetur distinctio debitis aut non. Voluptatem quia accusamus accusantium sed sunt aperiam omnis quis. Tempora suscipit officia et rerum possimus.','110.41568','-7.789406','2019-02-22 14:01:48','2019-06-14 14:01:48',NULL),
	(55,2,'Museum Bahari','Jalan R. E. Martadinata No 69 Wirobrajan Bantul',227,'81329988000','Aut quaerat repellendus non voluptatem qui. Nobis laboriosam vero eum doloremque. Voluptas iste corporis repellendus corporis. Rem at in totam tenetur earum.','110.34921','-7.800793','2019-02-14 14:01:48','2019-06-14 14:01:48',NULL),
	(56,2,'Museum Tembi','Jl. Parangtritis No.Km 8.4, Tembi, Timbulharjo, Sewon, Bantul, Daerah Istimewa Yogyakarta 55186',227,'81329988000','Magnam consequatur nobis sed nam corrupti. Nihil facere quo sapiente dolores magnam ut repellendus. Qui laboriosam vitae praesentium dolorem velit possimus aut.','110.356227','-7.869742','2019-01-19 14:01:48','2019-06-14 14:01:48',NULL),
	(57,2,'Museum Kebun Raya Gembiraloka','Jl Kebun Raya No 2 Rejowinangun Kotagede',227,'81329988000','Non rerum veritatis quia veniam. Earum quibusdam commodi quo. Expedita iste molestiae deserunt ea ipsa unde. Voluptatum cum dicta excepturi reiciendis quis minus ut.','110.398059','-7.804975','2019-04-05 14:01:48','2019-06-14 14:01:48',NULL),
	(58,3,'Desa Wisata Sambi','Jl Kaliurang KM 19 Dusun Sambi Desa Pakembinangun Kec Pakem Purwodadi Pakembinangun Sleman',227,'81329988000','Sunt aut debitis est voluptates. Consequatur rerum expedita voluptas possimus doloremque beatae. Natus quod qui illum sed nemo corrupti et. Ratione voluptatibus fugiat placeat.','110.426734','-7.647466','2019-01-11 14:01:48','2019-06-14 14:01:48',NULL),
	(59,3,'Desa Wisata Tanjung','Desa Tanjung Ponason Donoharjo Ngaglik Kabupaten Sleman',227,'81329988000','Accusamus earum dolor minima placeat omnis et maxime. Est vel dolor aut dolores id dolorem. Laudantium vero ipsam debitis et molestiae laudantium. Quasi sit sequi ducimus ut qui cupiditate.','110.379419','-7.70401','2019-03-28 14:01:48','2019-06-14 14:01:48',NULL),
	(60,3,'Desa Wisata Pulesari','Pulesari Wono Kerto Turi Kabupaten Sleman',227,'81329988000','Non qui ab officiis corporis. Fugiat dolorum corporis sint. Ratione sequi et dicta culpa facilis dolores.','110.37173','-7.625519','2019-02-08 14:01:48','2019-06-14 14:01:48',NULL),
	(61,3,'Desa Wisata Banjaroya','Jl Kalibawang-Sendang Sono Tonogoro Banjaroyo Kalibawang Kabupaten Kulon Progo',227,'81329988000','Nihil libero sit quia excepturi. Aliquam voluptatem rem molestias quisquam. Totam magni dolor hic explicabo repellat assumenda molestiae. Earum nemo repudiandae qui corporis.','110.235468','-7.655722','2018-12-27 14:01:48','2019-06-14 14:01:48',NULL),
	(62,3,'Desa Wisata Kaki Langit','Mangunan Dlingo Bantul',227,'81329988000','Voluptatem quo at esse quod iusto. Repudiandae sed nihil fuga iusto. Dolor perferendis explicabo et. Id eum corrupti minus modi.','110.421938','-7.931397','2019-03-06 14:01:48','2019-06-14 14:01:48',NULL),
	(63,3,'Desa Wisata Kebonagung','Dusun Kebonagung Kebon Agung Imogiri Bantul',227,'81329988000','Quia est labore qui eius dicta aut beatae. Et nostrum iusto omnis delectus atque nisi qui sit. Tenetur quis voluptatem in quae. Neque sint saepe id quidem aperiam temporibus.','110.371252','-7.930205','2019-06-03 14:01:48','2019-06-14 14:01:48',NULL),
	(64,3,'Desa Wisata Kasongan','Jl Kasongan No 3 Kajen Bangunjiwo Kasihan Bantul',227,'81329988000','Libero voluptate totam quo et. Aliquam maxime asperiores soluta ut. Sed repudiandae cum accusamus minus in sint soluta. Quo esse aut amet culpa quo deserunt.','110.337909','-7.845122','2019-03-26 14:01:48','2019-06-14 14:01:48',NULL),
	(65,3,'Desa Wisata Batik Tulis Giriloyo','Jl Imogiri Timur Km 14 Karang Kulon Wukirsari Imogiri Bantul',227,'81329988000','Voluptatem dolores libero mollitia omnis. Explicabo rerum aut debitis dolore quibusdam voluptatem aut id. Voluptas aut cupiditate dolor illo provident repudiandae.','110.398445','-7.915584','2018-12-26 14:01:48','2019-06-14 14:01:48',NULL),
	(66,3,'Desa Wisata Gamplong','Sumberrahayu Moyudan Dukuh Sumberrahayu Moyudan',227,'81329988000','Ullam commodi facilis dolores saepe ut facere sunt. Voluptatem exercitationem asperiores vel consequatur repellendus ex. Expedita nobis occaecati error magni.','110.2375','-7.805194','2018-12-29 14:01:48','2019-06-14 14:01:48',NULL),
	(67,3,'Desa Wisata Kelor','Kelor Bangun Kerto Turi Kabupaten Sleman',227,'81329988000','Deleniti quasi eos voluptatem voluptates quidem. Consequuntur consequatur et vero esse sunt. Maiores sed ipsa dolorem aperiam. Consequatur aut non laboriosam saepe porro qui repellendus.','110.362215','-7.640696','2019-03-28 14:01:48','2019-06-14 14:01:48',NULL),
	(68,5,'Malioboro Yogyakarta','Jl Malioboro No 61-65 Sosromenduran Gedong Tengen',227,'81329988000','Magnam minus qui enim quam est eos. Sit ullam velit repudiandae recusandae laborum aut iure fugiat. Voluptatibus nisi quaerat sit. Deleniti doloribus dolores dolore praesentium dolores nostrum.','110.365647','-7.793902','2019-03-04 14:01:48','2019-06-14 14:01:48',NULL),
	(69,5,'Titik Nol Yogyakarta','Jl Panembahan Senopati Prawirodirjan Gondomanan',227,'81329988000','Sunt aut eos et aut accusamus. Rerum asperiores molestiae ad. Ullam qui voluptatem vitae et. Et dolorem provident consequatur rem omnis et sint.','110.36569','-7.800056','2019-01-23 14:01:48','2019-06-14 14:01:48',NULL);

/*!40000 ALTER TABLE `attractions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;

INSERT INTO `cities` (`id`, `province_id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,1,'KABUPATEN SIMEULUE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(2,1,'KABUPATEN ACEH SINGKIL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(3,1,'KABUPATEN ACEH SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(4,1,'KABUPATEN ACEH TENGGARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(5,1,'KABUPATEN ACEH TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(6,1,'KABUPATEN ACEH TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(7,1,'KABUPATEN ACEH BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(8,1,'KABUPATEN ACEH BESAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(9,1,'KABUPATEN PIDIE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(10,1,'KABUPATEN BIREUEN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(11,1,'KABUPATEN ACEH UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(12,1,'KABUPATEN ACEH BARAT DAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(13,1,'KABUPATEN GAYO LUES','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(14,1,'KABUPATEN ACEH TAMIANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(15,1,'KABUPATEN NAGAN RAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(16,1,'KABUPATEN ACEH JAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(17,1,'KABUPATEN BENER MERIAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(18,1,'KABUPATEN PIDIE JAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(19,1,'KOTA BANDA ACEH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(20,1,'KOTA SABANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(21,1,'KOTA LANGSA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(22,1,'KOTA LHOKSEUMAWE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(23,1,'KOTA SUBULUSSALAM','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(24,2,'KABUPATEN NIAS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(25,2,'KABUPATEN MANDAILING NATAL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(26,2,'KABUPATEN TAPANULI SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(27,2,'KABUPATEN TAPANULI TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(28,2,'KABUPATEN TAPANULI UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(29,2,'KABUPATEN TOBA SAMOSIR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(30,2,'KABUPATEN LABUHAN BATU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(31,2,'KABUPATEN ASAHAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(32,2,'KABUPATEN SIMALUNGUN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(33,2,'KABUPATEN DAIRI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(34,2,'KABUPATEN KARO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(35,2,'KABUPATEN DELI SERDANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(36,2,'KABUPATEN LANGKAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(37,2,'KABUPATEN NIAS SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(38,2,'KABUPATEN HUMBANG HASUNDUTAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(39,2,'KABUPATEN PAKPAK BHARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(40,2,'KABUPATEN SAMOSIR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(41,2,'KABUPATEN SERDANG BEDAGAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(42,2,'KABUPATEN BATU BARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(43,2,'KABUPATEN PADANG LAWAS UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(44,2,'KABUPATEN PADANG LAWAS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(45,2,'KABUPATEN LABUHAN BATU SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(46,2,'KABUPATEN LABUHAN BATU UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(47,2,'KABUPATEN NIAS UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(48,2,'KABUPATEN NIAS BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(49,2,'KOTA SIBOLGA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(50,2,'KOTA TANJUNG BALAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(51,2,'KOTA PEMATANG SIANTAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(52,2,'KOTA TEBING TINGGI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(53,2,'KOTA MEDAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(54,2,'KOTA BINJAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(55,2,'KOTA PADANGSIDIMPUAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(56,2,'KOTA GUNUNGSITOLI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(57,3,'KABUPATEN KEPULAUAN MENTAWAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(58,3,'KABUPATEN PESISIR SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(59,3,'KABUPATEN SOLOK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(60,3,'KABUPATEN SIJUNJUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(61,3,'KABUPATEN TANAH DATAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(62,3,'KABUPATEN PADANG PARIAMAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(63,3,'KABUPATEN AGAM','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(64,3,'KABUPATEN LIMA PULUH KOTA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(65,3,'KABUPATEN PASAMAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(66,3,'KABUPATEN SOLOK SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(67,3,'KABUPATEN DHARMASRAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(68,3,'KABUPATEN PASAMAN BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(69,3,'KOTA PADANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(70,3,'KOTA SOLOK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(71,3,'KOTA SAWAH LUNTO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(72,3,'KOTA PADANG PANJANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(73,3,'KOTA BUKITTINGGI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(74,3,'KOTA PAYAKUMBUH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(75,3,'KOTA PARIAMAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(76,4,'KABUPATEN KUANTAN SINGINGI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(77,4,'KABUPATEN INDRAGIRI HULU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(78,4,'KABUPATEN INDRAGIRI HILIR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(79,4,'KABUPATEN PELALAWAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(80,4,'KABUPATEN S I A K','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(81,4,'KABUPATEN KAMPAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(82,4,'KABUPATEN ROKAN HULU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(83,4,'KABUPATEN BENGKALIS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(84,4,'KABUPATEN ROKAN HILIR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(85,4,'KABUPATEN KEPULAUAN MERANTI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(86,4,'KOTA PEKANBARU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(87,4,'KOTA D U M A I','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(88,5,'KABUPATEN KERINCI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(89,5,'KABUPATEN MERANGIN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(90,5,'KABUPATEN SAROLANGUN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(91,5,'KABUPATEN BATANG HARI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(92,5,'KABUPATEN MUARO JAMBI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(93,5,'KABUPATEN TANJUNG JABUNG TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(94,5,'KABUPATEN TANJUNG JABUNG BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(95,5,'KABUPATEN TEBO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(96,5,'KABUPATEN BUNGO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(97,5,'KOTA JAMBI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(98,5,'KOTA SUNGAI PENUH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(99,6,'KABUPATEN OGAN KOMERING ULU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(100,6,'KABUPATEN OGAN KOMERING ILIR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(101,6,'KABUPATEN MUARA ENIM','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(102,6,'KABUPATEN LAHAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(103,6,'KABUPATEN MUSI RAWAS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(104,6,'KABUPATEN MUSI BANYUASIN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(105,6,'KABUPATEN BANYU ASIN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(106,6,'KABUPATEN OGAN KOMERING ULU SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(107,6,'KABUPATEN OGAN KOMERING ULU TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(108,6,'KABUPATEN OGAN ILIR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(109,6,'KABUPATEN EMPAT LAWANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(110,6,'KABUPATEN PENUKAL ABAB LEMATANG ILIR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(111,6,'KABUPATEN MUSI RAWAS UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(112,6,'KOTA PALEMBANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(113,6,'KOTA PRABUMULIH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(114,6,'KOTA PAGAR ALAM','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(115,6,'KOTA LUBUKLINGGAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(116,7,'KABUPATEN BENGKULU SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(117,7,'KABUPATEN REJANG LEBONG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(118,7,'KABUPATEN BENGKULU UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(119,7,'KABUPATEN KAUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(120,7,'KABUPATEN SELUMA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(121,7,'KABUPATEN MUKOMUKO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(122,7,'KABUPATEN LEBONG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(123,7,'KABUPATEN KEPAHIANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(124,7,'KABUPATEN BENGKULU TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(125,7,'KOTA BENGKULU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(126,8,'KABUPATEN LAMPUNG BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(127,8,'KABUPATEN TANGGAMUS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(128,8,'KABUPATEN LAMPUNG SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(129,8,'KABUPATEN LAMPUNG TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(130,8,'KABUPATEN LAMPUNG TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(131,8,'KABUPATEN LAMPUNG UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(132,8,'KABUPATEN WAY KANAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(133,8,'KABUPATEN TULANGBAWANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(134,8,'KABUPATEN PESAWARAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(135,8,'KABUPATEN PRINGSEWU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(136,8,'KABUPATEN MESUJI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(137,8,'KABUPATEN TULANG BAWANG BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(138,8,'KABUPATEN PESISIR BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(139,8,'KOTA BANDAR LAMPUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(140,8,'KOTA METRO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(141,9,'KABUPATEN BANGKA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(142,9,'KABUPATEN BELITUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(143,9,'KABUPATEN BANGKA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(144,9,'KABUPATEN BANGKA TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(145,9,'KABUPATEN BANGKA SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(146,9,'KABUPATEN BELITUNG TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(147,9,'KOTA PANGKAL PINANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(148,10,'KABUPATEN KARIMUN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(149,10,'KABUPATEN BINTAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(150,10,'KABUPATEN NATUNA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(151,10,'KABUPATEN LINGGA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(152,10,'KABUPATEN KEPULAUAN ANAMBAS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(153,10,'KOTA B A T A M','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(154,10,'KOTA TANJUNG PINANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(155,11,'KABUPATEN KEPULAUAN SERIBU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(156,11,'KOTA JAKARTA SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(157,11,'KOTA JAKARTA TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(158,11,'KOTA JAKARTA PUSAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(159,11,'KOTA JAKARTA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(160,11,'KOTA JAKARTA UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(161,12,'KABUPATEN BOGOR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(162,12,'KABUPATEN SUKABUMI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(163,12,'KABUPATEN CIANJUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(164,12,'KABUPATEN BANDUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(165,12,'KABUPATEN GARUT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(166,12,'KABUPATEN TASIKMALAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(167,12,'KABUPATEN CIAMIS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(168,12,'KABUPATEN KUNINGAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(169,12,'KABUPATEN CIREBON','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(170,12,'KABUPATEN MAJALENGKA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(171,12,'KABUPATEN SUMEDANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(172,12,'KABUPATEN INDRAMAYU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(173,12,'KABUPATEN SUBANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(174,12,'KABUPATEN PURWAKARTA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(175,12,'KABUPATEN KARAWANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(176,12,'KABUPATEN BEKASI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(177,12,'KABUPATEN BANDUNG BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(178,12,'KABUPATEN PANGANDARAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(179,12,'KOTA BOGOR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(180,12,'KOTA SUKABUMI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(181,12,'KOTA BANDUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(182,12,'KOTA CIREBON','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(183,12,'KOTA BEKASI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(184,12,'KOTA DEPOK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(185,12,'KOTA CIMAHI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(186,12,'KOTA TASIKMALAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(187,12,'KOTA BANJAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(188,13,'KABUPATEN CILACAP','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(189,13,'KABUPATEN BANYUMAS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(190,13,'KABUPATEN PURBALINGGA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(191,13,'KABUPATEN BANJARNEGARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(192,13,'KABUPATEN KEBUMEN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(193,13,'KABUPATEN PURWOREJO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(194,13,'KABUPATEN WONOSOBO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(195,13,'KABUPATEN MAGELANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(196,13,'KABUPATEN BOYOLALI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(197,13,'KABUPATEN KLATEN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(198,13,'KABUPATEN SUKOHARJO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(199,13,'KABUPATEN WONOGIRI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(200,13,'KABUPATEN KARANGANYAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(201,13,'KABUPATEN SRAGEN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(202,13,'KABUPATEN GROBOGAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(203,13,'KABUPATEN BLORA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(204,13,'KABUPATEN REMBANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(205,13,'KABUPATEN PATI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(206,13,'KABUPATEN KUDUS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(207,13,'KABUPATEN JEPARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(208,13,'KABUPATEN DEMAK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(209,13,'KABUPATEN SEMARANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(210,13,'KABUPATEN TEMANGGUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(211,13,'KABUPATEN KENDAL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(212,13,'KABUPATEN BATANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(213,13,'KABUPATEN PEKALONGAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(214,13,'KABUPATEN PEMALANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(215,13,'KABUPATEN TEGAL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(216,13,'KABUPATEN BREBES','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(217,13,'KOTA MAGELANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(218,13,'KOTA SURAKARTA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(219,13,'KOTA SALATIGA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(220,13,'KOTA SEMARANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(221,13,'KOTA PEKALONGAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(222,13,'KOTA TEGAL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(223,14,'KABUPATEN KULON PROGO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(224,14,'KABUPATEN BANTUL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(225,14,'KABUPATEN GUNUNG KIDUL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(226,14,'KABUPATEN SLEMAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(227,14,'KOTA YOGYAKARTA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(228,15,'KABUPATEN PACITAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(229,15,'KABUPATEN PONOROGO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(230,15,'KABUPATEN TRENGGALEK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(231,15,'KABUPATEN TULUNGAGUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(232,15,'KABUPATEN BLITAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(233,15,'KABUPATEN KEDIRI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(234,15,'KABUPATEN MALANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(235,15,'KABUPATEN LUMAJANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(236,15,'KABUPATEN JEMBER','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(237,15,'KABUPATEN BANYUWANGI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(238,15,'KABUPATEN BONDOWOSO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(239,15,'KABUPATEN SITUBONDO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(240,15,'KABUPATEN PROBOLINGGO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(241,15,'KABUPATEN PASURUAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(242,15,'KABUPATEN SIDOARJO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(243,15,'KABUPATEN MOJOKERTO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(244,15,'KABUPATEN JOMBANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(245,15,'KABUPATEN NGANJUK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(246,15,'KABUPATEN MADIUN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(247,15,'KABUPATEN MAGETAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(248,15,'KABUPATEN NGAWI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(249,15,'KABUPATEN BOJONEGORO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(250,15,'KABUPATEN TUBAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(251,15,'KABUPATEN LAMONGAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(252,15,'KABUPATEN GRESIK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(253,15,'KABUPATEN BANGKALAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(254,15,'KABUPATEN SAMPANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(255,15,'KABUPATEN PAMEKASAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(256,15,'KABUPATEN SUMENEP','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(257,15,'KOTA KEDIRI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(258,15,'KOTA BLITAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(259,15,'KOTA MALANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(260,15,'KOTA PROBOLINGGO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(261,15,'KOTA PASURUAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(262,15,'KOTA MOJOKERTO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(263,15,'KOTA MADIUN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(264,15,'KOTA SURABAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(265,15,'KOTA BATU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(266,16,'KABUPATEN PANDEGLANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(267,16,'KABUPATEN LEBAK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(268,16,'KABUPATEN TANGERANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(269,16,'KABUPATEN SERANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(270,16,'KOTA TANGERANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(271,16,'KOTA CILEGON','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(272,16,'KOTA SERANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(273,16,'KOTA TANGERANG SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(274,17,'KABUPATEN JEMBRANA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(275,17,'KABUPATEN TABANAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(276,17,'KABUPATEN BADUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(277,17,'KABUPATEN GIANYAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(278,17,'KABUPATEN KLUNGKUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(279,17,'KABUPATEN BANGLI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(280,17,'KABUPATEN KARANG ASEM','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(281,17,'KABUPATEN BULELENG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(282,17,'KOTA DENPASAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(283,18,'KABUPATEN LOMBOK BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(284,18,'KABUPATEN LOMBOK TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(285,18,'KABUPATEN LOMBOK TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(286,18,'KABUPATEN SUMBAWA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(287,18,'KABUPATEN DOMPU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(288,18,'KABUPATEN BIMA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(289,18,'KABUPATEN SUMBAWA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(290,18,'KABUPATEN LOMBOK UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(291,18,'KOTA MATARAM','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(292,18,'KOTA BIMA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(293,19,'KABUPATEN SUMBA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(294,19,'KABUPATEN SUMBA TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(295,19,'KABUPATEN KUPANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(296,19,'KABUPATEN TIMOR TENGAH SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(297,19,'KABUPATEN TIMOR TENGAH UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(298,19,'KABUPATEN BELU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(299,19,'KABUPATEN ALOR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(300,19,'KABUPATEN LEMBATA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(301,19,'KABUPATEN FLORES TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(302,19,'KABUPATEN SIKKA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(303,19,'KABUPATEN ENDE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(304,19,'KABUPATEN NGADA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(305,19,'KABUPATEN MANGGARAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(306,19,'KABUPATEN ROTE NDAO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(307,19,'KABUPATEN MANGGARAI BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(308,19,'KABUPATEN SUMBA TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(309,19,'KABUPATEN SUMBA BARAT DAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(310,19,'KABUPATEN NAGEKEO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(311,19,'KABUPATEN MANGGARAI TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(312,19,'KABUPATEN SABU RAIJUA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(313,19,'KABUPATEN MALAKA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(314,19,'KOTA KUPANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(315,20,'KABUPATEN SAMBAS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(316,20,'KABUPATEN BENGKAYANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(317,20,'KABUPATEN LANDAK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(318,20,'KABUPATEN MEMPAWAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(319,20,'KABUPATEN SANGGAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(320,20,'KABUPATEN KETAPANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(321,20,'KABUPATEN SINTANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(322,20,'KABUPATEN KAPUAS HULU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(323,20,'KABUPATEN SEKADAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(324,20,'KABUPATEN MELAWI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(325,20,'KABUPATEN KAYONG UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(326,20,'KABUPATEN KUBU RAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(327,20,'KOTA PONTIANAK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(328,20,'KOTA SINGKAWANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(329,21,'KABUPATEN KOTAWARINGIN BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(330,21,'KABUPATEN KOTAWARINGIN TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(331,21,'KABUPATEN KAPUAS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(332,21,'KABUPATEN BARITO SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(333,21,'KABUPATEN BARITO UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(334,21,'KABUPATEN SUKAMARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(335,21,'KABUPATEN LAMANDAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(336,21,'KABUPATEN SERUYAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(337,21,'KABUPATEN KATINGAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(338,21,'KABUPATEN PULANG PISAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(339,21,'KABUPATEN GUNUNG MAS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(340,21,'KABUPATEN BARITO TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(341,21,'KABUPATEN MURUNG RAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(342,21,'KOTA PALANGKA RAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(343,22,'KABUPATEN TANAH LAUT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(344,22,'KABUPATEN KOTA BARU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(345,22,'KABUPATEN BANJAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(346,22,'KABUPATEN BARITO KUALA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(347,22,'KABUPATEN TAPIN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(348,22,'KABUPATEN HULU SUNGAI SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(349,22,'KABUPATEN HULU SUNGAI TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(350,22,'KABUPATEN HULU SUNGAI UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(351,22,'KABUPATEN TABALONG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(352,22,'KABUPATEN TANAH BUMBU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(353,22,'KABUPATEN BALANGAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(354,22,'KOTA BANJARMASIN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(355,22,'KOTA BANJAR BARU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(356,23,'KABUPATEN PASER','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(357,23,'KABUPATEN KUTAI BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(358,23,'KABUPATEN KUTAI KARTANEGARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(359,23,'KABUPATEN KUTAI TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(360,23,'KABUPATEN BERAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(361,23,'KABUPATEN PENAJAM PASER UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(362,23,'KABUPATEN MAHAKAM HULU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(363,23,'KOTA BALIKPAPAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(364,23,'KOTA SAMARINDA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(365,23,'KOTA BONTANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(366,24,'KABUPATEN MALINAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(367,24,'KABUPATEN BULUNGAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(368,24,'KABUPATEN TANA TIDUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(369,24,'KABUPATEN NUNUKAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(370,24,'KOTA TARAKAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(371,25,'KABUPATEN BOLAANG MONGONDOW','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(372,25,'KABUPATEN MINAHASA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(373,25,'KABUPATEN KEPULAUAN SANGIHE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(374,25,'KABUPATEN KEPULAUAN TALAUD','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(375,25,'KABUPATEN MINAHASA SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(376,25,'KABUPATEN MINAHASA UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(377,25,'KABUPATEN BOLAANG MONGONDOW UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(378,25,'KABUPATEN SIAU TAGULANDANG BIARO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(379,25,'KABUPATEN MINAHASA TENGGARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(380,25,'KABUPATEN BOLAANG MONGONDOW SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(381,25,'KABUPATEN BOLAANG MONGONDOW TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(382,25,'KOTA MANADO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(383,25,'KOTA BITUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(384,25,'KOTA TOMOHON','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(385,25,'KOTA KOTAMOBAGU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(386,26,'KABUPATEN BANGGAI KEPULAUAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(387,26,'KABUPATEN BANGGAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(388,26,'KABUPATEN MOROWALI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(389,26,'KABUPATEN POSO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(390,26,'KABUPATEN DONGGALA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(391,26,'KABUPATEN TOLI-TOLI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(392,26,'KABUPATEN BUOL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(393,26,'KABUPATEN PARIGI MOUTONG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(394,26,'KABUPATEN TOJO UNA-UNA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(395,26,'KABUPATEN SIGI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(396,26,'KABUPATEN BANGGAI LAUT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(397,26,'KABUPATEN MOROWALI UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(398,26,'KOTA PALU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(399,27,'KABUPATEN KEPULAUAN SELAYAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(400,27,'KABUPATEN BULUKUMBA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(401,27,'KABUPATEN BANTAENG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(402,27,'KABUPATEN JENEPONTO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(403,27,'KABUPATEN TAKALAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(404,27,'KABUPATEN GOWA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(405,27,'KABUPATEN SINJAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(406,27,'KABUPATEN MAROS','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(407,27,'KABUPATEN PANGKAJENE DAN KEPULAUAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(408,27,'KABUPATEN BARRU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(409,27,'KABUPATEN BONE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(410,27,'KABUPATEN SOPPENG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(411,27,'KABUPATEN WAJO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(412,27,'KABUPATEN SIDENRENG RAPPANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(413,27,'KABUPATEN PINRANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(414,27,'KABUPATEN ENREKANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(415,27,'KABUPATEN LUWU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(416,27,'KABUPATEN TANA TORAJA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(417,27,'KABUPATEN LUWU UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(418,27,'KABUPATEN LUWU TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(419,27,'KABUPATEN TORAJA UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(420,27,'KOTA MAKASSAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(421,27,'KOTA PAREPARE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(422,27,'KOTA PALOPO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(423,28,'KABUPATEN BUTON','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(424,28,'KABUPATEN MUNA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(425,28,'KABUPATEN KONAWE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(426,28,'KABUPATEN KOLAKA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(427,28,'KABUPATEN KONAWE SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(428,28,'KABUPATEN BOMBANA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(429,28,'KABUPATEN WAKATOBI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(430,28,'KABUPATEN KOLAKA UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(431,28,'KABUPATEN BUTON UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(432,28,'KABUPATEN KONAWE UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(433,28,'KABUPATEN KOLAKA TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(434,28,'KABUPATEN KONAWE KEPULAUAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(435,28,'KABUPATEN MUNA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(436,28,'KABUPATEN BUTON TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(437,28,'KABUPATEN BUTON SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(438,28,'KOTA KENDARI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(439,28,'KOTA BAUBAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(440,29,'KABUPATEN BOALEMO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(441,29,'KABUPATEN GORONTALO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(442,29,'KABUPATEN POHUWATO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(443,29,'KABUPATEN BONE BOLANGO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(444,29,'KABUPATEN GORONTALO UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(445,29,'KOTA GORONTALO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(446,30,'KABUPATEN MAJENE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(447,30,'KABUPATEN POLEWALI MANDAR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(448,30,'KABUPATEN MAMASA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(449,30,'KABUPATEN MAMUJU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(450,30,'KABUPATEN MAMUJU UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(451,30,'KABUPATEN MAMUJU TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(452,31,'KABUPATEN MALUKU TENGGARA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(453,31,'KABUPATEN MALUKU TENGGARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(454,31,'KABUPATEN MALUKU TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(455,31,'KABUPATEN BURU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(456,31,'KABUPATEN KEPULAUAN ARU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(457,31,'KABUPATEN SERAM BAGIAN BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(458,31,'KABUPATEN SERAM BAGIAN TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(459,31,'KABUPATEN MALUKU BARAT DAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(460,31,'KABUPATEN BURU SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(461,31,'KOTA AMBON','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(462,31,'KOTA TUAL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(463,32,'KABUPATEN HALMAHERA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(464,32,'KABUPATEN HALMAHERA TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(465,32,'KABUPATEN KEPULAUAN SULA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(466,32,'KABUPATEN HALMAHERA SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(467,32,'KABUPATEN HALMAHERA UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(468,32,'KABUPATEN HALMAHERA TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(469,32,'KABUPATEN PULAU MOROTAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(470,32,'KABUPATEN PULAU TALIABU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(471,32,'KOTA TERNATE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(472,32,'KOTA TIDORE KEPULAUAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(473,33,'KABUPATEN FAKFAK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(474,33,'KABUPATEN KAIMANA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(475,33,'KABUPATEN TELUK WONDAMA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(476,33,'KABUPATEN TELUK BINTUNI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(477,33,'KABUPATEN MANOKWARI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(478,33,'KABUPATEN SORONG SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(479,33,'KABUPATEN SORONG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(480,33,'KABUPATEN RAJA AMPAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(481,33,'KABUPATEN TAMBRAUW','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(482,33,'KABUPATEN MAYBRAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(483,33,'KABUPATEN MANOKWARI SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(484,33,'KABUPATEN PEGUNUNGAN ARFAK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(485,33,'KOTA SORONG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(486,34,'KABUPATEN MERAUKE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(487,34,'KABUPATEN JAYAWIJAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(488,34,'KABUPATEN JAYAPURA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(489,34,'KABUPATEN NABIRE','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(490,34,'KABUPATEN KEPULAUAN YAPEN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(491,34,'KABUPATEN BIAK NUMFOR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(492,34,'KABUPATEN PANIAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(493,34,'KABUPATEN PUNCAK JAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(494,34,'KABUPATEN MIMIKA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(495,34,'KABUPATEN BOVEN DIGOEL','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(496,34,'KABUPATEN MAPPI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(497,34,'KABUPATEN ASMAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(498,34,'KABUPATEN YAHUKIMO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(499,34,'KABUPATEN PEGUNUNGAN BINTANG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(500,34,'KABUPATEN TOLIKARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(501,34,'KABUPATEN SARMI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(502,34,'KABUPATEN KEEROM','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(503,34,'KABUPATEN WAROPEN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(504,34,'KABUPATEN SUPIORI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(505,34,'KABUPATEN MAMBERAMO RAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(506,34,'KABUPATEN NDUGA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(507,34,'KABUPATEN LANNY JAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(508,34,'KABUPATEN MAMBERAMO TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(509,34,'KABUPATEN YALIMO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(510,34,'KABUPATEN PUNCAK','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(511,34,'KABUPATEN DOGIYAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(512,34,'KABUPATEN INTAN JAYA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(513,34,'KABUPATEN DEIYAI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(514,34,'KOTA JAYAPURA','2019-06-14 14:01:47','2019-06-14 14:01:47');

/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gmaps_geocache
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gmaps_geocache`;

CREATE TABLE `gmaps_geocache` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table guestbooks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guestbooks`;

CREATE TABLE `guestbooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `guestbooks` WRITE;
/*!40000 ALTER TABLE `guestbooks` DISABLE KEYS */;

INSERT INTO `guestbooks` (`id`, `email`, `message`, `created_at`, `updated_at`)
VALUES
	(1,'admin@example.com','hi','2019-06-14 14:36:33','2019-06-14 14:36:33'),
	(2,'admin@example.com','hi','2019-06-14 14:36:53','2019-06-14 14:36:53'),
	(3,'missfitrina@gmail.com','hi','2019-06-14 14:37:14','2019-06-14 14:37:14');

/*!40000 ALTER TABLE `guestbooks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_01_31_040219_create_provinces_table',1),
	(4,'2019_01_31_040312_create_cities_table',1),
	(5,'2019_01_31_054616_create_attraction_type_table',1),
	(6,'2019_01_31_054626_create_attraction_table',1),
	(7,'2019_02_02_084940_create_pictures_table',1),
	(8,'2019_02_06_040222_create_settings_table',1),
	(9,'2019_02_21_075248_create_gmaps_geocache_table',1),
	(10,'2019_06_14_143253_create_guestbooks_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table pictures
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pictures`;

CREATE TABLE `pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pictureable_id` int(10) unsigned NOT NULL,
  `pictureable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;

INSERT INTO `pictures` (`id`, `pictureable_id`, `pictureable_type`, `path`, `file_name`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,'App\\Attraction','attraction','pantai_jungwook.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(2,2,'App\\Attraction','attraction','pantai_parangtritis.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(3,3,'App\\Attraction','attraction','pantai_depok.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(4,4,'App\\Attraction','attraction','pantai_drini.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(5,5,'App\\Attraction','attraction','pantai_parangedog.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(6,6,'App\\Attraction','attraction','pantai_parangkusumo.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(7,7,'App\\Attraction','attraction','samas.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(8,8,'App\\Attraction','attraction','trisik.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(9,9,'App\\Attraction','attraction','pantai_ambarketawang.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(10,10,'App\\Attraction','attraction','sendang_kasihan.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(11,11,'App\\Attraction','attraction','situs_payak.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(12,12,'App\\Attraction','attraction','situs_watugudig.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(13,13,'App\\Attraction','attraction','tamansari.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL),
	(14,14,'App\\Attraction','attraction','pantai_indrayanti.jpeg','2019-06-14 14:01:48','2019-06-14 14:01:48',NULL);

/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table provinces
# ------------------------------------------------------------

DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `old_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;

INSERT INTO `provinces` (`id`, `old_id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,11,'ACEH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(2,12,'SUMATERA UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(3,13,'SUMATERA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(4,14,'RIAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(5,15,'JAMBI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(6,16,'SUMATERA SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(7,17,'BENGKULU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(8,18,'LAMPUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(9,19,'KEPULAUAN BANGKA BELITUNG','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(10,21,'KEPULAUAN RIAU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(11,31,'DKI JAKARTA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(12,32,'JAWA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(13,33,'JAWA TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(14,34,'DI YOGYAKARTA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(15,35,'JAWA TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(16,36,'BANTEN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(17,51,'BALI','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(18,52,'NUSA TENGGARA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(19,53,'NUSA TENGGARA TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(20,61,'KALIMANTAN BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(21,62,'KALIMANTAN TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(22,63,'KALIMANTAN SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(23,64,'KALIMANTAN TIMUR','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(24,65,'KALIMANTAN UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(25,71,'SULAWESI UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(26,72,'SULAWESI TENGAH','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(27,73,'SULAWESI SELATAN','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(28,74,'SULAWESI TENGGARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(29,75,'GORONTALO','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(30,76,'SULAWESI BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(31,81,'MALUKU','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(32,82,'MALUKU UTARA','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(33,91,'PAPUA BARAT','2019-06-14 14:01:47','2019-06-14 14:01:47'),
	(34,94,'PAPUA','2019-06-14 14:01:47','2019-06-14 14:01:47');

/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `remember_token`, `address`, `phone_number`, `password`, `created_at`, `updated_at`)
VALUES
	(1,'admin','admin@example.com','fsr0rK8o4TEJM9TDDzisWwgQytvnxf9x09pV7ZMoebUffEPsi9JfDmrxOu2n','668 Mante Shoals\nRandalview, AR 66391-0802','1-843-275-6663','$2y$12$U3STBuAxsiNzRETmk7ynqe57pgAooOq6jk8.hiTTf7mB5qqhtA0uC','2019-04-02 14:01:47','2019-06-14 14:01:47');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
