<?php
// initialize the connection to the database and check if there are errors 
session_start();
include 'db_connection.php';

// save the input from the form into the db
if(isset($_POST['submit'])){
    // the mysqli_real_escape_string prevents the sql injection and make the input in a string
    $name = mysqli_real_escape_string($db_connection, $_POST['name']);
    $email = mysqli_real_escape_string($db_connection, $_POST['email']);
    $password = mysqli_real_escape_string($db_connection,password_hash($_POST['password'],PASSWORD_DEFAULT));
    $gender = mysqli_real_escape_string($db_connection, $_POST['gender']);
    $user_doctor = mysqli_real_escape_string($db_connection, $_POST['user_doctor']);
    $description = mysqli_real_escape_string($db_connection,$_POST['description']);
    $phone = mysqli_real_escape_string($db_connection,$_POST['phone']);

    if($user_doctor=="user")
    {
    $query = "INSERT INTO user_data(id, name, user_password, email, gender, rule, confirmed, phone_number) VALUES ('','$name','$password','$email','$gender','user', 'confirmed','$phone')";
    }
    else{
    $query = "INSERT INTO user_data(id, name, user_password, email, gender, rule, confirmed,phone_number, description) VALUES ('','$name','$password','$email','$gender','user', 'not', '$phone','$description')";
    }
    if(mysqli_query($db_connection,$query)){
       $_SESSION['flash'] = "Registration successful! Please login.";
    }
    else{
        $_SESSION['flash'] = "Error: " . mysqli_error($db_connection);
    }
}
header("Location:Login.php")
?>
   
</body>
</html>
 