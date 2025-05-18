<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <form action="serveLogin.php" method="post">
        <h2>Login</h2>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="user_password">Password</label>
        <input type="password" name="user_password" id="user_password" required>

        <input type="submit" value="Login" name="submit">
    </form>
</body>
</html>
