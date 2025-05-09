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
</head>
<body>
    <?php
      $db_connection = mysqli_connect('localhost','root','','health_center',3306);
      $email = $_SESSION['email'];
      $query ="SELECT name, rule FROM user_data WHERE email = '$email'" ;
      $recieve = mysqli_query($db_connection,$query); 
      $output = mysqli_fetch_all($recieve, MYSQLI_ASSOC);
      mysqli_free_result($recieve);
?>
     <h1><?php echo "Welcome " . $output[0]['name'];?></h1> 
    <?php  if($output[0]['rule']=="admin")
      {
        $query = "SELECT name, gender, email, rule FROM user_data";
        $recieve =mysqli_query($db_connection, $query);
        $outputs = mysqli_fetch_all($recieve, MYSQLI_ASSOC);
        ?>
    <table border=1>
        <tr>
            <td>Name</td>
            <td>Gender</td>
            <td>Email</td>
            <td>Rule</td>
        </tr>
        <?php foreach ($outputs as $output) {?>
            <tr>
                <td><?php echo $output["name"]?></td>
                <td><?php echo $output["gender"]?></td>
                <td><?php echo $output["email"]?></td>
                <td><?php echo $output["rule"]?></td>
            </tr>
        <?php }?>
    </table>
      <?php 
       mysqli_free_result($recieve);
      }
      mysqli_close($db_connection);
?>
    <button><a href="../index.php" style="text-decoration: none; color:black">Home</a></button>
</body>
</html>