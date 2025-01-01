-- CREATE DATABASE health_care;
CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male'
)
