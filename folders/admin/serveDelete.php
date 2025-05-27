<?php
include 'authorization.php';
include '../db_connection.php';

if(isset($_POST['email'])){
    
    $email = $_POST['email'];
    
    $query = "DELETE FROM user_data WHERE email = '$email'";
    $recieve = mysqli_query($db_connection, $query);
    header("Location: Delete.php");
    }
    mysqli_close($db_connection);

?>