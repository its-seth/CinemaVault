CREATE DATABASE IF NOT EXISTS `ecom`;
USE `ecom`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(24, 4, 11, 1),
(25, 4, 5, 1);

-- --------------------------------------------------------

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Wild Robot', 500.00, 'images/wild robot poster.jpg'),
(2, 'The Call', 500.00, 'images/the.call.jpg'),
(3, 'Friends', 1500.00, 'images/friends poster.jpg'),
(4, 'Don\'t Look Up', 500.00, 'images/dont look up poster.jpg'),
(5, 'Monster inc', 500.00, 'images/monster inc.jpeg'),
(6, 'Clueless', 500.00, 'images/clueless.avif'),
(7, 'Pride and Prejudice', 500.00, 'images/pride and prejudice poster.jpg'),
(8, 'Mothers\' Instinct', 500.00, 'images/mothers instinct.jpg'),
(9, 'Inside Out', 500.00, 'images/inside out poster.jpeg'),
(10, 'Sing', 500.00, 'images/sing.jpg'),
(11, 'IF', 500.00, 'images/if.jpg'),
(12, 'Moana', 500.00, 'images/moana.jpg'),
(13, 'Shutter Island', 500.00, 'images/shutter.island.poster.jpg'),
(14, 'Oppenheimer', 500.00, 'images/oppenheimer.jpg'),
(15, 'Split', 500.00, 'images/split.jpg'),
(16, 'Forgotten', 500.00, 'images/forgotten.jpg'),
(17, 'Peaky Blinders', 1500.00, 'images/PeakyBlinders.webp'),
(18, 'Wednesday', 1500.00, 'images/wednesday.jpg'),
(19, 'Modern Family', 1500.00, 'images/modern family.jpg'),
(20, 'Squid Game', 1500.00, 'images/squid game poster.jpg'),
(21, 'Sweet Home', 1500.00, 'images/sweet home.jpg');


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



INSERT INTO `users` (`id`, `username`, `email`, `password`, `reset_token`, `reset_token_expiry`, `created_at`) VALUES
(1, 'seth', 'seth@gmail.com', '$2y$10$LUVamPyThFDqYfewUwlpc.XAYUE2kvLk8T8iOr/uMH9nA3LNTszWu', 'c17bf22a951bccabcd9992422637fed171159a4486de0ede61809e8c0070ad52', '2025-06-22 16:24:41', '2025-06-22 20:03:43'),
(2, 'admin', 'admin@gmail.com', '$2y$10$SQi3iIsrL/X3jN9exbdqqOVQYVk84jyyS/h1FxodxU07YSyXpzZ8S', NULL, NULL, '2025-06-22 20:55:20'),
(3, 'xyz', 'xyz@gmail.com', '$2y$10$TpXTgCj5L7/dqTwpXXrxqeTjLRX4cM0dY9iIY78sirMgKDAw8Oh3.', NULL, NULL, '2025-06-22 20:59:20'),
(4, 'x', 'x@gmail.com', '$2y$10$lDUnKwvYGdyEOug4oKqc2utsCeoAnxH8VrxHeQLI.k33ev7CP6z0e', NULL, NULL, '2025-06-23 09:41:25'),
(5, 'Admin', 'admin123@gmail.com', '$2y$10$kKLndWEWA9SFT/Y8j80PVO6np.R/GVN0OxRxmIP8t0G3xMP8Jw.zO', NULL, NULL, '2026-06-03 12:53:28');

--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

