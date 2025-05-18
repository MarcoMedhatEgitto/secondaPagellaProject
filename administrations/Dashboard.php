<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/secondaPagellaProject/styles.css">
</head>
<body>
    <h1>
    <?php
      $db_connection = mysqli_connect('localhost','root','','health_center',3306);
      $email = $_SESSION['email'];
      $query ="SELECT name FROM doctor WHERE email = '$email'" ;
      $recieve = mysqli_query($db_connection,$query); 
      $output = mysqli_fetch_all($recieve, MYSQLI_ASSOC);
      mysqli_free_result($recieve);
      mysqli_close($db_connection);

      echo "Welcome " . $output[0]['name'];
    ?>
    </h1>
</body>
</html>