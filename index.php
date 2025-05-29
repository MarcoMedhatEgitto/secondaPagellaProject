<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Center!</title>
<<<<<<< HEAD
    <style>
        body {
    background: linear-gradient(to right, #6a11cb, #2575fc);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: white;
    text-align: center;
    padding: 60px 20px;
    margin: 0;
}

/* Heading */
h1 {
    margin-bottom: 40px;
    font-size: 2.5rem;
    color: #fff;
}

/* Button group container */
.button-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 16px;
}

/* Button styling */
.button-group button {
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    padding: 14px 24px;
    cursor: pointer;
    transition: transform 0.2s ease, background-color 0.3s;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

/* Anchor inside button */
.button-group button a {
    text-decoration: none;
    color: #2575fc;
    font-weight: bold;
    font-size: 16px;
}

/* Hover effects */
.button-group button:hover {
    background-color: #e6e6e6;
    transform: translateY(-3px);
}

    </style>
=======
    <link rel="stylesheet" href="/secondaPagellaProject/styles.css">
>>>>>>> 167ebddc8512ddb969b5e8807be76cc6a371ac6f
</head>
<body>
    <h1>Welcome to the Physical Therapy Clinic</h1>

    <div class="button-group">
    <?php if (!isset($_SESSION['email'])): ?>
        <button>
<<<<<<< HEAD
            <a href="folders/Register.php">Register</a>
        </button>
        <button>
            <a href="folders/Login.php">Log in</a>
=======
            <a href="/administrations/Register.php">Register</a>
        </button>
        <button>
            <a href="/administrations/Login.php">Log in</a>
>>>>>>> 167ebddc8512ddb969b5e8807be76cc6a371ac6f
        </button>
    <?php endif; ?>

    <?php if (isset($_SESSION['email'])): ?>
        <button>
<<<<<<< HEAD
            <a href="folders/Logout.php">Log in</a>
=======
            <a href="/administrations/Dashboard.php">Dashboard</a>
        </button>
        <button>
            <a href="/administrations/Logout.php">Log out</a>
        </button>
        <button>
            <a href="/administrations/makeRiservation">Reserve</a>
>>>>>>> 167ebddc8512ddb969b5e8807be76cc6a371ac6f
        </button>
    <?php endif; ?>
    </div>
</body>
</html>