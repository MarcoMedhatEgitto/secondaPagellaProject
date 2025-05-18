<?php 
include 'db_connection.php';
session_start();
$sql = "SELECT id, email FROM user_data WHERE rule = 'doctor'";
$output = mysqli_query($db_connection, $sql);
$results = mysqli_fetch_all($output, MYSQLI_ASSOC);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set Doctor Availability</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SecondaPagellProject/styles.css">

</head>
<body>
    <form action="availability.php" method="post">
        <h2>Set Doctor Availability</h2>

        <label for="date">Date & Time</label>
        <input type="datetime-local" name="date" required>
        <?php if (isset($_SESSION['email']) && ($_SESSION['rule'] == 'admin')):?>
        <label for="doctor">Doctor</label>
        <select name="doctor" required>
            <option value="" disabled selected>Select a doctor</option>
            <?php foreach($results as $result): ?>
                <option value="<?php echo htmlspecialchars($result['id']); ?>">
                    <?php echo htmlspecialchars($result['email']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php endif; ?>
        <?php if (isset($_SESSION['email']) && ($_SESSION['rule'] == 'doctor')):?>
        <label for="doctor">Doctor</label>
        <select name="doctor" required>
                <option value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['email']; ?></option>
        </select>
        <?php endif ?>

        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
$date = $_POST['date'];
$doctor_id = $_POST['doctor'];
$sql = "INSERT INTO available(date_time, doctor) VALUES('$date', '$doctor_id')";
$query = mysqli_query($db_connection,$sql);
header("Location: Dashboard.php");
}
