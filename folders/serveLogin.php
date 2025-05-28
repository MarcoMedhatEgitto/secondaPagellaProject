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
    
    $query = "SELECT id, confirmed, name, rule FROM user_data WHERE email = '$email'";
    $recieve = mysqli_query($db_connection, $query);
    $output = mysqli_fetch_all($recieve, MYSQLI_ASSOC);
    mysqli_free_result($recieve);
    $_SESSION['name'] = $output[0]['name'];
    $_SESSION['email'] = $email;
    $_SESSION['rule'] = $output[0]['rule'];
    $_SESSION['id'] = $output[0]['id'];
    if($output[0]['confirmed']=='confirmed')
    {

    if($_SESSION['rule']=='admin')
    {
    header("Location: admin/Booking.php");
    }
    if($_SESSION['rule']=='doctor')
    {
    header("Location: doctor/doctorTable.php");
    }
    if($_SESSION['rule']=='user')
    {
    header("Location: user/userBooking.php");
    }
    else{
    echo "You have entered a wrong password!";
}
}
    else{
        echo "your account is not confirmed yet as a doctor";
    }
}
}
mysqli_close($db_connection);

?>