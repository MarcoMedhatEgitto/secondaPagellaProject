<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Center!</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            margin-bottom: 40px;
        }

        .button-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        a {
            text-decoration: none;
            color: white;
        }

        button {
            background-color: #007BFF;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Health Center</h1>

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