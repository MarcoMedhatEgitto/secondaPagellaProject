<?php
include 'db_connection.php';
session_start();
$id = $_SESSION['id'];
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    
    $query = "DELETE FROM booked WHERE id = '$id'";
    $recieve = mysqli_query($db_connection, $query);
}
if ($_SESSION['rule'] == 'admin') {
    $sql = "SELECT b.id,
            p.name AS patient_name,
            d.name AS doctor_name,
            b.date_time
            FROM booked b
            INNER JOIN user_data p ON p.id = b.patient_data
            INNER JOIN user_data d ON d.id = b.doctor_data";
} else {
    $sql = "SELECT b.id,
            p.name AS patient_name,
            d.name AS doctor_name,
            b.date_time
            FROM booked b
            INNER JOIN user_data p ON p.id = b.patient_data
            INNER JOIN user_data d ON d.id = b.doctor_data
            WHERE b.patient_data = $id OR b.doctor_data = $id";
}

$query = mysqli_query($db_connection, $sql);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Table</title>
    <link rel="stylesheet" href="/secondaPagellaProject/styles.css">
</head>
<body>

    <table>
        <caption>Booking Information</caption>
        <tr>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Date & Time</th>
            <th>Action</th>
        </tr>
        <?php if (!empty($result)) {
            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['patient_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['doctor_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_time']); ?></td>
                     <td>
                        <a class='delete-btn' href='bookTable.php?id=<?php echo urlencode($row["id"]); ?>'>Delete</a>
                    </td>
                </tr>
        <?php } 
        } else { ?>
            <tr><td colspan="3" style="text-align:center;">No bookings found.</td></tr>
        <?php } ?>
    </table>
    <div>
    <a class="home-btn" href="Dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
