<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;
            margin: 0;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 250px;
        }

        a {
            text-decoration: none;
            color: white;
        }

        button {
            background-color: #007BFF;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button a {
            color: white;
            display: block;
            width: 100%;
            height: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
$db_connection = mysqli_connect('localhost', 'root', '', 'health_center', 3306);
$email = $_SESSION['email'];
$query = "SELECT name, rule FROM user_data WHERE email = '$email'";
$recieve = mysqli_query($db_connection, $query);
$output = mysqli_fetch_all($recieve, MYSQLI_ASSOC);
mysqli_free_result($recieve);
?>
<h1><?php echo "Welcome " . htmlspecialchars($output[0]['name']); ?></h1>

<?php if (isset($_SESSION['email']) && $_SESSION['rule'] == 'admin'): ?>
    <div class="button-container">
        <button><a href="Delete.php">Delete</a></button>
        <button><a href="Logout.php">Log out</a></button>
        <button><a href="Promote.php">Promote a user</a></button>
        <button><a href="Booking.php">Book a doctor</a></button>
        <button><a href="availability.php">Add availability</a></button>
        <button><a href="bookTable.php">Show booking table</a></button>
    </div>
<?php endif ?>
<?php if (isset($_SESSION['email']) && $_SESSION['rule'] == 'user'):?>
  <div class="button-container">
        <button><a href="Logout.php">Log out</a></button>
        <button><a href="Booking.php">Book a doctor</a></button>
        <button><a href="bookTable.php">Show booking table</a></button>
    </div>  
<?php endif ?>
<?php if (isset($_SESSION['email']) && $_SESSION['rule'] == 'doctor'):?>
  <div class="button-container">
        <button><a href="Logout.php">Log out</a></button>
        <button><a href="availability.php">Add availability</a></button>
        <button><a href="bookTable.php">Show booking table</a></button>
    </div>  
<?php endif ?>
</body>
</html>
