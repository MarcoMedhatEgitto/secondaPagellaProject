<?php
// initialize the connection to the database and check if there are errors 
$db_connection = mysqli_connect('localhost','root','','health_center',3306);
if(!$db_connection){
    echo "Connection error ". mysqli_connect_error();
}

// save the input from the form into the db
if(isset($_POST['submit'])){
    // the mysqli_real_escape_string prevents the sql injection and make the input in a string
    $name = mysqli_real_escape_string($db_connection, $_POST['name']);
    $email = mysqli_real_escape_string($db_connection, $_POST['email']);
    $password = mysqli_real_escape_string($db_connection,password_hash($_POST['password'],PASSWORD_DEFAULT));
    $gender = mysqli_real_escape_string($db_connection, $_POST['gender']);

    $query = "INSERT INTO doctor(id, name, user_password, email, gender) VALUES ('','$name','$password','$email','$gender')";

    if(mysqli_query($db_connection,$query)){
        echo "success";
    }
    else{
        echo "error: ".mysqli_error($db_connection);
    }
}



// creating a query to get all the elements in the table doctors
$query = 'SELECT * FROM doctor';

// send the query and get the results
$output = mysqli_query($db_connection,$query);

// Fetch results to an array
$doctors = mysqli_fetch_all($output, MYSQLI_ASSOC);

// free space
mysqli_free_result($output);

// close connection
mysqli_close($db_connection);


// print_r($doctors);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>
Doctors!
</h1>
<table border="1">
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Gender</td>
    </tr>
    <?php foreach ($doctors as $doctor){?>
    <tr>
        <td>
            <?php
            echo htmlspecialchars($doctor['name']);
            ?>
        </td>
        <td>
            <?php
            echo htmlspecialchars($doctor['email']);
            ?>
        </td>
        <td>    
        <?php
            echo htmlspecialchars($doctor['gender']);
        ?>
        </td>
    </tr>
    <?php } ?>
</table>
    
</body>
</html>
 