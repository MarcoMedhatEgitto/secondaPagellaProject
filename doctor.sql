-- CREATE DATABASE health_care;
CREATE TABLE doctor (
  id int NOT NULL,
  name varchar(15) NOT NULL,
  user_password varchar(255) NOT NULL,
  email varchar(50) NOT NULL,
  gender enum('male','female') NOT NULL DEFAULT 'male'
)
-- adding comment to switch branch

ALTER TABLE doctor ADD COLUMN rule ENUM('user', 'doctor', 'admin') NOT NULL;
ALTER TABLE doctor RENAME TO user_data;