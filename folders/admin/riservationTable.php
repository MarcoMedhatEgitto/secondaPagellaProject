<?php
include 'authorization.php';
include '../db_connection.php';
$id = $_SESSION['id'];
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    
    $query = "DELETE FROM booked WHERE id = '$id'";
    $recieve = mysqli_query($db_connection, $query);
}
    $sql = "SELECT b.id,
            p.name AS patient_name,
            d.name AS doctor_name,
            b.date_time
            FROM booked b
            INNER JOIN user_data p ON p.id = b.patient_data
            INNER JOIN user_data d ON d.id = b.doctor_data";
$query = mysqli_query($db_connection, $sql);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Table</title>
    <style>
        body {
            background-color: #f4f6f8;
            font-family: Arial, sans-serif;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        table {
            width: 90%;
            max-width: 800px;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #007BFF;
            color: #ffffff;
            text-align: left;
            padding: 12px 16px;
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        tr:last-child td {
            border-bottom: none;
        }

        caption {
            caption-side: top;
            font-size: 24px;
            font-weight: bold;
            padding-bottom: 15px;
            color: #333;
        }

        @media (max-width: 600px) {
            table, tr, td, th {
                font-size: 14px;
            }
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
    </style>
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
    <a class="home-btn" href="list.php">Back to Dashboard</a>
    </div>
</body>
</html>
