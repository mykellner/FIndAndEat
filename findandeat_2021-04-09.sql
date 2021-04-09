# ************************************************************
# Sequel Ace SQL dump
# Version 3013
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.32)
# Database: findandeat
# Generation Time: 2021-04-09 09:57:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Barbecue','2021-03-30 17:41:49','2021-04-07 10:15:05'),
	(2,'Steakhouse','2021-03-30 17:43:12','2021-03-30 17:43:12'),
	(3,'European','2021-04-07 10:14:49','2021-04-07 10:14:49'),
	(4,'Caucasian','2021-04-07 10:16:54','2021-04-07 10:16:54'),
	(5,'Seafood','2021-04-07 10:17:08','2021-04-07 10:17:08'),
	(6,'Swedish','2021-04-07 10:17:22','2021-04-07 10:17:22'),
	(7,'Tapas','2021-04-07 10:17:34','2021-04-07 10:17:34');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_restaurant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_restaurant`;

CREATE TABLE `category_restaurant` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_restaurant_restaurant_id_category_id_unique` (`restaurant_id`,`category_id`),
  KEY `category_restaurant_category_id_foreign` (`category_id`),
  CONSTRAINT `category_restaurant_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_restaurant_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_restaurant` WRITE;
/*!40000 ALTER TABLE `category_restaurant` DISABLE KEYS */;

INSERT INTO `category_restaurant` (`id`, `restaurant_id`, `category_id`, `created_at`, `updated_at`)
VALUES
	(2,2,2,NULL,NULL),
	(3,3,5,NULL,NULL),
	(4,3,2,NULL,NULL),
	(5,3,6,NULL,NULL),
	(6,4,7,NULL,NULL),
	(7,5,1,NULL,NULL),
	(8,5,3,NULL,NULL),
	(9,5,2,NULL,NULL),
	(10,5,6,NULL,NULL),
	(11,6,3,NULL,NULL),
	(12,6,5,NULL,NULL),
	(13,6,6,NULL,NULL),
	(14,1,6,NULL,NULL),
	(15,8,1,NULL,NULL),
	(16,8,3,NULL,NULL),
	(17,9,3,NULL,NULL);

/*!40000 ALTER TABLE `category_restaurant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_county_id_foreign` (`county_id`),
  CONSTRAINT `cities_county_id_foreign` FOREIGN KEY (`county_id`) REFERENCES `counties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;

INSERT INTO `cities` (`id`, `name`, `county_id`, `created_at`, `updated_at`)
VALUES
	(1,'Malmö',1,'2021-04-07 09:16:06','2021-04-07 09:16:06'),
	(2,'Varberg',3,'2021-04-07 10:11:03','2021-04-07 10:11:03'),
	(3,'Helsingborg',1,'2021-04-07 10:17:55','2021-04-07 10:17:55'),
	(4,'Kristianstad',1,'2021-04-07 10:22:39','2021-04-07 10:22:39'),
	(5,'Karlshamn',2,'2021-04-07 10:24:49','2021-04-07 10:24:49'),
	(6,'Ronneby',2,'2021-04-07 10:29:15','2021-04-07 10:29:15');

/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table counties
# ------------------------------------------------------------

DROP TABLE IF EXISTS `counties`;

CREATE TABLE `counties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `counties_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `counties` WRITE;
/*!40000 ALTER TABLE `counties` DISABLE KEYS */;

INSERT INTO `counties` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Skåne','2021-03-30 17:41:23','2021-03-30 17:41:23'),
	(2,'Blekinge','2021-03-31 11:32:33','2021-03-31 11:32:33'),
	(3,'Halland','2021-04-07 10:10:35','2021-04-07 10:10:35');

/*!40000 ALTER TABLE `counties` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table link_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `link_types`;

CREATE TABLE `link_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `link_types` WRITE;
/*!40000 ALTER TABLE `link_types` DISABLE KEYS */;

INSERT INTO `link_types` (`id`, `type`, `created_at`, `updated_at`)
VALUES
	(4,'Website','2021-04-07 11:38:31','2021-04-07 11:38:31'),
	(5,'Social','2021-04-07 11:38:31','2021-04-07 11:38:31'),
	(6,'Email','2021-04-07 11:38:31','2021-04-07 11:38:31');

/*!40000 ALTER TABLE `link_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_type_id` bigint(20) unsigned NOT NULL,
  `restaurant_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `links_restaurant_id_foreign` (`restaurant_id`),
  KEY `links_link_type_id_foreign` (`link_type_id`),
  CONSTRAINT `links_link_type_id_foreign` FOREIGN KEY (`link_type_id`) REFERENCES `link_types` (`id`),
  CONSTRAINT `links_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;

INSERT INTO `links` (`id`, `url`, `description`, `link_type_id`, `restaurant_id`, `created_at`, `updated_at`)
VALUES
	(10,'https://restauranggenuin.se','Besök vår hemsida!',4,1,'2021-04-07 11:45:40','2021-04-07 11:45:40'),
	(11,'https://www.facebook.com/RestaurangGenuin','Facebook',5,1,'2021-04-07 11:48:02','2021-04-07 11:48:10'),
	(12,'restauranggenuin@gmail.com','email',6,1,'2021-04-07 11:51:01','2021-04-07 11:51:01'),
	(13,'https://www.tuggburgers.se/#','Vår hemsida',4,8,'2021-04-07 11:58:01','2021-04-07 11:58:01'),
	(14,'tuggburgers@gmail.com','email',6,8,'2021-04-07 11:58:21','2021-04-07 11:58:21'),
	(15,'https://www.facebook.com/Tugg-Burgers-266416254211944/','Facebook',5,8,'2021-04-07 11:59:33','2021-04-07 11:59:47'),
	(16,'https://www.dalsud.se/','Läs mer på dalsud.se',4,9,'2021-04-07 12:08:25','2021-04-07 12:08:25');

/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(12,'2014_10_12_000000_create_users_table',1),
	(13,'2014_10_12_100000_create_password_resets_table',1),
	(14,'2019_08_19_000000_create_failed_jobs_table',1),
	(15,'2021_03_23_133724_create_restaurants_table',1),
	(16,'2021_03_23_133743_create_cities_table',1),
	(17,'2021_03_23_133754_create_counties_table',1),
	(18,'2021_03_23_133811_create_suggestions_table',1),
	(19,'2021_03_23_133822_create_categories_table',1),
	(20,'2021_03_23_133903_create_links_table',1),
	(21,'2021_03_23_134033_create_link_types_table',1),
	(22,'2021_03_25_090531_category_restaurant',1),
	(23,'2021_03_26_095349_alter_cities_add_foreign_key_county_id',1),
	(24,'2021_03_26_100826_alter_restaurants_add_foreign_key_city_id',1),
	(25,'2021_03_26_120827_alter_category_restaurant_add_foreign_keys_category_id_restaurant_id',1),
	(26,'2021_03_26_121342_alter_linkst_add_foreign_keys_linktype_id_restaurant_id',1);

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



# Dump of table restaurants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `restaurants`;

CREATE TABLE `restaurants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(8,2) DEFAULT NULL,
  `longitude` decimal(8,2) DEFAULT NULL,
  `city_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurants_city_id_foreign` (`city_id`),
  CONSTRAINT `restaurants_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `restaurants` WRITE;
/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;

INSERT INTO `restaurants` (`id`, `name`, `description`, `address`, `phonenumber`, `latitude`, `longitude`, `city_id`, `created_at`, `updated_at`)
VALUES
	(1,'Restaurant Geniun','Svensk husmanskost i Genuin Miljö. Genuint god mat i njutbar miljö. Fullständiga rättigheter. Stort urval av mycket goda viner. Mat lagad från grunden. OBS All bordsbokning sker via telefon: 040-26 10 10','Köpenhamnsvägen 40, 217 71 Malmö','040-26 10 10',NULL,NULL,2,'2021-04-07 09:17:42','2021-04-09 08:07:37'),
	(2,'John\'s Place','Johns Place är stället med det lilla extra. Vi serverar god mat i en mysig miljö så nära kontinenten man kan komma. Välkomna!','Taangkoerarvaegen 2, Varberg','+46 340 109 03',NULL,NULL,2,'2021-04-07 10:11:47','2021-04-07 10:11:47'),
	(3,'AnJo Wine & Dine','How much fun can you have?? Vi lagar maten från grunden och värnar om råvaran. Och det får lov att ta tid.','Bruksgatan 19, Helsingborg 252 20',NULL,NULL,NULL,3,'2021-04-07 10:18:45','2021-04-07 10:18:45'),
	(4,'La Venta Tapas','Varmt välkomna till La Venta och njut av spanska smaker. I vår tapasmeny kan du välja bland ett trettiotal olika tapasrätter. Du finner allt från grönsakstapas, kött-tapas, fisk- och skaldjurstapas och sist men inte minst desserter av olika slag. Vår dryckeslista innehåller nästan bara spanska drycker och vi har fantastisk sangria.','Mariagatan 8, Helsingborg 252 23','+46 70 771 26 40',NULL,NULL,3,'2021-04-07 10:20:24','2021-04-07 10:20:33'),
	(5,'Bar-B-Ko Bar & Restaurang','Kött, vin och matglädje i Kristianstad sedan 1997! Vi gillar bra råvaror och glada människor som vill njuta av livet. Så enkelt är det. Varmt välkomna!','Tivoligatan 4, Kristianstad 29131','+46 44 21 33 55',NULL,NULL,4,'2021-04-07 10:23:31','2021-04-07 10:23:31'),
	(6,'Wagga Fisk & Delikatessrokeri','Här äter och njuter man av den härliga maten och Vägga fiskhamns pittoreska marina direkt vid bryggan. Njut av nystekt och färsk fisk. Vi är kända för våra fiskrätter & skaldjur och vårt egna direktimporterande vin från Schloss Mühlenhof.','Saltsjoebadsvaegen 44, Karlshamn','+46 454 190 85',NULL,NULL,5,'2021-04-07 10:25:44','2021-04-07 10:25:44'),
	(7,'Dilkhush Indian Restaurant','På Dilkhush Indian Restaurant erbjuder dem mat som Indiskt, Vegetariska rätter, Veganrätter, Glutenfria rätter. Ifall det är något som är frestande föreslår vi dig att boka ett bord för att få en härlig middagsupplevelse','Karlskronagatan 23B, Ronneby 372 37','+46 457 669 40',NULL,NULL,6,'2021-04-07 10:30:01','2021-04-07 10:30:01'),
	(8,'Tugg Burgers','Välkommen till Tugg Burgers! Hos oss på Tugg Burgers kan du se fram emot schyssta burgare och god dryck! Självklart maler vi köttet varje dag, allt för att du och dina vänner ska få njuta av en riktigt härlig burgare – varje gång ni besöker oss på Tugg Burgers. Naturligtvis erbjuder vi även ett gäng minst lika smarriga vegetariska burgare.','Södra Vallgatan 3',NULL,NULL,NULL,1,'2021-04-07 11:57:38','2021-04-07 12:14:18'),
	(9,'Dal Sud','Dal Sud, vår nya träffpunkt dit den som vill känna på lite ”Italianità” kan söka sig, hittas på en liten bakgata i närheten av Värnhemstorget. Lokalen har vi till största del färdigställt själva med hjälp av vänner och familj, i sann Italiensk anda. Här finns vår platsbyggda traditionella pizzaugn som är täckt med handmålat ”krossat” kakel från Italien. Denna koloss, hjärtat i vårt kök, är för oss en symbol som ständigt påminner om en fantastisk matkultur som vuxit fram och formats i flera generationer.','Ringgatan 1B',NULL,NULL,NULL,1,'2021-04-07 12:07:45','2021-04-07 12:07:45');

/*!40000 ALTER TABLE `restaurants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table suggestions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `suggestions`;

CREATE TABLE `suggestions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `suggestions` WRITE;
/*!40000 ALTER TABLE `suggestions` DISABLE KEYS */;

INSERT INTO `suggestions` (`id`, `name`, `description`, `city`, `county`, `fname`, `lname`, `created_at`, `updated_at`)
VALUES
	(4,'Tugg Burgers','Really good burgers. The top three best I\'ve eaten (with Flippin and BMB). I took the original. Awesome meat, good fried, delicious bread and very good dressing. Only thing I have to complain about is that even double Burger was 160 g/puck, which forced me to go on a single. Always prefer a double 100 g. Since it is clearly doubtful that puck I got actually weighed 160 g, felt more like 120.','Malmö','Skåne','My','Kellner','2021-04-07 10:34:05','2021-04-07 10:34:05');

/*!40000 ALTER TABLE `suggestions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','admin@admin.se',NULL,'$2y$10$pR.S6A80/BEHdueIXHN8UutYjOl08u/4RT/DBYMX3Uv7hDlpDSp1G',NULL,'2021-03-30 11:50:57','2021-03-30 11:50:57');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
