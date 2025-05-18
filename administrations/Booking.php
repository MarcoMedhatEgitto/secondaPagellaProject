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
        <link rel="stylesheet" href="/SecondaPagellProject/styles.css">

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


