-- CREATE DATABASE health_care;
CREATE TABLE user_data (
  id int NOT NULL,
  name varchar(15) NOT NULL,
  user_password varchar(255) NOT NULL,
  email varchar(50) NOT NULL,
  gender enum('male','female') NOT NULL DEFAULT 'male'
)
-- adding comment to switch branch

ALTER TABLE user_data ADD COLUMN rule ENUM('user', 'doctor', 'admin') NOT NULL;

-- adding the available table
CREATE TABLE `available` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `doctor` int(11) NOT NULL
) 
ALTER TABLE `available`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor` (`doctor`);
  ALTER TABLE `available`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
  ALTER TABLE `available`
  ADD CONSTRAINT `available_ibfk_1` FOREIGN KEY (`doctor`) REFERENCES `user_data` (`id`);
COMMIT;

--adding booked table
CREATE TABLE `booked` (
  `id` int(11) NOT NULL,
  `patient_data` int(11) NOT NULL,
  `doctor_data` int(11) NOT NULL,
  `date_time` datetime NOT NULL
)
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_data` (`patient_data`),
  ADD KEY `doctor_data` (`doctor_data`);
  ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`patient_data`) REFERENCES `user_data` (`id`),
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`doctor_data`) REFERENCES `user_data` (`id`);
COMMIT;