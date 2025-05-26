<?php
require 'config.php';

$user = $_SESSION['user'] ?? null;
if (!$user || $user['role'] !== 'patient') {
    die('Access denied.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newId = time();
    $requests[] = [
        'id'          => $newId,
        'patient_id'  => $user['id'],
        'status'      => 'pending',
        'created_at'  => date('Y-m-d H:i:s'),
    ];
    save_json(REQUESTS_FILE, $requests);

    header('Location: dashboard.php');
    exit;
}

include 'includes/header.php';
?>

<h1 class="h3 mb-4">Request Appointment</h1>
<form method="post">
  <button type="submit" class="btn btn-primary">Submit Request</button>
</form>

<?php include 'includes/footer.php'; ?>
