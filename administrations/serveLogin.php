<?php
include 'db_connection.php';

if(isset($_POST['submit'])){

$email = $_POST['email'];
$user_pssword = $_POST['user_password'];

$query = "SELECT user_password FROM user_data WHERE email = '$email'";

$recieve = mysqli_query($db_connection,$query); 
$output = mysqli_fetch_all($recieve, MYSQLI_ASSOC);
mysqli_free_result($recieve);


if($output == null){
    echo "Your email doesn't exist in the database!";
}
else if(password_verify($user_pssword, $output[0]['user_password'])){
    session_start();
    
    $query = "SELECT rule FROM user_data WHERE email = '$email'";
    $recieve = mysqli_query($db_connection, $query);
    $output = mysqli_fetch_all($recieve, MYSQLI_ASSOC);
    mysqli_free_result($recieve);

    $_SESSION['email'] = $email;
    $_SESSION['rule'] = $output[0]['rule'];
    header("Location: Dashboard.php");
}
else{
    echo "You have entered a wrong password!";
}
}
mysqli_close($db_connection);

?>