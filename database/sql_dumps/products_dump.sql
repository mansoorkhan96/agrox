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

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `images` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_user_id_foreign` (`user_id`),
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`user_id`,`name`,`slug`,`price`,`description`,`featured_image`,`featured`,`quantity`,`images`,`deleted_at`,`created_at`,`updated_at`) values 
(14,1,'Product - 1','product-1-oa68o4jfko',777,'Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus.','product_images/zgwMgeUXq2HbyaXkYUNloBiRHkBIgsOpmUWtvvsX.jpeg',1,100,'product_images/NmIgUbKf2DtoMM1mkyevhEYFnv7Wdyb4nbQZjG9C.jpeg,product_images/hJFtpIc6m7zEQMYoWs0hxZEVRC13CdRqhPtKCU07.jpeg',NULL,'2020-01-07 04:48:33','2020-01-07 04:56:21'),
(15,1,'Product - 2','product-2-mlt9qis731',150,'Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus.','product_images/K44oUXR2A9Iw3jvDak85RKYv8JoFyU82wflQSl5Q.jpeg',1,99,'product_images/QWCWYnvwx1doPuCKprSfg9xFygYvlAxCOPPFGP3g.jpeg,product_images/r8HE10R17rpMFdbaqt7Oz3QVU98sU4yf0OzX7NVO.jpeg',NULL,'2020-01-07 04:50:57','2020-01-07 04:50:57'),
(16,1,'Product - 3','product-3-p5tnbekmy0',77,'Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus.','product_images/t1TAJi1SxodAZKYogxWOMx8yPaLtXsUg4tOsS23U.jpeg',1,99,'product_images/TL732DtVYIMPF94QbqaKRXZZjYKYK8ErEK4B0JH4.jpeg,product_images/xlTLza1ZLtJIqwEvgrjurWYNqeyLBJZuC0JNH2HD.jpeg',NULL,'2020-01-07 04:51:49','2020-01-07 04:51:49'),
(17,1,'Product -4','product-4-zzgctedjr8',12345,'Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus.','product_images/bjTw4BwTAHF7pPsU6xLvYdoGc0EPljwPvoOOsDNw.jpeg',1,99,'product_images/5EJ12UldXiUeNq7eZOs8URtgEoxsM9qD3jxz668P.jpeg,product_images/C7QQXXjHuN7zjR9IHaMYw9vMDv30sbSjGQkoQy3H.jpeg',NULL,'2020-01-07 04:52:38','2020-01-07 04:52:38'),
(18,1,'Product - 5','product-5-edicmy658d',777,'Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus.','product_images/pMuaHQk2gnl4pLbkZlh1e8kUfpwqvmQRL3ORi75u.jpeg',1,100,'product_images/NmIgUbKf2DtoMM1mkyevhEYFnv7Wdyb4nbQZjG9C.jpeg,product_images/hJFtpIc6m7zEQMYoWs0hxZEVRC13CdRqhPtKCU07.jpeg',NULL,'2020-01-07 04:48:33','2020-01-07 04:56:52'),
(19,1,'Product - 6','product-6-17sor7rmdr',777,'Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus.','product_images/HULc7enrTREbG7T0diKKK6hJl2535ykS4CezEpCO.jpeg',1,100,'product_images/NmIgUbKf2DtoMM1mkyevhEYFnv7Wdyb4nbQZjG9C.jpeg,product_images/hJFtpIc6m7zEQMYoWs0hxZEVRC13CdRqhPtKCU07.jpeg',NULL,'2020-01-07 04:48:33','2020-01-07 04:57:12'),
(20,1,'Product - 7','product-7-pkroxdlvet',777,'Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus.','product_images/sJACaDDipU2HgF9sP76Ilyx48rMxfqvmECSRbE9c.jpeg',1,100,'product_images/NmIgUbKf2DtoMM1mkyevhEYFnv7Wdyb4nbQZjG9C.jpeg,product_images/hJFtpIc6m7zEQMYoWs0hxZEVRC13CdRqhPtKCU07.jpeg',NULL,'2020-01-07 04:48:33','2020-01-07 04:57:29'),
(21,1,'Product - 8','product-8-p5tnbekmy0',77,'Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus.','product_images/t1TAJi1SxodAZKYogxWOMx8yPaLtXsUg4tOsS23U.jpeg',1,99,'product_images/TL732DtVYIMPF94QbqaKRXZZjYKYK8ErEK4B0JH4.jpeg,product_images/xlTLza1ZLtJIqwEvgrjurWYNqeyLBJZuC0JNH2HD.jpeg',NULL,'2020-01-07 04:51:49','2020-01-07 04:51:49');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
