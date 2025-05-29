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
$sql = "SELECT user_data.id, name, email, date_time, description 
        FROM  available
        LEFT JOIN user_data ON available.doctor = user_data.id";
$output = mysqli_query($db_connection, $sql);
$results = mysqli_fetch_all($output, MYSQLI_ASSOC);
mysqli_free_result($output);
?>
<!DOCTYPE html>
<html lang="en">

<head>

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
                <div class="sidebar-brand-text mx-3">User Dashboard</div>
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


            <!-- Nav Item - Pages Collapse Menu -->
            
            <li class="nav-item">
                <a class="nav-link" href="userBooking.php">
                    <span>Book a doctor</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Monitor riservations
            </div>     
            <li class="nav-item">
                <a class="nav-link" href="userTable.php">
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
                    <h1 class="h3 mb-2 text-gray-800">Booking</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Doctor's availabiity</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Book</th>
                    </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Book</th>
                    </tr>
                                    </tfoot>
                                    <tbody>
                                        
<?php  foreach ($results as $result) {?>
                <tr>
                        <td><?php echo htmlspecialchars($result["name"]). " "; ?>
                    <a href="#" data-toggle="tooltip" class="btn btn-info btn-sm" data-placement="top" title="<?php echo $result['description'];?>">i</a>
                    </td>
                        <td><?php echo htmlspecialchars($result["email"]) ?></td>
                        <td><?php echo htmlspecialchars($result["date_time"]) ?></td>
                        <td>
                         <form action="userBooking.php" method="post" style="display:inline;">
    <input type="hidden" name="patient_data" value="<?php echo htmlspecialchars($_SESSION['id']); ?>">
    <input type="hidden" name="doctor_data" value="<?php echo htmlspecialchars($result['id']); ?>">
    <input type="hidden" name="date_time" value="<?php echo htmlspecialchars($result['date_time']); ?>">
    <button type="submit" class="btn btn-primary" onclick = "return confirm('you have booked this session')">Book</button>
</form>

                        </td>
                </tr>
            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>

</html>

