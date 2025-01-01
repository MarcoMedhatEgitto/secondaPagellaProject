<?php
if(isset($_POST['submit'])){
    $db_connection = mysqli_connect('localhost','root','','health_center',3306);
    if(!$db_connection){
        echo "Connection error ". mysqli_connect_error();
    }
    
    $email = $_POST['email'];
    $user_pssword = $_POST['user_password'];
    
    $query = "DELETE FROM doctor WHERE email = '$email' and user_password = '$user_pssword'";
    $recieve = mysqli_query($db_connection,$query);
    if($recieve->num_rows>0){
        echo "done";
    } 
   else{
    echo "not found";
   }
    mysqli_close($db_connection);
    
    
    }
?>