<?php
require 'config.php';
$error = '';

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';

    if ($u===''||$p==='') {
        $error = 'Fill in both fields.';
    } elseif (($user = find_user($u)) && password_verify($p, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid credentials.';
    }
}

include 'includes/header.php';
?>

<div class="row justify-content-center">
  <div class="col-lg-4">
    <div class="card shadow-sm">
      <div class="card-header">Login</div>
      <div class="card-body">
        <?php if ($error): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="post">
          <div class="form-group">
            <label>Username</label>
            <input name="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" required>
          </div>
          <button class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
