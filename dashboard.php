<?php
require 'config.php';
if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
include 'includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<!-- patient section -->

<?php if ($user['role'] === 'patient'): ?>
  <h4>Your Appointment Requests</h4>
  <ul class="list-group mb-3">
    <?php foreach ($requests as $r): ?>
      <?php if ($r['patient_id'] !== $user['id']) continue; ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          Request #<?= $r['id'] ?> —
          <strong><?= ucfirst($r['status']) ?></strong>
          <?php if ($r['status'] === 'approved'): ?>
            <div class="small text-muted">
              Scheduled at <?= htmlspecialchars($r['scheduled_time']) ?>
              for <?= intval($r['duration_minutes']) ?> minutes
              with Dr. #<?= intval($r['doctor_id']) ?>
            </div>
          <?php endif; ?>
        </div>
      </li>
    <?php endforeach; ?>
    
    <?php
    $hasRequests = false;
    foreach ($requests as $r) {
        if ($r['patient_id'] === $user['id']) {
            $hasRequests = true;
            break;
        }
    }
    if (!$hasRequests):
    ?>
      <li class="list-group-item">You have no appointment requests.</li>
    <?php endif; ?>
  </ul>
  <a href="request.php" class="btn btn-success">New Request</a>
<?php endif; ?>

<!-- doctor section -->

<?php if ($user['role'] === 'doctor'): ?>
  <h4>Your Scheduled Appointments</h4>
  <ul class="list-group mb-3">
    <?php foreach ($appointments as $a): ?>
      <?php if ($a['doctor_id'] !== $user['id']) continue; ?>
      <li class="list-group-item">
        Patient #<?= intval($a['patient_id']) ?> —
        <?= htmlspecialchars($a['scheduled_time']) ?>
        (<?= intval($a['duration_minutes']) ?> min)
      </li>
    <?php endforeach; ?>
    
    <?php
    $hasAppointments = false;
    foreach ($appointments as $appt) {
        if ($appt['doctor_id'] === $user['id']) {
            $hasAppointments = true;
            break;
        }
    }
    if (!$hasAppointments):
    ?>
      <li class="list-group-item">No appointments scheduled for you.</li>
    <?php endif; ?>
  </ul>
<?php endif; ?>

<!-- admin section -->

<?php if ($user['role'] === 'admin'): ?>
  <h4>Admin Panel</h4>
  <a href="admin.php" class="btn btn-primary">Manage Requests &amp; Schedule</a>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
