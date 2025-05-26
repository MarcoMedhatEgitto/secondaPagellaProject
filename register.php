<?php
require 'config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm']  ?? '';

    if ($username === '' || $password === '' || $confirm === '') {
        $error = 'All fields are required.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } else {
        $users = json_decode(file_get_contents(USERS_FILE), true);

        foreach ($users as $u) {
            if ($u['username'] === $username) {
                $error = 'Username is already taken.';
                break;
            }
        }

        if (!$error) {
            $ids = array_column($users, 'id');
            $nextId = $ids ? max($ids) + 1 : 1;
            $newUser = [
                'id'       => $nextId,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role'     => 'patient',
                'approved' => true
            ];
            $users[] = $newUser;
            save_json(USERS_FILE, $users);
            $_SESSION['user'] = $newUser;
            header('Location: dashboard.php');
            exit;
        }
    }
}

include 'includes/header.php';
?>
<div class="row justify-content-center">
  <div class="col-lg-4">
    <div class="card shadow-sm">
      <div class="card-header">Register</div>
      <div class="card-body">
        <?php if ($error): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="post">
          <div class="form-group mb-3">
            <label>Username</label>
            <input name="username" type="text" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label>Password</label>
            <input name="password" type="password" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label>Confirm Password</label>
            <input name="confirm" type="password" class="form-control" required>
          </div>
          <button class="btn btn-primary btn-block w-100">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
