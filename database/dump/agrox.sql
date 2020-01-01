/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.1.37-MariaDB : Database - agrox
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`agrox` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `agrox`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name_unique` (`name`),
  UNIQUE KEY `category_slug_unique` (`slug`),
  KEY `category_category_id_foreign` (`category_id`),
  CONSTRAINT `category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`slug`,`category_id`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'consectetur','architecto-deserunt-voluptate-adipisci-laborum',NULL,NULL,'2020-01-01 14:01:09','2020-01-01 14:01:09'),
(2,'reiciendis','eaque-quia-provident-sint-ea',NULL,NULL,'2020-01-01 14:01:09','2020-01-01 14:01:09'),
(3,'ea','molestiae-placeat-rem-odio-nihil-magnam-id-ullam-atque',NULL,NULL,'2020-01-01 14:01:09','2020-01-01 14:01:09'),
(4,'ipsam','et-odio-ratione-voluptatem-ea-iure-laboriosam',NULL,NULL,'2020-01-01 14:01:09','2020-01-01 14:01:09'),
(5,'eos','aut-sed-illum-in-iusto-eos-atque-totam',NULL,NULL,'2020-01-01 14:01:09','2020-01-01 14:01:09'),
(6,'eum','harum-necessitatibus-et-dolor-perferendis-et-eum',NULL,NULL,'2020-01-01 14:01:09','2020-01-01 14:01:09'),
(7,'natus','eaque-eaque-non-dolores-facilis-qui-rerum',NULL,NULL,'2020-01-01 14:01:09','2020-01-01 14:01:09'),
(8,'enim','minima-alias-dolores-vero-et-doloribus-nulla-quia-iste',NULL,NULL,'2020-01-01 14:01:09','2020-01-01 14:01:09'),
(9,'numquam','ut-iure-et-magnam-vel-non',NULL,NULL,'2020-01-01 14:01:09','2020-01-01 14:01:09'),
(10,'necessitatibus','neque-est-quia-incidunt-autem',NULL,NULL,'2020-01-01 14:01:10','2020-01-01 14:01:10');

/*Table structure for table `category_post` */

DROP TABLE IF EXISTS `category_post`;

CREATE TABLE `category_post` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_post_category_id_foreign` (`category_id`),
  KEY `category_post_post_id_foreign` (`post_id`),
  CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category_post` */

/*Table structure for table `category_product` */

DROP TABLE IF EXISTS `category_product`;

CREATE TABLE `category_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_product_product_id_foreign` (`product_id`),
  KEY `category_product_category_id_foreign` (`category_id`),
  CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category_product` */

/*Table structure for table `consultancies` */

DROP TABLE IF EXISTS `consultancies`;

CREATE TABLE `consultancies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `consultant` bigint(20) unsigned NOT NULL,
  `consumer` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `consultancies_title_unique` (`title`),
  KEY `consultancies_consultant_foreign` (`consultant`),
  KEY `consultancies_consumer_foreign` (`consumer`),
  KEY `consultancies_category_id_foreign` (`category_id`),
  CONSTRAINT `consultancies_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `consultancies_consultant_foreign` FOREIGN KEY (`consultant`) REFERENCES `users` (`id`),
  CONSTRAINT `consultancies_consumer_foreign` FOREIGN KEY (`consumer`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `consultancies` */

/*Table structure for table `consultant_reviews` */

DROP TABLE IF EXISTS `consultant_reviews`;

CREATE TABLE `consultant_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `consultant` bigint(20) unsigned NOT NULL,
  `consumer` bigint(20) unsigned NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consultant_reviews_consultant_foreign` (`consultant`),
  KEY `consultant_reviews_consumer_foreign` (`consumer`),
  CONSTRAINT `consultant_reviews_consultant_foreign` FOREIGN KEY (`consultant`) REFERENCES `users` (`id`),
  CONSTRAINT `consultant_reviews_consumer_foreign` FOREIGN KEY (`consumer`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `consultant_reviews` */

/*Table structure for table `discussions` */

DROP TABLE IF EXISTS `discussions`;

CREATE TABLE `discussions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `discussion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussions_user_id_foreign` (`user_id`),
  KEY `discussions_post_id_foreign` (`post_id`),
  CONSTRAINT `discussions_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `discussions` */

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

/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_user_id_foreign` (`user_id`),
  KEY `likes_post_id_foreign` (`post_id`),
  CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `likes` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2018_08_08_100000_create_telescope_entries_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_18_161547_create_social_providers_table',1),
(6,'2019_12_31_043853_create_products_table',1),
(7,'2019_12_31_043913_create_category_table',1),
(8,'2019_12_31_051116_create_posts_table',1),
(9,'2019_12_31_051703_create_orders_table',1),
(10,'2019_12_31_052249_create_order_product_table',1),
(11,'2019_12_31_065312_create_category_product_table',1),
(12,'2019_12_31_145953_create_roles_table',1),
(13,'2019_12_31_150126_create_permissions_table',1),
(14,'2019_12_31_150256_create_permission_role_table',1),
(15,'2019_12_31_150330_add_role_id_to_users_table',1),
(16,'2019_12_31_173437_create_proficiencies_table',1),
(17,'2019_12_31_173726_add_proficiency_id_to_users_table',1),
(18,'2019_12_31_184123_create_discussions_table',1),
(19,'2019_12_31_184349_create_likes_table',1),
(20,'2019_12_31_184544_create_ratings_table',1),
(21,'2019_12_31_195042_create_consultancies_table',1),
(22,'2019_12_31_200301_create_private_messages_table',1),
(23,'2019_12_31_203703_create_category_post_table',1),
(24,'2020_01_01_110203_create_product_reviews_table',1),
(25,'2020_01_01_110335_create_consultant_reviews_table',1);

/*Table structure for table `order_product` */

DROP TABLE IF EXISTS `order_product`;

CREATE TABLE `order_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned DEFAULT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_product_order_id_foreign` (`order_id`),
  KEY `order_product_product_id_foreign` (`product_id`),
  CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_product` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `billing_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_postalcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name_on_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_discount` int(11) NOT NULL DEFAULT '0',
  `billing_discount_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_subtotal` int(11) NOT NULL,
  `billing_tax` int(11) NOT NULL,
  `billing_total` int(11) NOT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stripe',
  `status` enum('Complete','Pending','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `error` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachments` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` enum('post','discussion') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` enum('success_story','farmer_experience') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `allow_discussion` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

/*Table structure for table `private_messages` */

DROP TABLE IF EXISTS `private_messages`;

CREATE TABLE `private_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `consultancy_id` bigint(20) unsigned NOT NULL,
  `consultant` bigint(20) unsigned NOT NULL,
  `consumer` bigint(20) unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `private_messages_consultancy_id_foreign` (`consultancy_id`),
  KEY `private_messages_consultant_foreign` (`consultant`),
  KEY `private_messages_consumer_foreign` (`consumer`),
  CONSTRAINT `private_messages_consultancy_id_foreign` FOREIGN KEY (`consultancy_id`) REFERENCES `consultancies` (`id`),
  CONSTRAINT `private_messages_consultant_foreign` FOREIGN KEY (`consultant`) REFERENCES `users` (`id`),
  CONSTRAINT `private_messages_consumer_foreign` FOREIGN KEY (`consumer`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `private_messages` */

/*Table structure for table `product_reviews` */

DROP TABLE IF EXISTS `product_reviews`;

CREATE TABLE `product_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_product_id_foreign` (`product_id`),
  KEY `product_reviews_user_id_foreign` (`user_id`),
  CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_reviews` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_user_id_foreign` (`user_id`),
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

/*Table structure for table `proficiencies` */

DROP TABLE IF EXISTS `proficiencies`;

CREATE TABLE `proficiencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proficiency` enum('Expert','Advanced','Intermediate','Novice','Not Applicable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `proficiencies` */

insert  into `proficiencies`(`id`,`proficiency`,`description`,`created_at`,`updated_at`) values 
(1,'Expert','You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.','2020-01-01 14:30:01','2020-01-01 14:30:01'),
(2,'Advanced','You can perform the actions associated with this skill without assistance. You are certainly recognized within your immediate organization as \"a person to ask\" when difficult questions arise regarding this skill.','2020-01-01 14:30:01','2020-01-01 14:30:01'),
(3,'Intermediate','You are able to successfully complete tasks in this competency as requested. Help from an expert may be required from time to time, but you can usually perform the skill independently.','2020-01-01 14:30:01','2020-01-01 14:30:01'),
(4,'Novice','You have the level of experience gained in a classroom and/or experimental scenarios or as a trainee on-the-job. You are expected to need help when performing this skill.','2020-01-01 14:30:01','2020-01-01 14:30:01'),
(5,'Not Applicable','You have a common knowledge or an understanding of basic techniques and concepts.','2020-01-01 14:30:01','2020-01-01 14:30:01');

/*Table structure for table `ratings` */

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_user_id_foreign` (`user_id`),
  KEY `ratings_post_id_foreign` (`post_id`),
  CONSTRAINT `ratings_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ratings` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`description`,`created_at`,`updated_at`) values 
(1,'Admin','Admin role description','2020-01-01 14:16:16','2020-01-01 14:16:16'),
(2,'Farmer','Farmer role description','2020-01-01 14:16:17','2020-01-01 14:16:17'),
(3,'Consultant','Consultant role description','2020-01-01 14:16:17','2020-01-01 14:16:17'),
(4,'Academic','Academic role description','2020-01-01 14:16:17','2020-01-01 14:16:17'),
(5,'Other','Other role description','2020-01-01 14:16:17','2020-01-01 14:16:17');

/*Table structure for table `social_providers` */

DROP TABLE IF EXISTS `social_providers`;

CREATE TABLE `social_providers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_providers_user_id_foreign` (`user_id`),
  CONSTRAINT `social_providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_providers` */

/*Table structure for table `telescope_entries` */

DROP TABLE IF EXISTS `telescope_entries`;

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sequence`),
  UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  KEY `telescope_entries_batch_id_index` (`batch_id`),
  KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`),
  KEY `telescope_entries_family_hash_index` (`family_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `telescope_entries` */

insert  into `telescope_entries`(`sequence`,`uuid`,`batch_id`,`family_hash`,`should_display_on_index`,`type`,`content`,`created_at`) values 
(1,'8f82073a-7139-49d9-855d-82bad5d185ff','8f82073a-7983-43db-9af0-4488af2e2a73',NULL,1,'command','{\"command\":\"make:factory\",\"exit_code\":0,\"arguments\":{\"command\":\"make:factory\",\"name\":\"ConsultancyFactory\"},\"options\":{\"model\":null,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:44:57'),
(2,'8f820753-e90c-4054-9247-b7a8c7d12bfd','8f820753-f260-45cb-a4f8-66f1ec09f216',NULL,1,'command','{\"command\":\"make:factory\",\"exit_code\":0,\"arguments\":{\"command\":\"make:factory\",\"name\":\"ConsultancyReviewsFactory\"},\"options\":{\"model\":null,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:45:14'),
(3,'8f82076d-9261-4bff-83c1-b8a9544a87ca','8f82076d-99dd-4b6d-b6f1-fae802821b0c',NULL,1,'command','{\"command\":\"make:factory\",\"exit_code\":0,\"arguments\":{\"command\":\"make:factory\",\"name\":\"DiscussionFactory\"},\"options\":{\"model\":null,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:45:31'),
(4,'8f82077b-c58a-454e-ae41-a91eff5d7a26','8f82077b-cf82-4eb3-adb3-3506cde4fe0d',NULL,1,'command','{\"command\":\"make:factory\",\"exit_code\":0,\"arguments\":{\"command\":\"make:factory\",\"name\":\"LikeFactory\"},\"options\":{\"model\":null,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:45:40'),
(5,'8f820784-feaa-43bc-9e47-81f95ea4908d','8f820785-06ea-4cfb-bccf-7ae124670092',NULL,1,'command','{\"command\":\"make:factory\",\"exit_code\":0,\"arguments\":{\"command\":\"make:factory\",\"name\":\"OrderFactory\"},\"options\":{\"model\":null,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:45:46'),
(6,'8f820792-d595-4d6a-80f1-87354745038c','8f820792-deb2-47e8-944c-7c1182504012',NULL,1,'command','{\"command\":\"make:factory\",\"exit_code\":0,\"arguments\":{\"command\":\"make:factory\",\"name\":\"PermissionFactory\"},\"options\":{\"model\":null,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:45:55'),
(7,'8f8207cd-99c0-4a9e-a95b-820f21728237','8f8207cd-a191-4058-86da-970152926de3',NULL,1,'command','{\"command\":\"make:factory\",\"exit_code\":0,\"arguments\":{\"command\":\"make:factory\",\"name\":\"PrivateMessageFactory\"},\"options\":{\"model\":null,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:46:34'),
(8,'8f820801-e21e-4d01-b977-a53886a147e9','8f820801-ea74-483d-abf5-2748b19ee818',NULL,1,'command','{\"command\":\"make:factory\",\"exit_code\":0,\"arguments\":{\"command\":\"make:factory\",\"name\":\"ProductReviewFactory\"},\"options\":{\"model\":null,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:47:08'),
(9,'8f820890-b65e-41aa-81bf-455616ac2ddf','8f820890-bddd-4134-a4a8-09b010633b99',NULL,1,'command','{\"command\":\"make:factory\",\"exit_code\":0,\"arguments\":{\"command\":\"make:factory\",\"name\":\"RatingFactory\"},\"options\":{\"model\":null,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:48:42'),
(10,'8f820c30-e20c-4a9c-bd90-69eff4d4cfb2','8f820c30-e7a6-4f3f-a4f7-dfec501677ca',NULL,1,'command','{\"command\":\"make:seeder\",\"exit_code\":0,\"arguments\":{\"command\":\"make:seeder\",\"name\":\"UsersTableSeeder\"},\"options\":{\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 13:58:50'),
(11,'8f820cbe-7b17-4cc2-8fee-16add517f946','8f820cbf-1488-441d-b671-258401747b4e','c281f651fd0e0bef9da35320299cc4ad',0,'exception','{\"class\":\"Illuminate\\\\Database\\\\QueryException\",\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":669,\"message\":\"SQLSTATE[42S02]: Base table or view not found: 1146 Table \'agrox.categories\' doesn\'t exist (SQL: insert into `categories` (`name`, `slug`, `updated_at`, `created_at`) values (corporis, similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis, 2020-01-01 14:00:23, 2020-01-01 14:00:23))\",\"trace\":[{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":629,\"function\":\"runQueryCallback\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `categories` (`name`, `slug`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"corporis\",\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"2020-01-01 14:00:23\",\"2020-01-01 14:00:23\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":464,\"function\":\"run\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `categories` (`name`, `slug`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"corporis\",\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"2020-01-01 14:00:23\",\"2020-01-01 14:00:23\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":416,\"function\":\"statement\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `categories` (`name`, `slug`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"corporis\",\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"2020-01-01 14:00:23\",\"2020-01-01 14:00:23\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Processors\\\\Processor.php\",\"line\":32,\"function\":\"insert\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `categories` (`name`, `slug`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"corporis\",\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"2020-01-01 14:00:23\",\"2020-01-01 14:00:23\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Builder.php\",\"line\":2670,\"function\":\"processInsertGetId\",\"class\":\"Illuminate\\\\Database\\\\Query\\\\Processors\\\\Processor\",\"type\":\"->\",\"args\":[{\"connection\":{},\"grammar\":{},\"processor\":{},\"bindings\":{\"select\":[],\"from\":[],\"join\":[],\"where\":[],\"having\":[],\"order\":[],\"union\":[],\"unionOrder\":[]},\"aggregate\":null,\"columns\":null,\"distinct\":false,\"from\":\"categories\",\"joins\":null,\"wheres\":[],\"groups\":null,\"havings\":null,\"orders\":null,\"limit\":null,\"offset\":null,\"unions\":null,\"unionLimit\":null,\"unionOffset\":null,\"unionOrders\":null,\"lock\":null,\"operators\":[\"=\",\"<\",\">\",\"<=\",\">=\",\"<>\",\"!=\",\"<=>\",\"like\",\"like binary\",\"not like\",\"ilike\",\"&\",\"|\",\"^\",\"<<\",\">>\",\"rlike\",\"not rlike\",\"regexp\",\"not regexp\",\"~\",\"~*\",\"!~\",\"!~*\",\"similar to\",\"not similar to\",\"not ilike\",\"~~*\",\"!~~*\"],\"useWritePdo\":false},\"insert into `categories` (`name`, `slug`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"corporis\",\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"2020-01-01 14:00:23\",\"2020-01-01 14:00:23\"],\"id\"]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Builder.php\",\"line\":1350,\"function\":\"insertGetId\",\"class\":\"Illuminate\\\\Database\\\\Query\\\\Builder\",\"type\":\"->\",\"args\":[[\"corporis\",\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"2020-01-01 14:00:23\",\"2020-01-01 14:00:23\"],\"id\"]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":839,\"function\":\"__call\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Builder\",\"type\":\"->\",\"args\":[\"insertGetId\",[{\"name\":\"corporis\",\"slug\":\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"updated_at\":\"2020-01-01 14:00:23\",\"created_at\":\"2020-01-01 14:00:23\"},\"id\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":804,\"function\":\"insertAndSetId\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[{},{\"name\":\"corporis\",\"slug\":\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"updated_at\":\"2020-01-01 14:00:23\",\"created_at\":\"2020-01-01 14:00:23\"}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":667,\"function\":\"performInsert\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder.php\",\"line\":206,\"function\":\"save\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\Traits\\\\EnumeratesValues.php\",\"line\":176,\"function\":\"Illuminate\\\\Database\\\\Eloquent\\\\{closure}\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder\",\"type\":\"->\",\"args\":[{\"name\":\"corporis\",\"slug\":\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"updated_at\":\"2020-01-01 14:00:23\",\"created_at\":\"2020-01-01 14:00:23\"},0]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder.php\",\"line\":207,\"function\":\"each\",\"class\":\"Illuminate\\\\Support\\\\Collection\",\"type\":\"->\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder.php\",\"line\":185,\"function\":\"store\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder\",\"type\":\"->\",\"args\":[[{\"name\":\"corporis\",\"slug\":\"similique-reiciendis-velit-nihil-atque-explicabo-rerum-blanditiis\",\"updated_at\":\"2020-01-01 14:00:23\",\"created_at\":\"2020-01-01 14:00:23\"},{\"name\":\"ipsa\",\"slug\":\"saepe-natus-mollitia-saepe-fuga-inventore\"},{\"name\":\"vel\",\"slug\":\"error-fugit-ut-quis-voluptates-odit\"},{\"name\":\"ut\",\"slug\":\"aut-quia-est-dicta-ea\"},{\"name\":\"iste\",\"slug\":\"hic-id-recusandae-aut-harum-qui-minus-tempora-harum\"},{\"name\":\"ut\",\"slug\":\"voluptatem-cumque-expedita-officia-dolor-enim\"},{\"name\":\"quo\",\"slug\":\"possimus-asperiores-suscipit-omnis\"},{\"name\":\"facere\",\"slug\":\"enim-fuga-atque-consectetur-aliquid-et\"},{\"name\":\"modi\",\"slug\":\"repellat-ex-quas-modi-sunt\"},{\"name\":\"voluptas\",\"slug\":\"facilis-molestiae-sit-beatae-corporis-libero-nesciunt\"}]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"function\":\"create\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder\",\"type\":\"->\",\"args\":[]},{\"function\":\"run\",\"class\":\"CategoryTableSeeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"run\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":134,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"run\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":48,\"function\":\"__invoke\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\DatabaseSeeder.php\",\"line\":15,\"function\":\"call\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[\"CategoryTableSeeder\"]},{\"function\":\"run\",\"class\":\"DatabaseSeeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"run\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":134,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"run\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand.php\",\"line\":63,\"function\":\"__invoke\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Concerns\\\\GuardsAttributes.php\",\"line\":122,\"function\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\{closure}\",\"class\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand.php\",\"line\":64,\"function\":\"unguarded\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"::\",\"args\":[{}]},{\"function\":\"handle\",\"class\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"handle\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"handle\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"handle\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Command.php\",\"line\":202,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"handle\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Command\\\\Command.php\",\"line\":255,\"function\":\"execute\",\"class\":\"Illuminate\\\\Console\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Command.php\",\"line\":189,\"function\":\"run\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Command\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":1011,\"function\":\"run\",\"class\":\"Illuminate\\\\Console\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":272,\"function\":\"doRunCommand\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":148,\"function\":\"doRun\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Application.php\",\"line\":93,\"function\":\"run\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Console\\\\Kernel.php\",\"line\":131,\"function\":\"run\",\"class\":\"Illuminate\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\artisan\",\"line\":37,\"function\":\"handle\",\"class\":\"Illuminate\\\\Foundation\\\\Console\\\\Kernel\",\"type\":\"->\",\"args\":[{},{}]}],\"line_preview\":{\"660\":\"        \\/\\/ took to execute and log the query SQL, bindings and time in our memory.\",\"661\":\"        try {\",\"662\":\"            $result = $callback($query, $bindings);\",\"663\":\"        }\",\"664\":\"\",\"665\":\"        \\/\\/ If an exception occurs when attempting to run a query, we\'ll format the error\",\"666\":\"        \\/\\/ message to include the bindings with SQL, which will make this exception a\",\"667\":\"        \\/\\/ lot more helpful to the developer instead of just the database\'s errors.\",\"668\":\"        catch (Exception $e) {\",\"669\":\"            throw new QueryException(\",\"670\":\"                $query, $this->prepareBindings($bindings), $e\",\"671\":\"            );\",\"672\":\"        }\",\"673\":\"\",\"674\":\"        return $result;\",\"675\":\"    }\",\"676\":\"\",\"677\":\"    \\/**\",\"678\":\"     * Log a query in the connection\'s query log.\",\"679\":\"     *\"},\"hostname\":\"DESKTOP-1GD480D\",\"occurrences\":1}','2020-01-01 14:00:23'),
(12,'8f820d05-0207-40b0-b9eb-e9ae117a0a5a','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'consectetur\', \'architecto-deserunt-voluptate-adipisci-laborum\', \'2020-01-01 14:01:09\', \'2020-01-01 14:01:09\')\",\"time\":\"89.55\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(13,'8f820d05-073d-4f00-ba18-120fe136d49a','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:1\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(14,'8f820d05-1af7-46e9-a7ac-044eef421adc','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'reiciendis\', \'eaque-quia-provident-sint-ea\', \'2020-01-01 14:01:09\', \'2020-01-01 14:01:09\')\",\"time\":\"49.59\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(15,'8f820d05-1b46-43dd-a49d-3f73d8cd1ade','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:2\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(16,'8f820d05-6011-417b-b5d7-78abefdc9a92','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'ea\', \'molestiae-placeat-rem-odio-nihil-magnam-id-ullam-atque\', \'2020-01-01 14:01:09\', \'2020-01-01 14:01:09\')\",\"time\":\"174.92\",\"slow\":true,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(17,'8f820d05-6065-463c-9359-c6c9ce42ba45','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:3\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(18,'8f820d05-6fb2-4cef-aff4-a6d9da2b738d','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'ipsam\', \'et-odio-ratione-voluptatem-ea-iure-laboriosam\', \'2020-01-01 14:01:09\', \'2020-01-01 14:01:09\')\",\"time\":\"38.02\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(19,'8f820d05-6feb-4591-b229-bfc9fdc7e2b3','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:4\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(20,'8f820d05-7e68-4a64-99ad-3a8401d54b1d','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'eos\', \'aut-sed-illum-in-iusto-eos-atque-totam\', \'2020-01-01 14:01:09\', \'2020-01-01 14:01:09\')\",\"time\":\"36.29\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(21,'8f820d05-7eaf-4aff-a466-dfcb3ef5d45a','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:5\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(22,'8f820d05-8e11-45f4-abfa-15326b6154ad','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'eum\', \'harum-necessitatibus-et-dolor-perferendis-et-eum\', \'2020-01-01 14:01:09\', \'2020-01-01 14:01:09\')\",\"time\":\"38.38\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(23,'8f820d05-8e61-43e9-b9e1-1893b0d14fb8','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:6\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(24,'8f820d05-9cce-432a-bb79-4b2741d36d5e','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'natus\', \'eaque-eaque-non-dolores-facilis-qui-rerum\', \'2020-01-01 14:01:09\', \'2020-01-01 14:01:09\')\",\"time\":\"35.72\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(25,'8f820d05-9d32-4ee9-9df6-a545354684a2','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:7\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(26,'8f820d05-ac63-4fca-943b-bbf4f0052633','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'enim\', \'minima-alias-dolores-vero-et-doloribus-nulla-quia-iste\', \'2020-01-01 14:01:09\', \'2020-01-01 14:01:09\')\",\"time\":\"37.56\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(27,'8f820d05-aca0-421e-ba2f-75aa10b9f7fb','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:8\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:09'),
(28,'8f820d05-e220-4a6e-8d70-d0d0b7e54038','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'numquam\', \'ut-iure-et-magnam-vel-non\', \'2020-01-01 14:01:09\', \'2020-01-01 14:01:09\')\",\"time\":\"136.11\",\"slow\":true,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:10'),
(29,'8f820d05-e270-485d-8c2f-e8d5d0f0a9a8','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:9\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:10'),
(30,'8f820d06-052b-4958-bce8-487ca8e166f8','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `category` (`name`, `slug`, `updated_at`, `created_at`) values (\'necessitatibus\', \'neque-est-quia-incidunt-autem\', \'2020-01-01 14:01:10\', \'2020-01-01 14:01:10\')\",\"time\":\"87.57\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\CategoryTableSeeder.php\",\"line\":15,\"hash\":\"d1d78b93689969a1f2b9af8992cdf576\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:10'),
(31,'8f820d06-05ca-4887-bb9e-d27d92d47efa','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Category:10\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:10'),
(32,'8f820d06-0752-4f77-b021-3a5ee950c281','8f820d06-079b-44ee-983d-79c195d07974',NULL,1,'command','{\"command\":\"db:seed\",\"exit_code\":0,\"arguments\":{\"command\":\"db:seed\"},\"options\":{\"class\":\"DatabaseSeeder\",\"database\":null,\"force\":false,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:01:10'),
(33,'8f820e11-3d4a-4d78-9223-b3ab1e6e6487','8f820e11-6a20-489e-a837-8c8d55cfbc73','c281f651fd0e0bef9da35320299cc4ad',0,'exception','{\"class\":\"Illuminate\\\\Database\\\\QueryException\",\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":669,\"message\":\"SQLSTATE[HY000]: General error: 1364 Field \'role_id\' doesn\'t have a default value (SQL: insert into `users` (`name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`) values (Marc Kessler, antwan02@example.org, (327) 261-7330 x9835, 9407 Chasity Points\\nSchaefermouth, HI 80777-8053, 2020-01-01 14:04:05, $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi, JRQ3AqFr35, 2020-01-01 14:04:05, 2020-01-01 14:04:05))\",\"trace\":[{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":629,\"function\":\"runQueryCallback\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `users` (`name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`) values (?, ?, ?, ?, ?, ?, ?, ?, ?)\",[\"Marc Kessler\",\"antwan02@example.org\",\"(327) 261-7330 x9835\",\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"2020-01-01 14:04:05\",\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"JRQ3AqFr35\",\"2020-01-01 14:04:05\",\"2020-01-01 14:04:05\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":464,\"function\":\"run\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `users` (`name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`) values (?, ?, ?, ?, ?, ?, ?, ?, ?)\",[\"Marc Kessler\",\"antwan02@example.org\",\"(327) 261-7330 x9835\",\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"2020-01-01 14:04:05\",\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"JRQ3AqFr35\",\"2020-01-01 14:04:05\",\"2020-01-01 14:04:05\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":416,\"function\":\"statement\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `users` (`name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`) values (?, ?, ?, ?, ?, ?, ?, ?, ?)\",[\"Marc Kessler\",\"antwan02@example.org\",\"(327) 261-7330 x9835\",\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"2020-01-01 14:04:05\",\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"JRQ3AqFr35\",\"2020-01-01 14:04:05\",\"2020-01-01 14:04:05\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Processors\\\\Processor.php\",\"line\":32,\"function\":\"insert\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `users` (`name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`) values (?, ?, ?, ?, ?, ?, ?, ?, ?)\",[\"Marc Kessler\",\"antwan02@example.org\",\"(327) 261-7330 x9835\",\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"2020-01-01 14:04:05\",\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"JRQ3AqFr35\",\"2020-01-01 14:04:05\",\"2020-01-01 14:04:05\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Builder.php\",\"line\":2670,\"function\":\"processInsertGetId\",\"class\":\"Illuminate\\\\Database\\\\Query\\\\Processors\\\\Processor\",\"type\":\"->\",\"args\":[{\"connection\":{},\"grammar\":{},\"processor\":{},\"bindings\":{\"select\":[],\"from\":[],\"join\":[],\"where\":[],\"having\":[],\"order\":[],\"union\":[],\"unionOrder\":[]},\"aggregate\":null,\"columns\":null,\"distinct\":false,\"from\":\"users\",\"joins\":null,\"wheres\":[],\"groups\":null,\"havings\":null,\"orders\":null,\"limit\":null,\"offset\":null,\"unions\":null,\"unionLimit\":null,\"unionOffset\":null,\"unionOrders\":null,\"lock\":null,\"operators\":[\"=\",\"<\",\">\",\"<=\",\">=\",\"<>\",\"!=\",\"<=>\",\"like\",\"like binary\",\"not like\",\"ilike\",\"&\",\"|\",\"^\",\"<<\",\">>\",\"rlike\",\"not rlike\",\"regexp\",\"not regexp\",\"~\",\"~*\",\"!~\",\"!~*\",\"similar to\",\"not similar to\",\"not ilike\",\"~~*\",\"!~~*\"],\"useWritePdo\":false},\"insert into `users` (`name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`) values (?, ?, ?, ?, ?, ?, ?, ?, ?)\",[\"Marc Kessler\",\"antwan02@example.org\",\"(327) 261-7330 x9835\",\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"2020-01-01 14:04:05\",\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"JRQ3AqFr35\",\"2020-01-01 14:04:05\",\"2020-01-01 14:04:05\"],\"id\"]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Builder.php\",\"line\":1350,\"function\":\"insertGetId\",\"class\":\"Illuminate\\\\Database\\\\Query\\\\Builder\",\"type\":\"->\",\"args\":[[\"Marc Kessler\",\"antwan02@example.org\",\"(327) 261-7330 x9835\",\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"2020-01-01 14:04:05\",\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"JRQ3AqFr35\",\"2020-01-01 14:04:05\",\"2020-01-01 14:04:05\"],\"id\"]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":839,\"function\":\"__call\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Builder\",\"type\":\"->\",\"args\":[\"insertGetId\",[{\"name\":\"Marc Kessler\",\"email\":\"antwan02@example.org\",\"phone\":\"(327) 261-7330 x9835\",\"address\":\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"email_verified_at\":\"2020-01-01 14:04:05\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"remember_token\":\"JRQ3AqFr35\",\"updated_at\":\"2020-01-01 14:04:05\",\"created_at\":\"2020-01-01 14:04:05\"},\"id\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":804,\"function\":\"insertAndSetId\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[{},{\"name\":\"Marc Kessler\",\"email\":\"antwan02@example.org\",\"phone\":\"(327) 261-7330 x9835\",\"address\":\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"email_verified_at\":\"2020-01-01 14:04:05\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"remember_token\":\"JRQ3AqFr35\",\"updated_at\":\"2020-01-01 14:04:05\",\"created_at\":\"2020-01-01 14:04:05\"}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":667,\"function\":\"performInsert\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder.php\",\"line\":206,\"function\":\"save\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\Traits\\\\EnumeratesValues.php\",\"line\":176,\"function\":\"Illuminate\\\\Database\\\\Eloquent\\\\{closure}\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder\",\"type\":\"->\",\"args\":[{\"name\":\"Marc Kessler\",\"email\":\"antwan02@example.org\",\"phone\":\"(327) 261-7330 x9835\",\"address\":\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"email_verified_at\":\"2020-01-01 14:04:05\",\"updated_at\":\"2020-01-01 14:04:05\",\"created_at\":\"2020-01-01 14:04:05\"},0]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder.php\",\"line\":207,\"function\":\"each\",\"class\":\"Illuminate\\\\Support\\\\Collection\",\"type\":\"->\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder.php\",\"line\":185,\"function\":\"store\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder\",\"type\":\"->\",\"args\":[[{\"name\":\"Marc Kessler\",\"email\":\"antwan02@example.org\",\"phone\":\"(327) 261-7330 x9835\",\"address\":\"9407 Chasity Points\\nSchaefermouth, HI 80777-8053\",\"email_verified_at\":\"2020-01-01 14:04:05\",\"updated_at\":\"2020-01-01 14:04:05\",\"created_at\":\"2020-01-01 14:04:05\"},{\"name\":\"Kayley Lind\",\"email\":\"cassidy89@example.net\",\"phone\":\"1-717-946-6052 x2201\",\"address\":\"209 Anibal Isle\\nEast Verlaland, TX 99832-5299\",\"email_verified_at\":\"2020-01-01 14:04:05\"},{\"name\":\"Joelle Becker\",\"email\":\"monroe51@example.net\",\"phone\":\"1-723-451-0453 x5303\",\"address\":\"69883 Ariane Skyway\\nAnahimouth, AK 15530\",\"email_verified_at\":\"2020-01-01 14:04:05\"},{\"name\":\"Woodrow Cummings I\",\"email\":\"roscoe.beahan@example.org\",\"phone\":\"1-442-273-2640 x2502\",\"address\":\"720 Johnathon Passage\\nReillyhaven, MD 93062\",\"email_verified_at\":\"2020-01-01 14:04:05\"},{\"name\":\"Sabina Klein\",\"email\":\"audrey.schowalter@example.com\",\"phone\":\"905.821.8814 x62606\",\"address\":\"6055 Hermiston Fort\\nTrompberg, WA 21212-1997\",\"email_verified_at\":\"2020-01-01 14:04:05\"},{\"name\":\"Ramona Crooks DVM\",\"email\":\"hannah96@example.net\",\"phone\":\"+1-589-388-0080\",\"address\":\"7183 Wuckert Cliff Suite 599\\nLarkinburgh, MT 94006-1850\",\"email_verified_at\":\"2020-01-01 14:04:05\"},{\"name\":\"Kenyatta Mante\",\"email\":\"tia89@example.com\",\"phone\":\"1-838-807-5167 x44475\",\"address\":\"161 Isobel Parks\\nBergstrommouth, WV 11796-1029\",\"email_verified_at\":\"2020-01-01 14:04:05\"},{\"name\":\"Mr. Rashad Ebert II\",\"email\":\"nova.parisian@example.org\",\"phone\":\"586.471.1952\",\"address\":\"802 Korbin Well Suite 193\\nMcGlynnfurt, SC 55920\",\"email_verified_at\":\"2020-01-01 14:04:05\"},{\"name\":\"Valentine Schaden\",\"email\":\"renner.alayna@example.com\",\"phone\":\"1-540-516-6824 x344\",\"address\":\"6066 Lydia Terrace Suite 484\\nPort Maymie, ID 63156-4400\",\"email_verified_at\":\"2020-01-01 14:04:05\"},{\"name\":\"Ruthie D\'Amore\",\"email\":\"tbecker@example.com\",\"phone\":\"1-607-997-9717\",\"address\":\"2352 Tyrel Isle Apt. 511\\nIvahmouth, KY 20590-6454\",\"email_verified_at\":\"2020-01-01 14:04:05\"}]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\UsersTableSeeder.php\",\"line\":15,\"function\":\"create\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\FactoryBuilder\",\"type\":\"->\",\"args\":[]},{\"function\":\"run\",\"class\":\"UsersTableSeeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"run\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":134,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"run\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":48,\"function\":\"__invoke\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\DatabaseSeeder.php\",\"line\":16,\"function\":\"call\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[\"UsersTableSeeder\"]},{\"function\":\"run\",\"class\":\"DatabaseSeeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"run\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":134,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"run\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand.php\",\"line\":63,\"function\":\"__invoke\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Concerns\\\\GuardsAttributes.php\",\"line\":122,\"function\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\{closure}\",\"class\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand.php\",\"line\":64,\"function\":\"unguarded\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"::\",\"args\":[{}]},{\"function\":\"handle\",\"class\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"handle\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"handle\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"handle\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Command.php\",\"line\":202,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"handle\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Command\\\\Command.php\",\"line\":255,\"function\":\"execute\",\"class\":\"Illuminate\\\\Console\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Command.php\",\"line\":189,\"function\":\"run\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Command\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":1011,\"function\":\"run\",\"class\":\"Illuminate\\\\Console\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":272,\"function\":\"doRunCommand\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":148,\"function\":\"doRun\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Application.php\",\"line\":93,\"function\":\"run\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Console\\\\Kernel.php\",\"line\":131,\"function\":\"run\",\"class\":\"Illuminate\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\artisan\",\"line\":37,\"function\":\"handle\",\"class\":\"Illuminate\\\\Foundation\\\\Console\\\\Kernel\",\"type\":\"->\",\"args\":[{},{}]}],\"line_preview\":{\"660\":\"        \\/\\/ took to execute and log the query SQL, bindings and time in our memory.\",\"661\":\"        try {\",\"662\":\"            $result = $callback($query, $bindings);\",\"663\":\"        }\",\"664\":\"\",\"665\":\"        \\/\\/ If an exception occurs when attempting to run a query, we\'ll format the error\",\"666\":\"        \\/\\/ message to include the bindings with SQL, which will make this exception a\",\"667\":\"        \\/\\/ lot more helpful to the developer instead of just the database\'s errors.\",\"668\":\"        catch (Exception $e) {\",\"669\":\"            throw new QueryException(\",\"670\":\"                $query, $this->prepareBindings($bindings), $e\",\"671\":\"            );\",\"672\":\"        }\",\"673\":\"\",\"674\":\"        return $result;\",\"675\":\"    }\",\"676\":\"\",\"677\":\"    \\/**\",\"678\":\"     * Log a query in the connection\'s query log.\",\"679\":\"     *\"},\"hostname\":\"DESKTOP-1GD480D\",\"occurrences\":2}','2020-01-01 14:04:05'),
(34,'8f821131-c457-41ad-92e2-b23c0017bf59','8f821132-8572-4ce9-aaf4-935d7b6f09f1',NULL,1,'view','{\"name\":\"welcome\",\"path\":\"\\\\resources\\\\views\\/welcome.blade.php\",\"data\":[],\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:12:50'),
(35,'8f821132-8517-4db0-a4dc-cc93872fa740','8f821132-8572-4ce9-aaf4-935d7b6f09f1',NULL,1,'request','{\"uri\":\"\\/\",\"method\":\"GET\",\"controller_action\":\"Closure\",\"middleware\":[\"web\"],\"headers\":{\"host\":\"agrox.build\",\"connection\":\"keep-alive\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/79.0.3945.88 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"purpose\":\"prefetch\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,fr;q=0.8,la;q=0.7\"},\"payload\":[],\"session\":{\"_token\":\"aieiT5rwAKJhWAZH2kvhzcvc543wTyNhGwjfX9Ik\",\"_flash\":{\"old\":[],\"new\":[]}},\"response_status\":200,\"response\":{\"view\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\resources\\\\views\\/welcome.blade.php\",\"data\":[]},\"duration\":7738,\"memory\":4,\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:12:50'),
(36,'8f821212-f71e-48f5-bd91-4f891888a452','8f821213-a04e-494a-bdb9-0543da50db59','275556ec27cb217c77653165419983f8',1,'exception','{\"class\":\"BadMethodCallException\",\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\Traits\\\\ForwardsCalls.php\",\"line\":50,\"message\":\"Call to undefined method App\\\\Role::setContainer()\",\"trace\":[{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\Traits\\\\ForwardsCalls.php\",\"line\":36,\"function\":\"throwBadMethodCallException\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"::\",\"args\":[\"setContainer\"]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":1618,\"function\":\"forwardCallTo\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[{},\"setContainer\",[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}}]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":82,\"function\":\"__call\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[\"setContainer\",[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}}]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":38,\"function\":\"resolve\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[\"App\\\\Role\"]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\DatabaseSeeder.php\",\"line\":17,\"function\":\"call\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[\"App\\\\Role\"]},{\"function\":\"run\",\"class\":\"DatabaseSeeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"run\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":134,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"run\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand.php\",\"line\":63,\"function\":\"__invoke\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Concerns\\\\GuardsAttributes.php\",\"line\":122,\"function\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\{closure}\",\"class\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand.php\",\"line\":64,\"function\":\"unguarded\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"::\",\"args\":[{}]},{\"function\":\"handle\",\"class\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"handle\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"handle\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"handle\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Command.php\",\"line\":202,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"handle\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Command\\\\Command.php\",\"line\":255,\"function\":\"execute\",\"class\":\"Illuminate\\\\Console\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Command.php\",\"line\":189,\"function\":\"run\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Command\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":1011,\"function\":\"run\",\"class\":\"Illuminate\\\\Console\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":272,\"function\":\"doRunCommand\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":148,\"function\":\"doRun\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Application.php\",\"line\":93,\"function\":\"run\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Console\\\\Kernel.php\",\"line\":131,\"function\":\"run\",\"class\":\"Illuminate\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\artisan\",\"line\":37,\"function\":\"handle\",\"class\":\"Illuminate\\\\Foundation\\\\Console\\\\Kernel\",\"type\":\"->\",\"args\":[{},{}]}],\"line_preview\":{\"41\":\"     * Throw a bad method call exception for the given method.\",\"42\":\"     *\",\"43\":\"     * @param  string  $method\",\"44\":\"     * @return void\",\"45\":\"     *\",\"46\":\"     * @throws \\\\BadMethodCallException\",\"47\":\"     *\\/\",\"48\":\"    protected static function throwBadMethodCallException($method)\",\"49\":\"    {\",\"50\":\"        throw new BadMethodCallException(sprintf(\",\"51\":\"            \'Call to undefined method %s::%s()\', static::class, $method\",\"52\":\"        ));\",\"53\":\"    }\",\"54\":\"}\",\"55\":\"\"},\"hostname\":\"DESKTOP-1GD480D\",\"occurrences\":1}','2020-01-01 14:15:17'),
(37,'8f82126d-cfac-48fc-8513-83db9c7b6722','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`name`, `description`, `updated_at`, `created_at`) values (\'Admin\', \'Admin role description\', \'2020-01-01 14:16:16\', \'2020-01-01 14:16:16\')\",\"time\":\"64.01\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\RolesTableSeeder.php\",\"line\":16,\"hash\":\"00f695c25a67b4ae1af64a0d9d21e761\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(38,'8f82126d-d99b-43b0-95aa-495cdb5f0f4a','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Role:1\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(39,'8f82126d-f37b-4d33-8a58-cc1746cc4178','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`name`, `description`, `updated_at`, `created_at`) values (\'Farmer\', \'Farmer role description\', \'2020-01-01 14:16:17\', \'2020-01-01 14:16:17\')\",\"time\":\"65.13\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\RolesTableSeeder.php\",\"line\":21,\"hash\":\"00f695c25a67b4ae1af64a0d9d21e761\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(40,'8f82126d-f3cb-49f4-b8cc-fc6b6fe76193','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Role:2\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(41,'8f82126e-34f7-4311-bf33-7332bc8c0859','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`name`, `description`, `updated_at`, `created_at`) values (\'Consultant\', \'Consultant role description\', \'2020-01-01 14:16:17\', \'2020-01-01 14:16:17\')\",\"time\":\"165.58\",\"slow\":true,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\RolesTableSeeder.php\",\"line\":26,\"hash\":\"00f695c25a67b4ae1af64a0d9d21e761\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(42,'8f82126e-3548-4d5c-a1d9-e37d16956270','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Role:3\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(43,'8f82126e-7157-46f7-9daa-4b45c77fe9cb','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`name`, `description`, `updated_at`, `created_at`) values (\'Academic\', \'Academic role description\', \'2020-01-01 14:16:17\', \'2020-01-01 14:16:17\')\",\"time\":\"152.33\",\"slow\":true,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\RolesTableSeeder.php\",\"line\":31,\"hash\":\"00f695c25a67b4ae1af64a0d9d21e761\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(44,'8f82126e-71f8-43cb-8210-8e8ebc2ebfe7','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Role:4\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(45,'8f82126e-852c-4b3c-af98-e9309727ba65','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `roles` (`name`, `description`, `updated_at`, `created_at`) values (\'Other\', \'Other role description\', \'2020-01-01 14:16:17\', \'2020-01-01 14:16:17\')\",\"time\":\"46.89\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\RolesTableSeeder.php\",\"line\":36,\"hash\":\"00f695c25a67b4ae1af64a0d9d21e761\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(46,'8f82126e-8573-484d-b311-b7e63411a4c8','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Role:5\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(47,'8f82126e-8d91-4595-bde9-4a8915a05bdc','8f82126e-8e1c-4847-ad17-2a88c31b704c',NULL,1,'command','{\"command\":\"db:seed\",\"exit_code\":0,\"arguments\":{\"command\":\"db:seed\"},\"options\":{\"class\":\"DatabaseSeeder\",\"database\":null,\"force\":false,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:16:17'),
(48,'8f821385-822b-4933-b8ff-4fa7888033bd','8f821385-8c1e-4e4c-854e-70c8c2e8d890',NULL,1,'view','{\"name\":\"welcome\",\"path\":\"\\\\resources\\\\views\\/welcome.blade.php\",\"data\":[],\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:19:20'),
(49,'8f821385-8bb4-4cf7-b5a4-dd21f3b42cd3','8f821385-8c1e-4e4c-854e-70c8c2e8d890',NULL,1,'request','{\"uri\":\"\\/\",\"method\":\"GET\",\"controller_action\":\"Closure\",\"middleware\":[\"web\"],\"headers\":{\"host\":\"agrox.build\",\"connection\":\"keep-alive\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/79.0.3945.88 Safari\\/537.36\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.9\",\"purpose\":\"prefetch\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,fr;q=0.8,la;q=0.7\"},\"payload\":[],\"session\":{\"_token\":\"loveYEsxvM9hD3zzOqgphR1YqRdDCJUeAsTuVeso\",\"_flash\":{\"old\":[],\"new\":[]}},\"response_status\":200,\"response\":{\"view\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\resources\\\\views\\/welcome.blade.php\",\"data\":[]},\"duration\":888,\"memory\":4,\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:19:20'),
(50,'8f821400-e73c-4c76-bee5-0c21da7332a7','8f821401-23ad-4515-aa3a-91a652d960dc',NULL,1,'view','{\"name\":\"auth.register\",\"path\":\"\\\\resources\\\\views\\/auth\\/register.blade.php\",\"data\":[],\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:20:41'),
(51,'8f821401-149c-4988-a233-0695227195d3','8f821401-23ad-4515-aa3a-91a652d960dc',NULL,1,'view','{\"name\":\"layouts.app\",\"path\":\"\\\\resources\\\\views\\/layouts\\/app.blade.php\",\"data\":[],\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:20:41'),
(52,'8f821401-232c-49a1-aa3b-75b53ed564ce','8f821401-23ad-4515-aa3a-91a652d960dc',NULL,1,'request','{\"uri\":\"\\/register\",\"method\":\"GET\",\"controller_action\":\"App\\\\Http\\\\Controllers\\\\Auth\\\\RegisterController@showRegistrationForm\",\"middleware\":[\"web\",\"guest\"],\"headers\":{\"host\":\"agrox.build\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/79.0.3945.88 Safari\\/537.36\",\"accept\":\"*\\/*\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,fr;q=0.8,la;q=0.7\"},\"payload\":[],\"session\":{\"_token\":\"wNcmUJDERoIwcfIJHff6rzNhDwH6twEKdp2bufg8\",\"_previous\":{\"url\":\"http:\\/\\/agrox.build\\/register\"},\"_flash\":{\"old\":[],\"new\":[]}},\"response_status\":200,\"response\":{\"view\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\resources\\\\views\\/auth\\/register.blade.php\",\"data\":[]},\"duration\":578,\"memory\":2,\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:20:41'),
(53,'8f821401-de2f-4f36-a754-725b92b03545','8f821401-f424-4c35-90b2-1fae2c611f6c',NULL,1,'view','{\"name\":\"auth.login\",\"path\":\"\\\\resources\\\\views\\/auth\\/login.blade.php\",\"data\":[],\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:20:41'),
(54,'8f821401-edb9-4fe8-b9eb-50acb80fccd0','8f821401-f424-4c35-90b2-1fae2c611f6c',NULL,1,'view','{\"name\":\"layouts.app\",\"path\":\"\\\\resources\\\\views\\/layouts\\/app.blade.php\",\"data\":[],\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:20:41'),
(55,'8f821401-f3ad-45f6-b44b-907dc64fa036','8f821401-f424-4c35-90b2-1fae2c611f6c',NULL,1,'request','{\"uri\":\"\\/login\",\"method\":\"GET\",\"controller_action\":\"App\\\\Http\\\\Controllers\\\\Auth\\\\LoginController@showLoginForm\",\"middleware\":[\"web\",\"guest\"],\"headers\":{\"host\":\"agrox.build\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/79.0.3945.88 Safari\\/537.36\",\"accept\":\"*\\/*\",\"accept-encoding\":\"gzip, deflate\",\"accept-language\":\"en-US,en;q=0.9,fr;q=0.8,la;q=0.7\"},\"payload\":[],\"session\":{\"_token\":\"wknrJe6nb53IPGH5w4fmt5DJcgAmXGTG13ne1ReU\",\"_previous\":{\"url\":\"http:\\/\\/agrox.build\\/login\"},\"_flash\":{\"old\":[],\"new\":[]}},\"response_status\":200,\"response\":{\"view\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\resources\\\\views\\/auth\\/login.blade.php\",\"data\":[]},\"duration\":395,\"memory\":2,\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:20:41'),
(56,'8f8216fe-435f-4f0f-ab08-cba2f0ab909f','8f8216fe-7683-40c9-bbad-2118bf8bf4b3','c281f651fd0e0bef9da35320299cc4ad',1,'exception','{\"class\":\"Illuminate\\\\Database\\\\QueryException\",\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":669,\"message\":\"SQLSTATE[42S22]: Column not found: 1054 Unknown column \'description\' in \'field list\' (SQL: insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (Expert, You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used., 2020-01-01 14:29:02, 2020-01-01 14:29:02))\",\"trace\":[{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":629,\"function\":\"runQueryCallback\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"Expert\",\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"2020-01-01 14:29:02\",\"2020-01-01 14:29:02\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":464,\"function\":\"run\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"Expert\",\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"2020-01-01 14:29:02\",\"2020-01-01 14:29:02\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Connection.php\",\"line\":416,\"function\":\"statement\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"Expert\",\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"2020-01-01 14:29:02\",\"2020-01-01 14:29:02\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Processors\\\\Processor.php\",\"line\":32,\"function\":\"insert\",\"class\":\"Illuminate\\\\Database\\\\Connection\",\"type\":\"->\",\"args\":[\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"Expert\",\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"2020-01-01 14:29:02\",\"2020-01-01 14:29:02\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Query\\\\Builder.php\",\"line\":2670,\"function\":\"processInsertGetId\",\"class\":\"Illuminate\\\\Database\\\\Query\\\\Processors\\\\Processor\",\"type\":\"->\",\"args\":[{\"connection\":{},\"grammar\":{},\"processor\":{},\"bindings\":{\"select\":[],\"from\":[],\"join\":[],\"where\":[],\"having\":[],\"order\":[],\"union\":[],\"unionOrder\":[]},\"aggregate\":null,\"columns\":null,\"distinct\":false,\"from\":\"proficiencies\",\"joins\":null,\"wheres\":[],\"groups\":null,\"havings\":null,\"orders\":null,\"limit\":null,\"offset\":null,\"unions\":null,\"unionLimit\":null,\"unionOffset\":null,\"unionOrders\":null,\"lock\":null,\"operators\":[\"=\",\"<\",\">\",\"<=\",\">=\",\"<>\",\"!=\",\"<=>\",\"like\",\"like binary\",\"not like\",\"ilike\",\"&\",\"|\",\"^\",\"<<\",\">>\",\"rlike\",\"not rlike\",\"regexp\",\"not regexp\",\"~\",\"~*\",\"!~\",\"!~*\",\"similar to\",\"not similar to\",\"not ilike\",\"~~*\",\"!~~*\"],\"useWritePdo\":false},\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (?, ?, ?, ?)\",[\"Expert\",\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"2020-01-01 14:29:02\",\"2020-01-01 14:29:02\"],\"id\"]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Builder.php\",\"line\":1350,\"function\":\"insertGetId\",\"class\":\"Illuminate\\\\Database\\\\Query\\\\Builder\",\"type\":\"->\",\"args\":[[\"Expert\",\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"2020-01-01 14:29:02\",\"2020-01-01 14:29:02\"],\"id\"]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":839,\"function\":\"__call\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Builder\",\"type\":\"->\",\"args\":[\"insertGetId\",[{\"proficiency\":\"Expert\",\"description\":\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"updated_at\":\"2020-01-01 14:29:02\",\"created_at\":\"2020-01-01 14:29:02\"},\"id\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":804,\"function\":\"insertAndSetId\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[{},{\"proficiency\":\"Expert\",\"description\":\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"updated_at\":\"2020-01-01 14:29:02\",\"created_at\":\"2020-01-01 14:29:02\"}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":667,\"function\":\"performInsert\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Builder.php\",\"line\":749,\"function\":\"save\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php\",\"line\":422,\"function\":\"Illuminate\\\\Database\\\\Eloquent\\\\{closure}\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Builder\",\"type\":\"->\",\"args\":[{\"proficiency\":\"Expert\",\"description\":\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"updated_at\":\"2020-01-01 14:29:02\",\"created_at\":\"2020-01-01 14:29:02\"}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Builder.php\",\"line\":750,\"function\":\"tap\",\"args\":[{\"proficiency\":\"Expert\",\"description\":\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\",\"updated_at\":\"2020-01-01 14:29:02\",\"created_at\":\"2020-01-01 14:29:02\"},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\Traits\\\\ForwardsCalls.php\",\"line\":23,\"function\":\"create\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Builder\",\"type\":\"->\",\"args\":[{\"proficiency\":\"Expert\",\"description\":\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\"}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":1618,\"function\":\"forwardCallTo\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[{},\"create\",[{\"proficiency\":\"Expert\",\"description\":\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\"}]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Model.php\",\"line\":1630,\"function\":\"__call\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"->\",\"args\":[\"create\",[{\"proficiency\":\"Expert\",\"description\":\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\"}]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\ProficienciesTableSeeder.php\",\"line\":16,\"function\":\"__callStatic\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"::\",\"args\":[\"create\",[{\"proficiency\":\"Expert\",\"description\":\"You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\"}]]},{\"function\":\"run\",\"class\":\"ProficienciesTableSeeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"run\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":134,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"run\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":48,\"function\":\"__invoke\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\DatabaseSeeder.php\",\"line\":18,\"function\":\"call\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[\"ProficienciesTableSeeder\"]},{\"function\":\"run\",\"class\":\"DatabaseSeeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"run\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"run\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Seeder.php\",\"line\":134,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"run\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand.php\",\"line\":63,\"function\":\"__invoke\",\"class\":\"Illuminate\\\\Database\\\\Seeder\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Eloquent\\\\Concerns\\\\GuardsAttributes.php\",\"line\":122,\"function\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\{closure}\",\"class\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand.php\",\"line\":64,\"function\":\"unguarded\",\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Model\",\"type\":\"::\",\"args\":[{}]},{\"function\":\"handle\",\"class\":\"Illuminate\\\\Database\\\\Console\\\\Seeds\\\\SeedCommand\",\"type\":\"->\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":32,\"function\":\"call_user_func_array\",\"args\":[[{},\"handle\"],[]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Util.php\",\"line\":36,\"function\":\"Illuminate\\\\Container\\\\{closure}\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":90,\"function\":\"unwrapIfClosure\",\"class\":\"Illuminate\\\\Container\\\\Util\",\"type\":\"::\",\"args\":[{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\BoundMethod.php\",\"line\":34,\"function\":\"callBoundMethod\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"handle\"],{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Container\\\\Container.php\",\"line\":590,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\BoundMethod\",\"type\":\"::\",\"args\":[{\"contextual\":{\"Laravel\\\\Telescope\\\\Storage\\\\DatabaseEntriesRepository\":{\"$connection\":\"mysql\",\"$chunkSize\":1000}}},[{},\"handle\"],[],null]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Command.php\",\"line\":202,\"function\":\"call\",\"class\":\"Illuminate\\\\Container\\\\Container\",\"type\":\"->\",\"args\":[[{},\"handle\"]]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Command\\\\Command.php\",\"line\":255,\"function\":\"execute\",\"class\":\"Illuminate\\\\Console\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Command.php\",\"line\":189,\"function\":\"run\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Command\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":1011,\"function\":\"run\",\"class\":\"Illuminate\\\\Console\\\\Command\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":272,\"function\":\"doRunCommand\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":148,\"function\":\"doRun\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Console\\\\Application.php\",\"line\":93,\"function\":\"run\",\"class\":\"Symfony\\\\Component\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Console\\\\Kernel.php\",\"line\":131,\"function\":\"run\",\"class\":\"Illuminate\\\\Console\\\\Application\",\"type\":\"->\",\"args\":[{},{}]},{\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\artisan\",\"line\":37,\"function\":\"handle\",\"class\":\"Illuminate\\\\Foundation\\\\Console\\\\Kernel\",\"type\":\"->\",\"args\":[{},{}]}],\"line_preview\":{\"660\":\"        \\/\\/ took to execute and log the query SQL, bindings and time in our memory.\",\"661\":\"        try {\",\"662\":\"            $result = $callback($query, $bindings);\",\"663\":\"        }\",\"664\":\"\",\"665\":\"        \\/\\/ If an exception occurs when attempting to run a query, we\'ll format the error\",\"666\":\"        \\/\\/ message to include the bindings with SQL, which will make this exception a\",\"667\":\"        \\/\\/ lot more helpful to the developer instead of just the database\'s errors.\",\"668\":\"        catch (Exception $e) {\",\"669\":\"            throw new QueryException(\",\"670\":\"                $query, $this->prepareBindings($bindings), $e\",\"671\":\"            );\",\"672\":\"        }\",\"673\":\"\",\"674\":\"        return $result;\",\"675\":\"    }\",\"676\":\"\",\"677\":\"    \\/**\",\"678\":\"     * Log a query in the connection\'s query log.\",\"679\":\"     *\"},\"hostname\":\"DESKTOP-1GD480D\",\"occurrences\":3}','2020-01-01 14:29:02'),
(57,'8f821757-9ee1-4163-9ac9-960855e8bd97','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (\'Expert\', \'You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.\', \'2020-01-01 14:30:01\', \'2020-01-01 14:30:01\')\",\"time\":\"46.80\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\ProficienciesTableSeeder.php\",\"line\":16,\"hash\":\"75ba456069f77ec417180e9840e623f4\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(58,'8f821757-a449-4554-a371-6ca5ee85f191','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Proficiency:1\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(59,'8f821757-c2d0-455e-a74d-64349b858f27','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (\'Advanced\', \'You can perform the actions associated with this skill without assistance. You are certainly recognized within your immediate organization as \\\\\\\"a person to ask\\\\\\\" when difficult questions arise regarding this skill.\', \'2020-01-01 14:30:01\', \'2020-01-01 14:30:01\')\",\"time\":\"77.13\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\ProficienciesTableSeeder.php\",\"line\":21,\"hash\":\"75ba456069f77ec417180e9840e623f4\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(60,'8f821757-c32a-4d3f-840c-593585bfa311','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Proficiency:2\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(61,'8f821757-f6a9-4104-b9ae-f551caf01a38','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (\'Intermediate\', \'You are able to successfully complete tasks in this competency as requested. Help from an expert may be required from time to time, but you can usually perform the skill independently.\', \'2020-01-01 14:30:01\', \'2020-01-01 14:30:01\')\",\"time\":\"130.36\",\"slow\":true,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\ProficienciesTableSeeder.php\",\"line\":26,\"hash\":\"75ba456069f77ec417180e9840e623f4\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(62,'8f821757-f716-42ff-abd0-17ca539e0a67','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Proficiency:3\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(63,'8f821758-06d5-4bd8-ab02-ee1e003fda59','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (\'Novice\', \'You have the level of experience gained in a classroom and\\/or experimental scenarios or as a trainee on-the-job. You are expected to need help when performing this skill.\', \'2020-01-01 14:30:01\', \'2020-01-01 14:30:01\')\",\"time\":\"38.51\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\ProficienciesTableSeeder.php\",\"line\":31,\"hash\":\"75ba456069f77ec417180e9840e623f4\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(64,'8f821758-0764-4fd9-a6df-d81dfe84e766','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Proficiency:4\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(65,'8f821758-151f-48f7-ae40-8a855faa41f8','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'query','{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `proficiencies` (`proficiency`, `description`, `updated_at`, `created_at`) values (\'Not Applicable\', \'You have a common knowledge or an understanding of basic techniques and concepts.\', \'2020-01-01 14:30:01\', \'2020-01-01 14:30:01\')\",\"time\":\"32.90\",\"slow\":false,\"file\":\"C:\\\\xampp\\\\htdocs\\\\agrox\\\\database\\\\seeds\\\\ProficienciesTableSeeder.php\",\"line\":36,\"hash\":\"75ba456069f77ec417180e9840e623f4\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(66,'8f821758-15be-45a9-9913-a8df4098dab6','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'model','{\"action\":\"created\",\"model\":\"App\\\\Proficiency:5\",\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01'),
(67,'8f821758-17fd-45a3-b611-9454f869e5a5','8f821758-18c3-4466-933d-481acf573cd8',NULL,1,'command','{\"command\":\"db:seed\",\"exit_code\":0,\"arguments\":{\"command\":\"db:seed\"},\"options\":{\"class\":\"DatabaseSeeder\",\"database\":null,\"force\":false,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"DESKTOP-1GD480D\"}','2020-01-01 14:30:01');

/*Table structure for table `telescope_entries_tags` */

DROP TABLE IF EXISTS `telescope_entries_tags`;

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  KEY `telescope_entries_tags_tag_index` (`tag`),
  CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `telescope_entries_tags` */

insert  into `telescope_entries_tags`(`entry_uuid`,`tag`) values 
('8f820d05-073d-4f00-ba18-120fe136d49a','App\\Category:1'),
('8f820d05-1b46-43dd-a49d-3f73d8cd1ade','App\\Category:2'),
('8f820d05-6011-417b-b5d7-78abefdc9a92','slow'),
('8f820d05-6065-463c-9359-c6c9ce42ba45','App\\Category:3'),
('8f820d05-6feb-4591-b229-bfc9fdc7e2b3','App\\Category:4'),
('8f820d05-7eaf-4aff-a466-dfcb3ef5d45a','App\\Category:5'),
('8f820d05-8e61-43e9-b9e1-1893b0d14fb8','App\\Category:6'),
('8f820d05-9d32-4ee9-9df6-a545354684a2','App\\Category:7'),
('8f820d05-aca0-421e-ba2f-75aa10b9f7fb','App\\Category:8'),
('8f820d05-e220-4a6e-8d70-d0d0b7e54038','slow'),
('8f820d05-e270-485d-8c2f-e8d5d0f0a9a8','App\\Category:9'),
('8f820d06-05ca-4887-bb9e-d27d92d47efa','App\\Category:10'),
('8f82126d-d99b-43b0-95aa-495cdb5f0f4a','App\\Role:1'),
('8f82126d-f3cb-49f4-b8cc-fc6b6fe76193','App\\Role:2'),
('8f82126e-34f7-4311-bf33-7332bc8c0859','slow'),
('8f82126e-3548-4d5c-a1d9-e37d16956270','App\\Role:3'),
('8f82126e-7157-46f7-9daa-4b45c77fe9cb','slow'),
('8f82126e-71f8-43cb-8210-8e8ebc2ebfe7','App\\Role:4'),
('8f82126e-8573-484d-b311-b7e63411a4c8','App\\Role:5'),
('8f821757-a449-4554-a371-6ca5ee85f191','App\\Proficiency:1'),
('8f821757-c32a-4d3f-840c-593585bfa311','App\\Proficiency:2'),
('8f821757-f6a9-4104-b9ae-f551caf01a38','slow'),
('8f821757-f716-42ff-abd0-17ca539e0a67','App\\Proficiency:3'),
('8f821758-0764-4fd9-a6df-d81dfe84e766','App\\Proficiency:4'),
('8f821758-15be-45a9-9913-a8df4098dab6','App\\Proficiency:5');

/*Table structure for table `telescope_monitoring` */

DROP TABLE IF EXISTS `telescope_monitoring`;

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `telescope_monitoring` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `proficiency_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  KEY `users_proficiency_id_foreign` (`proficiency_id`),
  CONSTRAINT `users_proficiency_id_foreign` FOREIGN KEY (`proficiency_id`) REFERENCES `proficiencies` (`id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
