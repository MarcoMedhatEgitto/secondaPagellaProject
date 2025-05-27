<?php
    include 'authorization.php';
    include '../db_connection.php';
    if(isset($_POST['patient_data']))
{
  $patient_data = $_POST["patient_data"];
  $doctor_data = $_POST["doctor_data"];
  $date_time = $_POST["date_time"];
  $sql = "INSERT INTO booked(patient_data, doctor_data, date_time)
          VALUES('$patient_data','$doctor_data','$date_time')";
  $sql2 ="DELETE FROM available WHERE doctor = $doctor_data AND date_time = '$date_time'";
  $query1 = mysqli_query($db_connection, $sql);
  $query1 = mysqli_query($db_connection, $sql2);
}
$sql = "SELECT id, email FROM user_data WHERE rule = 'doctor'";
$output = mysqli_query($db_connection, $sql);
$results = mysqli_fetch_all($output, MYSQLI_ASSOC);

if(isset($_POST['submit']))
{
$date = $_POST['date'];
$doctor_id = $_SESSION['id'];
$sql = "INSERT INTO available(date_time, doctor) VALUES('$date', '$doctor_id')";
$query = mysqli_query($db_connection,$sql);
header("Location: doctorTable.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
           /* Apply gradient background to the whole page */
body {
    font-family: Arial, sans-serif;
    min-height: 100vh;
    justify-content: center;
    align-items: center;
}

/* Centered form styling */
form {
    margin-left:50%;
    transform: translate(-50%,0%);
    background-color: white;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    max-width: 400px;
    width: 100%;
}

/* Input and select styles */
input[type="datetime-local"],
select,
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin: 12px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
}

/* Submit button styling */
input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    font-weight: bold;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Heading */
h2 {
    margin-top: 0;
    color: #333;
    text-align: center;
}
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Doctor Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../Logout.php">
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage doctors
            </div>

            
            
            <li class="nav-item">
                <a class="nav-link" href="personalAvailability.php">
                    <span>Add availability</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Monitor riservations
            </div>     
            <li class="nav-item">
                <a class="nav-link" href="doctorTable.php">
                    <span>Table</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php echo $_SESSION['email']?>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']?></span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User data</h6>
                        </div>
                        <div class="card-body">
                             <form action="personalAvailability.php" method="post">
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
        <?php endif?>
        <input type="submit" value="submit" name="submit">
    </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PT center</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>









