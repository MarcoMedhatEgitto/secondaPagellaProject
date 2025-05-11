<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f4f7;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            max-width: 900px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
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

        .delete-btn, .home-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #bd2130;
        }

        .home-btn {
            background-color: #6c757d;
        }

        .home-btn:hover {
            background-color: #5a6268;
        }

        a {
            color: white;
            text-decoration: none;
        }

    </style>
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

        if($outputs) {
            echo "<h1>Registered Users</h1>";
            echo "<table>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>";
            foreach ($outputs as $output) {
                echo "<tr>
                        <td>" . htmlspecialchars($output["name"]) . "</td>
                        <td>" . htmlspecialchars($output["gender"]) . "</td>
                        <td>" . htmlspecialchars($output["email"]) . "</td>
                        <td>" . htmlspecialchars($output["rule"]) . "</td>
                        <td><a class='delete-btn' href='serveDelete.php?email=" . urlencode($output['email']) . "'>Delete</a></td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>There are no other registered users in the system.</p>";
        }

        mysqli_free_result($recieve);
    }
    mysqli_close($db_connection);
?>
    <a href="Dashboard.php" class="home-btn">Back to Dashboard</a>
</body>
</html>
