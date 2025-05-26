<?php
require 'config.php';

if (empty($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die('Access denied.');
}

global $requests, $appointments;

if (!empty($_GET['action']) && $_GET['action'] === 'reject' && isset($_GET['id'])) {
    $rid = (int)$_GET['id'];
    foreach ($requests as &$r) {
        if ($r['id'] === $rid && $r['status'] === 'pending') {
            $r['status'] = 'rejected';
            break;
        }
    }
    save_json(REQUESTS_FILE, $requests);
    header('Location: admin.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['req_id'], $_POST['doctor_id'], $_POST['scheduled_time'], $_POST['duration_minutes'])) {
    $rid = (int)$_POST['req_id'];
    $doc = (int)$_POST['doctor_id'];
    $time = $_POST['scheduled_time'];
    $dur = (int)$_POST['duration_minutes'];

    foreach ($requests as &$r) {
        if ($r['id'] === $rid && $r['status'] === 'pending') {
            $r['status'] = 'approved';
            $r['doctor_id'] = $doc;
            $r['scheduled_time'] = $time;
            $r['duration_minutes'] = $dur;
            break;
        }
    }
    save_json(REQUESTS_FILE, $requests);

    $appointments[] = [
        'id'            => $rid,
        'patient_id'    => $_POST['patient_id'],
        'doctor_id'     => $doc,
        'scheduled_time'=> $time,
        'duration_minutes'=> $dur
    ];
    save_json(APPTS_FILE, $appointments);

    header('Location: admin.php');
    exit;
}

$scheduleRequest = null;
if (!empty($_GET['action']) && $_GET['action'] === 'schedule' && isset($_GET['id'])) {
    $rid = (int)$_GET['id'];
    foreach ($requests as $r) {
        if ($r['id'] === $rid && $r['status'] === 'pending') {
            $scheduleRequest = $r;
            break;
        }
    }
}

include 'includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Admin Panel</h1>

<?php if ($scheduleRequest): ?>
  <div class="card mb-4">
    <div class="card-header">Schedule Request #<?= $scheduleRequest['id'] ?> for Patient #<?= $scheduleRequest['patient_id'] ?></div>
    <div class="card-body">
      <form method="post">
        <input type="hidden" name="req_id" value="<?= $scheduleRequest['id'] ?>">
        <input type="hidden" name="patient_id" value="<?= $scheduleRequest['patient_id'] ?>">
        <div class="form-group">
          <label for="doctor_id">Doctor ID</label>
          <input id="doctor_id" name="doctor_id" type="number" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="scheduled_time">Scheduled Time</label>
          <input id="scheduled_time" name="scheduled_time" type="datetime-local" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="duration_minutes">Duration (minutes)</label>
          <input id="duration_minutes" name="duration_minutes" type="number" class="form-control" required>
        </div>
        <button class="btn btn-primary">Approve &amp; Schedule</button>
        <a href="admin.php" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
<?php endif; ?>

<div class="card">
  <div class="card-header">Pending Appointment Requests</div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr><th>ID</th><th>Patient #</th><th>Requested At</th><th>Actions</th></tr>
      </thead>
      <tbody>
        <?php foreach ($requests as $r): ?>
          <?php if ($r['status'] !== 'pending') continue; ?>
          <tr>
            <td><?= $r['id'] ?></td>
            <td><?= $r['patient_id'] ?></td>
            <td><?= htmlspecialchars($r['created_at'] ?? 'N/A') ?></td>
            <td>
              <a href="?action=schedule&id=<?= $r['id'] ?>" class="btn btn-sm btn-success">Schedule</a>
              <a href="?action=reject&id=<?= $r['id'] ?>"
                 class="btn btn-sm btn-danger"
                 onclick="return confirm('Reject request #<?= $r['id'] ?>?')">
                 Reject
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
        <?php if (!count(array_filter($requests, fn($x)=>$x['status']==='pending'))): ?>
          <tr><td colspan="4" class="text-center">No pending requests.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
