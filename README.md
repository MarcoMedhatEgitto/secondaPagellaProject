# Digital PT Clinic  

## Introduction  
The **Digital PT Clinic** is a web-based platform designed to enhance patient access to physical therapy services. This system allows for **secure patient registration, login, and management**, ensuring smooth and efficient communication between therapists and patients.  

## Features  
- **User Authentication**  
  - Secure user registration and login system.  
  - Password protection and validation mechanisms.  
- **Dashboard**  
  - A user-friendly interface for managing patient information.  
  - Displays essential data related to therapy sessions.  
- **Database Management**  
  - Uses **MySQL** for efficient data storage and retrieval.  
  - `doctor.sql` contains the database schema for managing doctors and patients.  
- **Appointment Handling**  
  - Scheduling system for patient-doctor interactions.  

## Files Overview  
| File Name        | Description |
|-----------------|-------------|
| `index.php`      | Main entry point of the application. |
| `Dashboard.php`  | Displays the therapist's dashboard. |
| `db_connection.php` | Handles database connections. |
| `Login.php`      | User login page. |
| `Register.php`   | User registration page. |
| `serveLogin.php` | Backend service for processing logins. |
| `serveRegister.php` | Backend service for handling user registration. |
| `serveDelete.php` | Backend service for deleting user records. |
| `doctor.sql`     | Database schema and queries. |

## Technologies Used  
- **Frontend**: HTML, CSS  
- **Backend**: PHP (Raw PHP)  
- **Database**: MySQL  
- **Server**: Apache  

## Installation  
1. Clone the repository:  
   ```sh
   git clone https://github.com/YourGitHubUsername/Digital-PT-Clinic.git
   ```
2. Import the database:  
   - Open MySQL and run the `doctor.sql` script to set up the database.  
3. Configure database connection:  
   - Update `db_connection.php` with your database credentials.  
4. Start the server:  
   - Use **XAMPP** or **Apache** to run the project.  

## Usage  
- Open `index.php` in a browser to access the login page.  
- After logging in, users will be redirected to the dashboard.  
- Therapists can manage patient records and appointments.  

## Future Enhancements  
- Integration of **video consultations** for remote therapy.  
- Secure **patient progress tracking** with data encryption.  
- Improved **user interface** for a better experience.  

