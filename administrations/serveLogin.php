<?php
if(isset($_POST['submit'])){
$db_connection = mysqli_connect('localhost','root','','health_center',3306);
if(!$db_connection){
    echo "Connection error ". mysqli_connect_error();
}

$email = $_POST['email'];
$user_pssword = $_POST['user_password'];

$query = "SELECT user_password FROM doctor WHERE email = '$email'";

$recieve = mysqli_query($db_connection,$query); 
$output = mysqli_fetch_all($recieve, MYSQLI_ASSOC);
mysqli_free_result($recieve);
mysqli_close($db_connection);


if($output == null){
    echo "Your email doesn't exist in the database!";
}
else if(password_verify($user_pssword, $output[0]['user_password'])){
    session_start();
    $_SESSION['email'] = $email;
    header("Location: Dashboard.php");
}
else{
    echo "You have entered a wrong password!";
}
}
?>