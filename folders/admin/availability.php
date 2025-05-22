<?php 
include 'authorization.php';
include '../db_connection.php';
$sql = "SELECT id, email FROM user_data WHERE rule = 'doctor'";
$output = mysqli_query($db_connection, $sql);
$results = mysqli_fetch_all($output, MYSQLI_ASSOC);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set Doctor Availability</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #444;
        }

        input[type="datetime-local"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            background-color: #fafafa;
            font-size: 14px;
        }

        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="availability.php" method="post">
        <h2>Set Doctor Availability</h2>

        <label for="date">Date & Time</label>
        <input type="datetime-local" name="date" required>
        <?php if (isset($_SESSION['email']) && ($_SESSION['rule'] == 'admin')):?>
        <label for="doctor">Doctor</label>
        <select name="doctor" required>
            <option value="" disabled selected>Select a doctor</option>
            <?php foreach($results as $result): ?>
                <option value="<?php echo htmlspecialchars($result['id']); ?>">
                    <?php echo htmlspecialchars($result['email']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php endif; ?>
        <?php if (isset($_SESSION['email']) && ($_SESSION['rule'] == 'doctor')):?>
        <label for="doctor">Doctor</label>
        <select name="doctor" required>
                <option value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['email']; ?></option>
        </select>
        <?php endif ?>

        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
$date = $_POST['date'];
$doctor_id = $_POST['doctor'];
$sql = "INSERT INTO available(date_time, doctor) VALUES('$date', '$doctor_id')";
$query = mysqli_query($db_connection,$sql);
header("Location: list.php");
}
