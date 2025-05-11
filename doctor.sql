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

-- adding the riservations table
CREATE TABLE riservation(
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_data INT NOT NULL,
    doctor_data INT NOT NULL,
    payment BOOLEAN NOT NULL,
    date_time DATETIME NOT NULL,
    FOREIGN KEY (user_data) REFERENCES user_data(id),
    FOREIGN KEY (doctor_data) REFERENCES user_data(id)
    
)