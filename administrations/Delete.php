<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <link rel="stylesheet" href="/secondaPagellaProject/styles.css">
</head>
<body>
<?php
    include 'db_connection.php';
    session_start();
    $email = $_SESSION['email'];
    $query ="SELECT name, rule FROM user_data WHERE email = '$email'" ;
    $recieve = mysqli_query($db_connection,$query); 
    $output = mysqli_fetch_all($recieve, MYSQLI_ASSOC);
    mysqli_free_result($recieve);

    if($output[0]['rule']=="admin") {
        $query = "SELECT name, gender, email, rule FROM user_data WHERE email != '$email' AND rule != 'admin'";
        $recieve = mysqli_query($db_connection, $query);
        $outputs = mysqli_fetch_all($recieve, MYSQLI_ASSOC);

        if($outputs) { ?>
            <h1>Registered Users</h1>
            <table>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
          <?php  foreach ($outputs as $output) {?>
                <tr>
                        <td><?php echo htmlspecialchars($output["name"]) ?></td>
                        <td><?php echo htmlspecialchars($output["gender"]) ?></td>
                        <td><?php echo htmlspecialchars($output["email"]) ?></td>
                        <td><?php echo htmlspecialchars($output["rule"]) ?></td>
                        <td>
                            <a class='delete-btn' href='serveDelete.php?email=<?php echo urlencode($output["email"]); ?>'>Delete</a>
                        </td>
                      </tr>
           <?php }?>
            </table>
       <?php } else { ?>
            <p>There are no other registered users in the system.</p>
        <?php }

        mysqli_free_result($recieve);
    }
    mysqli_close($db_connection);
?>
    <a href="Dashboard.php" class="home-btn">Back to Dashboard</a>
</body>
</html>
