<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promote</title>
    <link rel="stylesheet" href="/secondaPagellaProject/styles.css">
</head>
<body>
    <h1>User Management</h1>
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

        if($outputs != null) {?>
             <table>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>

    <?php       foreach ($outputs as $output) {
                $action = $output['rule'] == 'doctor' ? 'Demote' : 'Promote'?> 
                <tr>
                        <td><?php echo htmlspecialchars($output["name"]) ?></td>
                        <td><?php echo htmlspecialchars($output["gender"]) ?></td>
                        <td><?php echo htmlspecialchars($output["email"]) ?></td>
                        <td><?php echo htmlspecialchars($output["rule"]) ?></td>
                        <td>
                            <a class='action-btn' href='promoteLower.php?email=<?php echo urlencode($output["email"]); ?>&rule=<?php echo urlencode($output["rule"]); ?>'>
                                <?php echo $action ?>
                            </a>
                        </td>
                    </tr>
           <?php } ?>

            </table>
       <?php } else { ?>
            <p>There are no normal users registered in the system.</p>
       <?php }

        mysqli_free_result($recieve);
    }

    mysqli_close($db_connection);
    ?>
    <a class="home-btn" href="Dashboard.php">Back to Dashboard</a>
</body>
</html>
