SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `john_api_tokens` (
  `id` int NOT NULL,
  `token` bigint NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `john_services_monitor` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `hostname` text NOT NULL,
  `ipv4` tinytext NOT NULL,
  `port` int NOT NULL,
  `status` enum('Online','Offline','Maintenance') NOT NULL,
  `last_check` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `john_services_monitor` (`id`, `name`, `hostname`, `ipv4`, `port`, `status`, `last_check`) VALUES
(1, 'HOST', 'john-network.it', '147.189.175.243', 22, 'Online', '2022-11-24 23:28:00'),
(2, 'DATABASE', 'john-network.it', '147.189.175.243', 3306, 'Maintenance', '2022-11-24 23:28:33'),
(3, 'API', 'api.john-network.it', '147.189.175.243', 443, 'Maintenance', '2022-11-24 23:29:12');

CREATE TABLE `john_user` (
  `id` int NOT NULL,
  `username` varchar(99) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `birthday` date DEFAULT NULL,
  `password` text NOT NULL,
  `email` varchar(998) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `john_user_groups` (
  `id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `john_user_groups` (`id`, `name`) VALUES
(1, 'Director');

CREATE TABLE `john_user_groups_members` (
  `userid` varchar(50) NOT NULL,
  `groupid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `john_user_groups_members` (`userid`, `groupid`) VALUES
('1', '1');


ALTER TABLE `john_api_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `john_services_monitor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `john_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `john_user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `john_user_groups_members`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
