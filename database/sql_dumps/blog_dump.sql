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
  `tag` enum('success_story','farmer_experience') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`user_id`,`title`,`excerpt`,`body`,`featured_image`,`attachments`,`slug`,`post_type`,`tag`,`deleted_at`,`created_at`,`updated_at`) values 
(11,1,'Post - 1','Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.','<p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.<br></p><h3>Heading - 1</h3><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><h2>Headoiign 2</h2><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.<br></p>','product_images/AS4pTu3eIJsOX6Paj1yN222FNoJwsmM4vhpRbmQt.jpeg','post_attachments/gb6sXgkRFiMmt8cujy7iALnukNwAr37hrsWQU9nD.jpeg,post_attachments/TVEDvtq9MfIkhBslz6FW0AZGCylKyMNcgvlk3n8M.ppt,post_attachments/1Z7eLqialJrKkv58vsQHoGEhUyTbM7YWVb805zoA.pptx,post_attachments/Wkz0FES9TeC5i5T5nY03PyNOTs3I6qs9SCeP8ZUp.xlsx','post-1-tmhecyck5t','post',NULL,NULL,'2020-01-10 04:46:43','2020-01-10 04:46:43'),
(12,1,'Post - 2','Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.','<p>Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla porttitor accumsan tincidunt. Sed porttitor lectus nibh. Nulla porttitor accumsan tincidunt. <b>Curabi</b>tur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat.<br></p>','product_images/cgJPJMNuxSRd2jRWa3RHVJPZ9XPdpkQZYjwL6MG6.jpeg','','post-2-v4uk5olvj7','post','success_story',NULL,'2020-01-10 05:01:51','2020-01-10 05:30:42'),
(13,1,'Post - 3','Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.','<p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.<br></p><h3>Heading - 1</h3><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><h2>Headoiign 2</h2><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p><p>Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.<br></p>','product_images/t1FdUG6A5ZKoEfO29Le3YKppd5MzIFVZ7EEBsLxW.jpeg','','post-3-5zq04ovhxp','discussion','farmer_experience',NULL,'2020-01-10 05:21:59','2020-01-10 05:25:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
