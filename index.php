<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Center!</title>
    <link rel="stylesheet" href="/secondaPagellaProject/styles.css">
  </head>
<body>
    <h1>
        Welcome to our online clinic
    </h1>
    <?php if(!isset($_SESSION['email'])): ?>
    <button value="register">
    <a href="administrations/Register.php">Register</a>
    </button>
    <button>
        <a href="administrations/Login.php">Log in</a>
    </button>
    <br>
    <?php endif; ?>
    <?php if(isset($_SESSION['email'])): ?>
    <button>
        <a href="administrations/Delete.php">Delete</a>
    </button>
    <button>
        <a href="administrations/Dashboard.php">Dashoard</a>
    </button>
    <button>
        <a href="administrations/Logout.php">Log out</a>
    </button>
    <?php endif ?>
<body class="light-mode">
  <!-- Top Navigation Bar -->
  <header class="site-header">
    <div class="logo">
      <h1>Digital PT Clinic</h1>
    </div>
    <nav class="main-nav">
      <a href="#doctors">Doctors</a>
      <a href="#patients">Patients</a>
      <a href="#appointments">Appointments</a>
      <a href="#progress">Progress</a>
    </nav>
    <div class="nav-toggle">
      <label class="mode-toggle">
        <input type="checkbox" id="modeSwitch">
        <span class="slider"></span>
      </label>
    </div>
  </header>

  <!-- Main Content Area -->
  <main class="container">
    <!-- Doctors Section -->
    <section id="doctors" class="section">
      <h2>Doctors</h2>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Specialty</th>
              <th>Contact</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Dr. Jane Smith</td>
              <td>Physical Therapy</td>
              <td>jane@example.com</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Dr. John Doe</td>
              <td>Rehabilitation</td>
              <td>john@example.com</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Patients Section -->
    <section id="patients" class="section">
      <h2>Patients</h2>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Last Appointment</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>101</td>
              <td>Mary Johnson</td>
              <td>2025-03-15</td>
              <td>Active</td>
            </tr>
            <tr>
              <td>102</td>
              <td>Peter Williams</td>
              <td>2025-03-20</td>
              <td>Inactive</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Appointments Section -->
    <section id="appointments" class="section">
      <h2>Appointments</h2>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Appointment ID</th>
              <th>Doctor</th>
              <th>Patient</th>
              <th>Date & Time</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1001</td>
              <td>Dr. Jane Smith</td>
              <td>Mary Johnson</td>
              <td>2025-04-01 10:00</td>
              <td>Scheduled</td>
            </tr>
            <tr>
              <td>1002</td>
              <td>Dr. John Doe</td>
              <td>Peter Williams</td>
              <td>2025-04-02 14:30</td>
              <td>Completed</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Progress Section -->
    <section id="progress" class="section">
      <h2>Patient Progress</h2>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Patient ID</th>
              <th>Name</th>
              <th>Last Log</th>
              <th>Notes</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>101</td>
              <td>Mary Johnson</td>
              <td>2025-03-30</td>
              <td>Improved mobility</td>
            </tr>
            <tr>
              <td>102</td>
              <td>Peter Williams</td>
              <td>2025-03-28</td>
              <td>Needs further evaluation</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <p>&copy; 2025 Digital PT Clinic. All rights reserved.</p>
  </footer>

  <!-- JavaScript for Dark Mode Toggle -->
  <script>
    const toggleSwitch = document.getElementById('modeSwitch');
    toggleSwitch.addEventListener('change', function() {
      document.body.classList.toggle('dark-mode', this.checked);
      document.body.classList.toggle('light-mode', !this.checked);
    });
  </script>
</body>
</html>
</html>