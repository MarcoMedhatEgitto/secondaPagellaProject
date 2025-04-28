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



// creating a query to get all the elements in the table user_datas
$query = 'SELECT * FROM user_data';

// send the query and get the results
$output = mysqli_query($db_connection,$query);

// Fetch results to an array
$user_datas = mysqli_fetch_all($output, MYSQLI_ASSOC);

// free space
mysqli_free_result($output);

// close connection
mysqli_close($db_connection);


// print_r($user_datas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>
users
</h1>
<table border="1">
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Gender</td>
    </tr>
    <?php foreach ($user_datas as $user_data){?>
    <tr>
        <td>
            <?php
            echo htmlspecialchars($user_data['name']);
            ?>
        </td>
        <td>
            <?php
            echo htmlspecialchars($user_data['email']);
            ?>
        </td>
        <td>    
        <?php
            echo htmlspecialchars($user_data['gender']);
        ?>
        </td>
    </tr>
    <?php } ?>
</table>
    
</body>
</html>
 