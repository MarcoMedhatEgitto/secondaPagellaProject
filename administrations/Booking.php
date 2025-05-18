<?php
include 'db_connection.php';

session_start();
if(isset($_GET['patient_data']))
{
  $patient_data = $_GET["patient_data"];
  $doctor_data = $_GET["doctor_data"];
  $date_time = $_GET["date_time"];
  $sql = "INSERT INTO booked(patient_data, doctor_data, date_time)
          VALUES('$patient_data','$doctor_data','$date_time')";
  $sql2 ="DELETE FROM available WHERE doctor = $doctor_data AND date_time = '$date_time'";
  $query1 = mysqli_query($db_connection, $sql);
  $query1 = mysqli_query($db_connection, $sql2);
}

$sql = "SELECT user_data.id, name, email, date_time 
        FROM  available
        LEFT JOIN user_data ON available.doctor = user_data.id";
$output = mysqli_query($db_connection, $sql);
$results = mysqli_fetch_all($output, MYSQLI_ASSOC);
mysqli_free_result($output);
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book a doctor</title>
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
        .man {
  position: relative;
  width: 100px;
  height: 200px;
  margin: 50px auto;
}

.head {
  width: 40px;
  height: 40px;
  background-color: #f0c27b;
  border-radius: 50%;
  position: absolute;
  top: 0;
  left: 30px;
}

.body {
  width: 20px;
  height: 70px;
  background-color: #333;
  position: absolute;
  top: 40px;
  left: 40px;
  border-radius: 30%;

}

.left-arm,
.right-arm {
  width: 10px;
  height: 60px;
  background-color: #444;
  position: absolute;
  top: 45px;
  border-radius: 30%;
}

.left-arm {
  transform: rotate(45deg);
  left: 10px;
}

.right-arm {
  transform: rotate(-45deg);
  left: 80px;
}

.left-leg,
.right-leg {
  width: 10px;
  height: 60px;
  background-color: #444;
  position: absolute;
  top: 110px;
  border-radius: 30%;

}

.left-leg {
  left: 30px;
  transform: rotate(10deg);
}

.right-leg {
  left: 60px;
  transform: rotate(-10deg);
}
    </style>
</head>
<body>
      <h1>Book Here</h1>
    <?php if($results != null) {?>
            <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Book</th>
                    </tr>
          <?php  foreach ($results as $result) {?>
                <tr>
                        <td><?php echo htmlspecialchars($result["name"]) ?></td>
                        <td><?php echo htmlspecialchars($result["email"]) ?></td>
                        <td><?php echo htmlspecialchars($result["date_time"]) ?></td>
                        <td>
                         <a class='action-btn' href='Booking.php?patient_data=<?php echo urlencode($_SESSION['id'])?>&doctor_data=<?php echo urlencode($result["id"])?>&date_time=<?php echo urlencode($result["date_time"])?>'>
                                Book
                        </a>
                        </td>
                </tr>
            <?php } ?>

            </table>;
       <?php } else { ?>
            <p>There are no normal users registered in the system.</p>
       <?php }


    mysqli_close($db_connection);
    ?>
    <a class="home-btn" href="Dashboard.php">Back to Dashboard</a>
</body>
</html>


