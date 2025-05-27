<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="/secondaPagellaProject/styles.css">
    <style>
        /* Register & Login Form General Styling */
body {
    background: linear-gradient(to right, #6a11cb, #2575fc);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #333;
}

form {
    background-color: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 420px;
}

/* Headline */
form h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Form fields */
form div {
    margin-bottom: 20px;
}

/* Labels */
label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #333;
}

/* Inputs */
input[type="text"],
input[type="email"],
input[type="password"],
input[type="tel"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="tel"]:focus{
    border-color: #2575fc;
    outline: none;
}

/* Gender radio buttons */
input[type="radio"] {
    margin-right: 6px;
    accent-color: #2575fc;
}

/* Submit button */
input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #2575fc;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #1a5edb;
}

    </style>
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
        <div>
            <label for="phone">phone</label>
            <input type="tel" name="phone" required>
        </div>
        <input type="submit" value="Submit" name="submit">
        <p>Already have an account? <a href="Login.php">Log in here</a></p>

    </form>
    
</body>
</html>
