<?php
session_start();
$flashMessage = null;
if (isset($_SESSION['flash'])) {
    $flashMessage = $_SESSION['flash'];
    unset($_SESSION['flash']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: linear-gradient(to right, #6a11cb, #2575fc);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: white;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
}

form h2 {
    text-align: center;
    margin-bottom: 24px;
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: border-color 0.3s;
}

input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #2575fc;
    outline: none;
}

/* Submit button */
input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #2575fc;
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #1a5edb;
}

    </style>

</head>
<body>
    <form action="serveLogin.php" method="post">
        <?php if ($flashMessage): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 15px;">
        <?php echo htmlspecialchars($flashMessage); ?>
    </div>
<?php endif; ?>
        <h2>Login</h2>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="user_password">Password</label>
        <input type="password" name="user_password" id="user_password" required>

        <input type="submit" value="Login" name="submit">
    </form>
    
</body>
</html>
