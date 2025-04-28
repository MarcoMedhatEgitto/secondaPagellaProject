<?php
include 'db_connection.php';

if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    
    $query = "DELETE FROM user_data WHERE email = '$email'";
    $recieve = mysqli_query($db_connection,$query);
    if(mysqli_affected_rows($db_connection)>0){
        echo "done";
    } 
   else{
    echo "not found";
   }
    
    
    }
    mysqli_close($db_connection);

?>