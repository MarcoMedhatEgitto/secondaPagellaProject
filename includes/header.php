<?php
$user     = $_SESSION['user'] ?? null;
$role     = $user['role']     ?? '';
$username = $user['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PT Clinic</title>
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-light bg-light mb-4">
    <a class="navbar-brand" href="dashboard.php">PT Clinic</a>
    <ul class="navbar-nav ml-auto">
      <?php if (!$user): ?>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
      <?php else: ?>
        <li class="nav-item"><span class="nav-link">Hello, <?= $username ?></span></li>
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        <?php if ($role === 'admin'): ?>
          <li class="nav-item"><a class="nav-link" href="admin.php">Admin Panel</a></li>
        <?php endif; ?>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      <?php endif; ?>
    </ul>
  </nav>
<div class="container-fluid">
