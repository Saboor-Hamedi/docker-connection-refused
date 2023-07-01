CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `roles` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
/* user information */
CREATE TABLE userinformation  (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  status varchar(50) DEFAULT NULL,
  address varchar(100) DEFAULT NULL,
  zip_code varchar(20) DEFAULT NULL,
  phone_number varchar(20) DEFAULT NULL,
  -- Add more attributes as needed
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;