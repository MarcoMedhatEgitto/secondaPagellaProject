<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Please register in</h1>
    <form action="serveRegister.php" method="post">
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
            <label for="gender">Gender</label> <br>
            <label for="male">male</label>
            <input type="radio" name="gender" id="male" value="male" required>
            <label for="female">female</label>
            <input type="radio" name="gender" id="female" value="female" required>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>
</body>
</html>