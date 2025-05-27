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
</head>
<body>
    <h1>Welcome to the Physical Therapy Clinic</h1>

    <div class="button-group">
    <?php if (!isset($_SESSION['email'])): ?>
        <button>
            <a href="folders/Register.php">Register</a>
        </button>
        <button>
            <a href="folders/Login.php">Log in</a>
        </button>
    <?php endif; ?>

    <?php if (isset($_SESSION['email'])): ?>
        <button>
            <a href="folders/Logout.php">Log in</a>
        </button>
    <?php endif; ?>
    </div>
</body>
</html>