<?php
include 'db_connection.php';
if(isset($_GET['email']))
{
    $email = $_GET['email'];
    $rule = $_GET['rule'];
    
    if($rule == "user")
    {
        $query = "UPDATE user_data SET rule = 'doctor' WHERE email = '$email'";
        $response = mysqli_query($db_connection, $query);
        header("Location: promote.php");
    }
    else{
        $query = "UPDATE user_data SET rule = 'user' WHERE email = '$email'";
        $response = mysqli_query($db_connection, $query);
        header("Location: promote.php");
    }
}