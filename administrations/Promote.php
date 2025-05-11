<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promote</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
        }

        table {
            width: 90%;
            max-width: 900px;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 16px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-btn {
            padding: 8px 14px;
            border: none;
            background-color: #17a2b8;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .action-btn:hover {
            background-color: #138496;
        }

        .home-btn {
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 15px;
            transition: background-color 0.3s ease;
        }

        .home-btn:hover {
            background-color: #5a6268;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        @media (max-width: 600px) {
            table, th, td {
                font-size: 12px;
            }

            .action-btn, .home-btn {
                font-size: 12px;
                padding: 6px 10px;
            }
        }
    </style>
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

        if($outputs != null) {
            echo "<table>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>";

            foreach ($outputs as $output) {
                $action = $output['rule'] == 'doctor' ? 'Demote' : 'Promote';
                echo "<tr>
                        <td>" . htmlspecialchars($output["name"]) . "</td>
                        <td>" . htmlspecialchars($output["gender"]) . "</td>
                        <td>" . htmlspecialchars($output["email"]) . "</td>
                        <td>" . htmlspecialchars($output["rule"]) . "</td>
                        <td>
                            <a class='action-btn' href='promoteLower.php?email=" . urlencode($output['email']) . "&rule=" . urlencode($output['rule']) . "'>
                                $action
                            </a>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>There are no normal users registered in the system.</p>";
        }

        mysqli_free_result($recieve);
    }

    mysqli_close($db_connection);
    ?>
    <a class="home-btn" href="Dashboard.php">Back to Dashboard</a>
</body>
</html>
