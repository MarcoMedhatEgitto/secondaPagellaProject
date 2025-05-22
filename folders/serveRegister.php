<?php
// initialize the connection to the database and check if there are errors 
include 'db_connection.php';

// save the input from the form into the db
if(isset($_POST['submit'])){
    // the mysqli_real_escape_string prevents the sql injection and make the input in a string
    $name = mysqli_real_escape_string($db_connection, $_POST['name']);
    $email = mysqli_real_escape_string($db_connection, $_POST['email']);
    $password = mysqli_real_escape_string($db_connection,password_hash($_POST['password'],PASSWORD_DEFAULT));
    $gender = mysqli_real_escape_string($db_connection, $_POST['gender']);

    $query = "INSERT INTO user_data(id, name, user_password, email, gender, rule) VALUES ('','$name','$password','$email','$gender','user')";

    if(mysqli_query($db_connection,$query)){
        echo "success";
    }
    else{
        echo "error: ".mysqli_error($db_connection);
    }
}
header("Location:Login.php")
?>
   
</body>
</html>
 