<?php
include 'db_connection.php';

$sql = "SELECT name, email 
        FROM user_data 
        WHERE rule = 'doctor'";
$output = mysqli_query($db_connection, $sql);
$results = mysqli_fetch_all($output, MYSQLI_ASSOC);
?>


