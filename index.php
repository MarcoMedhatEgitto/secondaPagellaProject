<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Center!</title>
<<<<<<< Updated upstream
    <link rel="stylesheet" href="/secondaPagellaProject/styles.css">
=======
    <link rel="stylesheet" href="/SecondaPagellProject/styles.css">
>>>>>>> Stashed changes
</head>
<body>
    <h1>Welcome to the Physical Therapy Clinic</h1>

    <div class="button-group">
    <?php if (!isset($_SESSION['email'])): ?>
        <button>
            <a href="administrations/Register.php">Register</a>
        </button>
        <button>
            <a href="administrations/Login.php">Log in</a>
        </button>
    <?php endif; ?>

    <?php if (isset($_SESSION['email']) && $_SESSION['rule'] === 'user'): ?>
        <button>
            <a href="administrations/Dashboard.php">Dashboard</a>
        </button>
        <button>
            <a href="administrations/Logout.php">Log out</a>
        </button>
        <button>
            <a href="administrations/makeRiservation">Reserve</a>
        </button>
    <?php endif; ?>
    </div>
</body>
</html>