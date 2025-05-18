<?php
include 'db_connection.php';

session_start();
$id = $_SESSION['id'];
if($_SESSION['rule'] == 'admin')
{
    $sql = "SELECT 
            p.name AS patient_name,
            d.name AS doctor_name,
            b.date_time
            FROM booked b
            INNER JOIN user_data p ON p.id = b.patient_data
            INNER JOIN user_data d ON d.id = b.doctor_data";
    $query = mysqli_query($db_connection, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
}
else
{
    $sql = "SELECT 
            p.name AS patient_name,
            d.name AS doctor_name,
            b.date_time
            FROM booked b
            INNER JOIN user_data p ON p.id = b.patient_data
            INNER JOIN user_data d ON d.id = b.doctor_data
            WHERE b.patient_data = $id OR b.doctor_data = $id";
    $query = mysqli_query($db_connection, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookTable</title>
</head>
<body>
    <table border="1">
    <tr>
        <th>Patient Name</th>
        <th>Doctor Name</th>
        <th>Date & Time</th>
    </tr>
    <?php if (!empty($result)) {
        foreach ($result as $row) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['patient_name']); ?></td>
                <td><?php echo htmlspecialchars($row['doctor_name']); ?></td>
                <td><?php echo htmlspecialchars($row['date_time']); ?></td>
            </tr>
    <?php } } else { ?>
        <tr><td colspan="3">No bookings found.</td></tr>
    <?php } ?>
</table>

</body>
</html>