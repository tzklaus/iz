SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `notes` (`id`, `title`, `content`, `created_at`) VALUES
(1,	'Lorem',	'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas natus atque iure assumenda nisi nostrum perferendis accusantium voluptas ratione asperiores iusto, modi inventore sit itaque, praesentium, animi expedita necessitatibus omnis!',	'0000-00-00 00:00:00');
