<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <form action="serveRegister.php" method="post">
        <h1>Please Register</h1>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" placeholder="example@dr.kareem.com" name="email" required>
        </div>
        <div>
            <label for="gender">Gender</label>
            <label><input type="radio" name="gender" value="male" required> Male</label>
            <label><input type="radio" name="gender" value="female" required> Female</label>
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
